<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documentation extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'codsite',
        'user_id',
        'cpf',
        'rg',
        'cnh',
        'phone',
        'pispasep',
        'obs',
    ];


    protected $hidden = [

    ];


    protected $casts = [

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
