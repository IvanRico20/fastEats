<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>FastEats - Iniciar sesión</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff3e0;
            padding: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
            border: 2px solid #ffe0b2;
        }

        h2 {
            margin-bottom: 20px;
            color: #e65100;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #ffd6a0;
            border-radius: 10px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #fb8c00;
        }

        button {
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

        button:hover {
            background: #ef6c00;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Iniciar sesión</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input name="email" type="email" placeholder="Correo electrónico" required>
            <input name="password" type="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
