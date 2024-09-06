<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'section_id',
        'section_name',
        'brand',
        'price',
        'note',
        'image',
    ];

    public function sections(){

        return $this->belongsTo(accessories_sections::class);

    }
}
