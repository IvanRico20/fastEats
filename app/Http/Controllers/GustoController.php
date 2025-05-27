<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gusto;
use Illuminate\Support\Facades\Auth;

class GustoController extends Controller
{
    public function create()
    {
        return view('gustos');
    }

  public function store(Request $request)
{
    $request->validate([
        'comida_tipica' => 'nullable|boolean',
        'comida_rapida' => 'nullable|boolean',
        'comida_saludable' => 'nullable|boolean',
        'arroz_especial' => 'nullable|boolean',
    ]);

    Gusto::updateOrCreate(
        ['user_id' => Auth::id()],
        [
            'comida_tipica' => $request->boolean('comida_tipica'),
            'comida_rapida' => $request->boolean('comida_rapida'),
            'comida_saludable' => $request->boolean('comida_saludable'),
            'arroz_especial' => $request->boolean('arroz_especial'),
        ]
    );

    return redirect()->route('recomendaciones')->with('success', '¡Gracias por contarnos tus gustos!');
}
}