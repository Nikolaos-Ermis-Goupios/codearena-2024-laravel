<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Blog Posts (Main Index Page)
Route::get('/posts', [PostController::class, 'index'])->name('posts');

// Individual Post Page (By Slug)
Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('post');

// Author-Specific Posts
Route::get('/author/{user}', [PostController::class, 'author'])->name('author');

// Promoted Posts Page
Route::get('/promoted', [PostController::class, 'promoted'])->name('promoted');

// Comment submissions
Route::post('/posts/{post}/comment', [PostController::class, 'storeComment'])->name('comment');

// Comment sorted by created at
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post');

// Route for deleting a comment
Route::delete('/comments/{comment}', [PostController::class, 'destroyComment'])->name('comment.delete');

// Seperate rout for the pagination,user id
Route::get('/all-posts', [PostController::class, 'index'])->name('posts.index');

