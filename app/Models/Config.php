<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'iddequem',
        'codsite',
        'name',
        'category',
        'body',
        'trash',
    ];


    protected $hidden = [

    ];


    protected $casts = [

    ];

}
