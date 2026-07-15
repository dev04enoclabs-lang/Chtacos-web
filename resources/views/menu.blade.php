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

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

</head>

<body class="font-body-md text-on-background selection:bg-primary-fixed selection:text-on-primary-fixed">

    <!-- TopAppBar -->
    <header
        class="w-full top-0 sticky z-50 bg-background dark:bg-surface-dim border-b border-outline-variant dark:border-outline shadow-sm h-19">
        <div
            class="flex items-center justify-between px-margin-mobile md:px-margin-desktop h-full w-full max-w-7xl mx-auto">
            <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-primary dark:text-primary-fixed-dim"
                    style="font-size: 28px;">restaurant_menu</span>
                <h1 class="font-headline-xl text-headline-xl text-primary dark:text-primary-fixed-dim tracking-tight">
                    Sabor y Brasa</h1>
            </div>
            <div class="flex items-center gap-4">
                <div
                    class="w-10 h-10 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container font-bold overflow-hidden">
                    <img class="w-full h-full object-cover" alt="Mesero Sabor y Brasa"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYK3d9YK3-yQ-CiV3aNPMwK6UBcW_tU7M2ZspV5QR_uMbwb6kR_T4LDRZZDvm7IGA4Eu1gShE-Xg8O5nD4hPpreI2syJ4z8kPn8z65oZncFmI6Fda7K8w03R5s6Fm81MQUxyCH15eYg9mKFCtqyR_g8R2RHbZaP9fJfXJYqcN6mWe1s6KRbC3YXNWniU3xjVdQ0ncadVyq12ZjnHSfYsd2iIoITl-K4hv9cZnqtHSyAje0LZh47ewtSw" />
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
                    <h2 class="font-headline-xl text-headline-xl mb-xs">El auténtico sabor del fogón.</h2>
                    <p class="font-body-lg text-body-lg text-primary-fixed opacity-90">Ingredientes frescos, recetas
                        tradicionales y el toque de Sabor y Brasa.</p>
                </div>
            </div>
        </section>

        <section class="px-margin-mobile md:px-margin-desktop mb-md max-w-screen-xl mx-auto">
            <div class="relative flex items-center group">
                <span
                    class="material-symbols-outlined absolute left-4 text-outline group-focus-within:text-secondary">search</span>
                <input
                    class="w-full bg-surface-container-low border-none rounded-full py-4 pl-12 pr-4 focus:ring-2 focus:ring-secondary-container font-body-md transition-all shadow-sm"
                    placeholder="¿Qué se te antoja hoy?" type="text">
            </div>
        </section>

        <section
            class="px-margin-mobile md:px-margin-desktop mb-md overflow-x-auto hide-scrollbar whitespace-nowrap flex gap-sm max-w-screen-xl mx-auto">
            <button
                class="active-tab px-gutter py-2 rounded-full bg-primary text-on-primary font-label-lg text-label-lg shadow-md">Todos</button>
            <button
                class="px-gutter py-2 rounded-full border border-outline text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-container-high transition-colors">Tacos</button>
            <button
                class="px-gutter py-2 rounded-full border border-outline text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-container-high transition-colors">Alambres</button>
            <button
                class="px-gutter py-2 rounded-full border border-outline text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-container-high transition-colors">Volcanes</button>
            <button
                class="px-gutter py-2 rounded-full border border-outline text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-container-high transition-colors">Gringas</button>
            <button
                class="px-gutter py-2 rounded-full border border-outline text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-container-high transition-colors">Sincronizadas</button>
            <button
                class="px-gutter py-2 rounded-full border border-outline text-on-surface-variant font-label-lg text-label-lg hover:bg-surface-container-high transition-colors">Bebidas</button>
        </section>

        <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row gap-lg px-margin-mobile md:px-margin-desktop">
            <div
                class="w-full mb-md flex flex-col sm:flex-row gap-md bg-surface-container-low p-md rounded-xl border border-outline-variant">
                <div class="flex-grow">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-xs">Mesa</label>
                    <div class="relative">
                        <select
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-2 px-4 font-body-md focus:ring-2 focus:ring-primary appearance-none">
                            <option>Mesa 1</option>
                            <option>Mesa 2</option>
                            <option>Mesa 3</option>
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
                    </div>
                </div>
                <div class="flex-grow">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-xs">Agrega al
                        Usuario</label>
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-2 px-4 font-body-md focus:ring-2 focus:ring-primary"
                        placeholder="Nombre o # de comensal" type="text">
                </div>
            </div>

            <section class="flex-grow">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-md">
                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Alambre Especial" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Alambre Especial</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Res, tocino,
                                pimiento, cebolla y quesillo fundido de alta calidad.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$160.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Tacos al Pastor" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Tacos al Pastor</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Orden de 3
                                tacos con piña, cilantro y cebolla recién cortados.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Tacos al Pastor" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Tacos de Bistc</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Orden de 3
                                tacos de bistec, cilantro y cebolla recién cortados.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Tacos al Pastor" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Tacos de Suadero</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Orden de 3
                                tacos de Suadero, cilantro y cebolla recién cortados.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>


                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Tacos al Pastor" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Tacos de Longaniza</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Orden de 3
                                tacos de Longaniza, cilantro y cebolla recién cortados.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>


                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Tacos al Pastor" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Tacos de Campechano</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Orden de 3
                                tacos de campechano, cilantro y cebolla recién cortados.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Volcan de Chorizo" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Volcan de Pastor</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla
                                dorada al comal con Pastor y costra de queso.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Volcan de Chorizo" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Volcan de Bistec</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla
                                dorada al comal con Bistec y costra de queso.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Volcan de Chorizo" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Volcan de Suadero</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla
                                dorada al comal con Suadero y costra de queso.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Volcan de Chorizo" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Volcan de Longaniza</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla
                                dorada al comal con Longaniza y costra de queso.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Volcan de Chorizo" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Volcan de Campechano</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla
                                dorada al comal con Campechano y costra de queso.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$45.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Gringa Especial" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Gringa Pastor</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla de
                                harina con pastor y extra queso fundido.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$95.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Gringa Especial" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Sincronizada Bistec</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla de
                                harina con bistec y extra queso fundido.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$95.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Gringa Especial" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Gringa Suadero</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla de
                                harina con Suadero y extra queso fundido.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$95.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Gringa Especial" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Gringa Longaniza</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla de
                                harina con Longaniza y extra queso fundido.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$95.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Gringa Especial" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Gringa Campechano</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Tortilla de
                                harina con Campechano y extra queso fundido.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$95.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>


                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Refresco" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Refresco 600ml</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Variedad de
                                sabores clásicos bien fríos para acompañar.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$35.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div
                        class="bg-surface-container-lowest rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,0,0,0.05)] group transition-transform active:scale-95 duration-200 cursor-pointer">
                        <div class="h-40 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Sincronizada" src="{{ asset('assets/img/loading.jpg') }}">
                        </div>
                        <div class="p-sm relative">
                            <h3 class="font-headline-md text-headline-md text-on-surface">Sincronizada Gigante</h3>
                            <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-xs">Jamón
                                premium y mezcla de quesos en tortilla de harina.</p>
                            <div class="flex justify-between items-end mt-md">
                                <span class="font-price-display text-price-display text-secondary">$70.00</span>
                                <button
                                    class="w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-lg hover:bg-primary-container transition-colors"
                                    data-action="add-to-cart">
                                    <span class="material-symbols-outlined">add</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <aside class="hidden lg:block">
                <div
                    class="sticky top-24 bg-surface-container rounded-xl p-md shadow-sm border border-outline-variant">
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
</body>

</html>
