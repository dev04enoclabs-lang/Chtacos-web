@extends('layouts.app')

@section('title', "Ch'Tacos - Pedidos")

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/orders.css') }}">
@endpush

@section('content')
    <main class="max-w-3xl mx-auto px-margin-mobile mt-6 space-y-8">

        <section class="fade-in" style="animation-delay: 0.1s;">
            <div
                class="bg-surface-container-low rounded-xl p-4 flex items-center justify-between shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-outline-variant">

                <div class="flex items-center gap-3">
                    <i
                        class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant"></i>
                    <div>
                        <h2 class="font-headline-md text-headline-md text-on-surface" id="order-table-title">Mesa (1)</h2>
                    </div>
                </div>

                <div class="relative min-w-[180px]">
                    <select id="order-table-select"
                        class="w-full bg-surface-container-highest dark:bg-surface-variant pl-4 pr-10 py-2 rounded-full font-label-lg text-label-lg text-on-surface hover:bg-surface-variant dark:hover:bg-surface-container-high transition-colors appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary border-none">
                        <option value="0" disabled selected hidden>Selecciona la mesa</option>
                        <option value="Mesa 1">Mesa 1</option>
                        <option value="Mesa 2">Mesa 2</option>
                        <option value="Mesa 3">Mesa 3</option>
                        <option value="Mesa 4">Mesa 4</option>
                        <option value="Mesa 5">Mesa 5</option>
                        <option value="Llevar-1">Llevar-1</option>
                        <option value="Llevar-2">Llevar-2</option>
                    </select>
                    <i
                        class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant"></i>
                </div>
            </div>
        </section>

        <section id="table-summary-card"
            class="bg-surface-container-lowest rounded-xl p-5 border border-outline-variant shadow-sm fade-in hidden"
            style="animation-delay: 0.3s;">
            <div class="flex items-center justify-between mb-3 border-b border-outline-variant pb-3">
                <h3 class="font-headline-md text-base font-bold text-on-surface flex items-center gap-2">
                    <i class="fa-solid fa-utensils text-primary"></i>
                    Resumen Total a Preparar
                </h3>
                {{-- <span id="summary-total-items" class="text-xs font-bold bg-primary/10 text-primary px-3 py-1 rounded-full">
                    0 productos
                </span> --}}
            </div>

            <ul id="summary-products-list" class="divide-y divide-outline-variant/30">
            </ul>
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
                <span class="fas fa-money-bill-wave"></span>
                Pedir la Cuenta
            </a>
        </div>
    </main>

    <div id="delete-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div
            class="bg-surface-container-lowest rounded-2xl p-6 w-full max-w-sm shadow-xl border border-outline-variant mx-4">
            <div class="flex items-center gap-3 text-red-600 mb-3">
                <i class="fas fa-trash-alt text-2xl"></i>
                <h3 class="font-bold text-lg text-on-surface">Eliminar Orden</h3>
            </div>
            <p id="delete-modal-text" class="text-on-surface-variant text-sm mb-6">¿Estás seguro de que deseas eliminar esta
                orden?</p>
            <div class="flex justify-end gap-3">
                <button id="btn-cancel-delete" type="button"
                    class="px-4 py-2 text-sm font-medium text-on-surface-variant hover:bg-surface-container-low rounded-lg transition-colors">
                    Cancelar
                </button>
                <button id="btn-confirm-delete" type="button"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors">
                    Eliminar
                </button>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('assets/js/orders.js') }}"></script>
@endpush
