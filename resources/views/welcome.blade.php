<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FastEats - Inicio</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff3e0;
            color: #333;
            padding: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #ffffff;
            border: 2px solid #ffe0b2;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #e65100;
            margin-bottom: 10px;
        }

        p {
            color: #555;
            margin-bottom: 30px;
            font-size: 18px;
        }

        .button {
            background-color: #fb8c00;
            color: white;
            padding: 14px 28px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            margin: 10px;
            display: inline-block;
            transition: background 0.3s ease;
        }

        .button:hover {
            background-color: #ef6c00;
        }

        .categorias {
            margin-top: 30px;
        }

        .categorias h2 {
            color: #e65100;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .categorias div {
            font-size: 18px;
            margin: 10px 0;
            background: #fff8f1;
            border: 1px solid #ffd6a0;
            padding: 12px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenido a <strong>FastEats</strong> 🍽️</h1>
        <p>Tu plataforma para pedir domicilios de comida en El Espinal</p>

        <div>
            <a href="{{ route('register') }}" class="button">Registrarse</a>
            <a href="{{ route('login') }}" class="button">Iniciar sesión</a>
        </div>

        <div class="categorias">
            <h2>¿Qué se te antoja hoy?</h2>
            <div>🍽 Comida Típica Tolimense</div>
            <div>🍔 Comida Rápida</div>
            <div>🥗 Comida Saludable y Fusión</div>
            <div>🍚 Arroz y Platos Especiales</div>
        </div>
    </div>
</body>
</html>
