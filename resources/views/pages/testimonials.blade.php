@extends('layouts.app')

@section('title', 'Testimonials')

@section('content')
{{-- Add Header Section --}}
<div class="mb-2">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-xl md:text-5xl font-bold text-gray-900 mb-4">Client Testimonials</h1>
        <p class="text-gray-600 max-w-3xl mx-auto">
            Discover what my clients have to say about their experiences working with me.
        </p>
    </div>
</div>

{{-- Existing Testimonials Slider --}}
<div class="swiper testimonial-swiper relative pb-10 max-w-7xl mx-auto min-h-[60vh] flex items-center">
    <div class="swiper-wrapper mb-4">
        @forelse ($testimonials->chunk(3) as $testimonialGroup)
        <div class="swiper-slide">
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 px-4">
                @foreach($testimonialGroup as $testimonial)
                <div class="text-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 ease-in-out transform hover:-translate-y-1">
                    @if($testimonial->image_url)
                    <img src="{{ Storage::url($testimonial->image_url) }}" 
                         alt="{{ $testimonial->name }}" 
                         class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-2 border-gray-200 shadow-lg">
                    @else
                    <div class="w-24 h-24 rounded-full mx-auto mb-4 bg-gray-300 flex items-center justify-center text-gray-500 text-sm border-2 border-gray-200 shadow-lg">
                        No Image
                    </div>
                    @endif
                    <h2 class="text-xl font-bold mb-2">{{ $testimonial->name }}</h2>
                    @if($testimonial->rating)
                    <div class="flex justify-center my-3 text-yellow-400 text-lg tracking-wider">
                        @for ($i = 1; $i <= 5; $i++)
                            <span>{{ $i <= $testimonial->rating ? '★' : '☆' }}</span>
                        @endfor
                    </div>
                    @endif
                    <p class="text-gray-600 italic mt-3 text-base leading-relaxed">"{{ $testimonial->text }}"</p>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <div class="swiper-slide text-center py-20">
            <h3 class="mt-2 text-sm font-medium text-gray-900">No testimonials</h3>
            <p class="mt-1 text-sm text-gray-500">No testimonials have been added yet.</p>
        </div>
        @endforelse
    </div>
    @if ($testimonials->isNotEmpty())
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev !text-black absolute left-0 transform -translate-y-1/2"></div>
        <div class="swiper-button-next !text-black absolute right-0 transform -translate-y-1/2"></div>
    @endif
</div>
@endsection

@section('styles')
<style>
    .testimonial-swiper {
        overflow: hidden;
        position: relative;
        padding: 2rem 3rem;
    }

    /* Add new media query for screens below 720px */
    @media (max-width: 720px) {
        .testimonial-swiper {
            padding: 3rem 2rem; /* Reduced horizontal padding */
        }
        
        /* Reduce grid padding for mobile */
        .grid {
            padding-left: 4px !important;
            padding-right: 4px !important;
        }
    }

    .swiper-button-prev,
    .swiper-button-next {
        width: 30px !important;
        height: 30px !important;
        color: #fff !important;
        background: #000;
        border-radius: 50%;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .swiper-pagination-bullet {
        width: 10px !important;
        height: 10px !important;
        background: #fff !important;
        opacity: 1 !important;
        border: 2px solid #000 !important;
        border-radius: 50% !important;
    }

    .swiper-pagination-bullet-active {
        background: #000 !important;
        border: 2px solid #000 !important;
    }

    /* Add fade transition between slides */
    .swiper-slide {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .swiper-slide-active {
        opacity: 1;
    }
</style>
@endsection

@section('scripts')
<script>
    var testimonialSwiper = new Swiper('.testimonial-swiper', {
        loop: {{ $testimonials->count() > 3 ? 'true' : 'false' }},
        autoHeight: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        speed: 700,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        }
    });
</script>
@endsection