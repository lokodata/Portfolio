<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'John Mark A. Pachico')</title>
    <link href="/src/styles.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('head-scripts') {{-- Yield for page-specific head scripts like TypeIt --}}
    @stack('styles')
</head>
<body class="bg-stone-50 dark:bg-gray-900 text-black dark:text-stone-100 overflow-x-hidden">

    <!-- Header Section -->
    <header class="py-6 sticky top-0 z-50 bg-stone-50/80 dark:bg-gray-900/80 backdrop-blur-sm border-b border-stone-200 dark:border-gray-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <a href="/" aria-label="Homepage"> {{-- Changed href="#" to "/" --}}
                <img src="{{ asset('logo.png') }}"
                alt="John Mark"
                class="h-10 w-10">
            </a>
            <div class="flex items-center space-x-4 md:space-x-6 lg:space-x-8">
                <button id="darkModeToggle" type="button" aria-label="Toggle dark mode" class="p-2 rounded-full text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                    <svg id="sunIcon" class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-6.364-.386 1.591-1.591M3 12h2.25m.386-6.364 1.591 1.591" /> </svg>
                    <svg id="moonIcon" class="size-5 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" /> </svg>
                </button>
                <nav class="hidden md:flex items-center space-x-6 lg:space-x-8">
                    <a href="/" aria-label="Home" class="p-1 text-gray-600 dark:text-gray-400 hover:text-black dark:hover:text-white transition-colors duration-150"> {{-- Changed href="#" to "/" --}}
                        <svg class="size-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="/#projects" class="text-sm font-bold text-black dark:text-stone-100 hover:text-primary dark:hover:text-primary transition-colors duration-150">Projects</a> {{-- Added / prefix --}}
                    <a href="/#testimonials" class="text-sm font-bold text-black dark:text-stone-100 hover:text-primary dark:hover:text-primary transition-colors duration-150">Testimonials</a> {{-- Added / prefix --}}
                </nav>
                <a href="/#consultation" class="bg-primary text-white text-xs font-bold px-4 py-2 sm:px-6 sm:py-3 rounded-lg hover:bg-primary-dark transition-all duration-200 ease-in-out whitespace-nowrap hover:scale-105"> {{-- Added / prefix --}}
                    FREE CONSULTATION
                </a>
            </div>
        </div>
    </header>

    <main>
        @yield('content') {{-- Placeholder for page-specific content --}}
    </main>

    <!-- Footer Section -->
    <footer class="py-12 bg-stone-50 dark:bg-gray-900 border-t border-stone-200 dark:border-gray-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-3xl font-black text-black dark:text-white leading-loose">Contact</h3>
            <p class="mt-2 text-base text-black/70 dark:text-stone-300 font-medium">Providing value in every message.</p>
            <div class="mt-6 flex justify-center items-center space-x-6">
                <a href="mailto:{{ $contactInfo['gmail'] }}" aria-label="Send an Email" class="text-black/90 dark:text-stone-200 hover:text-primary dark:hover:text-primary transition-colors duration-150 hover:scale-110 inline-block">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M1.75 3h20.5c.966 0 1.75.784 1.75 1.75v14.5c0 .966-.784 1.75-1.75 1.75H1.75C.784 21 0 20.216 0 19.25V4.75C0 3.784.784 3 1.75 3ZM12 12.75 2.222 6.085A1.733 1.733 0 0 1 1.75 4.5h20.5c.176 0 .343.05.49.14l-.012.01L12 12.75Zm-9.75 6.75h20.5a.25.25 0 0 0 .25-.25V6.64l-9.73 6.487a1.25 1.25 0 0 1-1.54 0L1.75 6.64v12.61c0 .138.112.25.25.25Z"/>
                    </svg>
                </a>
                <a href="{{ $contactInfo['facebook_link'] ?? '#' }}" aria-label="Facebook Profile" class="text-black/90 dark:text-stone-200 hover:text-primary dark:hover:text-primary transition-colors duration-150 hover:scale-110 inline-block">
                    <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5Z"/>
                    </svg>
                </a>
            </div>
            <p class="mt-10 text-sm font-extralight text-black/70 dark:text-stone-400 leading-none"> Copyright @ 2025 John Mark A. Pachico, All Rights Reserved. </p>
        </div>
    </footer>

    <!-- Image Overlay -->
    <div id="imageOverlay" class="image-overlay">
        <span id="imageOverlayClose" class="image-overlay-close">&times;</span>
        <img id="imageOverlayImg" src="" alt="Project Zoom View">
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Dark Mode Logic
        const toggleButton = document.getElementById('darkModeToggle');
        const sunIcon = document.getElementById('sunIcon');
        const moonIcon = document.getElementById('moonIcon');
        const htmlElement = document.documentElement;

        function applyTheme(theme) {
            if (theme === 'dark') {
                htmlElement.classList.add('dark');
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
                localStorage.setItem('theme', 'dark');
            } else {
                htmlElement.classList.remove('dark');
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
                localStorage.setItem('theme', 'light');
            }
        }

        toggleButton.addEventListener('click', () => {
            const isDarkMode = htmlElement.classList.contains('dark');
            applyTheme(isDarkMode ? 'light' : 'dark');
        });

        // Initialize theme based on localStorage or system preference
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (savedTheme) {
            applyTheme(savedTheme);
        } else if (prefersDark) {
            applyTheme('dark');
        } else {
            applyTheme('light');
        }

        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>
    @stack('scripts') {{-- Yield for page-specific scripts --}}

</body>
</html>
