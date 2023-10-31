<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'from_who',
        'id_user',
        'id_group',
        'creators',
        'title',
        'nickname',
        'subtitle',
        'category',
        'text',
        'highlight',
        'special_position',
        'config',
        'status',
        'access',
        'trash',
    ];

    protected $hidden = [

    ];


    protected $casts = [
        'creators' => 'array',
        'status' => 'array',
        'config' => 'array',
    ];


}
