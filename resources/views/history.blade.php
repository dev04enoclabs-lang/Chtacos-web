@extends('layouts.app')

@section('content')

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-red-800">Historial de Pedidos</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase">Mesa</th>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase">Menú ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase">Cantidad</th>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase">Costo Unitario</th>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase">Total</th>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase">Cliente</th>
                        <th class="px-4 py-2 text-left text-xs font-medium uppercase">Fecha</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-500">
                    @forelse($historialPedidos as $detalle)
                        <tr>
                            <td class="px-4 py-2 text-sm font-bold">{{ $detalle->comander_id ?? 'Sin ID' }}</td>
                            <td class="px-4 py-2 text-sm">{{ $detalle->comander->mesa ?? 'Sin Mesa' }}</td>
                            <td class="px-4 py-2 text-sm">{{ $detalle->menu->name ?? 'sin Producto' . $detalle->id_menu }}</td>
                            <td class="px-4 py-2 text-sm">{{ $detalle->cantidad ?? 'Sin Cantidad'}}</td>
                            <td class="px-4 py-2 text-sm">${{ number_format($detalle->costo_unitario, 2) ?? 'Sin Costo'}}
                            </td>
                            <td class="px-4 py-2 text-sm font-semibold text-red-600">
                                ${{ number_format($detalle->total, 2) }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">
                                {{ $detalle->comander->cliente ?? $detalle->cliente ?? 'Sin Cliente' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-500">
                                {{ $detalle->comander && $detalle->comander->create_at ? \Carbon\Carbon::parse($detalle->comander->create_at)->format('d/m/Y H:i') : 'N/A' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-8 py-8 text-center text-gray-500">No hay registros en el historial.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
