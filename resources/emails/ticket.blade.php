<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; line-height: 1.5; }
        .ticket { max-width: 450px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; background: #fff; border-radius: 8px; }
        .header { text-align: center; border-bottom: 2px dashed #ccc; padding-bottom: 12px; margin-bottom: 15px; }
        .header h2 { color: #800020; margin: 0; font-size: 24px; }
        .details { margin-bottom: 15px; font-size: 14px; background: #f9f9f9; padding: 10px; border-radius: 5px; }
        .details p { margin: 4px 0; }
        .table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        .table th, .table td { padding: 8px; text-align: left; border-bottom: 1px solid #eee; font-size: 13px; }
        .table th { background-color: #f1f1f1; }
        .total { text-align: right; font-size: 16px; font-weight: bold; color: #800020; border-top: 2px solid #ddd; padding-top: 8px; }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h2>{{ $pedido['establecimiento'] }}</h2>
            <p>¡Gracias por tu compra, tu ticket de consumo!</p>
        </div>
        
        <div class="details">
            <p><strong>Nombre:</strong> {{ $pedido['cliente'] }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $pedido['email'] }}</p>
            <p><strong>Mesa:</strong> {{ $pedido['mesa'] }}</p>
            <p><strong>Fecha y Hora:</strong> {{ $pedido['fecha'] }}</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Cant</th>
                    <th>Producto</th>
                    <th>Precio U.</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido['productos'] as $prod)
                <tr>
                    <td>{{ $prod['quantity'] }}</td>
                    <td>{{ $prod['name'] ?? 'Producto' }}</td>
                    <td>${{ number_format($prod['price'], 2) }}</td>
                    <td>${{ number_format($prod['quantity'] * $prod['price'], 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Monto Total: ${{ number_format($pedido['total'], 2) }}
        </div>
    </div>
</body>
</html>