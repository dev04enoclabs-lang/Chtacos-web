@extends('layouts.app')

@section('title', "Ch'Tacos - Menú")

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
@endpush

@section('content')
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

        <div class="flex flex-col items-center gap-4 mb-6 px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full max-w-2xl">

                <div class="flex flex-col w-full">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Mesa</label>
                    <div class="relative w-full">
                        <select id="select-mesa"
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-2 px-6 font-body-md focus:ring-2 focus:ring-primary appearance-none"
                            required>
                            <option value="" disabled selected hidden>Selecciona una mesa</option>
                            <option value="Mesa 1">Mesa 1</option>
                            <option value="Mesa 2">Mesa 2</option>
                            <option value="Mesa 3">Mesa 3</option>
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
                    </div>
                </div>

                <div class="flex flex-col w-full" id="user-search-container">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Usuario</label>
                    <div class="relative w-full">
                        <select id="select-usuario"
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-2 px-6 font-body-md focus:ring-2 focus:ring-primary appearance-none"
                            required>
                            <option value="" disabled selected hidden>Seleccion de Usuario</option>
                            <option value="Adulto">Adulto</option>
                            <option value="Adulta">Adulta</option>
                            <option value="Adolecente">Adolecente</option>
                            <option value="Niño">Niño</option>
                            <option value="Niña">Niña</option>
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
                    </div>
                </div>

                <div class="flex flex-col w-full sm:col-span-2 md:col-span-1">
                    <label class="block font-label-lg text-label-lg text-on-surface-variant mb-2">Preparación</label>
                    <div class="relative w-full">
                        <select id="select-preparacion"
                            class="w-full bg-surface-container-lowest border border-outline-variant rounded-lg py-2 px-6 font-body-md focus:ring-2 focus:ring-primary appearance-none"
                            required>
                            <option value="" disabled selected hidden>Selecciona la preparación</option>
                            <option value="Con Todo">Con Todo</option>
                            <option value="Natural(Sin Nada)">Natural(Sin Nada)</option>
                            <option value="C/Cebolla">C/Cebolla</option>
                            <option value="C/Cilantro">C/Cilantro</option>
                            <option value="C/Cebolla Asada">C/Cebolla Asada</option>
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
                    </div>
                </div>
            </div>
        </div>

        <section id="category-filters"
            class="px-4 md:px-margin-desktop mb-md overflow-x-auto hide-scrollbar whitespace-nowrap flex justify-start md:justify-center gap-sm max-w-screen-xl mx-auto">
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
                                    <div class="flex justify-between items-center mt-sm pt-xs border-t border-outline/5">
                                        <span
                                            class="font-price-display text-price-display text-secondary font-bold text-xl">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                        <button
                                            class="relative w-10 h-10 bg-primary text-on-primary rounded-full flex items-center justify-center shadow-md hover:bg-primary-container hover:scale-105 transition-all"
                                            data-action="add-to-cart" data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}">
                                            <span class="material-symbols-outlined text-xl">add</span>
                                            <span
                                                class="product-qty-badge hidden absolute -top-1 -right-1 bg-red-600 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center border-2 border-white shadow">0</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="noProductId" class="hidden text-center py-8 text-on-surface-variant">
                    <p class="text-sm font-medium">Sin productos en esta categoría</p>
                </div>
            </div>
            <aside class="block">
                <div class="sticky top-24 bg-surface-container rounded-xl p-md shadow-sm border border-outline-variant">
                    <div class="flex items-center gap-xs mb-md border-b border-outline-variant pb-xs">
                        <span class="material-symbols-outlined text-primary">receipt_long</span>
                        <h4 class="font-headline-md text-headline-md">Tu Orden</h4>
                    </div>

                    {{-- Resumen de Mesa, Usuario y Preparación --}}
                    <div id="order-meta-summary"
                        class="hidden mb-md p-2 bg-surface-container-high rounded-lg text-xs space-y-1 text-on-surface-variant border border-outline-variant/50">
                        <p><strong>Mesa:</strong> <span id="summary-mesa">-</span></p>
                        <p><strong>Usuario:</strong> <span id="summary-usuario">-</span></p>
                        <p><strong>Preparación:</strong> <span id="summary-prep">-</span></p>
                    </div>
                    {{-- Muestra si no hay un producto seleccionado --}}
                    <div class="space-y-md max-h-[400px] overflow-y-auto mb-md hide-scrollbar">
                        <div id="cart-modal-container"
                            class="space-y-md max-h-[400px] overflow-y-auto mb-md hide-scrollbar">
                            <p class="text-center text-xs text-on-surface-variant py-4">No hay productos en la orden
                            </p>
                        </div>
                    </div>

                    <div class="border-t-2 border-dashed border-outline-variant pt-md space-y-sm">
                        <div class="flex justify-between items-center pt-xs">
                            <span class="font-headline-md text-headline-md">Total</span>
                            <span id="cart-total-price" class="font-headline-md text-headline-md text-primary">$0.00</span>
                        </div>
                        <button id="btn-confirm-order"
                            class="w-full bg-primary text-on-primary font-label-lg text-label-lg py-4 rounded-xl shadow-lg hover:bg-primary-container active:scale-95 transition-all mt-md">
                            Confirmar Pedido
                        </button>
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/menu.js') }}"></script>
@endpush
