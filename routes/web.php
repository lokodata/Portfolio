<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Create this controller

Route::get('/', [HomeController::class, 'index'])->name('home.show');