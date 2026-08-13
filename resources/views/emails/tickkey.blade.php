<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .ticket { max-width: 400px; margin: 0 auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        .header { text-align: center; border-bottom: 1px dashed #ccc; padding-bottom: 10px; }
        .details { margin: 15px 0; font-size: 14px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        .table th, .table td { text-align: left; padding: 6px 0; font-size: 14px; }
        .total { border-top: 1px dashed #ccc; padding-top: 10px; font-weight: bold; font-size: 16px; text-align: right; }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="header">
            <h2>{{ $datos['establecimiento'] }}</h2>
            <p>Ticket de Venta #{{ $datos['comander_id'] }}</p>
        </div>
        
        <div class="details">
            <p><strong>Fecha:</strong> {{ $datos['fecha'] }}</p>
            <p><strong>Mesa:</strong> {{ $datos['mesa'] }}</p>
            <p><strong>Cliente:</strong> {{ $datos['cliente'] }}</p>
            <p><strong>Atendió:</strong> {{ $datos['vendedor'] }}</p>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Cant.</th>
                    <th>Producto</th>
                    <th style="text-align: right;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos['productos'] as $item)
                    <tr>
                        <td>{{ $item['cantidad'] }}x</td>
                        <td>{{ $item['nombre'] }}</td>
                        <td style="text-align: right;">${{ number_format($item['subtotal'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            <p>Total Pagado: ${{ number_format($datos['total'], 2) }}</p>
        </div>
    </div>
</body>
</html>