<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'id_user',
        'id_group',
        'uid_from_who',
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

    protected $casts = [
        'config' => 'array',
    ];

}
