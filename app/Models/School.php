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
        'date_open',
        'name',
        'unit',
        'nickname',
        'phones',
        'emails',
        'type',
        'level',
        'description',
        'direction',
        'structure',
        'config',
        'status',
        'social_media',
        'highlight',
        'special_position',
        'acesso',
        'trash',
    ];

    protected $hidden = [

    ];


    protected $casts = [
        'phones' => 'array',
        'emails' => 'array',
        'direction' => 'array',
        'what_have' => 'array',
        'status' => 'array',
        'config' => 'array',
        'social_media' => 'array',
    ];

    public function image(): HasOne
    {
        return $this->hasOne(Image::class, 'uid_from_who', 'uid');
    }

    public function andress(): HasOne
    {
        return $this->hasOne(Andress::class, 'uid_from_who', 'uid');
    }
}

