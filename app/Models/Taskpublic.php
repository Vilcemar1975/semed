<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Taskpublic extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'uid_from_who',
        'id_articles',
        'date_start',
        'hour_start',
        'date_end',
        'hour_end',
        'total_dias',
    ];


    protected $hidden = [

    ];


    protected $casts = [

    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
