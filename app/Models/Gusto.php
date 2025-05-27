<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gusto extends Model
{
    protected $fillable = [
        'user_id',
        'comida_tipica',
        'comida_rapida',
        'comida_saludable',
        'arroz_especial',
    ];

    // Si tienes relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
