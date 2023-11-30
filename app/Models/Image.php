<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_group',
        'id_from_who',
        'id_author',
        'title',
        'nickname',
        'category',
        'classification',
        'url',
        'type',
        'description',
        'source',
        'trash',
        'config',
    ];

}
