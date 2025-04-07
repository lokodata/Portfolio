<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    // Only allow one record for site-wide settings
    protected $fillable = [
        'gmail',
        'facebook_link',
    ];
}
