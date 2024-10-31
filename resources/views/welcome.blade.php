<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>English Correction - Perfect Your Writing</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white">
    {{-- Hero Section --}}
    <header class="container mx-auto px-4 py-16">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-blue-900 mb-4">
                Perfect Your English Writing
            </h1>
            <p class="text-xl text-gray-600 mb-8">
                Get detailed corrections and explanations from native speakers and language experts
            </p>
            <a href="{{ route('posts.create') }}"
               class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-700 transition-colors">
                Start Writing Now
            </a>
        </div>
    </header>

    {{-- Features Section --}}
    <section class="container mx-auto px-4 py-16">
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-12">
            How It Works
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Submit Your Text</h3>
                <p class="text-gray-600">
                    Share your writing and get sentence-by-sentence corrections from the community
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Receive Corrections</h3>
                <p class="text-gray-600">
                    Native speakers and language experts provide detailed corrections and explanations
                </p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold mb-2">Improve Quickly</h3>
                <p class="text-gray-600">
                    Learn from your mistakes with clear explanations for each correction
                </p>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">
                Ready to Improve Your English?
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Join our community and start receiving corrections today
            </p>
            <a href="{{ route('posts.create') }}"
               class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                Get Started
            </a>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="container mx-auto px-4 py-8">
        <div class="text-center text-gray-500 text-sm">
            © {{ date('Y') }} English Correction. All rights reserved.
        </div>
    </footer>
</div>
</body>
</html>
