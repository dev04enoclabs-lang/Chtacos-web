@extends('layouts.app')

@section('title', "Ch'Tacos - Carrito")

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush

@section('content')
    <div class="max-w-screen-xl mx-auto px-margin-mobile md:px-margin-desktop py-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
        <div class="lg:col-span-8 space-y-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-on-surface">Tu Carrito</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Revisa tus pedidos para que todo esté bien.
                    </p>
                </div>
            </div>

            <div class="space-y-4">
                <section class="fade-in" style="animation-delay: 0.1s;">
                    <div
                        class="bg-surface-container-low rounded-xl p-4 flex items-center justify-between shadow-[0_4px_20px_rgba(0,0,0,0.05)] border border-outline-variant">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-secondary-container rounded-lg flex items-center justify-center">
                                <span class="material-symbols-outlined text-on-secondary-container"
                                    style="font-variation-settings: 'FILL' 1;">table_restaurant</span>
                            </div>
                            <div>
                                <h2 class="font-headline-md text-headline-md text-on-surface" id="cart-table-title">Mesa 1
                                </h2>
                            </div>
                        </div>

                        <div class="relative min-w-[180px]">
                            <select id="cart-table-select"
                                class="w-full bg-surface-container-highest dark:bg-surface-variant pl-4 pr-10 py-2 rounded-full font-label-lg text-label-lg text-on-surface hover:bg-surface-variant dark:hover:bg-surface-container-high transition-colors appearance-none cursor-pointer focus:outline-none focus:ring-2 focus:ring-primary border-none">
                                <option value="0" disabled selected hidden>Selecciona la mesa</option>
                                <option value="1">Mesa 1</option>
                                <option value="2">Mesa 2</option>
                                <option value="3">Mesa 3</option>
                                <option value="3">Mesa 3</option>
                                <option value="3">Mesa 3</option>
                                <option value="4">Mesa 4</option>
                                <option value="5">Mesa 5</option>
                                <option value="6">Llevar-1</option>
                                <option value="7">Llevar-2</option>
                            </select>
                            <i
                                class="fas fa-chevron-down text-sm absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface"></i>
                        </div>
                    </div>
                </section>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <label
                        class="cursor-pointer border border-outline-variant rounded-xl p-4 flex flex-col gap-2 hover:border-primary transition-all">
                        <div class="flex items-center justify-between">
                            <span class="font-headline-sm text-on-surface">Pago por Usuario</span>
                            <input type="radio" name="tipo_pago" value="usuario" id="radio-pago-usuario"
                                class="accent-primary">
                        </div>
                        <span class="text-body-sm text-on-surface-variant">Pagas solo lo que tú pediste</span>
                    </label>

                    <label
                        class="cursor-pointer border border-outline-variant rounded-xl p-4 flex flex-col gap-2 hover:border-primary transition-all">
                        <div class="flex items-center justify-between">
                            <span class="font-headline-sm text-on-surface">Pago Total Mesa</span>
                            <input type="radio" name="tipo_pago" value="total" id="radio-pago-total"
                                class="accent-primary" checked>
                        </div>
                        <span class="text-body-sm text-on-surface-variant">Pagas la cuenta completa</span>
                    </label>

                    <div id="usuarios-selector-container"
                        class="hidden col-span-2 mb-6 bg-surface-container-low p-4 rounded-xl border border-outline-variant">
                        <h3 class="font-headline-sm text-on-surface mb-3">Selecciona los clientes a pagar:</h3>
                        <div id="lista-checkbox-usuarios" class="flex flex-col gap-2"></div>
                    </div>
                </div>

                <section class="space-y-4 fade-in" style="animation-delay: 0.2s;">
                    <div id="cart-orders-container" class="space-y-4"></div>
                </section>
            </div>
        </div>

        <aside class="lg:col-span-4">
            <div class="sticky top-24 space-y-6">
                <div class="bg-surface-container-high p-6 rounded-xl shadow-lg border border-outline-variant/30">
                    <h3 class="font-headline-md text-headline-md mb-6">Resumen</h3>
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center text-on-surface-variant">
                            <span class="font-body-md">Mesa / Usuario</span>
                            <span class="font-label-lg" id="summary-table-user">Mesa 1 / Juan P.</span>
                        </div>
                        <div class="flex justify-between items-center text-on-surface-variant">
                            <span class="font-body-md">Modo de Pago</span>
                            <span class="font-label-lg" id="summary-payment-mode">Individual</span>
                        </div>
                        <div class="h-px bg-outline-variant my-2"></div>
                        <div class="flex justify-between items-center text-on-surface-variant">
                            <span class="font-body-md" id="summary-items-count">Tus artículos (0)</span>
                            <span class="font-label-lg" id="summary-subtotal">$0.00</span>
                        </div>
                        <div class="flex justify-between items-center text-on-surface-variant">
                            <span class="font-body-md">Envío / Servicio</span>
                            <span class="font-label-lg text-tertiary">GRATIS</span>
                        </div>
                        <div class="h-px bg-outline-variant my-4"></div>
                        <div class="flex justify-between items-center">
                            <span class="font-headline-md text-headline-md">Tu Total</span>
                            <span class="font-headline-md text-headline-md text-primary" id="summary-total">$0.00</span>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <button
                            class="w-full bg-primary text-on-primary font-label-lg py-4 rounded-full shadow-lg hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-shopping-cart"></i>
                            Pago en Efectivo
                            <i class="fas fa-check-circle"></i>
                        </button>

                        <button
                            class="w-full md:hidden border-2 border-primary text-primary font-label-lg py-4 rounded-full hover:bg-primary-container active:scale-[0.98] transition-all flex items-center justify-center gap-2">
                            <i class="fas fa-credit-card"></i>
                            Pago por tarjeta
                        </button>
                    </div>

                    <div class="mt-6 flex items-center justify-center gap-4 opacity-60">
                        <i class="fas fa-lock text-sm"></i>
                        <span class="text-[12px] font-label-lg uppercase tracking-widest">Pago Seguro</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <div id="sale-modal" class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl p-6 max-w-sm w-full text-center shadow-xl transform transition-all">
            <h3 id="modal-title" class="text-lg font-bold text-gray-800 mb-2">Estado de pago</h3>
            <p id="modal-message" class="text-sm text-gray-600 mb-6"></p>
            <button id="modal-close-btn"
                class="w-full bg-red-600 text-white font-semibold py-2.5 px-4 rounded-xl hover:bg-red-700 transition-colors">
                Aceptar
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endpush
