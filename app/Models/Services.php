<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'section_id',
        'section_name',
        'price',
        'note',
        'image',
        'created_by',
    ];

    public function sections(){

        return $this->belongsTo(ServicesSections::class);

    }
}
