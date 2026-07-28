<!DOCTYPE html>
<html class="light" lang="es-mx">

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
            <div class="flex items-center gap-3">
                <!-- Menú de tres puntos (Dropdown) -->
                <div class="relative">
                    <button id="btn-options-menu" type="button"
                        class="p-2 rounded-full hover:bg-surface-container-high transition-colors flex items-center justify-center text-on-surface-variant focus:outline-none">
                        <span class="material-symbols-outlined">more_vert</span>
                    </button>

                    <div id="options-dropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-surface-container-lowest rounded-xl shadow-lg border border-outline-variant/30 py-2 z-50">
                        <a href="{{ route('history') }}"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm text-on-surface hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined text-lg">restaurant_menu</span>
                            Historial
                        </a>
                        <a href="/orders"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm text-on-surface hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined text-lg">receipt_long</span>
                            Pedidos
                        </a>
                        <hr class="my-1 border-outline-variant/30">
                        <a href="#" onclick="if(window.OfflineManager) window.OfflineManager.syncOrders();"
                            class="flex items-center gap-2 px-4 py-2.5 text-sm text-on-surface hover:bg-surface-container-high transition-colors">
                            <span class="material-symbols-outlined text-lg">sync</span>
                            Cuentas $
                        </a>
                    </div>
                </div>

                {{-- <h2 class="text-xl font-bold text-gray-900 drop-shadow-sm">
                    {{ auth()->user()->name ?? 'Invitado' }}
                </h2>
                <div
                    class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold overflow-hidden">
                    <img class="w-full h-full object-cover" alt="Mesero Sabor y Brasa"
                        src="{{ asset('assets/img/loading.jpg') }}" /> --}}
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
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/offiline-menager.js') }}"></script>
    <script src="{{ asset('assets/js/tallwind-config.js') }}"></script>
    @stack('scripts')
</body>

</html>
