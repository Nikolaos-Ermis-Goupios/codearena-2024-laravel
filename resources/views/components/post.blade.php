<!-- Blog Post and Comments Container -->
<div class="post-container flex flex-col gap-12">
<!-- Posts section -->
  <article class="flex flex-col items-start justify-between">
      <!-- Image -->
      <div class="relative w-full">
        <img src="{{ $post->image }}" alt="" class="aspect-video w-full rounded-2xl bg-gray-100 object-cover sm:aspect-[2/1] lg:aspect-[3/2]">
        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
      </div>
      <div class="max-w-xl">
        <!-- Date -->
        <div class="mt-8 flex items-center gap-x-4 text-xs">
          <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->format("d M Y") }}</time>
        </div>
        <div class="group relative">
          <!-- Title -->
          <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
            <a href="{{ route('post', $post) }}">
              <span class="absolute inset-0"></span>
              {{ $post->title }}
            </a>
          </h3>
          <!-- Text -->
          <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ $post->excerpt }}</p>
        </div>
        <!-- Aythor name -->
        <div class="relative mt-8 flex items-center gap-x-4">
          <div class="text-sm/6">
            <p class="font-semibold text-gray-900">
              <a href="#">
                <span class="absolute inset-0"></span>
                {{ $post->author->name }}
              </a>
            </p>
          </div>
        </div>
      </div>
    </article>

    <!-- Comments Section -->
  <div id="comments-section" class="mt-4">
      <h2 class="text-2xl font-bold text-gray-900">Comments</h2>

      @forelse ($post->comments as $comment)
        <div class="mt-4">
            <!-- Author Name -->
            <p class="font-semibold">{{ $comment->name }}:</p>
            <!-- Comment Body -->
            <p class="mt-2 text-gray-700">{{ $comment->body }}</p>
            <!-- Time -->
            <p class="mt-2 text-gray-600 text-sm">{{ $comment->created_at->diffForHumans() }}</p>

            <!-- Delete Comment Form -->
            <form method="POST" action="{{ route('comment.delete', $comment) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 mt-2 hover:underline">Delete</button>
            </form>
        </div>
      @empty
          <p class="mt-4 text-gray-600">No comments yet. Be the first to comment!</p>
      @endforelse
  </div>
</div>