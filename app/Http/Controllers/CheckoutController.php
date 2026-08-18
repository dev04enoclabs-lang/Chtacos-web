<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\TicketPedidoMail;
use App\Models\Comander;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $productos = $request->input('productos', []);
        $mesa = trim((string) $request->input('mesa', 'Mesa 1')) ?: 'Mesa 1';

        $requiereTicket = filter_var($request->input('requiere_ticket', false), FILTER_VALIDATE_BOOLEAN);
        $emailCliente = $requiereTicket
            ? trim((string) ($request->input('email_ticket') ?: $request->input('email', '')))
            : trim((string) ($request->input('email', '')));

        $nombreCliente = trim((string) $request->input('nombre', 'Cliente General'));
        $nombreCliente = $nombreCliente !== '' ? $nombreCliente : 'Cliente General';

        $usuario = auth()->check()
            ? trim((auth()->user()->name ?? '') . ' ' . (auth()->user()->last_name ?? ''))
            : trim((string) $request->input('usuario_name', 'usuario'));

        $usuario = $usuario !== '' ? $usuario : 'usuario';

        if (empty($productos) || !is_array($productos)) {
            return response()->json(['success' => false, 'message' => 'No hay productos para registrar.'], 400);
        }

        DB::beginTransaction();

        try {
            $comander = Comander::create([
                'mesa' => $mesa,
                'cliente' => $nombreCliente,
                'email' => $emailCliente !== '' ? $emailCliente : null,
            ]);

            $comanderId = $comander->id;

            $totalGeneral = 0;
            $fechaHoraVenta = now()->format('Y-m-d H:i:s');
            $productosDetalle = [];

            foreach ($productos as $prod) {
                $precio = isset($prod['price']) ? (float) $prod['price'] : 0;
                $cantidad = isset($prod['quantity']) ? (int) $prod['quantity'] : 1;
                $subtotal = $cantidad * $precio;
                $totalGeneral += $subtotal;

                $productoNombre = $prod['name'] ?? $prod['nombre'] ?? 'Producto no encontrado';
                $productoId = $prod['id_menu'] ?? $prod['id'] ?? 1;

                $productosDetalle[] = [
                    'id_menu' => $productoId,
                    'nombre' => $productoNombre,
                    'quantity' => $cantidad,
                    'cantidad' => $cantidad,
                    'price' => $precio,
                    'precio' => $precio,
                    'subtotal' => $subtotal,
                ];

                DB::table('comander_detall')->insert([
                    'comander_id' => $comanderId,
                    'id_menu' => $productoId,
                    'cantidad' => $cantidad,
                    'costo_unitario' => $precio,
                    'total' => $subtotal,
                    'cliente' => $prod['tipo_cliente'] ?? 'Adulto',
                    'usuario' => $usuario,
                    'email' => $emailCliente !== '' ? $emailCliente : null,
                ]);
            }

            DB::commit();

            $datosTicket = [
                'establecimiento' => "Ch'Tacos",
                'comander_id' => $comanderId,
                'cliente' => $nombreCliente,
                'email' => $emailCliente,
                'email_cliente' => $emailCliente,
                'vendedor' => $usuario,
                'mesa' => $mesa,
                'fecha' => $fechaHoraVenta,
                'productos' => $productosDetalle,
                'total' => $totalGeneral,
            ];

            $destinatarios = [];

            if ($emailCliente !== '') {
                $destinatarios[] = $emailCliente;
            }

            if (auth()->check() && !empty(auth()->user()->email)) {
                $destinatarios[] = auth()->user()->email;
            }

            $destinatarios = array_values(array_unique(array_filter($destinatarios, fn($mail) => is_string($mail) && $mail !== '')));

            if ($requiereTicket && !empty($destinatarios)) {
                try {
                    Mail::to($destinatarios)->send(new TicketPedidoMail($datosTicket));
                } catch (\Exception $mailEx) {
                    Log::error('Error al enviar el ticket por correo: ' . $mailEx->getMessage());
                }
            }

            return response()->json([
                'success' => true,
                'message' => $requiereTicket
                    ? 'Venta registrada con éxito y ticket enviado.'
                    : 'Venta registrada con éxito.',
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error en CheckoutController store: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'No se pudo completar la venta. Verifica los datos e intenta nuevamente.',
            ], 500);
        }
    }
}