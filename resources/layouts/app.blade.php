<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ch'Tacos - Sistema de Pedidos</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0..1,0" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface antialiased min-h-screen flex flex-col justify-between">

    <header class="bg-surface-container py-4 shadow-sm">
        <div class="max-w-screen-xl mx-auto px-4 flex items-center justify-between">
            <h1 class="text-xl font-bold text-primary">Ch'Tacos</h1>
            <span class="text-sm text-on-surface-variant">Invitado</span>
        </div>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-surface-container py-4 text-center text-xs text-on-surface-variant">
        &copy; {{ date('Y') }} Ch'Tacos - Todos los derechos reservados.
    </footer>

    @stack('scripts')
</body>
</html>