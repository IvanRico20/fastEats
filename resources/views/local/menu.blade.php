<!DOCTYPE html> 
<html>
<head>
    <title>Menú de {{ $local->nombre }}</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
            background: #fff8f0;
            margin-bottom: 80px; /* espacio para no tapar contenido con el botón */
        }
        h2 { color: #e85d04; }

        .plato {
            background: white;
            border-radius: 10px;
            box-shadow: 0 1px 5px rgba(0,0,0,.1);
            margin-bottom: 15px;
            padding: 15px;
        }
        .plato h3 {
            margin-bottom: 5px;
            color: #ff922b;
        }
        .back-link {
            margin-top: 20px;
            display: inline-block;
            color: #e85d04;
            text-decoration: none;
            font-weight: bold;
        }
        form {
            margin-top: 10px;
        }

        /* Botón flotante del carrito */
        .carrito-fijo {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #e85d04;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: transform 0.2s ease;
        }

        .carrito-fijo:hover {
            background: #ff922b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h2>Menú de {{ $local->nombre }}</h2>
    <p><strong>Ubicación:</strong> {{ $local->ubicacion }}</p>
    <p><strong>Contacto:</strong> {{ $local->contacto }}</p>

    @if($platos->isEmpty())
        <p>No hay platos registrados para este local.</p>
    @else
        @foreach ($platos as $plato)
            <div class="plato">
                <h3>{{ $plato->nombre }}</h3>
                <p>Precio: ${{ $plato->precio }}</p>

                <form action="{{ route('carrito.agregar', ['platoId' => $plato->id]) }}" method="POST">
                    @csrf
                    <button type="submit">Agregar al carrito</button>
                </form>
            </div>
        @endforeach
    @endif

    <a href="{{ route('recomendaciones') }}" class="back-link">&larr; Volver a locales</a>

    <!-- Botón flotante del carrito -->
    <a href="{{ route('carrito.index') }}" class="carrito-fijo" title="Ver carrito 🛒">
        🛒
    </a>
</body>
</html>
