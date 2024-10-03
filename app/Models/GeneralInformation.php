<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'address',
        'email',
        'address_link',
        'facebook_link',
        'instagram_link',
        'tiktok_link',
        'img1',
        'img2',
        'img3',
        'img4',
    ];
}
