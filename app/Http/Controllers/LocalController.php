<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Local;

class LocalController extends Controller
{
    public function index()
    {
        $gustos = Auth::user()->gusto;

        $categorias = [];

        if ($gustos->comida_tipica) $categorias[] = 'comida_tipica';
        if ($gustos->comida_rapida) $categorias[] = 'comida_rapida';
        if ($gustos->comida_saludable) $categorias[] = 'comida_saludable';
        if ($gustos->arroz_especial) $categorias[] = 'arroz_especial';

        // Si no hay categorías, devuelve todos los locales (opcional)
        if (empty($categorias)) {
            $locales = Local::all();
        } else {
            $locales = Local::whereIn('categoria', $categorias)->get();
        }

        return view('recomendaciones', compact('locales'));
    }

    public function showMenu($id)
    {
        $local = Local::with('platos')->findOrFail($id);
        $platos = $local->platos; // ✅ Extrae los platos

        return view('local.menu', compact('local', 'platos')); // ✅ Ahora pasas ambas variables
    }
}
