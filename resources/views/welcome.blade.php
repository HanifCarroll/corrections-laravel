<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnglishFix</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-screen bg-white text-black">
<header class="border-b">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="text-xl font-bold">EnglishFix</div>
        <nav>
            <ul class="flex items-center space-x-4">
                <li><button class="text-black hover:text-gray-600">Log In</button></li>
                <li><button class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800">Sign Up</button></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="py-20 text-center">
        <h1 class="text-4xl font-bold mb-4">Improve Your English Writing Skills</h1>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Get real-time corrections and explanations from our community of language experts.</p>
        <button class="bg-black text-white px-6 py-3 rounded-md hover:bg-gray-800">
            Get Started for Free
        </button>
    </section>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Key Features</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Submit Your Text</h3>
                    <p>Easily submit your writing for review and correction.</p>
                </div>
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Receive Corrections</h3>
                    <p>Get detailed corrections and explanations for each sentence.</p>
                </div>
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Learn and Improve</h3>
                    <p>Understand your mistakes and enhance your writing skills.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">How It Works</h2>
            <div class="w-fit mx-auto">
                <ol class="space-y-4">
                    <li class="flex items-center">
                        <span class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">1</span>
                        <span>Submit your text</span>
                    </li>
                    <li class="flex items-center">
                        <span class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">2</span>
                        <span>Our community reviews and corrects your writing</span>
                    </li>
                    <li class="flex items-center">
                        <span class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">3</span>
                        <span>Receive detailed corrections and explanations</span>
                    </li>
                    <li class="flex items-center">
                        <span class="bg-black text-white rounded-full w-8 h-8 flex items-center justify-center mr-4 flex-shrink-0">4</span>
                        <span>Learn from your mistakes and improve your English</span>
                    </li>
                </ol>
            </div>
        </div>
    </section>

    <section class="py-20 bg-black text-white text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Improve Your English?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join our community of learners and start receiving expert corrections today.</p>
        <button class="bg-white text-black px-6 py-3 rounded-md hover:bg-gray-100">
            Sign Up for Free
        </button>
    </section>
</main>

<footer class="py-8 text-center text-sm text-gray-600">
    <p>&copy; {{ date('Y') }} EnglishFix. All rights reserved.</p>
</footer>
</body>
</html>
