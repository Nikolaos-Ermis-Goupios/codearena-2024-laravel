@extends('layouts.app')

@section('content')
<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">From the blog</h2>
        </div>
        @if($posts->isEmpty())
            <div class="mx-auto mt-16 max-w-2xl text-center text-gray-500">
                <p>No posts found.</p>
            </div>
        @else
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach
            </div>
            <div class="mt-10">
                {{ $posts->links() }}
            </div>
        @endif

        <!-- Authors Section -->
        <section id="authors" class="mt-24">
            <h3 class="text-lg font-semibold text-gray-900">Authors Who Have Published Posts</h3>
            <div class="mt-6">
                @foreach($authors as $author)
                    <p>{{ $author->name }}</p>
                @endforeach
            </div>
        </section>
    </div>
</div>

@endsection
