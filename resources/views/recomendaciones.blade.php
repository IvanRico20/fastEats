<!DOCTYPE html>
<html>
<head>
    <title>Locales recomendados</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 40px;
            background: #fff8f0;
        }

        h2 {
            color: #e85d04;
        }

        .local {
            background: white;
            border-radius: 10px;
            box-shadow: 0 1px 5px rgba(0,0,0,.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .local h3 {
            margin-bottom: 5px;
            color: #ff922b;
        }

        .local h3 a {
            color: #ff922b;
            text-decoration: none;
        }

        .local h3 a:hover {
            text-decoration: underline;
        }

        .local p {
            margin: 3px 0;
        }

        /* Estilo del botón flotante del carrito */
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
    <h2>Locales recomendados para ti</h2>

    @forelse ($locales as $local)
        <div class="local">
            <h3>
                <a href="{{ route('local.menu', $local->id) }}">
                    {{ $local->nombre }}
                </a>
            </h3>
            <p><strong>Especialidades:</strong> {{ $local->especialidades }}</p>
            <p><strong>Ubicación:</strong> {{ $local->ubicacion }}</p>
            <p><strong>Contacto:</strong> {{ $local->contacto }}</p>
        </div>
    @empty
        <p>No encontramos locales que coincidan con tus gustos.</p>
    @endforelse

    <!-- Botón flotante del carrito -->
    <a href="{{ route('carrito.index') }}" class="carrito-fijo" title="Ver carrito 🛒">
        🛒
    </a>
</body>
</html>
