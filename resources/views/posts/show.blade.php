<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                        By {{ $post->user->name }} | {{ $post->created_at->format('F j, Y, g:i a') }}
                    </p>
                    <div class="prose dark:prose-invert max-w-none">
                        {!! nl2br(e($post->text)) !!}
                    </div>

                    @if($post->user_id === auth()->id())
                        <div class="mt-6 flex space-x-4">
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 font-bold py-2 px-4 rounded">
                                    Delete Post
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline">
                    &larr; Back to all posts
                </a>
            </div>
        </div>
    </div>
</x-app-layout>