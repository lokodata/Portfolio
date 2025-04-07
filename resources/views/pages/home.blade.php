@extends('layouts.app')

@section('title', 'John Mark A. Pachico | AI, Automation, SaaS Expert')

@section('head-scripts')
    <!-- **** 1. INCLUDE TYPEIT.JS **** -->
    <script src="https://unpkg.com/typeit@8.7.1/dist/index.umd.js"></script>
    <!-- **** END TYPEIT.JS **** -->
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
                        <p class="text-base lg:text-lg text-black/70 dark:text-stone-300 max-w-xl mx-auto md:mx-0"> {{ $heroSection->description }} </p>
                        <p class="text-base text-black dark:text-stone-100 font-bold tracking-wider pt-2"> Wouldn't you hate to save time and cut expenses? </p>
                        <a href="#consultation" class="inline-block bg-primary text-white text-sm font-bold px-8 py-3 rounded-lg hover:bg-primary-dark transition-all duration-200 ease-in-out text-center shadow-md hover:shadow-lg    hover:scale-105"> GET FREE CONSULTATION </a>
                        {{-- Use dynamic social links --}}
                        @if(!empty($heroSection->social_links))
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
                {{-- Project Carousel/Display Logic (JS will handle switching) --}}
                <div class="flex justify-center items-center space-x-4 mb-4">
                     {{-- JS needs to handle these buttons and the counter --}}
                    <button aria-label="Previous Project" class="project-prev text-black/50 dark:text-stone-400 hover:text-black dark:hover:text-white disabled:opacity-50 transition-colors duration-150"> <svg class="size-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg> </button>
                    <span class="project-counter text-base font-medium text-black/50 dark:text-stone-400 tracking-widest">1/{{ $projects->count() }} Projects</span>
                    <button aria-label="Next Project" class="project-next text-black/50 dark:text-stone-400 hover:text-black dark:hover:text-white disabled:opacity-50 transition-colors duration-150"> <svg class="size-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L10.586 10 7.293 6.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg> </button>
                </div>

                 {{-- Display the first project initially --}}
                @php $firstProject = $projects->first(); @endphp

                <div class="relative group">
                    <div id="projectMainImageContainer" class="cursor-pointer">
                        {{-- Dynamic main image --}}
                        <img id="projectMainImage" class="w-full h-auto rounded-[30px] shadow-lg dark:shadow-primary/20 aspect-video object-cover object-top"
                             src="{{ $firstProject->main_image_url ?? 'https://placehold.co/853x480/e0e0e0/1C1917?text=Project+Screenshot' }}"
                             alt="{{ $firstProject->title ?? 'Project' }} Screenshot" />
                    </div>
                     {{-- Image Overlay (keep structure, JS handles content) --}}
                    <div id="imageOverlay" class="fixed inset-0 bg-black/80 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none transition-opacity duration-300">
                         <img id="imageOverlayImg" src="" alt="Project Fullscreen Image" class="max-w-full max-h-full object-contain rounded-lg">
                         <button id="imageOverlayClose" class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300 transition-colors">&times;</button>
                    </div>
                </div>

                {{-- Dynamic Thumbnails --}}
                <div class="thumbnail-gallery flex flex-nowrap overflow-x-auto gap-4 mt-4 px-2 mb-8 md:mb-12 py-2">
                     {{-- Iterate through all images of the first project for thumbnails --}}
                    @if($firstProject && $firstProject->images->isNotEmpty())
                        @foreach($firstProject->images as $index => $image)
                            <img class="project-thumbnail flex-none w-32 h-16 object-cover object-top rounded-lg shadow-md dark:shadow-primary/20 hover:opacity-75 transition-all duration-200 ease-in-out cursor-pointer hover:scale-105 {{ $index === 0 ? 'active-thumbnail' : '' }}"
                                 src="{{ $image->image_url ?? 'https://placehold.co/125x70/eeeeee/1C1917?text=Thumb' }}"
                                 data-large-src="{{ $image->image_url ?? '' }}"
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

                    <p class="mt-4 text-sm text-black dark:text-stone-300 text-justify md:text-center" id="projectDescription">
                        {{-- Description will be set dynamically via JavaScript --}}
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
            <h2 class="text-3xl font-black text-black dark:text-white leading-normal"> It's amazing that these businesses<br class="hidden sm:inline"/> <space> trust me in what I do </h2>
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
                        <img class="size-16 rounded-full object-cover" src="{{ $testimonial->image_url }}" alt="{{ $testimonial->name }}">
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
             {{-- Pagination (JS might be needed if loading more dynamically) --}}
             {{-- This static pagination might need adjustment based on total testimonials --}}
             @if ($testimonials->count() > 3) {{-- Only show if more than fit on one 'page' --}}
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
             <h2 class="text-3xl sm:text-4xl font-black text-black dark:text-white leading-tight"> Get Your Free Consultation </h2>
            <p class="mt-4 text-base text-black/70 dark:text-stone-300 font-medium tracking-widest max-w-md mx-auto"> Let's identify your challenges and develop a tailored solution. </p>
            {{-- You could add contact info here if needed --}}
             {{-- @if($contactInfo)
             <p class="mt-2 text-sm text-black/60 dark:text-stone-400">Or reach out directly: {{ $contactInfo->gmail }}</p>
             @endif --}}
        </div>
        <div class="mt-12 max-w-xl mx-auto" data-aos="zoom-in-up">
             {{-- Keeping the form structure as is, per request --}}
            <form class="bg-white dark:bg-gray-800 p-8 rounded-[30px] shadow-md dark:shadow-primary/20 space-y-6 border border-zinc-300 dark:border-gray-600">
                {{-- Add CSRF token if this form submits to a Laravel route --}}
                 @csrf
                <div> <label for="name" class="block text-stone-900 dark:text-stone-200 text-base font-normal leading-snug mb-2">Name</label> <input type="text" id="name" name="name" placeholder="John Mark" required class="w-full px-4 py-3 bg-white dark:bg-gray-700 text-black dark:text-white rounded-lg border border-zinc-300 dark:border-gray-600 focus:ring-primary focus:border-primary text-base placeholder-zinc-400 dark:placeholder-gray-500 transition-colors duration-200"> </div>
                <div> <label for="surname" class="block text-stone-900 dark:text-stone-200 text-base font-normal leading-snug mb-2">Surname</label> <input type="text" id="surname" name="surname" placeholder="Pachico" required class="w-full px-4 py-3 bg-white dark:bg-gray-700 text-black dark:text-white rounded-lg border border-zinc-300 dark:border-gray-600 focus:ring-primary focus:border-primary text-base placeholder-zinc-400 dark:placeholder-gray-500 transition-colors duration-200"> </div>
                <div> <label for="email" class="block text-stone-900 dark:text-stone-200 text-base font-normal leading-snug mb-2">Email</label> <input type="email" id="email" name="email" placeholder="example@gmail.com" required class="w-full px-4 py-3 bg-white dark:bg-gray-700 text-black dark:text-white rounded-lg border border-zinc-300 dark:border-gray-600 focus:ring-primary focus:border-primary text-base placeholder-zinc-400 dark:placeholder-gray-500 transition-colors duration-200"> </div>
                <div> <label for="contact" class="block text-stone-900 dark:text-stone-200 text-base font-normal leading-snug mb-2">Contact No.</label> <input type="tel" id="contact" name="contact" placeholder="+63123456789" required class="w-full px-4 py-3 bg-white dark:bg-gray-700 text-black dark:text-white rounded-lg border border-zinc-300 dark:border-gray-600 focus:ring-primary focus:border-primary text-base placeholder-zinc-400 dark:placeholder-gray-500 transition-colors duration-200"> </div>
                <div> <label for="business_type" class="block text-stone-900 dark:text-stone-200 text-base font-normal leading-snug mb-2">Business Type</label> <input type="text" id="business_type" name="business_type" placeholder="Real Estate Agency" required class="w-full px-4 py-3 bg-white dark:bg-gray-700 text-black dark:text-white rounded-lg border border-zinc-300 dark:border-gray-600 focus:ring-primary focus:border-primary text-base placeholder-zinc-400 dark:placeholder-gray-500 transition-colors duration-200"> </div>
                <div class="text-center pt-2">
                    <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-10 py-3 bg-primary text-white text-base font-bold rounded-lg border border-primary dark:border-primary-dark hover:bg-primary-dark transition-all duration-200 ease-in-out hover:scale-105"> Submit </button>
                </div>
            </form>
        </div>
         {{-- You could add other contact links here --}}
         {{-- @if($contactInfo?->facebook_link)
         <div class="mt-8 text-center">
             <a href="{{ $contactInfo->facebook_link }}" target="_blank" rel="noopener noreferrer" class="text-sm text-primary hover:underline">Find me on Facebook</a>
         </div>
         @endif --}}
    </section>
