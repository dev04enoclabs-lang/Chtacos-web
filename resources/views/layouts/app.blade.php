<!DOCTYPE html>
<html class="light" lang="es-mx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Ch'Tacos")</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/swap.css') }}" media="print" onload="this.media='all'">

    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/swap.css') }}">
    </noscript>

    @stack('styles')

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body class="bg-surface text-on-surface min-h-screen pb-24">

    <header
        class="w-full top-0 sticky z-50 bg-background dark:Fbg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-19">
        <div
            class="flex items-center justify-between px-margin-mobile md:px-margin-desktop h-full w-full max-w-7xl mx-auto">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-utensils text-primary dark:text-primary-fixed-dim text-2xl"></i>

                <h1 class="font-headline-xl text-headline-xl text-primary dark:text-primary-fixed-dim tracking-tight">
                    Ch'Tacos
                </h1>
            </div>
            <div class="flex items-center gap-3">
                <!-- Menú de tres puntos (Dropdown) -->
                <div class="relative">
                    <button id="btn-options-menu" type="button"
                        class="p-2 rounded-full hover:bg-surface-container-high transition-colors flex items-center justify-center text-on-surface-variant focus:outline-none">
                        <i class="fa-solid fa-ellipsis-v"></i>
                    </button>

                    <div id="options-dropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-surface-container-lowest rounded-xl shadow-lg border border-outline-variant/30 py-2 z-50">
                        <a href="{{ route('history') }}"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm text-on-surface hover:bg-surface-container-high transition-colors">
                            <i class="fa-solid fa-clock text-lg"></i>
                            Historial
                        </a>
                    </div>
                </div>
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
            <i class="fa-solid fa-utensils text-lg"></i>
            <span class="font-label-lg text-label-lg">Menú</span>
        </a>

        <!-- Enlace Mis Pedidos -->
        <a class="flex flex-col items-center justify-center transition-all duration-200 active:scale-90 px-4 py-1 {{ request()->routeIs('orders') ? 'bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-full' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
            href="{{ route('orders') }}">
            <i class="fa-solid fa-receipt text-lg"></i>
            <span class="font-label-lg text-label-lg">Mis Pedidos</span>
        </a>

        <!-- Enlace Carrito -->
        <a class="flex flex-col items-center justify-center transition-all duration-200 active:scale-90 px-4 py-1 {{ request()->routeIs('cart') ? 'bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-full' : 'text-on-surface-variant hover:bg-surface-container-high' }}"
            href="{{ route('cart') }}">
            <i class="fa-solid fa-shopping-cart text-lg"></i>
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
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/offiline-menager.js') }}"></script>
    <script src="{{ asset('assets/js/tallwind-config.js') }}"></script>
    @stack('scripts')
</body>

</html>
