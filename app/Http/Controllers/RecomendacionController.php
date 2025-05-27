<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Gusto;
use App\Models\Local;

class RecomendacionController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $gusto = $user->gusto;

    if (!$gusto) {
        return redirect()->route('gustos.create')->with('error', 'Primero cuéntanos tus gustos.');
    }

    $categorias = [];

    if ($gusto->comida_tipica) $categorias[] = 'comida_tipica';
    if ($gusto->comida_rapida) $categorias[] = 'comida_rapida';
    if ($gusto->comida_saludable) $categorias[] = 'comida_saludable';
    if ($gusto->arroz_especial) $categorias[] = 'arroz_especial';

    if (empty($categorias)) {
        return redirect()->route('gustos.create')->with('error', 'Selecciona al menos una preferencia para obtener recomendaciones.');
    }

    $locales = Local::whereIn('categoria', $categorias)->get();

    return view('recomendaciones', compact('locales'));
}

}
