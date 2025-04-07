<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'job_titles',
        'description',
        'social_links',
    ];

    protected $casts = [
        'job_titles' => 'array',
        'social_links' => 'array',
    ];
}
