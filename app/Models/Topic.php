<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid',
        'uid_from_who',
        'id_articles',
        'position',
        'title',
        'nickname',
        'text',
        'public',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_articles');
    }

    public function image(): HasOne
    {
        return $this->hasOne(Image::class, 'uid_from_who', 'uid');
    }

}
