<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Chtacos Carrito</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">

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

    <main
        class="max-w-screen-xl mx-auto px-margin-mobile md:px-margin-desktop py-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8 space-y-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Tu Carrito</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Revisa tus deliciosas elecciones antes
                        de confirmar.</p>
                </div>
                <a class="hidden md:flex items-center gap-2 text-primary font-label-lg hover:underline transition-all"
                    href="#">
                    <span class="material-symbols-outlined" data-icon="arrow_back">arrow_back</span>
                    Seguir comprando
                </a>
            </div>

            <div class="space-y-4">
                <div class="flex items-center gap-2 mb-4 pb-2 border-b border-outline-variant/30">
                    <span class="material-symbols-outlined text-primary">table_restaurant</span>
                    <span class="font-label-lg text-on-surface">Mesa 4 - Pedido de: <span class="font-bold">Juan Pérez
                            (Tú)</span></span>
                </div>

                <div
                    class="cart-item-enter bg-surface-container-low p-4 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] flex items-center gap-4 group">
                    <div class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0">
                        <img class="w-full h-full object-cover" alt="Tacos al Pastor"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsJK1lzh20Hy3hzDhtyTd4uCNt45797Oi54vjZjnu3-MIZr_J2-5d_1l5V1H4tQca_W1Apjyr6Nh_rbMJq5rCbBoa6tCJC3naxsNL8M6TDoNCvRKBc8seM7oBPXWRrTXonOkAg4A3UjwBc93F09mpy6zYWB0wJu1lQ8lIHdIO143JJoxmMqMjxKY0QlBQqRrT7Ad3qd2FUZaWc-E9QwakhV9fbcLxZX5LuuEJWvx1nCuEuHQxMH-r_5g">
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Tacos al Pastor (Orden)</h3>
                            <button class="text-outline hover:text-error transition-colors">
                                <span class="material-symbols-outlined" data-icon="delete">delete</span>
                            </button>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant line-clamp-1">Con piña, cilantro,
                            cebolla y salsa especial de la casa.</p>
                        <div class="flex justify-between items-center mt-3">
                            <div class="flex items-center bg-surface-container-high rounded-full px-2 py-1">
                                <button
                                    class="w-8 h-8 flex items-center justify-center text-primary active:scale-90 transition-all">
                                    <span class="material-symbols-outlined" data-icon="remove">remove</span>
                                </button>
                                <span class="px-4 font-label-lg">2</span>
                                <button
                                    class="w-8 h-8 flex items-center justify-center text-primary active:scale-90 transition-all">
                                    <span class="material-symbols-outlined" data-icon="add">add</span>
                                </button>
                            </div>
                            <span class="font-price-display text-price-display text-secondary">$170.00</span>
                        </div>
                    </div>
                </div>

                <div class="cart-item-enter bg-surface-container-low p-4 rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.05)] flex items-center gap-4 group"
                    style="animation-delay: 0.1s;">
                    <div class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0">
                        <img class="w-full h-full object-cover" alt="Agua de Horchata"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCST-6QNmrzZXvRd80M3ysQl8ecOmCQ_IPQvJvLlsYpvA3RPkDelGNZPTg8tzAD9ZQ_R72LrqvkZ9L4gp7p2OB-nfBTvDbTGMuRDjKbGcSqT1pVQAlqs5QJg5hQEWdcXEEvUOCoRI7cKOUFvVBWXcLUz6VqRxO3nYXQSAu3BDyaAQXPjmfLHgu_6ATpeFClXVqCCmKL-rgeeSUG0Nu2400jgcDT2e_Q3ugGxWnSBHAwW4GM3qo0cwLb_w">
                    </div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Agua de Horchata Grande</h3>
                            <button class="text-outline hover:text-error transition-colors">
                                <span class="material-symbols-outlined" data-icon="delete">delete</span>
                            </button>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant line-clamp-1">Receta tradicional con
                            un toque de canela artesanal.</p>
                        <div class="flex justify-between items-center mt-3">
                            <div class="flex items-center bg-surface-container-high rounded-full px-2 py-1">
                                <button
                                    class="w-8 h-8 flex items-center justify-center text-primary active:scale-90 transition-all">
                                    <span class="material-symbols-outlined" data-icon="remove">remove</span>
                                </button>
                                <span class="px-4 font-label-lg">1</span>
                                <button
                                    class="w-8 h-8 flex items-center justify-center text-primary active:scale-90 transition-all">
                                    <span class="material-symbols-outlined" data-icon="add">add</span>
                                </button>
                            </div>
                            <span class="font-price-display text-price-display text-secondary">$45.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-surface-container p-6 md:p-8 rounded-xl space-y-6">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary" data-icon="person">person</span>
                    <h3 class="font-headline-md text-headline-md">Datos del Pedido</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="font-label-lg text-on-surface-variant" for="name_customer">Nombre Completo</label>
                        <input
                            class="w-full bg-transparent border-b-2 border-outline-variant focus:border-secondary outline-none py-2 transition-colors font-body-md"
                            id="name_customer" placeholder="Ej. Juan Pérez" type="text">
                    </div>
                    <div class="space-y-2">
                        <label class="font-label-lg text-on-surface-variant" for="email">Correo Electrónico</label>
                        <input
                            class="w-full bg-transparent border-b-2 border-outline-variant focus:border-secondary outline-none py-2 transition-colors font-body-md"
                            id="email" placeholder="juan@ejemplo.com" type="email">
                    </div>
                </div>
                <div class="pt-2">
                    <p class="font-body-md text-body-md text-on-surface-variant italic">Te enviaremos el ticket y el
                        estado de tu pedido a este correo.</p>
                </div>
            </div>

            <div class="bg-surface-container p-6 md:p-8 rounded-xl space-y-6 mt-8">
                <div class="flex items-center gap-3">
                    <span class="material-symbols-outlined text-primary">payments</span>
                    <h3 class="font-headline-md text-headline-md">Método de Pago</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label
                        class="flex items-center gap-4 p-4 rounded-xl border-2 border-primary bg-primary-container/10 cursor-pointer">
                        <input checked="" class="text-primary focus:ring-primary" name="payment_type"
                            type="radio" value="user">
                        <div>
                            <p class="font-label-lg">Pago por Usuario</p>
                            <p class="text-sm text-on-surface-variant">Pagas solo lo que tú pediste</p>
                        </div>
                    </label>
                    <label
                        class="flex items-center gap-4 p-4 rounded-xl border border-outline-variant hover:bg-surface-container-high cursor-pointer transition-colors">
                        <input class="text-primary focus:ring-primary" name="payment_type" type="radio"
                            value="table">
                        <div>
                            <p class="font-label-lg">Pago Total de Mesa</p>
                            <p class="text-sm text-on-surface-variant">Pagas la cuenta completa</p>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <aside class="lg:col-span-4">
            <div class="sticky top-24 space-y-6">
                <div class="bg-surface-container-high p-6 rounded-xl shadow-lg border border-outline-variant/30">
                    <h3 class="font-headline-md text-headline-md mb-6">Resumen</h3>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center text-on-surface-variant">
                            <span class="font-body-md">Mesa / Usuario</span>
                            <span class="font-label-lg">Mesa 4 / Juan P.</span>
                        </div>
                        <div class="flex justify-between items-center text-on-surface-variant">
                            <span class="font-body-md">Modo de Pago</span>
                            <span class="font-label-lg">Individual</span>
                        </div>
                        <div class="h-px bg-outline-variant my-2"></div>
                        <div class="flex justify-between items-center text-on-surface-variant">
                            <span class="font-body-md">Tus artículos (3)</span>
                            <span class="font-label-lg">$215.00</span>
                        </div>
                        <div class="flex justify-between items-center text-on-surface-variant">
                            <span class="font-body-md">Envío / Servicio</span>
                            <span class="font-label-lg text-tertiary">GRATIS</span>
                        </div>
                        <div class="h-px bg-outline-variant my-4"></div>
                        <div class="flex justify-between items-center">
                            <span class="font-headline-md text-headline-md">Tu Total</span>
                            <span class="font-headline-md text-headline-md text-primary">$215.00</span>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <button
                            class="w-full bg-primary text-on-primary font-label-lg py-4 rounded-full shadow-lg hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                            Pago en Efectivo
                            <span class="material-symbols-outlined" data-icon="check_circle">check_circle</span>
                        </button>
                        <button
                            class="w-full md:hidden border-2 border-primary text-primary font-label-lg py-4 rounded-full hover:bg-primary-container active:scale-[0.98] transition-all">
                            Pago por tarjeta 
                        </button>
                    </div>
                    <div class="mt-6 flex items-center justify-center gap-4 opacity-60">
                        <span class="material-symbols-outlined text-sm" data-icon="lock">lock</span>
                        <span class="text-[12px] font-label-lg uppercase tracking-widest">Pago Seguro</span>
                    </div>
                </div>
            </div>
        </aside>
    </main>

    <nav
        class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-gutter pb-4 pt-2 bg-surface dark:bg-surface-dim shadow-[0_-4px_20px_rgba(0,0,0,0.05)] rounded-t-xl">
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-200"
            href="{{ route('menu') }}">
            <span class="material-symbols-outlined" data-icon="restaurant">restaurant</span>
            <span class="font-label-lg text-label-lg">Menú</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-200"
            href="{{ route('orders') }}">
            <span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
            <span class="font-label-lg text-label-lg">Mis Pedidos</span>
        </a>
        <a class="flex flex-col items-center justify-center bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-full px-4 py-1 active:scale-90 transition-all duration-200"
            href="{{ route('cart') }}">
            <span class="material-symbols-outlined" data-icon="shopping_cart"
                style="font-variation-settings: 'FILL' 1;">shopping_cart</span>
            <span class="font-label-lg text-label-lg">Carrito</span>
        </a>
    </nav>

    <!-- Scripts de la Aplicación -->
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="{{ asset('assets/js/tallwind-config.js') }}"></script>
</body>

</html>
