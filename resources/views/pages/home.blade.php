@extends('layouts.app')

@section('title', 'GoHighLevel Expert | AI Automation')

@section('content')
<div class="text-center mb-10">
    <div class="mb-6">
        <img src="{{ asset('profile.jpeg') }}" 
             alt="John Mark A. Pachico" 
             class="w-48 h-48 rounded-full mx-auto object-cover border-4 border-black shadow-lg hover:grayscale transition duration-300"
        >
    </div>
    <h1 class="text-4xl md:text-5xl font-bold mb-4">John Mark A. Pachico</h1>
    <p class="text-lg md:text-xl text-gray-600 mb-4">GoHighLevel Expert | AI Automation | AI Developer</p>
</div>

<div class="grid md:grid-cols-2 gap-8 md:gap-12 px-4 max-w-6xl mx-auto">
    <div class="space-y-6">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 border-b pb-2">About Me</h2>
        <div class="space-y-4 text-gray-700 text-base md:text-lg">
            <p class="bg-gray-50 p-4 rounded-lg shadow-sm transition duration-300 ease-in-out hover:shadow-md transform hover:-translate-y-1">
                Hello! I fell in love with AI and Automation by how it can provide convenience to everyone's lives.
            </p>
            <p class="bg-gray-50 p-4 rounded-lg shadow-sm transition duration-300 ease-in-out hover:shadow-md transform hover:-translate-y-1">
                I help businesses gain more time to focus on strategy and scaling and people to have more time with their family by automating their business process using AI.
            </p>
        </div>
    </div>

    <div class="space-y-6">
        <h2 class="text-2xl md:text-3xl font-semibold mb-4 border-b pb-2">Skills</h2>
        <ul class="list-none space-y-4 text-gray-700">
            <li class="font-semibold text-base md:text-lg bg-gray-50 p-4 rounded-lg shadow-sm transition duration-300 ease-in-out hover:shadow-md transform hover:-translate-y-1">
                GoHighLevel Automation
            </li>
            <li class="font-semibold text-base md:text-lg bg-gray-50 p-4 rounded-lg shadow-sm transition duration-300 ease-in-out hover:shadow-md transform hover:-translate-y-1">
                AI Integration
                <ul class="list-disc list-inside ml-4 mt-2 font-normal space-y-1">
                    <li>LLM (ChatGPT, Claude, Gemini, etc.)</li>
                    <li>Image Generation</li>
                    <li>Video Generation</li>
                    <li>Audio Generation</li>
                </ul>
            </li>
            <li class="font-semibold text-base md:text-lg bg-gray-50 p-4 rounded-lg shadow-sm transition duration-300 ease-in-out hover:shadow-md transform hover:-translate-y-1">
                PHP and Laravel Web Developer
            </li>
        </ul>
    </div>
</div>
@endsection