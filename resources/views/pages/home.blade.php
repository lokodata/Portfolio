{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'John Mark A. Pachico | AI, Automation, SaaS Expert')

@section('head-scripts')
    <!-- **** 1. INCLUDE TYPEIT.JS **** -->
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <!-- **** END TYPEIT.JS **** -->

    <!-- **** 2. INCLUDE PHOTOSWIPE CSS **** -->
    <link rel="stylesheet" href="https://unpkg.com/photoswipe@5.4.3/dist/photoswipe.css">
    <!-- **** END PHOTOSWIPE CSS **** -->

    <style>
        /* Optional: Style adjustments for PhotoSwipe if needed */
        .pswp__bg {
            background: rgba(0, 0, 0, 0.85); /* Darker background */
        }
        /* Ensure thumbnails stay visually distinct */
        .thumbnail-gallery img {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out, opacity 0.2s ease-in-out;
        }
        .thumbnail-gallery img.active-thumbnail {
            box-shadow: 0 0 0 3px var(--color-primary, #4F46E5); /* Use your primary color */
            opacity: 1;
            transform: scale(1.05);
        }
        .thumbnail-gallery img:not(.active-thumbnail) {
            opacity: 0.7;
        }
        .thumbnail-gallery img:hover:not(.active-thumbnail) {
            opacity: 0.9;
            transform: scale(1.03);
        }
        /* Style for scrollable testimonials */
        .testimonial-scroll {
            scrollbar-width: thin; /* Firefox */
            scrollbar-color: rgba(128, 128, 128, 0.5) transparent; /* Firefox */
        }
        .testimonial-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .testimonial-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .testimonial-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(128, 128, 128, 0.5);
            border-radius: 10px;
            border: 3px solid transparent;
        }
         /* Ensure main image container is clickable */
        #projectMainImageContainer {
            cursor: zoom-in; /* Indicate clickability */
            overflow: hidden; /* Ensure overlay corners respect container rounding */
        }

        /* Ensure PhotoSwipe UI is on top */
        .pswp {
            z-index: 99999 !important;
        }
    </style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-24 overflow-hidden">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-16 items-center">
{{-- Check if heroSection data exists --}}
@if($heroSection)
<div class="order-2 md:order-1 space-y-5 text-center md:text-left" data-aos="fade-right">
<h1 class="text-4xl sm:text-5xl font-black text-black dark:text-white leading-tight tracking-wide"> Unlock Business Efficiency with AI, Automation, & SaaS </h1>
<div class="pt-1">
<h2 class="text-xl sm:text-2xl font-bold text-black dark:text-stone-100"> John Mark A. Pachico </h2>
<!-- **** DYNAMIC TITLES **** -->
<p id="titles" class="text-base sm:text-lg text-primary dark:text-primary font-medium tracking-wide min-h-[2em]">
{{-- TypeIt will populate this, data passed via script below --}}
</p>
<!-- **** END DYNAMIC TITLES **** -->
</div>
{{-- Use dynamic description --}}
<p class="text-base lg:text-lg text-black/70 dark:text-stone-300 max-w-xl mx-auto md:mx-0"> {{ $heroSection->description ?? 'Passionate about leveraging technology to streamline operations and drive growth. Let\'s connect and explore how AI and automation can transform your business.' }} </p>

