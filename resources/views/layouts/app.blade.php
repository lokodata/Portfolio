<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>John Mark A. Pachico - @yield('title', 'AI Automation Expert')</title>

    {{-- Add Favicon Link --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    {{-- Or if you use PNG: <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png"> --}}
    {{-- Or SVG: <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml"> --}}

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    @yield('styles') 
</head>
<body class="antialiased font-sans"> {{-- Added font-sans for default --}}
    <div class="flex flex-col min-h-screen"> {{-- Added for sticky footer --}}

        <header class="container mx-auto px-4 md:px-24 py-6">
            <nav class="relative">
                <div class="flex justify-between items-center w-full">
                    <!-- Mobile Menu Button on the left -->
                    <button id="mobile-menu-button" class="md:hidden flex items-center p-2 rounded hover:bg-gray-100 transition duration-200 ease-in-out">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>

                    <!-- Desktop Navigation on the left -->
                    <div class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('home') }}" class="hover:underline {{ request()->routeIs('home') ? 'font-bold underline text-black' : 'text-gray-600' }} transition duration-200 ease-in-out transform hover:scale-105">John Mark</a>
                        <a href="{{ route('projects') }}" class="hover:underline {{ request()->routeIs('projects') ? 'font-bold underline text-black' : 'text-gray-600' }} transition duration-200 ease-in-out transform hover:scale-105">Projects</a>
                        <a href="{{ route('testimonials') }}" class="hover:underline {{ request()->routeIs('testimonials') ? 'font-bold underline text-black' : 'text-gray-600' }} transition duration-200 ease-in-out transform hover:scale-105">Testimonials</a>
                    </div>

                    <!-- Free Consultation on the right -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('consultation.show') }}" class="bg-black text-white px-4 py-2 rounded font-semibold hover:bg-gray-800 text-sm transition duration-200 ease-in-out transform hover:-translate-y-1 hover:shadow-md">FREE CONSULTATION</a>
                    </div>
                </div>

                <!-- Mobile Navigation Menu -->
                <div id="mobile-menu" class="hidden md:hidden absolute left-0 top-full w-48 bg-white shadow-lg rounded-lg mt-2 py-2 z-50">
                    <a href="{{ route('home') }}" class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('home') ? 'font-bold text-black' : 'text-gray-600' }} transition duration-150 ease-in-out">John Mark</a>
                    <a href="{{ route('projects') }}" class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('projects') ? 'font-bold text-black' : 'text-gray-600' }} transition duration-150 ease-in-out">Projects</a>
                    <a href="{{ route('testimonials') }}" class="block px-4 py-2 hover:bg-gray-100 {{ request()->routeIs('testimonials') ? 'font-bold text-black' : 'text-gray-600' }} transition duration-150 ease-in-out">Testimonials</a>
                </div>
            </nav>
        </header>

        <main class="container mx-auto px-4 md:px-24 py-8 flex-grow"> {{-- Added flex-grow --}}
            @yield('content')
        </main>

        <footer class="container mx-auto px-4 md:px-24 py-8">
            <div class="border-t w-full pb-8"></div> {{-- Separate border div that spans full width --}}
            <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
                <div class="flex space-x-4 mb-4 sm:mb-0">
                    <a href="https://www.tiktok.com/@lokodata115"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="TikTok"
                       class="text-gray-500 hover:text-black transition duration-200 ease-in-out transform hover:scale-110">
                        {{-- TikTok Icon --}}
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/@lokodata115"
                       target="_blank"
                       rel="noopener noreferrer"
                       aria-label="YouTube"
                       class="text-gray-500 hover:text-black transition duration-200 ease-in-out transform hover:scale-110">
                        {{-- YouTube Icon --}}
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path><path d="m10 15 5-3-5-3z"></path></svg>
                    </a>
                </div>
                <p class="text-sm text-gray-600">
                    Copyright @ {{ date('Y') }} John Mark Pachico, All Rights Reserved.
                </p>
            </div>
        </footer>

    </div> {{-- End sticky footer wrapper --}}

    {{-- Add JS for sliders (e.g., SwiperJS CDN) --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Mobile Menu Toggle Script -->
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>

    @yield('scripts') {{-- For page-specific scripts --}}
</body>
</html>