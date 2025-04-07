<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\HeroSection;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch the first (and likely only) hero section data
        $heroSection = HeroSection::first();

        // Fetch projects ordered by the 'order' column
        $projects = Project::orderBy('order', 'asc')->get();

        // Fetch testimonials ordered by the 'order' column
        $testimonials = Testimonial::orderBy('order', 'asc')->get();

        // Fetch the first (and only) contact info record
        $contactInfo = ContactInfo::first();

        // Prepare image URLs (assuming public disk and FileUpload component)
        // If using Spatie Media Library, you'd use $model->getFirstMediaUrl('collection_name')
        if ($heroSection && $heroSection->image_path) {
            $heroSection->image_url = Storage::url($heroSection->image_path);
        } else if ($heroSection) {
             $heroSection->image_url = asset('profile.jpg'); // Default fallback
        }


        foreach ($projects as $project) {
            if ($project->images->isNotEmpty()) {
                 // Prepare URLs for all project images
                foreach($project->images as $image) {
                     if ($image->image_path) {
                        $image->image_url = Storage::url($image->image_path);
                     }
                }
                // Set a specific main image URL for the project (e.g., the first one)
                $project->main_image_url = $project->images->first()->image_url ?? asset('placeholder.jpg'); // Fallback needed
            } else {
                 $project->main_image_url = asset('placeholder.jpg'); // Fallback needed
            }
        }

        foreach ($testimonials as $testimonial) {
            if ($testimonial->image_path) {
                $testimonial->image_url = Storage::url($testimonial->image_path);
            } else {
                // Provide a default placeholder, maybe based on initials?
                $initials = strtoupper(substr($testimonial->name, 0, 1) . (strstr($testimonial->name, ' ') ? substr(strstr($testimonial->name, ' '), 1, 1) : ''));
                $testimonial->image_url = "https://placehold.co/64x64/eeeeee/777777?text=" . urlencode($initials); // Placeholder
            }
        }


        return view('pages.home', compact(
            'heroSection',
            'projects',
            'testimonials',
            'contactInfo'
        ));
    }
}
