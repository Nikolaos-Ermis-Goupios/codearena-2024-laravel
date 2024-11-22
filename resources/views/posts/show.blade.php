@extends('layouts.app')

@section('content')
    <div class="bg-white px-6 py-32 lg:px-8">

        <!-- Post section -->
        <div class="mx-auto max-w-3xl text-base/7 text-gray-700">
            <p class="text-base/7 font-semibold text-indigo-600">Introducing</p>
            <!-- Title -->
            <h1 class="mt-2 text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ $post->title }}</h1>
            <p class="mt-6 text-xl/8">{{ $post->excerpt }}</p>
            <!-- Image -->
            <figure class="mt-16">
                <img class="aspect-video rounded-xl bg-gray-50 object-cover"
                    src="{{ $post->image }}"
                    alt="">
            </figure>
            <!-- Text -->
            <div class="mt-16 max-w-2xl">
                <p class="mt-6">{{ $post->body }}</p>
            </div>
            <!-- Athor name -->
            <div class="mt-4">
                By {{ $post->author->name }}
            </div>
        </div>

        <!-- Comment Form Section -->
        <div id="comments-section" class="mt-24 text-center">
            <!-- Comments -->
            <h2 class="text-2xl font-bold text-gray-900">Comments</h2>
            
            @forelse ($post->comments->reverse() as $comment)
                <div class="mt-4">
                    <!-- Commentor -->
                    <p class="font-semibold">{{ $comment->name }}:</p>
                    <!-- Comment text -->
                    <p>{{ $comment->body }}</p>
                    <!-- Comment date created -->
                    <p class="text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
                    <!-- Delete Button -->
                    <form method="POST" action="{{ route('comment.delete', $comment) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            Delete
                        </button>
                    </form>
                </div>
            @empty
                <!-- Alternative text -->
                <p class="mt-4 text-gray-600">No comments yet. Be the first to comment!</p>
            @endforelse
            <!-- Create comment area -->
            <h2 class="text-2xl font-bold text-gray-900 mt-8">Leave a Comment</h2>
            <form id="comment-form" method="POST" action="{{ route('comment', $post) }}" class="mt-6">
                @csrf
                <!-- Let Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" id="name" required name="name" 
                        class="mt-1 block w-full bg-gray-100 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
                <!-- Let Text -->
                <div class="mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Comment:</label>
                    <textarea id="body" required name="body" 
                        class="mt-1 block w-full rounded-md bg-gray-100 border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                </div>
                <!-- Submit Button -->
                <button type="submit" 
                        class="inline-flex justify-center rounded-md border-2 border-black bg-blue-600 py-2 px-4 text-sm font-medium shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Submit
                </button>
            </form>
        </div>
@endsection
