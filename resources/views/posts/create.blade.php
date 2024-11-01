<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')"/>
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                      :value="old('title')" required autofocus autocomplete="title"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="text" :value="__('Content')"/>
                        <textarea id="text" name="text" rows="6"
                                  class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                  required>{{ old('text') }}</textarea>
                        <x-input-error :messages="$errors->get('text')" class="mt-2"/>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-secondary-button class="ml-4">
                            {{ __('Create Post') }}
                        </x-secondary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
