<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\TicketPedidoMail;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $productos = $request->input('productos', []);
        $mesa = $request->input('mesa', 'Mesa 1');
        
        // Capturamos el nombre y el correo ingresados por el cliente en el formulario
        $nombreCliente = $request->input('nombre', $request->input('cliente', 'Cliente General'));
        $emailCliente = $request->input('email', null);

        if (empty($productos)) {
            return response()->json(['success' => false, 'message' => 'No hay productos para registrar.'], 400);
        }

        DB::beginTransaction();
        try {
            // Guardar en la tabla principal comander
            $comanderId = DB::table('comander')->insertGetId([
                'mesa'    => $mesa,
                'cliente' => $nombreCliente,
                'email'   => $emailCliente,
            ]);

            $totalGeneral = 0;
            $fechaHoraVenta = now()->format('Y-m-d H:i:s');

            // Guardar detalles del producto
            foreach ($productos as $prod) {
                $subtotal = $prod['quantity'] * $prod['price'];
                $totalGeneral += $subtotal;

                DB::table('comander_detall')->insert([
                    'comander_id'    => $comanderId,
                    'id_menu'        => $prod['id_menu'] ?? 1, 
                    'cantidad'       => $prod['quantity'],
                    'costo_unitario' => $prod['price'],
                    'total'          => $subtotal,
                    'cliente'        => $prod['tipo_cliente'] ?? 'Adulto', 
                    'usuario'        => $nombreCliente,
                    'email'          => $emailCliente,
                ]);
            }

            DB::commit();

            // Si el cliente ingresó un correo, le enviamos el ticket detallado
            if (!empty($emailCliente)) {
                try {
                    $datosTicket = [
                        'establecimiento' => "Ch'Tacos",
                        'cliente'         => $nombreCliente,
                        'email'           => $emailCliente,
                        'mesa'            => $mesa,
                        'fecha'           => $fechaHoraVenta,
                        'productos'       => $productos,
                        'total'           => $totalGeneral,
                    ];

                    Mail::to($emailCliente)->send(new TicketPedidoMail($datosTicket));
                } catch (\Exception $mailEx) {
                    Log::error("Error al enviar el correo al cliente: " . $mailEx->getMessage());
                }
            }

            return response()->json(['success' => true, 'message' => 'Venta registrada y ticket enviado con éxito al cliente.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}