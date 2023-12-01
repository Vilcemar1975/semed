<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class School extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'uid',
        'id_user',
        'id_group',
        'region',
        'inep',
        'name',
        'nickname',
        'phone',
        'type',
        'level',
        'description',
        'what_have',
        'config',
        'status',
        'highlight',
        'special_position',
        'acesso',
        'trash',

    ];

    protected $hidden = [

    ];


    protected $casts = [
        'phone' => 'array',
        'what_have' => 'array',
        'status' => 'array',
        'config' => 'array',
    ];

    public function image(): HasOne
    {
        return $this->hasOne(Image::class, 'id_from_who');
    }
}

