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
        'codsite',
        'id_user',
        'id_group',
        'creators',
        'title',
        'nickname',
        'subtitle',
        'category',
        'text',
        'detach',
        'url_image',
        'position',
        'config',
        'status',
        'access',
        'trash',
    ];


    protected $hidden = [

    ];


    protected $casts = [

    ];


}
