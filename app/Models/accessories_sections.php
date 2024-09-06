<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class accessories_sections extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'note',
    ];

    public function accessories(){
        return
            $this->hasMany(Accessories::class);

    }
}
