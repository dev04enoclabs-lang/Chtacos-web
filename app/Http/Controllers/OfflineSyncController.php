<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class OfflineSyncController extends Controller
{
    public function sync(Request $request)
    {
        $orders = $request->input('orders');

        if (empty($orders) || !is_array($orders)) {
            return response()->json(['message' => 'No hay datos para sincronizar'], 400);
        }

        DB::beginTransaction();

        try {
            foreach ($orders as $orderData) {
                Order::create([
                    'mesa'              => $orderData['mesa'] ?? 'Sin mesa',
                    'usuario'           => $orderData['usuario'] ?? 'Invitado',
                    'preparacion'       => $orderData['preparacion'] ?? null, // <--- Agregamos este campo
                    'total'             => $orderData['total'] ?? 0,
                    'is_offline_synced' => true,
                    'created_at'        => isset($orderData['local_timestamp']) 
                                           ? Carbon::parse($orderData['local_timestamp']) 
                                           : now(),
                ]);
            }

            DB::commit();
            return response()->json(['message' => 'Sincronización exitosa', 'synced_count' => count($orders)]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Fallo al sincronizar pedidos offline: ' . $e->getMessage());
            return response()->json(['message' => 'Error interno de sincronización: ' . $e->getMessage()], 500);
        }
    }
}