@endsection

@push('scripts')
    <script>
        // Define dynamicTitles in PHP first
        @php
            $dynamicTitlesPhp = ["AI, Automation, and SaaS Expert"]; // Default titles

            if(isset($heroSection) && isset($heroSection->job_titles) && is_array($heroSection->job_titles)) {
                $dynamicTitlesPhp = array_column($heroSection->job_titles, 'title');
            }

            // Pre-process projects data in PHP
            $projectsDataPhp = $projects->map(function ($project) {
                return [
                    'title' => $project->title,
                    'date' => $project->project_date ? $project->project_date->format('F j, Y') : null,
                    'categories' => $project->categories ?? [],
                    'description' => $project->description,
                    'link' => $project->project_link,
                    'images' => $project->images->map(function ($image) {
                        return [
                            'url' => $image->image_url ?? null,
                            'alt' => $image->alt_text ?? null,
                        ];
                    })->filter(function ($img) { return !empty($img['url']); })->values()->all(),
                ];
            })->values()->all();
        @endphp

        const dynamicTitles = @json($dynamicTitlesPhp);
        const projectsData = @json($projectsDataPhp); // Use the pre-processed PHP array

        document.addEventListener('DOMContentLoaded', () => {
            if (typeof TypeIt !== 'undefined' && document.getElementById('titles')) {
                new TypeIt('#titles', {
                    strings: dynamicTitles.length > 0 ? dynamicTitles : ["Default Title If Empty"], // Use dynamic titles
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

            // --- Project Gallery & Overlay Logic ---
            const mainImageContainer = document.getElementById('projectMainImageContainer');
            const mainImage = document.getElementById('projectMainImage');
            const overlay = document.getElementById('imageOverlay');
            const overlayImg = document.getElementById('imageOverlayImg');
            const overlayClose = document.getElementById('imageOverlayClose');

            // --- Thumbnail Click Logic ---
            // Re-select thumbnails inside DOMContentLoaded to ensure they exist
            const thumbnails = document.querySelectorAll('.project-thumbnail');
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    const largeSrc = this.dataset.largeSrc;
                    if (largeSrc && mainImage && mainImage.src !== largeSrc) {
                        mainImage.src = largeSrc;
                        mainImage.alt = this.alt.replace(" Thumbnail ", " Screenshot ") || "Project Screenshot"; // Update alt text too

                        // Update active thumbnail style
                        thumbnails.forEach(t => t.classList.remove('active-thumbnail'));
                        this.classList.add('active-thumbnail');
                    }
                });
            });

            // --- Overlay Open Logic ---
            if (mainImageContainer) {
                mainImageContainer.addEventListener('click', () => {
                    if (overlay && overlayImg && mainImage) {
                        overlayImg.src = mainImage.src; // Set overlay image to current main image
                        overlayImg.alt = mainImage.alt.replace(" Screenshot", " Fullscreen Image");
                        overlay.classList.add('active'); // Uses opacity for transition
                        overlay.classList.remove('pointer-events-none'); // Make it interactive
                    }
                });
            }

            // --- Overlay Close Logic ---
            function closeOverlay() {
                 if (overlay && overlay.classList.contains('active')) {
                    overlay.classList.remove('active');
                    overlay.classList.add('pointer-events-none'); // Disable interaction after fade out
                    // Optional: Delay clearing src until after fade out transition
                    // setTimeout(() => { if (!overlay.classList.contains('active')) overlayImg.src = ""; }, 300); // Match duration
                 }
            }

             if (overlay) {
                // Close on background click
                overlay.addEventListener('click', (e) => {
                    if (e.target === overlay) { // Only close if clicking the background itself
                        closeOverlay();
                    }
                });
            }

            if (overlayClose) {
                // Close on 'X' button click
                overlayClose.addEventListener('click', closeOverlay);
            }

            // Close on Escape key press
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && overlay && overlay.classList.contains('active')) {
                    closeOverlay();
                }
            });

             // --- Basic Project Carousel Logic (Example) ---
             // This needs to be more robust based on your exact needs


             let currentProjectIndex = 0;
             const projectCounter = document.querySelector('.project-counter');
             const projectDetailsContainer = document.getElementById('projectDetails');
             const thumbnailGallery = document.querySelector('.thumbnail-gallery');
             const prevButton = document.querySelector('.project-prev');
             const nextButton = document.querySelector('.project-next');

             function updateProjectDisplay(index) {
                if (!projectsData || projectsData.length === 0 || index < 0 || index >= projectsData.length) {
                    console.warn("Invalid project index or no project data:", index);
                    return; // Exit if no projects or index is out of bounds
                }

                 const project = projectsData[index];

                 // Update Main Image (use first image if available)
                 const firstImageUrl = project.images.length > 0 ? project.images[0].url : 'https://placehold.co/853x480/e0e0e0/1C1917?text=No+Image';
                 const firstImageAlt = project.images.length > 0 ? (project.images[0].alt ?? project.title + ' Screenshot') : project.title + ' Screenshot';
                 if (mainImage) {
                     mainImage.src = firstImageUrl;
                     mainImage.alt = firstImageAlt;
                 }

                 // Update Thumbnails
                 if (thumbnailGallery) {
                     thumbnailGallery.innerHTML = ''; // Clear existing thumbs
                     if (project.images.length > 0) {
                         project.images.forEach((image, imgIndex) => {
                             const thumb = document.createElement('img');
                             thumb.classList.add('project-thumbnail', 'flex-none', 'w-32', 'h-16', 'object-cover', 'rounded-lg', 'shadow-md', 'dark:shadow-primary/20', 'hover:opacity-75', 'transition-all', 'duration-200', 'ease-in-out', 'cursor-pointer', 'hover:scale-105');
                             if (imgIndex === 0) thumb.classList.add('active-thumbnail');
                             thumb.src = image.url;
                             thumb.dataset.largeSrc = image.url;
                             thumb.alt = image.alt ?? project.title + ' Thumbnail ' + (imgIndex + 1);

                             // Ensure object-position is set to top
                             thumb.style.objectFit = 'cover';
                             thumb.style.objectPosition = 'top';

                             thumb.addEventListener('click', function() {
                                 if (mainImage && mainImage.src !== this.dataset.largeSrc) {
                                     mainImage.src = this.dataset.largeSrc;
                                     mainImage.alt = this.alt.replace(" Thumbnail ", " Screenshot ");
                                     document.querySelectorAll('.project-thumbnail').forEach(t => t.classList.remove('active-thumbnail'));
                                     this.classList.add('active-thumbnail');
                                 }
                             });
                             thumbnailGallery.appendChild(thumb);
                         });
                     } else {
                         thumbnailGallery.innerHTML = '<p class="text-center text-sm text-gray-500 w-full">No images available for this project.</p>';
                     }
                 }

                // Update Project Details
                if (projectDetailsContainer) {
                     projectDetailsContainer.querySelector('h3').textContent = project.title;
                     const descriptionElement = projectDetailsContainer.querySelector('#projectDescription');
                     descriptionElement.innerHTML = project.description;
                     const metaDiv = projectDetailsContainer.querySelector('.gap-x-4');
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

                     const linkContainer = projectDetailsContainer.querySelector('.mt-6');
                     if (project.link) {
                         linkContainer.innerHTML = `<a href="${project.link}" target="_blank" rel="noopener noreferrer" class="inline-block bg-white dark:bg-gray-700 text-black/70 dark:text-stone-300 text-xs font-bold px-5 py-2 rounded-lg shadow-md dark:shadow-none hover:shadow-lg dark:hover:bg-gray-600 transition-all duration-200 ease-in-out border border-gray-200 dark:border-gray-600 hover:scale-105"> View Project </a>`;
                         linkContainer.style.display = 'flex'; // Ensure it's visible
                     } else {
                         linkContainer.innerHTML = ''; // Clear link if none
                         linkContainer.style.display = 'none'; // Hide container
                     }
                 }

                 // Update Counter
                 if (projectCounter) {
                     projectCounter.textContent = `${index + 1}/${projectsData.length} Projects`;
                 }

                 // Update Button States
                 if(prevButton) prevButton.disabled = index === 0;
                 if(nextButton) nextButton.disabled = index === projectsData.length - 1;

                 currentProjectIndex = index; // Update current index
             }

             // Initial setup if projects exist
             if (projectsData.length > 0) {
                 updateProjectDisplay(0); // Display first project initially

                 if (prevButton) {
                    prevButton.addEventListener('click', () => {
                         if (currentProjectIndex > 0) {
                             updateProjectDisplay(currentProjectIndex - 1);
                         }
                     });
                 }

                 if (nextButton) {
                    nextButton.addEventListener('click', () => {
                         if (currentProjectIndex < projectsData.length - 1) {
                             updateProjectDisplay(currentProjectIndex + 1);
                         }
                     });
                 }
             } else {
                 // Handle case with no projects (optional: hide controls)
                 if(prevButton) prevButton.style.display = 'none';
                 if(nextButton) nextButton.style.display = 'none';
                 if(projectCounter) projectCounter.style.display = 'none';
             }

        });
    </script>
    {{-- Add any other specific scripts needed for testimonials or other sections --}}
@endpush