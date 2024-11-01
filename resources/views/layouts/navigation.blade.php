<header>
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="container mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{route('home')}}" class="text-xl font-bold">EnglishFix</a>
                </div>
            </div>

            {{-- Logged out desktop --}}
            @guest
                <nav class="hidden sm:block">
                    <ul class="flex items-center space-x-4">
                        <li>
                            <x-nav-link :href="route('login')" class="text-black hover:text-gray-600">Log In
                            </x-nav-link>
                        </li>
                        <li>
                            <x-nav-link :href="route('register')"
                                        class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800">Sign Up
                            </x-nav-link>
                        </li>
                    </ul>
                </nav>
            @endguest

            {{-- Logged in desktop --}}
            @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6 gap-x-4">

                    <!-- Primary Navigation Links -->
                    <x-nav-link :href="route('posts.index')">
                        {{ __('All Posts') }}
                    </x-nav-link>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                    <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')"
                                class="bg-black text-white flex items-center justify-center px-4 py-2 rounded-md hover:bg-gray-800">
                        {{ __('New Post') }}
                    </x-nav-link>
                </div>
            @endauth

            <!-- Hamburger Icon for Mobile -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        @guest
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('login')">
                            {{ __('Log In') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('register')">
                            {{ __('Sign Up') }}
                        </x-responsive-nav-link>
                    </div>
                </div>
            </div>
        @endguest

        @auth
            <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('posts.create')">
                            {{ __('New Post') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('posts.index')">
                            {{ __('All Posts') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </nav>
</header>
