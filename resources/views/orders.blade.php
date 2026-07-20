<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Chtacos Pedidos</title>

    <!-- Fuentes Externas -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <!-- Hojas de Estilo Propias -->
    <link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">

    <!-- Tailwind Engine CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body class="bg-background text-on-background min-h-screen pb-32">

    <header
        class="w-full top-0 sticky z-50 bg-background dark:bg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-19">
        <div
            class="flex items-center justify-between px-margin-mobile md:px-margin-desktop h-full w-full max-w-7xl mx-auto">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-primary dark:text-primary-fixed-dim"
                    style="font-size: 28px;">restaurant_menu</span>
                <h1 class="font-headline-xl text-headline-xl text-primary dark:text-primary-fixed-dim tracking-tight">
                    Ch'Tacos</h1>
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

    <main class="max-w-3xl mx-auto px-margin-mobile mt-6 space-y-8">

        <section class="fade-in" style="animation-delay: 0.1s;">
            <div
                class="bg-surface-container-low rounded-xl p-4 flex items-center justify-between shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-outline-variant">

                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-secondary-container rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-secondary-container"
                            style="font-variation-settings: 'FILL' 1;">table_restaurant</span>
                    </div>
                    <div>
                        <h2 class="font-headline-md text-headline-md text-on-surface" id="order-table-title">Mesa 1</h2>
                    </div>
                </div>

                <div class="relative min-w-[180px]">
                    <select id="order-table-select"
                        class="w-full bg-surface-container-highest dark:bg-surface-variant pl-4 pr-10 py-2 rounded-full font-label-lg text-label-lg text-on-surface hover:bg-surface-variant dark:hover:bg-surface-container-high transition-colors appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary border-none">
                        <option value="0" disabled selected hidden>Selecciona la mesa</option>
                        <option value="1">Mesa 1</option>
                        <option value="2">Mesa 2</option>
                        <option value="3">Mesa 3</option>
                    </select>
                    <span
                        class="material-symbols-outlined text-sm absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface">
                        expand_more
                    </span>
                </div>
            </div>
        </section>

        <section id="orders-container" class="space-y-4 fade-in" style="animation-delay: 0.2s;">
            <p class="text-center text-on-surface-variant py-8">No hay pedidos registrados todavía.</p>
        </section>

        <div class="pt-8 pb-12 flex flex-col gap-4">
            <div class="flex justify-between items-center px-2">
                <span class="text-body-lg font-bold text-on-surface" id="total-table-label">Total de la Mesa (1)</span>

                <span class="text-headline-lg font-bold text-primary" id="total-table-amount">$00.00</span>
            </div>
            <a href="{{ route('cart') }}" id="btn-account"
                class="w-full bg-primary text-on-primary py-4 rounded-xl font-headline-md flex items-center justify-center gap-3 shadow-lg hover:bg-surface-tint transition-all active:scale-95 duration-100">
                <span class="material-symbols-outlined">payments</span>
                Pedir la Cuenta
            </a>
        </div>
    </main>

    <nav
        class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-gutter pb-4 pt-2 bg-surface dark:bg-surface-dim shadow-[0_-4px_20px_rgba(0,0,0,0.05)] rounded-t-xl">
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-200"
            href="{{ route('menu') }}">
            <span class="material-symbols-outlined" data-icon="restaurant">restaurant</span>
            <span class="font-label-lg text-label-lg">Menú</span>
        </a>
        <a class="flex flex-col items-center justify-center bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-full px-4 py-1 active:scale-90 transition-all duration-200"
            href="{{ route('orders') }}">
            <span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
            <span class="font-label-lg text-label-lg">Mis Pedidos</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-200"
            href="{{ route('cart') }}">
            <span class="material-symbols-outlined" data-icon="shopping_cart"
                style="font-variation-settings: 'FILL' 1;">shopping_cart</span>
            <span class="font-label-lg text-label-lg">Carrito</span>
        </a>
    </nav>

    <script src="{{ asset('assets/js/tallwind-config.js') }}"></script>
    <script src="{{ asset('assets/js/orders.js') }}"></script>
</body>

</html>
