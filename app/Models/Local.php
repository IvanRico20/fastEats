<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria',
        'especialidades',
        'ubicacion',
        'contacto',
    ];

    public function platos()
{
    return $this->hasMany(Plato::class);
}

}
