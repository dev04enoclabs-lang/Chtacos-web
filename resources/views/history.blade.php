@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-red-800">Historial de Pedidos</h2>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID Comanda</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Menú ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Costo Unitario</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cliente</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usuario</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($historialPedidos as $detalle)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $detalle->comander_id }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $detalle->id_menu }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $detalle->cantidad }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">${{ number_format($detalle->costo_unitario, 2) }}
                            </td>
                            <td class="px-4 py-2 text-sm font-semibold text-green-600">
                                ${{ number_format($detalle->total, 2) }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $detalle->cliente ?? 'General' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $detalle->usuario ?? 'N/A' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">No hay registros en el historial.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
