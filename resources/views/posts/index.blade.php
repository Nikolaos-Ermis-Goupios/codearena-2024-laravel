@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-xl font-bold mb-4">From the Blog</h2>

    @if($posts->isEmpty())
        <div>No posts found.</div>
    @else
        <div>
            @foreach($posts as $post)
                <x-post :post="$post" />
            @endforeach
        </div>
        <div>{{ $posts->links() }}</div>
    @endif

    <section id="authors">
        <h3>Authors Who Have Published Posts</h3>
        @foreach($authors as $author)
            <p>{{ $author->name }}</p>
        @endforeach
    </section>
</div>
@endsection
