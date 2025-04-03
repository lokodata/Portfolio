@extends('layouts.app')

@section('title', 'Free Consultation')

@section('content')
<div class="text-center py-16">
    <h1 class="text-3xl font-bold mb-4">Book a FREE Consultation</h1>
    <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">
        Helping you understand the pain points of your business and how we can automate them.
    </p>


    <a href="#" {{-- <<< REPLACE # with your actual booking link/action --}}
       class="bg-black text-white px-8 py-3 rounded-lg font-semibold text-lg hover:bg-gray-800 inline-block transition duration-200 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
       BOOK NOW
    </a>
</div>
@endsection