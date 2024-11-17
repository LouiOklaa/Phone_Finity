<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class EmailLog extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'message', 'sent_at', 'replies'];

    protected $casts = [
        'message' => 'array',
        'replies' => 'array',
    ];


    public function getSentAtFormattedAttribute()
    {
        setlocale(LC_TIME, 'de_DE.UTF-8');
        \Carbon\Carbon::setLocale('de');

        return Carbon::parse($this->attributes['sent_at'])
            ->timezone('Europe/Berlin')
            ->translatedFormat('d/m/y : H:i');
    }

}
