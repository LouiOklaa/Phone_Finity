<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\abschnitte;

class handys extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'section_id',
        'section_name',
        'status',
        'preis',
        'amount',
        'note',
        'image',
    ];

    public function abschnitte(){

        return $this->belongsTo(abschnitte::class);

    }
}
