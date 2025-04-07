<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the single contact info record only if it doesn't exist
        ContactInfo::firstOrCreate(
            ['id' => 1], // Check if record with ID 1 exists
            [ // Data to create if it doesn't exist
                'gmail' => 'pachicojm00@gmail.com',
                'facebook_link' => 'https://facebook.com/lokoloko115',
                // Add defaults for other fields if any
            ]
        );
    }
}