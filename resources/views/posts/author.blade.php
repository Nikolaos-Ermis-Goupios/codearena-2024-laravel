@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-xl font-bold mb-4">Posts by {{ $user->name }}</h2>

    @if($posts->isEmpty())
        <p class="text-gray-500">No posts found for this author.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($posts as $post)
                <x-post :post="$post" />
            @endforeach
        </div>
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
