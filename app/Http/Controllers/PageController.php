<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Testimonial;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function projects()
    {
        // Fetch projects ordered by sort_order
        $projects = Project::orderBy('sort_order')->get();
        return view('pages.projects', compact('projects'));
    }

    public function testimonials()
    {
        // Fetch testimonials ordered by sort_order
        $testimonials = Testimonial::orderBy('sort_order')->get();
        return view('pages.testimonials', compact('testimonials'));
    }

    public function consultation()
    {
        return view('pages.consultation');
    }
}