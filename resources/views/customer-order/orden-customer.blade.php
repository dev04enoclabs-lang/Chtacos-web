<!DOCTYPE html>
<html class="light" lang="es-mx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', "Ch'Tacos - Pedido")</title>

    <link rel="preconnect" href="http://cdnjs.Cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="http://cdnjs.Cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/swap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/orden-customer.css') }}">

    @stack('styles')

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body class="bg-surface text-on-surface min-h-screen pb-24">

    <header
        class="w-full top-0 sticky z-50 bg-background dark:Fbg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-19">
        <div class="flex items-center justify-between pl-[24px] pr-margin-mobile md:pr-margin-desktop h-full w-full">
            <div class="flex items-center gap-6">
                <i class="fa-solid fa-utensils text-primary dark:text-primary-fixed-dim text-2xl"></i>

                <h1 class="font-headline-xl text-headline-xl text-primary dark:text-primary-fixed-dim tracking-tight">
                    Ch'Tacos
                </h1>
            </div>
        </div>
    </header>

    <div class="flex h-[calc(100vh-64px)] overflow-hidden bg-[#faf8f5] text-stone-800">

        <!-- BARRA LATERAL: Categorías -->
        <aside class="w-20 border-r border-stone-200 bg-white flex flex-col items-center py-4 space-y-6 shadow-sm">

            <nav class="flex flex-col space-y-4 w-full px-2">
                <button
                    class="flex flex-col items-center justify-center p-2 rounded-xl bg-[#a01c30] text-white text-xs font-semibold shadow-sm">
                    <i class="fa-solid fa-border-all text-base mb-1"></i>
                    TODOS
                </button>
                <button
                    class="flex flex-col items-center justify-center p-2 rounded-xl text-stone-600 hover:bg-stone-100 text-xs transition-colors">
                    <i class="fa-solid fa-drumstick-bite text-base mb-1"></i>
                    TACOS
                </button>
                <button
                    class="flex flex-col items-center justify-center p-2 rounded-xl text-stone-600 hover:bg-stone-100 text-xs transition-colors">
                    <i class="fa-solid fa-burger text-base mb-1"></i>
                    TORTAS
                </button>
                <button
                    class="flex flex-col items-center justify-center p-2 rounded-xl text-stone-600 hover:bg-stone-100 text-xs transition-colors">
                    <i class="fa-solid fa-whiskey-glass text-base mb-1"></i>
                    BEBIDAS
                </button>
            </nav>
        </aside>

        <!-- ÁREA PRINCIPAL: Rejilla de Platillos -->
        <main class="flex-1 overflow-y-auto p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                <!-- Card: Producto Disponible -->
                <div class="hud-card group">
                    <div class="relative h-36 w-full overflow-hidden rounded-t-lg bg-stone-100">
                        <img src="https://images.unsplash.com/photo-1565299585323-38d6b0865b47?auto=format&fit=crop&w=400&q=80"
                            alt="Tacos al Pastor"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-3 bg-white border-t border-stone-200 rounded-b-lg">
                        <h3 class="font-bold text-sm text-stone-900">Tacos al Pastor</h3>
                        <p class="text-xs text-stone-500 truncate mt-0.5">Carne de cerdo adobada, piña, cilantro y
                            cebolla</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-sm font-bold text-[#a01c30]">$18.00</span>
                            <button
                                class="bg-[#a01c30] hover:bg-[#801424] text-white text-xs px-2.5 py-1 rounded-md font-medium transition-colors">
                                + Agregar
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card: Producto No Disponible -->
                <div class="hud-card relative opacity-60 cursor-not-allowed">
                    <div class="relative h-36 w-full overflow-hidden rounded-t-lg bg-stone-200">
                        <img src="https://images.unsplash.com/photo-1551504734-5ee1c4a1479b?auto=format&fit=crop&w=400&q=80"
                            alt="Gringa de Suadero" class="w-full h-full object-cover grayscale">
                        <div class="absolute inset-0 bg-stone-900/40 flex items-center justify-center">
                            <span
                                class="text-xs font-bold uppercase tracking-wider text-white border border-stone-300 bg-stone-800/80 px-2 py-1 rounded">Agotado</span>
                        </div>
                    </div>
                    <div class="p-3 bg-white border-t border-stone-200 rounded-b-lg">
                        <h3 class="font-bold text-sm text-stone-500">Gringa de Suadero</h3>
                        <p class="text-xs text-stone-400 truncate mt-0.5">Tortilla de harina, queso asadero y suadero
                        </p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="text-sm font-bold text-stone-400">$35.00</span>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <!-- PANEL DERECHO: Resumen de Pedido / Carrito -->
        <aside class="w-80 border-l border-stone-200 bg-white flex flex-col justify-between shadow-sm">

            <!-- Header del Carrito -->
            <div class="p-4 border-b border-stone-200 flex items-center justify-between bg-[#faf8f5]">
                <div>
                    <h2 class="font-bold text-sm text-stone-900">Mesa #01</h2>
                    <span class="text-xs text-stone-500">Orden: #0056</span>
                </div>
                <span
                    class="bg-[#a01c30]/10 text-[#a01c30] border border-[#a01c30]/20 text-xs px-2 py-0.5 rounded-full font-semibold">
                    3 Items
                </span>
            </div>

            <!-- Lista de Productos Agregados -->
            <div class="flex-1 overflow-y-auto p-4 space-y-3">

                <!-- Item 1 -->
                <div class="flex items-center justify-between bg-[#faf8f5] p-2.5 rounded-lg border border-stone-200">
                    <img src="https://images.unsplash.com/photo-1565299585323-38d6b0865b47?auto=format&fit=crop&w=100&q=80"
                        class="w-10 h-10 object-cover rounded">
                    <div class="flex-1 min-w-0 mx-2">
                        <h4 class="text-xs font-bold text-stone-800 truncate">Tacos al Pastor</h4>
                        <span class="text-xs text-[#a01c30] font-semibold">$54.00</span>
                    </div>
                    <div class="flex items-center space-x-1 bg-white rounded border border-stone-300 p-0.5">
                        <button
                            class="w-5 h-5 flex items-center justify-center text-xs text-stone-600 hover:bg-stone-100 rounded">-</button>
                        <span class="text-xs font-bold text-stone-800 px-1">3</span>
                        <button
                            class="w-5 h-5 flex items-center justify-center text-xs text-stone-600 hover:bg-stone-100 rounded">+</button>
                    </div>
                </div>

            </div>

            <!-- Footer / Totales y Botón de Envío -->
            <div class="p-4 border-t border-stone-200 bg-[#faf8f5] space-y-3">
                <div class="space-y-1 text-xs">
                    <div class="flex justify-between text-stone-500">
                        <span>Subtotal</span>
                        <span class="text-stone-800 font-medium">$54.00</span>
                    </div>
                    <div class="flex justify-between text-stone-500">
                        <span>IVA (16%)</span>
                        <span class="text-stone-800 font-medium">$8.64</span>
                    </div>
                    <div class="flex justify-between text-sm font-bold text-stone-900 pt-2 border-t border-stone-200">
                        <span>Total</span>
                        <span class="text-[#a01c30]">$62.64</span>
                    </div>
                </div>

                <button id="sendOrderBtn"
                    class="w-full bg-[#a01c30] hover:bg-[#801424] text-white font-bold py-2.5 px-4 rounded-lg text-xs transition-colors flex items-center justify-center gap-2 shadow-sm">
                    <i class="fa-brands fa-whatsapp text-sm"></i>
                    ENVIAR PEDIDO
                </button>
            </div>

        </aside>

    </div>

    <main>
        @yield('content')
    </main>
    <script src="{{ asset('assets/js/tallwind-config.js') }}" defer></script>
    @stack('scripts')
</body>

</html>
