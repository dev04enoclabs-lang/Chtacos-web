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
                        <option value="4">Mesa 4</option>
                        <option value="5">Mesa 5</option>
                        <option value="6">Llevar-1</option>
                        <option value="7">Llevar-2</option>
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
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/orders.js') }}"></script>
@endpush
