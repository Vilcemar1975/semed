<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'uid_from_who',
        'id_user',
        'name_full',
        'company',
        'description',
    ];


    protected $hidden = [

    ];


    protected $casts = [

    ];

}
