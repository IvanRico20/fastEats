<!DOCTYPE html>
<html>
<head>
    <title>Preferencias de comida</title>
    <style>
        body { font-family: sans-serif; padding: 40px; background: #f4f4f4; text-align: center; }
        form { background: white; padding: 30px; border-radius: 10px; display: inline-block; }
        label { display: block; margin: 10px; font-size: 18px; }
        button { margin-top: 20px; background: #ff922b; color: white; padding: 10px 20px; border: none; border-radius: 6px; }
    </style>
</head>
<body>
    <h2>Cuéntanos qué te gusta comer 🍽️</h2>
    <form method="POST" action="{{ route('gustos.store') }}">
        @csrf

        <label><input type="checkbox" name="comida_tipica" value="1"> Comida Típica Tolimense</label>
        <label><input type="checkbox" name="comida_rapida" value="1"> Comida Rápida</label>
        <label><input type="checkbox" name="comida_saludable" value="1"> Comida Saludable y Fusión</label>
        <label><input type="checkbox" name="arroz_especial" value="1"> Arroz y Platos Especiales</label>

        <button type="submit">Ver locales recomendados</button>
    </form>
</body>
</html>
