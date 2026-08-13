<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 500px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 10px;">
        <h2 style="color: #333; text-align: center;">Ch'Tacos</h2>
        <p>Hola,</p>
        <p>Has solicitado restablecer tu contraseña. Utiliza el siguiente código para completar el proceso:</p>
        <div style="text-align: center; margin: 20px 0;">
            <span style="font-size: 28px; font-weight: bold; letter-spacing: 5px; color: #e65100; background: #fff3e0; padding: 10px 20px; border-radius: 8px;">
                {{ $code }}
            </span>
        </div>
        <p style="font-size: 12px; color: #777;">Este código expira en 15 minutos. Si no solicitaste este cambio, ignora este mensaje.</p>
    </div>
</body>
</html>