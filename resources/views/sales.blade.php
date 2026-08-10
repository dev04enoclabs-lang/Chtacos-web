@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 space-y-6">

        <div>
            <h2 class="text-2xl font-bold text-red-800 uppercase tracking-wider">Ventas</h2>
            <p class="text-2x1 text-on-surface-variant font-medium">Panel de análisis de ventas e ingresos históricos</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            {{-- Ventas acomuladas por día  --}}

            <div
                class="relative group bg-surface-container-lowest/80 border border-outline-variant/30 rounded-lg p-5 backdrop-blur-md shadow-md transition-all duration-300 hover:border-primary/50">

                <div class="absolute top-0 left-0 w-2.5 h-2.5 border-t-2 border-l-2 border-primary/70 rounded-tl-sm"></div>
                <div class="absolute top-0 right-0 w-2.5 h-2.5 border-t-2 border-r-2 border-primary/70 rounded-tr-sm"></div>
                <div class="absolute bottom-0 left-0 w-2.5 h-2.5 border-b-2 border-l-2 border-primary/70 rounded-bl-sm">
                </div>
                <div class="absolute bottom-0 right-0 w-2.5 h-2.5 border-b-2 border-r-2 border-primary/70 rounded-br-sm">
                </div>

                <div class="flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-3xs font-semibold uppercase tracking-widest text-on-surface-variant/80">
                            Ventas Acomulado de Hoy
                        </span>

                        <h3 class="text-2xl font-extrabold tracking-tight text-on-surface">
                            ${{ number_format($todaySales ?? 0, 2) }}
                        </h3>

                        <h3 class="text-2xl font-extrabold tracking-tight text-on-surface">
                            {{ $todayOrders ?? 0 }} órdenes
                        </h3>

                        <p class="text-[11px] font-medium text-black-500 flex items-center gap-1">
                            <i class="fa-solid fa-chart-line text-[10px]"></i>
                            <span>Ventas acomuladas del dia de Hoy.</span>
                        </p>
                    </div>

                    <div class="p-3 bg-primary/10 rounded-xl text-primary/60 group-hover:text-primary transition-colors">
                        <i class="fa-solid fa-bag-shopping text-4xl"></i>
                    </div>
                </div>

            </div>

            {{-- Ventas acomuladas por semana --}}

            <div
                class="relative group bg-surface-container-lowest/80 border border-outline-variant/30 rounded-lg p-5 backdrop-blur-md shadow-md transition-all duration-300 hover:border-primary/50">

                <div class="absolute top-0 left-0 w-2.5 h-2.5 border-t-2 border-l-2 border-primary/70 rounded-tl-sm"></div>
                <div class="absolute top-0 right-0 w-2.5 h-2.5 border-t-2 border-r-2 border-primary/70 rounded-tr-sm"></div>
                <div class="absolute bottom-0 left-0 w-2.5 h-2.5 border-b-2 border-l-2 border-primary/70 rounded-bl-sm">
                </div>
                <div class="absolute bottom-0 right-0 w-2.5 h-2.5 border-b-2 border-r-2 border-primary/70 rounded-br-sm">
                </div>

                <div class="flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-3xs font-semibold uppercase tracking-widest text-on-surface-variant/80">
                            Ventas Semanal
                        </span>

                        <h3 class="text-2xl font-extrabold tracking-tight text-on-surface">
                            ${{ number_format($weeklySales ?? 0, 2) }}
                        </h3>

                        <h3 class="text-2xl font-extrabold tracking-tight text-on-surface">
                            {{ $weeklyOrders ?? 0 }} órdenes
                        </h3>

                        <p class="text-[11px] font-medium text-black-500 flex items-center gap-1">
                            <i class="fa-solid fa-chart-line text-[10px]"></i>
                            <span>Ventas acomulado por semana.</span>
                        </p>
                    </div>

                    <div class="p-3 bg-primary/10 rounded-xl text-primary/60 group-hover:text-primary transition-colors">
                        <i class="fa-solid fa-bag-shopping text-4xl"></i>
                    </div>
                </div>
            </div>

            {{-- Ventas Acomuladas por mes --}}

            <div
                class="relative group bg-surface-container-lowest/80 border border-outline-variant/30 rounded-lg p-5 backdrop-blur-md shadow-md transition-all duration-300 hover:border-primary/50">

                <div class="absolute top-0 left-0 w-2.5 h-2.5 border-t-2 border-l-2 border-primary/70 rounded-tl-sm"></div>
                <div class="absolute top-0 right-0 w-2.5 h-2.5 border-t-2 border-r-2 border-primary/70 rounded-tr-sm"></div>
                <div class="absolute bottom-0 left-0 w-2.5 h-2.5 border-b-2 border-l-2 border-primary/70 rounded-bl-sm">
                </div>
                <div class="absolute bottom-0 right-0 w-2.5 h-2.5 border-b-2 border-r-2 border-primary/70 rounded-br-sm">
                </div>
                <div class="flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-3xs font-semibold uppercase tracking-widest text-on-surface-variant/80">
                            Venta Mensual
                        </span>

                        <h3 class="text-2xl font-extrabold tracking-tight text-on-surface">
                            ${{ number_format($monthlysales ?? 0, 2) }}
                        </h3>

                        <h3 class="text-2xl font-extrabold tracking-tight text-on-surface">
                            {{ $monthlyorders ?? 0 }} órdenes
                        </h3>

                        <p class="text-[11px] font-medium text-black-500 flex items-center gap-1">
                            <i class="fa-solid fa-chart-line text-[10px]"></i>
                            <span>Ventas acomulados por mensual.</span>
                        </p>
                    </div>

                    <div class="p-3 bg-primary/10 rounded-xl text-primary/60 group-hover:text-primary transition-colors">
                        <i class="fa-solid fa-bag-shopping text-4xl"></i>
                    </div>
                </div>
            </div>

            {{-- Ventas Totales Acomuladas --}}

            <div
                class="relative group bg-surface-container-lowest/80 border border-outline-variant/30 rounded-lg p-5 backdrop-blur-md shadow-md transition-all duration-300 hover:border-primary/50">

                <div class="absolute top-0 left-0 w-2.5 h-2.5 border-t-2 border-l-2 border-primary/70 rounded-tl-sm"></div>
                <div class="absolute top-0 right-0 w-2.5 h-2.5 border-t-2 border-r-2 border-primary/70 rounded-tr-sm"></div>
                <div class="absolute bottom-0 left-0 w-2.5 h-2.5 border-b-2 border-l-2 border-primary/70 rounded-bl-sm">
                </div>
                <div class="absolute bottom-0 right-0 w-2.5 h-2.5 border-b-2 border-r-2 border-primary/70 rounded-br-sm">
                </div>

                <div class="flex items-center justify-between">
                    <div class="space-y-1">
                        <span class="text-3xs font-semibold uppercase tracking-widest text-on-surface-variant/80">
                            Ventas Totales Acumuladas
                        </span>

                        <h3 class="text-2xl font-extrabold tracking-tight text-on-surface">
                            ${{ number_format($totalSales ?? 0, 2) }}
                        </h3>

                        <h3 class="text-2xl font-extrabold tracking-tight text-on-surface">
                            {{ $totalOrders ?? 0 }} órdenes
                        </h3>

                        <p class="text-[11px] font-medium text-black-500 flex items-center gap-1">
                            <i class="fa-solid fa-chart-line text-[10px]"></i>
                            <span>Ventas Acomuladas de Todo.</span>
                        </p>
                    </div>

                    <div class="p-3 bg-primary/10 rounded-xl text-primary/60 group-hover:text-primary transition-colors">
                        <i class="fa-solid fa-bag-shopping text-4xl"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
