# Ch'Tacos

Aplicacion web para gestionar el menu, los pedidos y las ventas de un establecimiento de comida. El sistema permite trabajar por mesa, registrar clientes, consultar el historial de pedidos y visualizar indicadores de ventas desde una interfaz web responsive.

> Este repositorio contiene la aplicacion Laravel y sus recursos frontend. El esquema completo de las tablas de menu y pedidos debe estar disponible en el entorno antes de ejecutar el flujo de venta.

## Contenido

- [Funcionalidades](#funcionalidades)
- [Tecnologias](#tecnologias)
- [Requisitos](#requisitos)
- [Instalacion](#instalacion)
- [Configuracion](#configuracion)
- [Puesta en marcha](#puesta-en-marcha)
- [Flujo de trabajo](#flujo-de-trabajo)
- [Rutas principales](#rutas-principales)
- [Estructura del proyecto](#estructura-del-proyecto)
- [Base de datos](#base-de-datos)
- [Correo electronico](#correo-electronico)
- [Soporte offline](#soporte-offline)
- [Pruebas](#pruebas)
- [Solucion de problemas](#solucion-de-problemas)

## Funcionalidades

- Inicio y cierre de sesion.
- Recuperacion de contrasena mediante un codigo de seis digitos enviado por correo.
- Expiracion de sesion por inactividad.
- Consulta del menu y filtrado por categorias.
- Seleccion de mesa, tipo de cliente y preparacion del pedido.
- Carrito persistido en el navegador mediante `localStorage`.
- Gestion de pedidos separados por mesa.
- Pago total de una mesa o pago individual por cliente.
- Registro de ventas y detalles de cada comanda.
- Ticket digital opcional por correo electronico.
- Historial de pedidos.
- Panel de ventas diarias, semanales, mensuales y acumuladas.
- Ventas agrupadas por usuario.
- Codigo QR para iniciar un pedido por WhatsApp.
- Interfaz responsive con Tailwind CSS y Font Awesome.
- Cache parcial de recursos mediante Service Worker.

No se encontraron roles o permisos diferenciados: cualquier usuario autenticado puede acceder a menu, pedidos, historial, ventas y codigo QR.

## Tecnologias

- PHP `^8.2`.
- Laravel `^12.0`.
- Composer.
- Node.js y npm.
- Vite `^7.0.7`.
- Tailwind CSS `^4.3.2`.
- Axios y Font Awesome.
- PHPUnit `^11.5.50`.
- Base de datos configurada mediante Laravel; el ejemplo usa SQLite.

## Requisitos

Antes de comenzar, instala:

1. PHP 8.2 o superior con las extensiones requeridas por Laravel.
2. Composer.
3. Node.js y npm.
4. Un motor de base de datos compatible con la configuracion elegida.
5. Un servidor local como XAMPP si se desea ejecutar Apache y MySQL.

Comprueba las herramientas con:

```bash
php -v
composer --version
node --version
npm --version
```

## Instalacion

Clona el repositorio y entra en su directorio:

```bash
git clone <URL_DEL_REPOSITORIO>
cd WEB-Chtacos
```

La instalacion automatizada disponible en `composer.json` es:

```bash
composer run setup
```

Este comando ejecuta:

```bash
composer install
php artisan key:generate
php artisan migrate --force
npm install
npm run build
```

Si prefieres ejecutar cada paso por separado:

```bash
composer install
copy .env.example .env
php artisan key:generate
npm install
npm run build
```

En Linux o macOS, sustituye `copy .env.example .env` por `cp .env.example .env`.

## Configuracion

Edita `.env` despues de copiar `.env.example`.

### Aplicacion

```env
APP_NAME="Ch'Tacos"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
```

En un entorno publico, usa `APP_ENV=production`, `APP_DEBUG=false` y un `APP_URL` real.

### Base de datos

La plantilla usa SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=C:/xampp/htdocs/WEB-Chtacos/database/database.sqlite
```

Tambien puedes usar MySQL, por ejemplo:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=chtacos
DB_USERNAME=root
DB_PASSWORD=
```

Despues de modificar `.env`, limpia la configuracion cacheada:

```bash
php artisan config:clear
```

### Sesiones, cache y colas

La configuracion de ejemplo utiliza almacenamiento en base de datos:

```env
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

Por ello, la base de datos debe tener las tablas de sesiones, cache y trabajos que corresponden a las migraciones disponibles.

### Correo

Para desarrollo, el valor predeterminado es:

```env
MAIL_MAILER=log
```

Con esta opcion los mensajes se escriben en `storage/logs` y no se envian realmente. Para SMTP, configura `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_FROM_ADDRESS` y `MAIL_FROM_NAME` con los datos de tu proveedor.

## Puesta en marcha

Para levantar servidor Laravel, cola, logs y Vite al mismo tiempo:

```bash
composer run dev
```

Tambien puedes iniciar los procesos por separado:

```bash
php artisan serve
php artisan queue:listen --tries=1 --timeout=0
php artisan pail --timeout=0
npm run dev
```

La aplicacion queda disponible normalmente en `http://localhost:8000`.

Para generar un build frontend de produccion:

```bash
npm run build
```

## Flujo de trabajo

1. La ruta `/` redirige al inicio de sesion.
2. El usuario inicia sesion y entra a `/menu`.
3. Selecciona mesa, cliente, preparacion y productos.
4. El pedido se conserva inicialmente en `localStorage` con la clave `my_orders`.
5. En `/orders` puede modificar cantidades, eliminar productos, marcar pedidos como listos o agregar productos y clientes.
6. En `/Carritos` elige pagar la mesa completa o un cliente concreto.
7. Puede solicitar un ticket digital y proporcionar un correo.
8. El frontend envia el checkout a `POST /checkout/procesar`.
9. El backend guarda la comanda y sus detalles; despues intenta enviar el ticket si fue solicitado.
10. Tras un pago correcto, el pedido pagado se elimina del almacenamiento local.

## Rutas principales

| Metodo | Ruta | Acceso | Uso |
| --- | --- | --- | --- |
| GET | `/` | Publico | Redirecciona a login |
| GET/POST | `/login` | Publico | Muestra y procesa el inicio de sesion |
| GET/POST | `/forgot-password` | Publico | Solicita codigo de recuperacion |
| GET/POST | `/reset-password` | Publico | Restablece la contrasena |
| GET | `/menu` | Autenticado | Muestra el menu |
| GET | `/orders` | Autenticado | Gestiona pedidos por mesa |
| GET | `/Carritos` | Autenticado | Muestra el carrito y opciones de pago |
| POST | `/checkout/procesar` | Autenticado | Registra la venta |
| GET | `/history` | Autenticado | Consulta el historial |
| GET | `/sales` | Autenticado | Consulta indicadores de ventas |
| GET | `/codeQr` | Autenticado | Genera enlace QR para WhatsApp |
| POST | `/pedidos/sincronizar` | Publico en rutas | Endpoint de sincronizacion |
| POST | `/logout` | Autenticado | Cierra la sesion |

Las rutas protegidas usan los middleware `auth` y `CheckSessionTimeout`.

## Estructura del proyecto

```text
app/
  Http/Controllers/       Controladores de autenticacion, menu, checkout y ventas
  Http/Middleware/         Middleware de sesion
  Mail/                    Correos de recuperacion y tickets
  Models/                  Modelos Eloquent

database/
  factories/               Factories para pruebas
  migrations/              Migraciones incluidas
  seeders/                 Seeders

public/
  assets/                  JavaScript, CSS e imagenes de la interfaz
  sw.js                    Service Worker
  index.php                Punto de entrada publico

resources/views/           Vistas Blade
resources/css/             Estilos procesados por Vite
resources/js/              Entrada JavaScript de Vite
routes/web.php             Rutas web de la aplicacion
storage/                   Logs, cache, sesiones y archivos generados
tests/                     Pruebas Feature y Unit
```

## Base de datos

Las migraciones incluidas cubren la infraestructura habitual de Laravel y cambios para usuarios, sesiones, cache, trabajos, codigo de recuperacion y datos adicionales de pedidos.

El codigo tambien utiliza las tablas `category`, `menu`, `comander`, `comander_detall` y `orders`. No hay migraciones visibles que creen todas esas tablas, por lo que una instalacion limpia puede requerir importar o crear previamente el esquema principal de negocio.

Antes de probar el checkout, verifica:

```bash
php artisan migrate:status
php artisan route:list
```

No ejecutes `migrate:fresh` en una base de datos compartida: elimina todas las tablas administradas por Laravel.

## Correo electronico

El proyecto incluye dos correos:

- `SendResetCodeMail`: codigo de recuperacion valido durante 15 minutos.
- `TicketPedidoMail`: ticket de venta opcional, enviado cuando el checkout lo solicita y existe un destinatario.

En desarrollo, revisa `storage/logs/laravel.log` cuando `MAIL_MAILER=log`. Para envio real, configura un proveedor SMTP y prueba tanto la recuperacion de contrasena como el ticket.

## Soporte offline

El frontend guarda pedidos en `localStorage` y `public/sw.js` almacena algunos recursos GET en cache. Esto ofrece soporte offline parcial para la interfaz y la consulta de datos ya almacenados.

Consideraciones actuales:

- El Service Worker no intercepta ni reintenta peticiones POST.
- El checkout no tiene sincronizacion automatica offline comprobada.
- Existe `POST /pedidos/sincronizar`, pero no se encontro una llamada conectada desde el frontend revisado.
- No hay un `manifest.json` visible.
- El Service Worker referencia recursos offline que no estan incluidos o tienen nombres distintos.

Por tanto, no debe considerarse una PWA offline completa ni asumirse que una venta queda sincronizada automaticamente sin conexion.

## Pruebas

Ejecuta la suite definida por Composer:

```bash
composer run test
```

O directamente:

```bash
php artisan test
```

La prueba de Feature `CheckoutTicketOptionalTest` cubre el checkout sin exigir ticket digital. Las pruebas pueden requerir que las tablas de negocio existan en la base de datos de testing.

## Solucion de problemas

### La aplicacion muestra errores de conexion a base de datos

Comprueba los valores `DB_*`, crea la base de datos elegida y ejecuta:

```bash
php artisan config:clear
php artisan migrate:status
```

Si faltan `menu`, `category`, `comander` o `comander_detall`, prepara el esquema de negocio que utiliza el proyecto antes de probar el menu o checkout.

### Los correos no llegan

Verifica `MAIL_*`. Con `MAIL_MAILER=log` los correos no salen por internet: revisa `storage/logs/laravel.log` o cambia a un SMTP valido.

### No cargan los estilos o scripts

Durante el desarrollo ejecuta `npm run dev`. Para una compilacion distribuible ejecuta `npm run build` y confirma que el servidor web apunta al directorio `public`.

### Los cambios de configuracion no se reflejan

Limpia la cache de configuracion:

```bash
php artisan optimize:clear
```

## Seguridad y despliegue

- No subas `.env` ni credenciales al repositorio.
- Usa `APP_DEBUG=false` en produccion.
- Sirve Laravel desde `public`, nunca desde la raiz del proyecto.
- Configura HTTPS y un `APP_KEY` unico.
- Revisa permisos de escritura en `storage` y `bootstrap/cache`.
- Valida el esquema de negocio y el envio de correo antes de poner el sistema en uso.

## Licencia

El proyecto utiliza Laravel, distribuido bajo la [licencia MIT](https://opensource.org/licenses/MIT). La licencia especifica de la aplicacion Ch'Tacos debe definirse por sus propietarios.