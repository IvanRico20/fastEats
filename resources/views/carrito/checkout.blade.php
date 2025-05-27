<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Pedido</title>
    <style>
        body { font-family: sans-serif; padding: 40px; background: #fff8f0; }
        form { max-width: 400px; background: white; padding: 20px; border-radius: 10px; }
        label { display: block; margin-bottom: 8px; font-weight: bold; }
        input[type=text] { width: 100%; padding: 8px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc; }
        .btn { background-color: #e85d04; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; }
        .btn:hover { opacity: 0.9; }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Finalizar Pedido</h2>

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('carrito.procesar') }}">
        @csrf
        <label for="direccion_entrega">Dirección de entrega:</label>
        <input type="text" name="direccion_entrega" id="direccion_entrega" required>

        <button type="submit" class="btn">Realizar Pedido</button>
    </form>
</body>
</html>
