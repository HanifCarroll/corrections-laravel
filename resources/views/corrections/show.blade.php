<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Correction Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Original Post</h3>
                    <p class="mb-6">{!! nl2br(e($post->text)) !!}</p>

                    <h3 class="text-lg font-semibold mb-4">Corrections</h3>
                    @foreach($post->sentences as $postSentence)
                        @php
                            $correctionSentence = $correction->correctionSentences->where('post_sentence_id', $postSentence->id)->first();
                            $isCorrected = $correctionSentence && $correctionSentence->corrected_text && $correctionSentence->corrected_text !== $postSentence->text;
                        @endphp
                        <div class="mb-6 p-4 border rounded {{ $isCorrected ? 'bg-yellow-50 dark:bg-yellow-900 border-yellow-300 dark:border-yellow-600' : 'bg-green-50 dark:bg-green-900 border-green-300 dark:border-green-600' }}">
                            <div class="mb-2">
                                <label class="block text-sm font-medium {{ $isCorrected ? 'text-yellow-700 dark:text-yellow-300' : 'text-green-700 dark:text-green-300' }}">
                                    {{ $isCorrected ? 'Sentence (Corrected)' : 'Sentence (No Correction Needed)' }}
                                </label>
                                <p>{{ $postSentence->text }}</p>
                            </div>

                            @if($isCorrected)
                                <div class="mb-2">
                                    <label class="block text-sm font-medium text-yellow-700 dark:text-yellow-300">Correction</label>
                                    <p>{{ $correctionSentence->corrected_text }}</p>
                                </div>

                                @if($correctionSentence->explanation)
                                    <div>
                                        <label class="block text-sm font-medium text-yellow-700 dark:text-yellow-300">Explanation</label>
                                        <p>{{ $correctionSentence->explanation }}</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                    @endforeach

                    <div class="mt-6 flex space-x-8">
                        <x-primary-button href="{{ route('posts.show', $correction->post) }}">
                            Back to Post
                        </x-primary-button>
                        @if($correction->user_id === auth()->id())
                            <form action="{{ route('corrections.destroy', $correction) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this correction?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-red-600 rounded-md font-semibold text-xs text-red-600 uppercase tracking-widest hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Delete Correction
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
