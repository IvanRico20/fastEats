<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Carrito de Compras - FastEats</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff3e0;
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }
        .carrito-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            border: 2px solid #ffe0b2;
        }
        h2 {
            margin-bottom: 20px;
            color: #e65100;
            text-align: center;
        }
        .mensaje {
            background: #fff4e5;
            color: #e65100;
            padding: 10px 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
        }
        .item-carrito {
            border-bottom: 1px solid #ffd6a0;
            padding: 15px 0;
        }
        .item-carrito:last-child {
            border-bottom: none;
        }
        .item-carrito strong {
            color: #fb8c00;
            font-size: 18px;
        }
        .item-detalle {
            margin: 5px 0;
            font-size: 14px;
            color: #444;
        }
        form {
            margin-top: 10px;
        }
        button.eliminar-btn {
            background: #ef6c00;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transition: background 0.3s ease;
        }
        button.eliminar-btn:hover {
            background: #d35400;
        }
        form.finalizar-pedido {
            margin-top: 30px;
            text-align: center;
        }
        input[type="text"], select {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: 2px solid #ffd6a0;
            border-radius: 10px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus, select:focus {
            outline: none;
            border-color: #fb8c00;
        }
        button.finalizar-btn {
            background: #fb8c00;
            color: white;
            padding: 12px;
            border: none;
            width: 100%;
            font-size: 16px;
            border-radius: 10px;
            margin-top: 20px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease;
        }
        button.finalizar-btn:hover {
            background: #ef6c00;
        }
        a.volver-link {
            display: block;
            margin-top: 25px;
            text-align: center;
            color: #e65100;
            font-weight: bold;
            text-decoration: none;
            font-size: 14px;
        }
        a.volver-link:hover {
            text-decoration: underline;
        }
        .campo-extra {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="carrito-container">
        <h2>Tu carrito</h2>

        @if (session('success'))
            <div class="mensaje">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="mensaje">{{ session('error') }}</div>
        @endif

        @forelse ($carrito as $id => $item)
            <div class="item-carrito">
                <strong>{{ $item['nombre'] }}</strong><br>
                <div class="item-detalle">Cantidad: {{ $item['cantidad'] }}</div>
                <div class="item-detalle">Precio unitario: ${{ number_format($item['precio'], 0, ',', '.') }}</div>

                <form method="POST" action="{{ route('carrito.eliminar', ['platoId' => $id]) }}">
                    @csrf
                    <button type="submit" class="eliminar-btn">Eliminar ❌</button>
                </form>
            </div>
        @empty
            <p style="text-align:center; color:#999;">No hay elementos en el carrito.</p>
        @endforelse

        @if ($carrito)
            <form method="POST" action="{{ route('carrito.procesar') }}" class="finalizar-pedido">
                @csrf
                <label for="direccion_entrega">Dirección de entrega:</label><br>
                <input type="text" name="direccion_entrega" id="direccion_entrega" required><br>

                <label for="metodo_pago">Método de pago:</label><br>
                <select name="metodo_pago" id="metodo_pago" required>
                    <option value="" disabled selected>Selecciona un método de pago</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="nequi">Nequi</option>
                    <option value="bancolombia">Bancolombia</option>
                    <option value="daviplata">Daviplata</option>
                </select>

                <div id="campo_datos_pago" class="campo-extra">
                    <label for="datos_pago" id="label_datos_pago"></label>
                    <input type="text" name="datos_pago" id="datos_pago">
                </div>

                <button type="submit" class="finalizar-btn">Finalizar pedido ✅</button>
            </form>
        @endif

        <a href="{{ route('recomendaciones') }}" class="volver-link">← Volver a locales</a>
    </div>

    <script>
        const metodoPago = document.getElementById('metodo_pago');
        const campoExtra = document.getElementById('campo_datos_pago');
        const inputDatos = document.getElementById('datos_pago');
        const labelDatos = document.getElementById('label_datos_pago');

        metodoPago.addEventListener('change', function () {
            const metodo = this.value;
            if (metodo === 'nequi' || metodo === 'bancolombia' || metodo === 'daviplata') {
                campoExtra.style.display = 'block';
                inputDatos.required = true;
                if (metodo === 'nequi') {
                    labelDatos.textContent = 'Número de Nequi:';
                } else if (metodo === 'bancolombia') {
                    labelDatos.textContent = 'Número de cuenta Bancolombia:';
                } else if (metodo === 'daviplata') {
                    labelDatos.textContent = 'Número de Daviplata:';
                }
            } else {
                campoExtra.style.display = 'none';
                inputDatos.required = false;
                inputDatos.value = '';
            }
        });
    </script>
</body>
</html>
