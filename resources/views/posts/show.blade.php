<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post Details') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between">
                    <h1 class="text-xl font-bold mb-1">{{ $post->title }}</h1>
                    <div class="">
                        @if($post->user_id !== auth()->id())
                            <x-primary-button href="{{ route('posts.corrections.create', $post) }}">
                                New Correction
                            </x-primary-button>
                        @endif
                        @if($post->user_id === auth()->id())
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 border border-red-600 rounded-md font-semibold text-xs text-red-600 uppercase tracking-widest hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Delete Post
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-400 mb-8">
                    <p>
                        By {{ $post->user->name }}
                    </p>
                    <p>
                        {{ $post->created_at->format('F j, Y, g:i a') }}
                    </p>
                </div>
                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($post->text)) !!}
                </div>

            </div>
            <div class="border-t mx-6"></div>
            <div>
                @forelse ($post->corrections as $correction)
                    <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                <p>

                                    Corrected by {{ $correction->user->name }}
                                </p>
                                <p>

                                    {{ $correction->created_at->format('F j, Y, g:i a') }}
                                </p>
                            </div>
                            <p class="mb-2">
                                {{ $correction->correctionSentences->count() }}
                                {{ Str::plural('sentence', $correction->correctionSentences->count()) }}
                                corrected
                            </p>
                            <a href="{{ route('posts.corrections.show', [$post, $correction]) }}"
                               class="text-black hover:underline">
                                View
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">No corrections have been made for this post
                        yet.</p>
                @endforelse
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('posts.index') }}" class="text-black hover:underline">
                &larr; Back to all posts
            </a>
        </div>
    </div>
</x-app-layout>
