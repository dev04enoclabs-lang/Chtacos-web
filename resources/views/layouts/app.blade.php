<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Ch'Tacos")</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    @stack('styles')

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body class="bg-surface text-on-surface min-h-screen pb-24">

    <header
        class="w-full top-0 sticky z-50 bg-background dark:bg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-19">
        <div
            class="flex items-center justify-between px-margin-mobile md:px-margin-desktop h-full w-full max-w-7xl mx-auto">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-primary dark:text-primary-fixed-dim"
                    style="font-size: 28px;">restaurant_menu</span>
                <h1 class="font-headline-xl text-headline-xl text-primary dark:text-primary-fixed-dim tracking-tight">
                    Ch'Tacos
                </h1>
            </div>
            <div class="flex items-center gap-4">
                <h2 class="text-xl font-bold text-gray-900 drop-shadow-sm">
                    {{ auth()->user()->name ?? 'Invitado' }}
                </h2>
                <div
                    class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold overflow-hidden">
                    <img class="w-full h-full object-cover" alt="Mesero Sabor y Brasa"
                        src="{{ asset('assets/img/loading.jpg') }}" />
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <nav
        class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-gutter pb-4 pt-2 bg-surface dark:bg-surface-dim shadow-[0_-4px_20px_rgba(0,0,0,0.05)] rounded-t-xl">

        <!-- Enlace Menú -->
        <a class="flex flex-col items-center justify-center transition-all duration-200 active:scale-90 px-4 py-1 {{ request()->routeIs('menu') ? 'bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-full' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
            href="{{ route('menu') }}">
            <span class="material-symbols-outlined" data-icon="restaurant">restaurant</span>
            <span class="font-label-lg text-label-lg">Menú</span>
        </a>

        <!-- Enlace Mis Pedidos -->
        <a class="flex flex-col items-center justify-center transition-all duration-200 active:scale-90 px-4 py-1 {{ request()->routeIs('orders') ? 'bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-full' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
            href="{{ route('orders') }}">
            <span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
            <span class="font-label-lg text-label-lg">Mis Pedidos</span>
        </a>

        <!-- Enlace Carrito -->
        <a class="flex flex-col items-center justify-center transition-all duration-200 active:scale-90 px-4 py-1 {{ request()->routeIs('cart') ? 'bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-full' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
            href="{{ route('cart') }}">
            <span class="material-symbols-outlined" data-icon="shopping_cart"
                style="{{ request()->routeIs('cart') ? "font-variation-settings: 'FILL' 1;" : '' }}">shopping_cart</span>
            <span class="font-label-lg text-label-lg">Carrito</span>
        </a>

    </nav>
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log('Service Worker listo en el scope:', reg.scope))
                    .catch(err => console.error('Error al registrar Service Worker:', err));
            });
        }
    </script>
    <script src="{{ asset('assets/js/offiline-menager.js') }}"></script>
    <script src="{{ asset('assets/js/tallwind-config.js') }}"></script>
    @stack('scripts')
</body>

</html>
