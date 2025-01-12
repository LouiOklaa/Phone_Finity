<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abschnitte extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'note',
    ];

    public function newMobiles(){

        return $this->hasMany(handys::class, 'section_id')->where('status' , 'Neu');

    }

    public function usedMobiles(){

        return $this->hasMany(handys::class, 'section_id')->where('status' , 'Gebraucht');

    }
}
