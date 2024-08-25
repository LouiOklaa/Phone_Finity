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
    public function handys(){
        return
        $this->hasMany(handys::class);

    }
}
