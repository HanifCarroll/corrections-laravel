<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Posts') }}
            </h2>
        </div>
    </x-slot>

    <div class="px-6">
        <div class="max-w-7xl">
            <div class="text-gray-900 dark:text-gray-100">
                @foreach ($posts as $post)
                    <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                        <div class="bg-white rounded-lg p-4 mb-6">
                            <h3 class="text-lg font-semibold">
                                {{ $post->title }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                By {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}
                            </p>
                            <p class="mt-2">
                                {{ Str::limit($post->text, 150) }}
                            </p>
                        </div>
                    </a>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
