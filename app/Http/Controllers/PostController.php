<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(User $user = null)
    {
        $posts = Post::when($user, function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->published() // Only published posts
        ->withImage() // Only posts with images
        ->ordered()   // Promoted first, then by published_at
        ->paginate(12);
    
        $authors = User::whereHas('posts', function ($query) {
            $query->published();
        })->get();
    
        return view('posts.index', compact('posts', 'authors'));
    }
    
    public function author(User $user)
    { 
        $posts = Post::where('user_id', $user->id) // Filter by author
        ->published() // Ensure only published posts
        ->ordered()   // Order: Promoted first, then by published_at
        ->paginate(12); // Paginate results

        return view('posts.author', compact('posts', 'user'));
    }

    public function promoted()
    {
        $posts = Post::where('promoted', true)
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('posts.promoted', compact('posts'));
    } 

    public function show(Post $post)
    {
         // Check if the post is unpublished
         if (!$post->published_at) {
            abort(404); // Return a 404 response if unpublished
        }
        return view('posts.show', compact('post'));
    }

    public function storeComment(Request $request, Post $post)
    {
        // Validate the comment
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Save the comment
        $post->comments()->create([
            'name' => $validated['name'],
            'body' => $validated['body'],
        ]);

        return redirect()->route('post', $post);
    }
    
}
