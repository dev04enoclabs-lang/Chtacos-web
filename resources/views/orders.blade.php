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
        class="w-full top-0 sticky z-50 bg-background dark:bg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-16">
        <div
            class="flex items-center justify-between px-margin-mobile md:px-margin-desktop h-full w-full max-w-7xl mx-auto">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-primary dark:text-primary-fixed-dim"
                    style="font-size: 28px;">restaurant_menu</span>
                <h1 class="font-headline-xl text-headline-xl text-primary dark:text-primary-fixed-dim tracking-tight">
                    Sabor y Brasa</h1>
            </div>
            <div class="flex items-center gap-4">
                <button class="hover:bg-surface-container-high transition-colors p-2 rounded-full">
                    <span class="material-symbols-outlined text-on-surface-variant">search</span>
                </button>
                <div
                    class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold overflow-hidden">
                    <img class="w-full h-full object-cover" alt="Mesero Sabor y Brasa"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYK3d9YK3-yQ-CiV3aNPMwK6UBcW_tU7M2ZspV5QR_uMbwb6kR_T4LDRZZDvm7IGA4Eu1gShE-Xg8O5nD4hPpreI2syJ4z8kPn8z65oZncFmI6Fda7K8w03R5s6Fm81MQUxyCH15eYg9mKFCtqyR_g8R2RHbZaP9fJfXJYqcN6mWe1s6KRbC3YXNWniU3xjVdQ0ncadVyq12ZjnHSfYsd2iIoITl-K4hv9cZnqtHSyAje0LZh47ewtSw" />
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-3xl mx-auto px-margin-mobile mt-6 space-y-8">

        <!-- Context Filter: Mesa Card -->
        <section class="fade-in" style="animation-delay: 0.1s;">
            <div
                class="bg-surface-container-low rounded-xl p-4 flex items-center justify-between shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-outline-variant">

                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-secondary-container rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-on-secondary-container"
                            style="font-variation-settings: 'FILL' 1;">table_restaurant</span>
                    </div>
                    <div>
                        <h2 class="font-headline-md text-headline-md text-on-surface">Mesa 1</h2>
                    </div>
                </div>

                <div class="relative min-w-[180px]">
                    <select
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

        <!-- User Group: Juan Pérez (Current User) -->
        <section class="space-y-4 fade-in" style="animation-delay: 0.2s;">
            <div class="flex items-center justify-between px-1">
                <h3 class="font-headline-md text-headline-md text-on-surface flex items-center gap-2">
                    Juan Pérez <span class="text-on-surface-variant font-normal text-body-md">(Tú)</span>
                </h3>
                <span class="font-price-display text-price-display text-primary">$420.00</span>
            </div>

            <div class="space-y-4">
                <!-- Card 1: En cocina -->
                <div
                    class="bg-surface-container-lowest rounded-xl p-5 border border-outline-variant shadow-sm hover:scale-[0.50] transition-transform duration-200">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-secondary"
                                style="font-variation-settings: 'FILL' 1;">skillet</span>
                            <span
                                class="font-label-lg text-label-lg text-secondary uppercase tracking-wider bg-secondary-fixed/30 px-2 py-0.5 rounded">En
                                cocina</span>
                        </div>
                        <span class="text-on-surface-variant text-label-lg">Hace 12 min</span>
                    </div>
                    <ul class="space-y-3 mb-6">
                        <li class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-6 h-6 flex items-center justify-center bg-surface-container-high rounded text-sm font-bold">2</span>
                                <span class="font-body-md text-body-md text-on-surface">Tacos al Pastor Especial</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="font-body-md text-on-surface-variant">$150.00</span>
                                <button class="text-on-surface-variant hover:text-error transition-colors p-1"><span
                                        class="material-symbols-outlined text-sm">delete</span></button>
                            </div>
                        </li>
                        <li class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-6 h-6 flex items-center justify-center bg-surface-container-high rounded text-sm font-bold">1</span>
                                <span class="font-body-md text-body-md text-on-surface">Agua de Horchata Grande</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="font-body-md text-on-surface-variant">$65.00</span>
                                <button class="text-on-surface-variant hover:text-error transition-colors p-1"><span
                                        class="material-symbols-outlined text-sm">delete</span></button>
                            </div>
                        </li>
                    </ul>
                    <button
                        class="w-full py-2 mb-4 border border-dashed border-outline-variant rounded-lg text-on-surface-variant font-label-lg flex items-center justify-center gap-2 hover:bg-surface-container-low transition-colors"><span
                            class="material-symbols-outlined text-sm">add</span> Agregar Producto</button>
                    <div class="pt-4 border-t border-outline-variant flex justify-between items-center">
                        <p class="text-on-surface-variant text-label-lg italic">"Sin cebolla en los tacos por favor"</p>
                        <p class="font-price-display text-price-display text-on-surface">$215.00</p>
                    </div>
                </div>

                <!-- Card 2: Servido -->
                <div
                    class="bg-surface-container-lowest rounded-xl p-5 border border-outline-variant shadow-sm opacity-90">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-tertiary"
                                style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            <span
                                class="font-label-lg text-label-lg text-tertiary uppercase tracking-wider bg-tertiary-fixed/30 px-2 py-0.5 rounded">Servido</span>
                        </div>
                        <span class="text-on-surface-variant text-label-lg">Hace 45 min</span>
                    </div>
                    <ul class="space-y-3 mb-6">
                        <li class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-6 h-6 flex items-center justify-center bg-surface-container-high rounded text-sm font-bold">1</span>
                                <span class="font-body-md text-body-md text-on-surface">Gringa de Asada</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="font-body-md text-on-surface-variant">$205.00</span>
                                <button class="text-on-surface-variant hover:text-error transition-colors p-1"><span
                                        class="material-symbols-outlined text-sm">delete</span></button>
                            </div>
                        </li>
                    </ul>
                    <button
                        class="w-full py-2 mb-4 border border-dashed border-outline-variant rounded-lg text-on-surface-variant font-label-lg flex items-center justify-center gap-2 hover:bg-surface-container-low transition-colors"><span
                            class="material-symbols-outlined text-sm">add</span> Agregar Producto</button>
                    <div class="pt-4 border-t border-outline-variant flex justify-end">
                        <p class="font-price-display text-price-display text-on-surface">$205.00</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- User Group: María García -->
        <section class="space-y-4 fade-in" style="animation-delay: 0.3s;">
            <div class="flex items-center justify-between px-1">
                <h3 class="font-headline-md text-headline-md text-on-surface">María García</h3>
                <span class="font-price-display text-price-display text-on-surface-variant">$185.00</span>
            </div>
            <div class="space-y-4">
                <!-- Card 1: Pendiente -->
                <div class="bg-surface-container-lowest rounded-xl p-5 border border-outline-variant shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-on-surface-variant">schedule</span>
                            <span
                                class="font-label-lg text-label-lg text-on-surface-variant uppercase tracking-wider bg-surface-container-highest px-2 py-0.5 rounded">Pendiente</span>
                        </div>
                        <span class="text-on-surface-variant text-label-lg">Recién pedido</span>
                    </div>
                    <ul class="space-y-3 mb-6">
                        <li class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-6 h-6 flex items-center justify-center bg-surface-container-high rounded text-sm font-bold">3</span>
                                <span class="font-body-md text-body-md text-on-surface">Tacos de Suadero</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="font-body-md text-on-surface-variant">$135.00</span>
                                <button class="text-on-surface-variant hover:text-error transition-colors p-1"><span
                                        class="material-symbols-outlined text-sm">delete</span></button>
                            </div>
                        </li>
                        <li class="flex justify-between items-center">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-6 h-6 flex items-center justify-center bg-surface-container-high rounded text-sm font-bold">1</span>
                                <span class="font-body-md text-body-md text-on-surface">Refresco de Vidrio</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="font-body-md text-on-surface-variant">$50.00</span>
                                <button class="text-on-surface-variant hover:text-error transition-colors p-1"><span
                                        class="material-symbols-outlined text-sm">delete</span></button>
                            </div>
                        </li>
                    </ul>
                    <button
                        class="w-full py-2 mb-4 border border-dashed border-outline-variant rounded-lg text-on-surface-variant font-label-lg flex items-center justify-center gap-2 hover:bg-surface-container-low transition-colors"><span
                            class="material-symbols-outlined text-sm">add</span> Agregar Producto</button>
                    <div class="pt-4 border-t border-outline-variant flex justify-between items-center">
                        <button class="text-primary font-label-lg flex items-center gap-1 hover:underline">
                            <span class="material-symbols-outlined text-sm">edit</span> Editar
                        </button>
                        <p class="font-price-display text-price-display text-on-surface">$185.00</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Summary Floating Action -->
        <div class="pt-8 pb-12 flex flex-col gap-4">
            <div class="flex justify-between items-center px-2">
                <span class="text-body-lg font-bold text-on-surface">Total de la Mesa</span>
                <span class="text-headline-lg font-bold text-primary">$605.00</span>
            </div>
            <button
                class="w-full bg-primary text-on-primary py-4 rounded-xl font-headline-md flex items-center justify-center gap-3 shadow-lg hover:bg-surface-tint transition-all active:scale-95 duration-100">
                <span class="material-symbols-outlined">payments</span>
                Pedir la Cuenta
            </button>
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
