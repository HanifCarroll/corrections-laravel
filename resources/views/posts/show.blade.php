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

                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('corrections.create', $post) }}" class="bg-blue-500 hover:bg-blue-600 font-bold py-2 px-4 rounded">
                            New Correction
                        </a>
                        @if($post->user_id === auth()->id())
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 font-bold py-2 px-4 rounded">
                                    Delete Post
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <h2 class="text-2xl font-bold mb-4">Corrections</h2>
                @forelse ($post->corrections as $correction)
                    <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                Corrected by {{ $correction->user->name }} | {{ $correction->created_at->format('F j, Y, g:i a') }}
                            </p>
                            <p class="mb-2">
                                {{ $correction->correctionSentences->count() }} 
                                {{ Str::plural('sentence', $correction->correctionSentences->count()) }} corrected
                            </p>
                            <a href="{{ route('corrections.show', $correction) }}" class="text-blue-500 hover:underline">
                                View correction details
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">No corrections have been made for this post yet.</p>
                @endforelse
            </div>
            <div class="mt-4">
                <a href="{{ route('posts.index') }}" class="text-blue-500 hover:underline">
                    &larr; Back to all posts
                </a>
            </div>
        </div>
    </div>
</x-app-layout>