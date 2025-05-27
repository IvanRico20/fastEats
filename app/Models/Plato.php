<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;

    protected $fillable = ['local_id', 'nombre', 'descripcion', 'precio'];

    public function local()
    {
        return $this->belongsTo(Local::class);
    }
}
