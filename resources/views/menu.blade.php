<!DOCTYPE html>
<html class="light" lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Chtacos Menu</title>
    <!-- Tipografías e Iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=block"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

</head>

<body class="font-body-md text-on-background selection:bg-primary-fixed selection:text-on-primary-fixed">

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

    <main class="pt-16 pb-24 md:pb-8">
        <section class="px-margin-mobile md:px-margin-desktop py-md">
            <div class="relative w-full h-48 md:h-64 rounded-xl overflow-hidden bg-primary-container shadow-lg">
                <div class="absolute inset-0 z-0 bg-cover bg-center"
                    style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCI2gOQzpT64-tc0nQueMwQbmasMRiw2bEOUAKf6BPmlqxAniv1i2Fd6C9EygVw5LFXDVHfe2dLRhB82vlk6Mx_30emZ5jXuPFBSTblg3ZI2r_DFSaidLV--qZt01eyG3vZ0_SlBVv-7IeVYWBS_NRBZmFMIUrahEZcjReQpf5nkeSYYac06GmZ5Bc4wUNHeVoOm-qSgSDowxZ8frW2RWEDSiU0LP83v-UfoWGz3bJ1qA8Z0rLuS5t1lA')">
                </div>
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent z-10"></div>
                <div class="relative z-20 h-full flex flex-col justify-center p-md text-white max-w-lg">
                    <h2 class="font-headline-xl text-headline-xl mb-xs">El auténtico sabor </h2>
                    <p class="font-body-lg text-body-lg text-primary-fixed opacity-90">Ingredientes frescos, recetas
                        tradicionales</p>
                </div>
            </div>
        </section>

        {{-- <section class="px-margin-mobile md:px-margin-desktop mb-md max-w-screen-xl mx-auto">
            <div class="relative flex items-center group">
                <span
                    class="material-symbols-outlined absolute left-4 text-outline group-focus-within:text-secondary">search</span>
                <input
                    class="w-full bg-surface-container-low border-none rounded-full py-4 pl-12 pr-4 focus:ring-2 focus:ring-secondary-container font-body-md transition-all shadow-sm"
                    placeholder="¿Qué se te antoja hoy?" type="text">
            </div>
        </section> --}}

        <div class="flex flex-col items-center gap-2 mb-6 px-4 ">

            <div class="flex flex-row justify-center gap-2 w-full">
                <div class="flex flex-col">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Mesa</label>
                    <div class="relative w-80">
                        <select
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-2 px-6 font-body-md focus:ring-2 focus:ring-primary appearance-none">
                            <option>Mesa 1</option>
                            <option>Mesa 2</option>
                            <option>Mesa 3</option>
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
                    </div>
                </div>

                <div class="relative w-80" id="user-search-container">
                    <label for="user-search-input"
                        class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Usuario</label>
                    <div class="relative">
                        <input type="text" id="user-search-input" placeholder="Buscar nombre..."
                            class="w-full px-4 py-2 border border-outline rounded-lg bg-surface focus:outline-none focus:ring-2 focus:ring-primary transition-all">
                    </div>
                </div>
            </div>

            <div class="flex flex-col w-full items-center">
                <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Preparación</label>
                <div class="relative w-80">
                    <select
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-2 px-6 font-body-md focus:ring-2 focus:ring-primary appearance-none">
                        <option value="0" disabled selected hidden>Selecciona la preparación</option>
                        <option>Con Todo</option>
                        <option>Natural(Sin Nada)</option>
                        <option>C/Cebolla</option>
                        <option>C/Cilantro</option>
                        <option>C/Cebolla Asada</option>
                    </select>
                    <span
                        class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
                </div>
            </div>

        </div>

        <section id="category-filters"
            class="px-4 md:px-margin-desktop mb-md overflow-x-auto hide-scrollbar whitespace-nowrap flex gap-sm max-w-screen-xl mx-auto">
            <button data-category="todos"
                class="active-tab px-gutter py-2 rounded-full bg-primary text-on-primary font-label-lg text-label-lg shadow-md">Todos</button>

            @foreach ($categories as $category)
                <button data-category="{{ str($category->category_name)->slug() }}"
                    class="px-gutter py-2 rounded-full border border-outline text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-container-high transition-colors min-w-max">
                    {{ $category->category_name }}
                </button>
            @endforeach
        </section>

        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row gap-lg px-margin-mobile md:px-margin-desktop">

            <div class="max-w-screen-xl mx-auto px-margin-mobile md:px-margin-desktop py-md">
                <div id="product-grid" class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-2 gap-4">

                    @foreach ($products as $product)
                        @php
                            $catName = $product->categoria ? $product->categoria->category_name : 'sin-categoria';
                        @endphp

                        <div class="product-card" data-category="{{ \Illuminate\Support\Str::slug($catName) }}">
                            <div
                                class="bg-surface-container-lowest rounded-2xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-all duration-300 active:scale-[0.98] cursor-pointer flex flex-col h-[380px] border border-outline/10">

                                <div class="h-[160px] w-full overflow-hidden relative bg-surface-container-high">
                                    <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                        src="{{ $product->imagen_ruta ? asset($product->imagen_ruta) : asset('assets/img/loading.jpg') }}"
                                        alt="{{ $product->name }}">
                                </div>

                                <div class="p-sm flex flex-col justify-between flex-grow">
                                    <div>
                                        <h3 class="font-headline-md text-headline-md text-on-surface truncate">
                                            {{ $product->name }}</h3>
                                        <p
                                            class="font-body-md text-body-md text-on-surface-variant line-clamp-3 mt-xs leading-relaxed">
                                            {{ $product->description ?? 'Sin descripción disponible.' }}
                                        </p>
                                    </div>

                                    <div
                                        class="flex justify-between items-center mt-sm pt-xs border-t border-outline/5">
                                        <span
                                            class="font-price-display text-price-display text-secondary font-bold text-xl">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                        <button
                                            class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-md hover:bg-primary-container hover:scale-105 transition-all"
                                            data-action="add-to-cart" data-id="{{ $product->id }}">
                                            <span class="material-symbols-outlined text-xl">add</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <aside class="block">
                <div class="sticky top-24 bg-surface-container rounded-xl p-md shadow-sm border border-outline-variant">
                    <div class="flex items-center gap-xs mb-md border-b border-outline-variant pb-xs">
                        <span class="material-symbols-outlined text-primary">receipt_long</span>
                        <h4 class="font-headline-md text-headline-md">Tu Orden</h4>
                    </div>
                    <div class="space-y-md max-h-[400px] overflow-y-auto mb-md hide-scrollbar">
                        <div class="flex justify-between items-center group">
                            <div>
                                <p class="font-label-lg text-label-lg text-on-surface">Alambre Especial</p>
                                <p class="text-xs text-on-surface-variant">$160.00</p>
                            </div>
                            <div class="flex items-center gap-xs bg-surface-container-highest rounded-full px-2 py-1">
                                <button
                                    class="w-6 h-6 rounded-full hover:bg-outline-variant flex items-center justify-center text-on-surface-variant">-</button>
                                <span class="font-label-lg px-1">1</span>
                                <button
                                    class="w-6 h-6 rounded-full hover:bg-outline-variant flex items-center justify-center text-on-surface-variant">+</button>
                            </div>
                        </div>
                        <div class="flex justify-between items-center group">
                            <div>
                                <p class="font-label-lg text-label-lg text-on-surface">Refresco 600ml</p>
                                <p class="text-xs text-on-surface-variant">$35.00</p>
                            </div>
                            <div class="flex items-center gap-xs bg-surface-container-highest rounded-full px-2 py-1">
                                <button
                                    class="w-6 h-6 rounded-full hover:bg-outline-variant flex items-center justify-center text-on-surface-variant">-</button>
                                <span class="font-label-lg px-1">2</span>
                                <button
                                    class="w-6 h-6 rounded-full hover:bg-outline-variant flex items-center justify-center text-on-surface-variant">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="border-t-2 border-dashed border-outline-variant pt-md space-y-sm">
                        <div class="flex justify-between text-on-surface-variant">
                            <span class="font-body-md text-body-md">Subtotal</span>
                            <span class="font-body-md text-body-md">$230.00</span>
                        </div>
                        <div class="flex justify-between items-center pt-xs">
                            <span class="font-headline-md text-headline-md">Total</span>
                            <span class="font-headline-md text-headline-md text-primary">$230.00</span>
                        </div>
                        <button
                            class="w-full bg-primary text-on-primary font-label-lg text-label-lg py-4 rounded-xl shadow-lg hover:bg-primary-container active:scale-95 transition-all mt-md">
                            Confirmar Pedido
                        </button>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <nav
        class="fixed bottom-0 left-0 w-full z-50 flex justify-around items-center px-gutter pb-4 pt-2 bg-surface dark:bg-surface-dim shadow-[0_-4px_20px_rgba(0,0,0,0.05)] rounded-t-xl">
        <a class="flex flex-col items-center justify-center bg-primary-container dark:bg-primary text-on-primary-container dark:text-on-primary rounded-full px-4 py-1 active:scale-90 transition-all duration-200"
            href="{{ route('menu') }}">
            <span class="material-symbols-outlined" data-icon="restaurant">restaurant</span>
            <span class="font-label-lg text-label-lg">Menú</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-on-surface-variant px-4 py-1 hover:bg-surface-container-high transition-colors active:scale-90 duration-200"
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

    <script defer src="{{ asset('assets/js/tallwind-config.js') }}"></script>
    <script src="{{ asset('assets/js/menu.js') }}"></script>
</body>

</html>
