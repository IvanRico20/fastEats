<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastEats</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-green-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div class="font-bold">FastEats</div>
            <div>
                @auth
                    <span class="mr-4">Hola, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="underline">Cerrar sesión</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="underline">Iniciar sesión</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