{{-- Dynamic Social Links --}}
@if($heroSection->social_links && is_array($heroSection->social_links) && count($heroSection->social_links) > 0)
<div class="flex justify-center md:justify-start space-x-5 items-center pt-3">
@foreach($heroSection->social_links as $link)
<a href="{{ $link['url'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="text-sm font-bold text-black/90 dark:text-stone-200 hover:text-primary dark:hover:text-primary tracking-wider transition-colors duration-150 underline hover:no-underline hover:scale-110">{{ $link['label'] ?? 'Social Link' }}</a>
@endforeach
</div>
@endif
</div>
<div class="order-1 md:order-2 flex justify-center" data-aos="fade-left">
{{-- Use dynamic image --}}
<img class="w-full max-w-xs sm:max-w-sm h-auto rounded-[30px] shadow-xl dark:shadow-primary/30" src="{{ $heroSection->image_url ?? asset('profile.jpg') }}" alt="John Mark A. Pachico - AI and Automation Expert" />
</div>
@else
{{-- Fallback content if no hero section data is found --}}
<div class="col-span-full text-center text-red-500 dark:text-red-400">
Hero section content not available. Please configure it in the admin panel.
</div>
@endif
</div>
</div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-16 md:py-24 bg-white dark:bg-gray-800" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-black text-black dark:text-white leading-tight"> Diverse projects across <br class="hidden sm:inline"/>various industries </h2>
        <p class="mt-4 text-base text-black/70 dark:text-stone-300 font-medium tracking-widest max-w-md mx-auto"> I am focused on solving real-world problems with innovative solutions. </p>
    </div>

    {{-- Check if there are projects --}}
    @if($projects->isNotEmpty())
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
            {{-- Project Carousel/Display Logic --}}
            <div class="flex justify-center items-center space-x-4 mb-4">
                <button aria-label="Previous Project" class="project-prev text-black/50 dark:text-stone-400 hover:text-black dark:hover:text-white disabled:opacity-50 transition-colors duration-150"> <svg class="size-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg> </button>
                <span class="project-counter text-base font-medium text-black/50 dark:text-stone-400 tracking-widest">1/{{ $projects->count() }} Projects</span>
                <button aria-label="Next Project" class="project-next text-black/50 dark:text-stone-400 hover:text-black dark:hover:text-white disabled:opacity-50 transition-colors duration-150"> <svg class="size-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L10.586 10 7.293 6.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button>
            </div>

            @php $firstProject = $projects->first(); @endphp

            {{-- Add relative class to the container --}}
            <div id="projectMainImageContainer" class="relative cursor-zoom-in rounded-[30px] overflow-hidden"> {{-- Added rounding and overflow --}}
                {{-- Dynamic main image --}}
                <img id="projectMainImage" class="w-full h-auto shadow-lg dark:shadow-primary/20 aspect-video object-cover object-top block" {{-- Removed rounding here, apply to container --}}
                     src="{{ $firstProject && $firstProject->images->isNotEmpty() ? $firstProject->images->first()->image_url : 'https://placehold.co/853x480/e0e0e0/1C1917?text=Project+Screenshot' }}"
                     alt="{{ $firstProject && $firstProject->images->isNotEmpty() ? ($firstProject->images->first()->alt_text ?? $firstProject->title . ' Screenshot') : ($firstProject->title ?? 'Project') . ' Screenshot' }}"
                     data-current-index="0"
                     />
                {{-- Add the overlay span - REMOVE opacity-0 to make it always visible --}}
                <span id="zoomOverlay" class="absolute bottom-3 right-3 z-10 bg-black/60 text-white text-xs font-medium px-2 py-1 rounded-md pointer-events-none">
                    Click to Zoom
                </span>
            </div>

            {{-- Dynamic Thumbnails --}}
            <div class="thumbnail-gallery flex flex-nowrap overflow-x-auto gap-4 mt-4 px-2 mb-8 md:mb-12 py-2">
                 {{-- Iterate through all images of the first project for thumbnails --}}
                @if($firstProject && $firstProject->images->isNotEmpty())
                    @foreach($firstProject->images as $index => $image)
                        {{-- Add data-index attribute to each thumbnail --}}
                        <img class="project-thumbnail flex-none w-32 h-16 object-cover object-top rounded-lg shadow-md dark:shadow-primary/20 transition-all duration-200 ease-in-out cursor-pointer {{ $index === 0 ? 'active-thumbnail' : '' }}"
                             src="{{ $image->image_url ?? 'https://placehold.co/125x70/eeeeee/1C1917?text=Thumb' }}"
                             data-large-src="{{ $image->image_url ?? '' }}"
                             data-index="{{ $index }}" {{-- Store the index --}}
                             alt="{{ $image->alt_text ?? $firstProject->title . ' Thumbnail ' . ($index + 1) }}"
                             style="object-fit: cover; object-position: top;" />
                    @endforeach
                @else
                     {{-- Placeholder if first project has no images --}}
                     <p class="text-center text-sm text-gray-500 w-full">No images available for this project.</p>
                @endif
            </div>

             {{-- Dynamic Project Details (initially for the first project) --}}
            <div id="projectDetails" class="max-w-3xl mx-auto text-left md:text-center">
                <h3 class="text-2xl md:text-3xl font-bold text-black dark:text-white">{{ $firstProject->title ?? 'Project Title' }}</h3>

                <div class="mt-2 flex flex-wrap justify-start md:justify-center items-center gap-x-4 gap-y-1 text-xs">
                    @if($firstProject?->project_date)
                    <span class="font-normal text-black dark:text-stone-300">{{ $firstProject->project_date->format('F j, Y') }}</span>
                    @endif
                    @if(!empty($firstProject->categories))
                        @foreach($firstProject->categories as $category)
                        <span class="text-black/70 dark:text-stone-400 font-bold">{{ $category }}</span>
                        @endforeach
                    @endif
                </div>

                {{-- Project Description - Ensure this element exists and is targeted correctly --}}
                <p class="mt-4 text-sm text-black dark:text-stone-300 text-justify md:text-center" id="projectDescription">
                    {{ $firstProject->description ?? 'Project description goes here.' }}
                </p>

                @if($firstProject?->project_link)
                    <div class="mt-6 flex justify-start md:justify-center">
                        <a href="{{ $firstProject->project_link }}" target="_blank" rel="noopener noreferrer" class="inline-block bg-white dark:bg-gray-700 text-black/70 dark:text-stone-300 text-xs font-bold px-5 py-2 rounded-lg shadow-md dark:shadow-none hover:shadow-lg dark:hover:bg-gray-600 transition-all duration-200 ease-in-out border border-gray-200 dark:border-gray-600 hover:scale-105"> View Project </a>
                    </div>
                @endif
            </div>
        </div>
    @else
        {{-- Fallback if no projects exist --}}
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 text-center text-gray-500 dark:text-gray-400">
            No projects to display yet. Check back soon!
        </div>
    @endif
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-16 md:py-24 bg-stone-50 dark:bg-gray-900" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-black text-black dark:text-white leading-normal"> It's amazing that these businesses<br class="hidden sm:inline"/> <span class="text-primary">trust me</span> in what I do </h2>
        <p class="mt-4 text-base text-black/70 dark:text-stone-300 font-medium tracking-widest max-w-md mx-auto"> Here are what these businesses says about my work. </p>
    </div>

    {{-- Check if there are testimonials --}}
    @if($testimonials->isNotEmpty())
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Loop through testimonials --}}
            @foreach($testimonials as $index => $testimonial)
            <div class="bg-white dark:bg-gray-800 p-6 rounded-[30px] shadow-md dark:shadow-primary/20 flex flex-col border border-stone-200 dark:border-gray-700 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ ($index % 3 + 1) * 100 }}">
                <div class="mb-4 text-primary"> <svg class="size-6" fill="currentColor" viewBox="0 0 24 24"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"></path></svg> </div>
                {{-- Dynamic quote --}}
                <blockquote class="testimonial-scroll text-black dark:text-stone-100 text-lg font-bold leading-normal flex-grow max-h-64 overflow-y-auto pr-2">
                    "{{ $testimonial->quote }}"
                </blockquote>
                 {{-- Dynamic rating --}}
                <div class="flex space-x-1 my-4" aria-label="{{ $testimonial->rating }} out of 5 stars">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="size-5 {{ $i < $testimonial->rating ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path></svg>
                    @endfor
                </div>
                <hr class="border-gray-200 dark:border-gray-600 my-4">
                <div class="flex items-center gap-4">
                     {{-- Dynamic image --}}
                    <img class="size-16 rounded-full object-cover" src="{{ $testimonial->image_url ?? 'https://via.placeholder.com/64/cccccc/888888?text=User' }}" alt="{{ $testimonial->name }}">
                    <div class="flex-1">
                         {{-- Dynamic name and company --}}
                        <p class="text-black dark:text-stone-100 text-base font-bold leading-tight">{{ $testimonial->name }}</p>
                        @if($testimonial->company)
                        <p class="text-black/80 dark:text-stone-300 text-sm font-normal leading-none">{{ $testimonial->company }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
         {{-- Pagination (Consider implementing JS-based pagination if many testimonials) --}}
         @if ($testimonials->count() > 3) {{-- Basic check, might need adjustment --}}
        <div class="flex justify-center items-center space-x-4 mt-12">
            <button aria-label="Previous Testimonial Set" class="testimonial-prev text-black/50 dark:text-stone-400 hover:text-black dark:hover:text-white disabled:opacity-50 transition-colors duration-150"> <svg class="size-9 p-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg> </button>
            <button aria-label="Next Testimonial Set" class="testimonial-next text-black/50 dark:text-stone-400 hover:text-black dark:hover:text-white disabled:opacity-50 transition-colors duration-150"> <svg class="size-9 p-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L10.586 10 7.293 6.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button>
        </div>
        @endif
    @else
         {{-- Fallback if no testimonials exist --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 text-center text-gray-500 dark:text-gray-400">
            No testimonials yet. Share your experience!
        </div>
    @endif
</section>

<!-- Consultation Section -->
<section id="consultation" class="py-16 md:py-24 bg-gray-100 dark:bg-gray-700" data-aos="fade-up">
    <div class="max-w-7xl mx-auto px-4 mb-12 sm:px-6 md:mb-0 lg:px-8 text-center">
         <h2 class="text-3xl sm:text-4xl font-black text-black dark:text-white leading-tight"> Get Your Free Consultation </h2>
        <p class="mt-4 text-base text-black/70 dark:text-stone-300 font-medium tracking-widest max-w-md mx-auto"> Let's identify your challenges and develop a tailored solution. </p>
    </div>

    {{-- Skeleton Loader for Calendly --}}
    {{-- Added mx-auto for centering, rounded-lg for aesthetics --}}
    <div id="calendly-skeleton" class="lg:mt-12 animate-pulse bg-gray-200 dark:bg-gray-600 mx-auto rounded-lg" style="min-width:320px; height:700px; max-width: 700px; /* Optional: constrain max-width */">
        {{-- Optional: Add inner skeleton elements if desired --}}
    </div>

    <!-- Calendly inline widget begin -->
    {{-- Add id="calendly-embed" and initially hide it with class="hidden" --}}
    <div id="calendly-embed" class="calendly-inline-widget hidden" data-url="https://calendly.com/pachicojm00/free-consultation-for-ai-automation-and-saas?hide_gdpr_banner=1&primary_color=15803d" style="min-width:320px;height:700px;"></div>
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
    <!-- Calendly inline widget end -->
</section>

@endsection 

@push('scripts')
<!-- **** 3. INCLUDE PHOTOSWIPE JS (ES Module) **** -->
<script type="module">
    import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe@5.4.3/dist/photoswipe-lightbox.esm.js';
    import PhotoSwipe from 'https://unpkg.com/photoswipe@5.4.3/dist/photoswipe.esm.js';

    // Define dynamicTitles in PHP first
    @php
        $dynamicTitlesPhp = ["AI, Automation, and SaaS Expert"]; // Default titles

        if(isset($heroSection) && isset($heroSection->job_titles) && is_array($heroSection->job_titles)) {
            // Ensure job_titles is not empty before using array_column
            if (!empty($heroSection->job_titles)) {
                $dynamicTitlesPhp = array_column($heroSection->job_titles, 'title');
            }
        }

        // Pre-process projects data in PHP
        $projectsDataPhp = $projects->map(function ($project) {
            return [
                'title' => $project->title,
                'date' => $project->project_date ? $project->project_date->format('F j, Y') : null,
                'categories' => $project->categories ?? [],
                // Ensure description is treated as a string
                'description' => strval($project->description ?? ''),
                'link' => $project->project_link,
                'images' => $project->images->map(function ($image) use ($project) { // Pass project for alt text fallback
                    return [
                        'url' => $image->image_url ?? null,
                        'alt' => $image->alt_text ?? ($project->title . ' Image'), // Fallback alt text
                        // We don't have w/h here, PhotoSwipe will try to determine them
                    ];
                })->filter(function ($img) { return !empty($img['url']); })->values()->all(),
            ];
        })->values()->all();
    @endphp

    const dynamicTitles = @json($dynamicTitlesPhp);
    const projectsData = @json($projectsDataPhp); // Use the pre-processed PHP array

    document.addEventListener('DOMContentLoaded', () => {
        // --- TypeIt Initialization ---
        if (typeof TypeIt !== 'undefined' && document.getElementById('titles')) {
            new TypeIt('#titles', {
                strings: dynamicTitles.length > 0 ? dynamicTitles : ["Default Title If Empty"],
                speed: 75,
                breakLines: false,
                waitUntilVisible: true,
                loop: true,
                loopDelay: 2500,
                deleteSpeed: 50,
                lifeLike: true,
                cursorChar: "|",
                cursorSpeed: 500
            }).go();
        } else {
            console.error('TypeIt library or #titles element not found.');
        }

        // --- Project Gallery Logic ---
        const mainImageContainer = document.getElementById('projectMainImageContainer');
        const mainImage = document.getElementById('projectMainImage');
        let currentProjectIndex = 0;
        const projectCounter = document.querySelector('.project-counter');
        const projectDetailsContainer = document.getElementById('projectDetails');
        const thumbnailGallery = document.querySelector('.thumbnail-gallery');
        const prevButton = document.querySelector('.project-prev');
        const nextButton = document.querySelector('.project-next');
        let lightbox = null; // Variable to hold the PhotoSwipe instance for the current project
        let photoSwipeClickListener = null; // Variable to hold the click listener function

        // --- Function to scroll active thumbnail into view ---
        function scrollActiveThumbnailIntoView() {
            if (!thumbnailGallery) return; // Guard clause
            const activeThumb = thumbnailGallery.querySelector('.active-thumbnail');
            if (activeThumb) {
                // Use setTimeout to ensure the scroll happens after potential layout shifts
                // and doesn't interfere with the main page scroll position on load.
                setTimeout(() => {
                    activeThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }, 50); // Small delay
            }
        }

        // --- Thumbnail Click Logic ---
        function setupThumbnailListeners() {
            const thumbnails = thumbnailGallery.querySelectorAll('.project-thumbnail');
            thumbnails.forEach(thumb => {
                thumb.removeEventListener('click', handleThumbnailClick);
                thumb.addEventListener('click', handleThumbnailClick);
            });
        }

        function handleThumbnailClick() {
            const largeSrc = this.dataset.largeSrc;
            const clickedIndex = parseInt(this.dataset.index, 10);

            if (largeSrc && mainImage && mainImage.src !== largeSrc) {
                mainImage.src = largeSrc;
                mainImage.alt = this.alt.replace(" Thumbnail ", " Screenshot ") || "Project Screenshot";

                if (!isNaN(clickedIndex)) {
                    mainImage.dataset.currentIndex = clickedIndex;
                }

                // Update active thumbnail style
                thumbnailGallery.querySelectorAll('.project-thumbnail').forEach(t => t.classList.remove('active-thumbnail', 'opacity-100', 'transform', 'scale-105'));
                thumbnailGallery.querySelectorAll('.project-thumbnail').forEach(t => t.classList.add('opacity-70'));
                this.classList.remove('opacity-70');
                this.classList.add('active-thumbnail', 'opacity-100', 'transform', 'scale-105');

                // Scroll the clicked (now active) thumbnail into view AFTER updating styles
                scrollActiveThumbnailIntoView();
            }
        }

        // --- Update Project Display Function ---
        function updateProjectDisplay(index) {
            if (!projectsData || projectsData.length === 0 || index < 0 || index >= projectsData.length) {
                console.warn("Invalid project index or no project data.");
                return;
            }

            // Show elements if they were hidden (e.g., if no projects initially)
            if(prevButton) prevButton.style.display = 'inline-block';
            if(nextButton) nextButton.style.display = 'inline-block';
            if(projectCounter) projectCounter.style.display = 'inline-block';
            if(mainImageContainer) mainImageContainer.style.display = 'block';
            if(thumbnailGallery) thumbnailGallery.style.display = 'flex'; // Ensure gallery is visible
            if(projectDetailsContainer) projectDetailsContainer.style.display = 'block'; // Ensure details are visible


            const project = projectsData[index];

            // Update Main Image
            const firstImageUrl = project.images.length > 0 ? project.images[0].url : 'https://placehold.co/853x480/e0e0e0/1C1917?text=No+Image';
            const firstImageAlt = project.images.length > 0 ? (project.images[0].alt ?? project.title + ' Screenshot') : project.title + ' Screenshot';
            if (mainImage) {
                mainImage.src = firstImageUrl;
                mainImage.alt = firstImageAlt;
                mainImage.dataset.currentIndex = '0';
            } else {
                 console.error("Main image element (#projectMainImage) not found!");
            }

            // Update Thumbnails
            if (thumbnailGallery) {
                thumbnailGallery.innerHTML = ''; // Clear existing thumbs
                if (project.images.length > 0) {
                    project.images.forEach((image, imgIndex) => {
                        const thumb = document.createElement('img');
                        thumb.classList.add('project-thumbnail', 'flex-none', 'w-32', 'h-16', 'object-cover', 'object-top', 'rounded-lg', 'shadow-md', 'dark:shadow-primary/20', 'transition-all', 'duration-200', 'ease-in-out', 'cursor-pointer');
                        if (imgIndex === 0) {
                             thumb.classList.add('active-thumbnail', 'opacity-100', 'transform', 'scale-105');
                        } else {
                             thumb.classList.add('opacity-70');
                        }
                        thumb.src = image.url;
                        thumb.dataset.largeSrc = image.url;
                        thumb.dataset.index = imgIndex;
                        thumb.alt = image.alt ?? project.title + ' Thumbnail ' + (imgIndex + 1);
                        thumb.style.objectFit = 'cover';
                        thumb.style.objectPosition = 'top';
                        thumbnailGallery.appendChild(thumb);
                    });
                    setupThumbnailListeners(); // Re-attach listeners to new thumbnails
                } else {
                    thumbnailGallery.innerHTML = '<p class="text-center text-sm text-gray-500 w-full">No images available for this project.</p>';
                }
                 // **** REMOVED scrollIntoView from here ****
            } else {
                 console.error("Thumbnail gallery element (.thumbnail-gallery) not found!");
            }

            // Update Project Details
            if (projectDetailsContainer) {
                const descriptionElement = projectDetailsContainer.querySelector('#projectDescription');
                const titleElement = projectDetailsContainer.querySelector('h3'); // Target title
                const metaDiv = projectDetailsContainer.querySelector('.gap-x-4'); // Target meta container
                const linkContainer = projectDetailsContainer.querySelector('.mt-6'); // Target link container

                // Ensure elements exist before updating
                if (titleElement) titleElement.textContent = project.title;
                if (descriptionElement) descriptionElement.innerHTML = project.description; // Use innerHTML for potential HTML in description

                // Update Meta Info (Date & Categories)
                if (metaDiv) {
                    metaDiv.innerHTML = ''; // Clear existing meta
                    if (project.date) {
                        const dateSpan = document.createElement('span');
                        dateSpan.className = 'font-normal text-black dark:text-stone-300';
                        dateSpan.textContent = project.date;
                        metaDiv.appendChild(dateSpan);
                    }
                    project.categories.forEach(cat => {
                        const catSpan = document.createElement('span');
                        catSpan.className = 'text-black/70 dark:text-stone-400 font-bold';
                        catSpan.textContent = cat;
                        metaDiv.appendChild(catSpan);
                    });
                }

                // Update Project Link Button
                if (linkContainer) {
                    if (project.link) {
                        linkContainer.innerHTML = `<a href="${project.link}" target="_blank" rel="noopener noreferrer" class="inline-block bg-white dark:bg-gray-700 text-black/70 dark:text-stone-300 text-xs font-bold px-5 py-2 rounded-lg shadow-md dark:shadow-none hover:shadow-lg dark:hover:bg-gray-600 transition-all duration-200 ease-in-out border border-gray-200 dark:border-gray-600 hover:scale-105"> View Project </a>`;
                        linkContainer.style.display = 'flex';
                    } else {
                        linkContainer.innerHTML = '';
                        linkContainer.style.display = 'none';
                    }
                }
            } else {
                 console.error("Project details container (#projectDetails) not found!");
            }

            // Update Counter
            if (projectCounter) {
                projectCounter.textContent = `${index + 1}/${projectsData.length} Projects`;
            } else {
                 console.error("Project counter element (.project-counter) not found!");
            }

            // Update Button States
            if(prevButton) prevButton.disabled = index === 0;
            if(nextButton) nextButton.disabled = index === projectsData.length - 1;

            currentProjectIndex = index; // Update current index

            // --- PhotoSwipe Re-initialization for the new project ---
            setupPhotoSwipeForCurrentProject();

        }

        // --- PhotoSwipe Initialization & Listener Setup ---
        function setupPhotoSwipeForCurrentProject() {
             if (lightbox) {
                lightbox.destroy();
                lightbox = null;
            }
            if (mainImageContainer && photoSwipeClickListener) {
                mainImageContainer.removeEventListener('click', photoSwipeClickListener);
                photoSwipeClickListener = null;
            }

            const currentProject = projectsData[currentProjectIndex];
            if (!mainImage || !currentProject || !currentProject.images || currentProject.images.length === 0) {
                 if (mainImageContainer) mainImageContainer.style.cursor = 'default';
                return;
            }

             if (mainImageContainer) mainImageContainer.style.cursor = 'zoom-in';

            // Define and attach the click listener
            photoSwipeClickListener = (e) => {
                e.preventDefault();

                const clickedProjectIndex = currentProjectIndex;
                const projectForLightbox = projectsData[clickedProjectIndex];

                if (!projectForLightbox || !projectForLightbox.images || projectForLightbox.images.length === 0) {
                    console.error("Project data or images missing when trying to open lightbox.");
                    return;
                }

                let startIndex = parseInt(mainImage.dataset.currentIndex || '0', 10);
                if (isNaN(startIndex) || startIndex < 0 || startIndex >= projectForLightbox.images.length) {
                    startIndex = 0;
                }

                const currentMainImageWidth = mainImage.naturalWidth;
                const currentMainImageHeight = mainImage.naturalHeight;

                const dataSource = projectForLightbox.images.map((image, index) => {
                    let item = {
                        src: image.url,
                        alt: image.alt || projectForLightbox.title + ' Image ' + (index + 1)
                    };
                    // Only set w/h if we have valid dimensions from the currently displayed main image
                    if (index === startIndex && currentMainImageWidth > 0 && currentMainImageHeight > 0) {
                        item.w = currentMainImageWidth;
                        item.h = currentMainImageHeight;
                    } else {
                        // Let PhotoSwipe determine dimensions for other images or if current dimensions are invalid
                        item.w = 0;
                        item.h = 0;
                    }
                    return item;
                });

                if (lightbox) {
                    lightbox.destroy();
                }

                lightbox = new PhotoSwipeLightbox({
                    dataSource: dataSource,
                    pswpModule: PhotoSwipe,
                    // Removed mainImage option as it's less reliable with dynamic sources
                    // Let PhotoSwipe handle the transition based on dataSource
                    arrowPrev: false, // Example: customize UI elements if needed
                    arrowNext: false,
                    zoom: false // Example
                });

                 lightbox.on('destroy', () => {
                    lightbox = null; // Clean up reference
                });

                lightbox.init();
                lightbox.loadAndOpen(startIndex);
            };

            if (mainImageContainer) {
                mainImageContainer.addEventListener('click', photoSwipeClickListener);
            } else {
                 console.error("Main image container (#projectMainImageContainer) not found for attaching listener!");
            }
        }


        // --- Initial Setup ---
        if (projectsData.length > 0 && mainImageContainer && mainImage && projectDetailsContainer && thumbnailGallery && projectCounter && prevButton && nextButton) {
            updateProjectDisplay(0); // Display first project initially (DOES NOT scroll thumbnail now)

            prevButton.addEventListener('click', () => {
                if (currentProjectIndex > 0) {
                    updateProjectDisplay(currentProjectIndex - 1);
                    scrollActiveThumbnailIntoView(); // Scroll AFTER updating
                }
            });

            nextButton.addEventListener('click', () => {
                if (currentProjectIndex < projectsData.length - 1) {
                    updateProjectDisplay(currentProjectIndex + 1);
                    scrollActiveThumbnailIntoView(); // Scroll AFTER updating
                }
            });
        } else {
            // Handle case with no projects or missing essential elements...
             console.warn("No projects found or essential HTML elements are missing. Hiding project section elements.");
            if(prevButton) prevButton.style.display = 'none';
            if(nextButton) nextButton.style.display = 'none';
            if(projectCounter) projectCounter.style.display = 'none';
            if(thumbnailGallery) {
                thumbnailGallery.innerHTML = '<p class="text-center text-sm text-gray-500 w-full">No projects to display yet.</p>';
                thumbnailGallery.style.display = 'none'; // Hide gallery container too
            }
            if(projectDetailsContainer) {
                 projectDetailsContainer.innerHTML = ''; // Clear details
                 projectDetailsContainer.style.display = 'none'; // Hide details container
            }
            if(mainImageContainer) mainImageContainer.style.display = 'none'; // Hide image container
        }

        // --- Calendly Skeleton Loader ---
        const skeleton = document.getElementById('calendly-skeleton');
        const calendlyEmbed = document.getElementById('calendly-embed');
        let calendlyLoaded = false; // Flag to prevent multiple executions

        if (skeleton && calendlyEmbed) {
            const showCalendly = () => {
                if (calendlyLoaded) return; // Exit if already loaded
                skeleton.classList.add('hidden');
                calendlyEmbed.classList.remove('hidden');
                calendlyLoaded = true; // Set flag
                // Clean up listener
                window.removeEventListener('message', handleCalendlyMessage);
                console.log('Calendly widget shown.');
            };

            const handleCalendlyMessage = (e) => {
                // Check if the message is from Calendly and indicates widget readiness
                if (
                    e.origin === "https://calendly.com" &&
                    e.data &&
                    typeof e.data === 'object' &&
                    e.data.event &&
                    (e.data.event === 'calendly.event_type_viewed' || e.data.event === 'calendly.profile_page_viewed')
                ) {
                    console.log('Calendly ready event received:', e.data.event);
                    showCalendly();
                }
            };

            window.addEventListener('message', handleCalendlyMessage);

            // Fallback: Check if the iframe exists after a reasonable delay
            // This helps if the specific event message isn't caught reliably
            const fallbackTimeout = setTimeout(() => {
                if (!calendlyLoaded && calendlyEmbed.querySelector('iframe')) {
                    console.log('Calendly iframe detected (fallback).');
                    showCalendly();
                } else if (!calendlyLoaded) {
                     console.warn('Calendly widget did not load within the fallback timeout.');
                     // Optionally hide the skeleton even on failure after timeout
                     // skeleton.classList.add('hidden');
                     // You could display an error message here instead of the embed
                }
            }, 8000); // 8-second fallback timeout

             // Ensure timeout is cleared if event listener succeeds first
             if (calendlyLoaded) {
                 clearTimeout(fallbackTimeout);
             }

        } else {
            console.error('Calendly skeleton or embed element not found.');
        }

    }); // End DOMContentLoaded
</script>
{{-- Add any other specific scripts needed for testimonials or other sections --}}
@endpush