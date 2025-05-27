<style>
    .form-container {
        max-width: 500px;
        margin: 50px auto;
        background: #fff3e0;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
        position: relative;
        padding-bottom: 80px; /* espacio para no tapar botón con contenido */
    }

    .form-container h2 {
        text-align: center;
        color: #e65100;
        margin-bottom: 10px;
    }

    .form-container p {
        text-align: center;
        color: #555;
        margin-bottom: 25px;
    }

    .checkbox-group {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
        background: #fff;
        border: 2px solid #ffe0b2;
        border-radius: 10px;
        padding: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .checkbox-label:hover {
        border-color: #fb8c00;
        background: #fff8f1;
    }

    .checkbox-label input {
        margin-right: 10px;
        transform: scale(1.2);
    }

    .submit-btn {
        margin-top: 25px;
        width: 100%;
        padding: 14px;
        font-size: 16px;
        background-color: #fb8c00;
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #ef6c00;
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

<form method="POST" action="{{ route('gustos.store') }}" class="form-container">
    @csrf

    <h2>Cuéntanos qué te gusta comer 🍽️</h2>
    <p>Selecciona los tipos de comida que prefieres y te mostraremos los mejores locales de El Espinal para ti.</p>

    <div class="checkbox-group">
        <label class="checkbox-label">
            <input type="checkbox" name="comida_tipica" value="1">
            Comida Típica Tolimense
        </label>

        <label class="checkbox-label">
            <input type="checkbox" name="comida_rapida" value="1">
            Comida Rápida
        </label>

        <label class="checkbox-label">
            <input type="checkbox" name="comida_saludable" value="1">
            Comida Saludable y Fusión
        </label>

        <label class="checkbox-label">
            <input type="checkbox" name="arroz_especial" value="1">
            Arroz y Platos Especiales
        </label>
    </div>

    <button type="submit" class="submit-btn">
        🍴 Ver locales recomendados
    </button>
</form>

<!-- Botón flotante del carrito -->
<a href="{{ route('carrito.index') }}" class="carrito-fijo" title="Ver carrito 🛒">
    🛒
</a>
