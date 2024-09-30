<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Correction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('corrections.store', $post) }}">
                        @csrf

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold mb-2">Original Post</h3>
                            <p class="mb-4">{{ $post->text }}</p>
                        </div>

                        <div id="corrections-container">
                            @foreach($post->sentences as $index => $sentence)
                                <div class="mb-6 p-4 border border-gray-300 dark:border-gray-600 rounded">
                                    <input type="hidden" name="corrections[{{ $index }}][text]" value="{{ $sentence->text }}">
                                    
                                    <div class="mb-2">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Original Sentence</label>
                                        <p>{{ $sentence->text }}</p>
                                    </div>

                                    <div class="mb-2">
                                        <label for="correction_{{ $index }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Correction</label>
                                        <textarea id="correction_{{ $index }}" name="corrections[{{ $index }}][correction]" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                                    </div>

                                    <div>
                                        <label for="explanation_{{ $index }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Explanation</label>
                                        <textarea id="explanation_{{ $index }}" name="corrections[{{ $index }}][explanation]" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            <x-primary-button type="submit">
                                {{ __('Submit Correction') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
