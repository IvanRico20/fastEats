<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plato;
use App\Models\Pedido;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

   public function agregar(Request $request, $platoId)
{
    $plato = Plato::findOrFail($platoId);
    $carrito = session()->get('carrito', []);

    if (isset($carrito[$platoId])) {
        $carrito[$platoId]['cantidad']++;
    } else {
        $carrito[$platoId] = [
            "nombre" => $plato->nombre,
            "precio" => $plato->precio,
            "cantidad" => 1
        ];
    }

    session()->put('carrito', $carrito);
    return redirect()->back()->with('success', 'Producto agregado al carrito');
}

    public function eliminar($platoId)
    {
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$platoId])){
            unset($carrito[$platoId]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito');
    }

    public function actualizar(Request $request, $platoId)
    {
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$platoId])){
            $cantidad = $request->input('cantidad');
            if($cantidad > 0){
                $carrito[$platoId]['cantidad'] = $cantidad;
            } else {
                unset($carrito[$platoId]);
            }
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Carrito actualizado');
    }

    public function checkout()
    {
        $carrito = session()->get('carrito', []);
        if(empty($carrito)){
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío');
        }
        return view('carrito.checkout', compact('carrito'));
    }

    public function procesarPedido(Request $request)
    {
        $request->validate([
            'direccion_entrega' => 'required|string|max:255'
        ]);

        $carrito = session()->get('carrito', []);
        if(empty($carrito)){
            return redirect()->route('carrito.index')->with('error', 'El carrito está vacío');
        }

        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        $pedido = Pedido::create([
            'user_id' => Auth::id(),
            'direccion_entrega' => $request->direccion_entrega,
            'estado' => 'pendiente',
            'total' => $total,
        ]);

        foreach ($carrito as $platoId => $item) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'plato_id' => $platoId,
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
            ]);
        }

        session()->forget('carrito');

        return redirect()->route('carrito.index')->with('success', 'Pedido realizado exitosamente');
    }
}
