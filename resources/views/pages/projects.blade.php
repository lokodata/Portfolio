@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="container mx-auto px-4 swiper-container">
    <div class="swiper-wrapper">
        @forelse ($projects as $project)
        <div class="swiper-slide mb-8 md:mb-20">
            {{-- Image Gallery Section --}}
            <div class="flex flex-col lg:flex-row gap-2 md:gap-4 w-full mb-2 md:mb-4">
                {{-- Main Image Column (First on mobile) --}}
                <div class="w-full lg:w-11/12 order-1 lg:order-2">
                    <div class="main-image cursor-zoom-in" 
                         data-pswp-src="{{ Storage::url($project->main_image_url) }}"
                         style="background-image: url('{{ Storage::url($project->main_image_url) }}');
                                background-size: cover;
                                background-position: top;">
                    </div>
                </div>
                
                {{-- Preview Column (Second on mobile, 100% width on mobile) --}}
                <div class="w-full lg:w-1/12 order-2 lg:order-1 relative">
                    <div class="preview-scroll-mobile lg:preview-scroll">
                        <div class="preview-image cursor-pointer" 
                             style="background-image: url('{{ Storage::url($project->main_image_url) }}'); 
                                    background-size: cover; 
                                    background-position: top;">
                        </div>
                        @foreach($project->images as $image)
                        <div class="preview-image cursor-pointer" 
                             style="background-image: url('{{ Storage::url($image->image_url) }}'); 
                                    background-size: cover; 
                                    background-position: top;">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Project Info Section (Below Images) --}}
            <div class="mt-2 md:mt-4 mb-4 md:mb-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800">{{ $project->title }}</h2>
                <p class="mt-4 text-gray-600 leading-relaxed max-w-3xl mx-auto">{{ $project->description }}</p>
                @if($project->link)
                <a href="{{ $project->link }}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="inline-flex items-center px-6 py-3 mt-6 view-project-button rounded-lg transition-all duration-300 transform hover:-translate-y-1">
                    View Project
                </a>
                @endif
            </div>

            {{-- Update the testimonials section inside the swiper-slide --}}
            @if($project->testimonials && $project->testimonials->count() > 0)
            <div class="mt-12 mb-8 max-w-4xl mx-auto"> {{-- Testimonials section --}}
                <h3 class="text-2xl font-bold text-center mb-8">What Clients Say</h3>
                <div class="swiper-container testimonials-inner px-8 relative"> {{-- Added relative positioning --}}
                    <div class="swiper-wrapper">
                        @foreach($project->testimonials as $testimonial)
                        <div class="swiper-slide text-center px-8 py-12">
                            @if($testimonial->image_url)
                            <img src="{{ Storage::url($testimonial->image_url) }}" 
                                 alt="{{ $testimonial->name }}" 
                                 class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-2 border-gray-200 shadow-lg">
                            @endif
                            <h4 class="text-2xl font-bold mb-2">{{ $testimonial->name }}</h4>
                            @if($testimonial->rating)
                            <div class="flex justify-center my-4 text-yellow-400 text-2xl tracking-wider">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span>{{ $i <= $testimonial->rating ? '★' : '☆' }}</span>
                                @endfor
                            </div>
                            @endif
                            <p class="text-gray-600 italic mt-4 text-xl leading-relaxed max-w-2xl mx-auto">"{{ $testimonial->text }}"</p>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination testimonials-pagination"></div>
                    <div class="swiper-button-prev testimonials-prev"></div> {{-- Added navigation buttons --}}
                    <div class="swiper-button-next testimonials-next"></div>
                </div>
            </div>
            @endif
        </div>
        @empty
        <div class="swiper-slide text-center py-20">
            <h3 class="mt-2 text-sm font-medium text-gray-900">No projects</h3>
            <p class="mt-1 text-sm text-gray-500">No projects have been added yet.</p>
        </div>
        @endforelse
    </div>
    @if ($projects->isNotEmpty())
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    @endif
</div>

