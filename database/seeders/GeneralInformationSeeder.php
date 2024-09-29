<?php

namespace Database\Seeders;

use App\Models\GeneralInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         GeneralInformation::create([
            'phone_number' => '010000000000',
            'address' => 'Berlin',
            'email' => 'Admin@louioklaa.com',
            'address_link' => 'https://maps.google.com/',
            'facebook_link' => 'https://www.facebook.com/',
            'instagram_link' => 'https://www.instagram.com/',
            'tiktok_link' => 'https://www.tiktok.com/',
        ]);
    }
}
