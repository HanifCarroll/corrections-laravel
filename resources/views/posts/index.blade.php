<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Posts') }}
            </h2>
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($posts as $post)
                        <div class="mb-4 pb-4 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold">
                                <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}
                            </p>
                            <p class="mt-2">
                                {{ Str::limit($post->text, 150) }}
                            </p>
                        </div>
                    @endforeach

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