{{-- Add PhotoSwipe HTML template at the bottom of the page --}}
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            </div>
            <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="module">
    // Import PhotoSwipe
    import PhotoSwipeLightbox from 'https://cdn.jsdelivr.net/npm/photoswipe@5.3.8/dist/photoswipe-lightbox.esm.min.js';
    import PhotoSwipe from 'https://cdn.jsdelivr.net/npm/photoswipe@5.3.8/dist/photoswipe.esm.min.js';

    document.addEventListener('DOMContentLoaded', async () => {
        // Swiper initialization
        const swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 0,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true
        });

        // Initialize PhotoSwipe
        const lightbox = new PhotoSwipeLightbox({
            gallery: '.swiper-container',
            children: '.main-image',
            pswpModule: PhotoSwipe,
            bgOpacity: 0.85,
            showHideAnimationType: 'zoom',
            showAnimationDuration: 300,
            hideAnimationDuration: 300,
            initialZoomLevel: 'fit',
            secondaryZoomLevel: 1.5,
            maxZoomLevel: 4,
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out'
            },
            preloaderDelay: 0,
            preload: [1, 1]
        });

        lightbox.init();

        // Handle main image clicks
        document.querySelectorAll('.main-image').forEach(mainImage => {
            mainImage.addEventListener('click', (e) => {
                e.preventDefault();
                const imageUrl = mainImage.getAttribute('data-pswp-src');
                
                if (imageUrl) {
                    // Create a temporary image to get natural dimensions
                    const img = new Image();
                    img.src = imageUrl;
                    
                    lightbox.loadAndOpen(0, [{
                        src: imageUrl,
                        w: img.naturalWidth || 1920,
                        h: img.naturalHeight || 1080,
                        alt: mainImage.closest('.swiper-slide').querySelector('h2')?.textContent || 'Project Image'
                    }]);
                }
            });
        });

        // Handle preview image clicks
        document.querySelectorAll('.preview-image').forEach(preview => {
            preview.addEventListener('click', () => {
                const gallerySection = preview.closest('.flex-col.lg\\:flex-row');
                const mainImage = gallerySection.querySelector('.main-image');
                const imageUrl = preview.style.backgroundImage.replace(/url\(['"](.+)['"]\)/, '$1');
                
                if (mainImage && imageUrl) {
                    mainImage.style.backgroundImage = `url('${imageUrl}')`;
                    mainImage.setAttribute('data-pswp-src', imageUrl);
                }
            });
        });

        // Add this after your main swiper initialization in the scripts section
        if (document.querySelector('.testimonials-inner')) {
            new Swiper('.testimonials-inner', {
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                speed: 700,
                pagination: {
                    el: '.testimonials-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.testimonials-next',
                    prevEl: '.testimonials-prev',
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                }
            });
        }
    });
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/5.3.8/photoswipe.min.css">
<style>
    .swiper-container {
        overflow: hidden;
        position: relative;
        padding-left: 50px;
        padding-right: 50px;
        width: 100%;
    }
    
    .swiper-wrapper {
        overflow: hidden;
    }
    
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding-top: 0;
        padding-bottom: 0;
        margin-bottom: 0;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .swiper-slide-active {
        opacity: 1;
    }
    
    .preview-scroll {
        height: calc(100vh - 590px);
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        top: 0;
        left: 0;
        right: 0;
        scrollbar-width: none;
        -ms-overflow-style: none;
        &::-webkit-scrollbar {
            display: none;
        }
    }
    
    .preview-scroll-mobile {
        display: flex;
        overflow-x: auto;
        gap: 0.5rem;
        padding: 0.5rem 0;
        scrollbar-width: none;
        -ms-overflow-style: none;
        &::-webkit-scrollbar {
            display: none;
        }
    }
    
    .preview-image {
        width: 60px;
        height: 60px;
        flex-shrink: 0;
        transition: transform 0.3s;
        border: 2px solid #000;
        border-radius: 4px;
    }
    
    .preview-image:hover {
        transform: scale(1.05);
    }
    
    @media (min-width: 1024px) {
        .preview-scroll-mobile {
            flex-direction: column;
            height: calc(100vh - 590px);
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        .preview-image {
            width: 100%;
        }
    }
    
    .main-image {
        width: 100%;
        height: 250px;
        border: 2px solid #000;
        border-radius: 4px;
    }
    
    @media (min-width: 640px) {
        .main-image {
            height: 350px;
        }
    }
    
    @media (min-width: 768px) {
        .main-image {
            height: 400px;
        }
    }
    
    @media (min-width: 1024px) {
        .main-image {
            height: calc(100vh - 590px);
        }
    }
    
    .swiper-pagination {
        position: relative;
        bottom: 1rem;
    }
    .swiper-pagination-bullet {
        background: #000;
        opacity: 1;
        border: 2px solid #000;
        border-radius: 50%;
        width: 10px;
        height: 10px;
    }
    .swiper-pagination-bullet-active {
        background: #fff;
        border: 2px solid #000;
    }
    .swiper-button-next,
    .swiper-button-prev {
        top: 50%;
        transform: translateY(-50%);
        width: 30px;
        height: 30px;
        color: #fff;
        background: #000;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        position: absolute;
    }
    .swiper-button-next {
        right: 0;
    }
    .swiper-button-prev {
        left: 0;
    }
    .swiper-button-next::after,
    .swiper-button-prev::after {
        font-size: 16px;
        color: #fff;
    }
    .view-project-button {
        background-color: #000;
        color: #fff;
        border: none;
        transition: background-color 0.3s;
    }
    .view-project-button:hover {
        background-color: #444;
    }
    .cursor-zoom-in {
        cursor: zoom-in;
    }
    @media (max-width: 640px) {
        .text-3xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }
        
        .leading-relaxed {
            line-height: 1.5;
        }
    }

    /* Update PhotoSwipe custom styles */
    .pswp {
        --pswp-bg: rgba(0, 0, 0, 0.85);
        --pswp-placeholder-bg: rgba(0, 0, 0, 0.85);
    }

    .pswp__bg {
        transition: opacity 0.3s ease-in-out;
        opacity: var(--pswp-bg-opacity);
    }

    .pswp__img {
        object-fit: contain;
        cursor: zoom-in;
        transition: transform 0.3s ease-in-out;
    }

    .pswp--zoomed-in .pswp__img {
        cursor: grab;
    }

    .pswp--dragging .pswp__img {
        cursor: grabbing;
    }

    /* Add smooth transitions for the UI elements */
    .pswp__ui {
        transition: opacity 0.3s ease-in-out;
    }

    .pswp__top-bar {
        transition: opacity 0.3s ease-in-out;
    }

    /* Add these to your existing styles */
    .testimonials-inner {
        overflow: hidden;
        position: relative;
        padding: 0 50px; /* Make room for navigation arrows */
    }

    .testimonials-prev,
    .testimonials-next {
        width: 40px !important;
        height: 40px !important;
        background: white;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        color: black !important;
        top: 50% !important;
    }

    .testimonials-prev {
        left: 0;
    }

    .testimonials-next {
        right: 0;
    }

    .testimonials-prev::after,
    .testimonials-next::after {
        font-size: 1.2rem !important;
        font-weight: bold;
        color: black;
    }

    /* Responsive adjustments for testimonials navigation */
    @media (max-width: 768px) {
        .testimonials-prev,
        .testimonials-next {
            width: 30px !important;
            height: 30px !important;
        }

        .testimonials-prev::after,
        .testimonials-next::after {
            font-size: 1rem !important;
        }
    }
</style>
@endsection