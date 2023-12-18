<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Andress extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'uid',
        'uid_from_who',
        'id_user',
        'id_group',
        'from_who',
        'cep',
        'street',
        'number',
        'complement',
        'district',
        'city',
        'state',
        'country',
        'permission',
        'status',
        'ibge',
        'gia',
        'ddd',
        'siafi',
        'trash',
    ];

    protected $hidden = [

    ];


    protected $casts = [

    ];
}
