<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Create this controller

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/free-consultation', [PageController::class, 'consultation'])->name('consultation.show');
