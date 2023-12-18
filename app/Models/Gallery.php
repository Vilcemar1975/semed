<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'uid',
        'id_user',
        'id_group',
        'uid_from_who',
        'imagens',
        'public',
    ];

    protected $hidden = [

    ];


    protected $casts = [
        'imagens' => 'array',
    ];

}
