<!DOCTYPE html>
<html class="light" lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ch'Tacos - Restablecer Contraseña</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/swap.css') }}" media="print" onload="this.media='all'">

    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/swap.css') }}">
    </noscript>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body class="bg-surface text-on-surface min-h-screen pb-24">
    <header class="w-full top-0 sticky z-50 bg-background border-b border-outline-variant shadow-sm h-19">
        <div
            class="flex items-center justify-between px-margin-mobile md:px-margin-desktop h-full w-full max-w-7xl mx-auto">
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-utensils text-primary dark:text-primary-fixed-dim text-2xl"></i>

                <h1 class="font-headline-xl text-headline-xl text-primary dark:text-primary-fixed-dim tracking-tight">
                    Ch'Tacos
                </h1>
            </div>
        </div>
    </header>
    <main class="flex items-center justify-center min-h-[calc(100vh-140px)] px-4 py-10">
        <div class="w-full max-w-md bg-surface-container-low rounded-xl p-6 border border-outline-variant shadow-lg">
            <h2 class="text-headline-md font-bold text-on-surface text-center mb-2">Restablecer Contraseña</h2>
            <p class="mb-6 text-center text-sm text-on-surface-variant">Ingresa el código que te enviamos por correo.
            </p>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="email" value="{{ request('email', $email) }}">

                <div>
                    <label for="code" class="block text-sm font-medium text-on-surface">Código de 6 dígitos</label>
                    <input type="text" name="code" id="code" maxlength="6" required
                        class="mt-1 block w-full text-center text-xl font-bold tracking-widest rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-on-surface focus:border-primary">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-on-surface">Nueva Contraseña</label>
                    <div class="relative mt-1">
                        <input type="password" name="password" id="password" required
                            class="block w-full rounded-lg border border-outline-variant bg-surface-container-highest pl-3 pr-10 py-2 text-sm text-on-surface focus:outline-none transition-colors duration-200">
                        <button type="button" onclick="togglePasswordVisibility('password', 'toggleIcon1')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i id="toggleIcon1" class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-on-surface">Confirmar Nueva
                        Contraseña</label>
                    <div class="relative mt-1">
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="block w-full rounded-lg border border-outline-variant bg-surface-container-highest pl-3 pr-10 py-2 text-sm text-on-surface focus:outline-none transition-colors duration-200">
                        <button type="button"
                            onclick="togglePasswordVisibility('password_confirmation', 'toggleIcon2')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none">
                            <i id="toggleIcon2" class="fas fa-eye"></i>
                        </button>
                    </div>
                    <p id="password-match-msg" class="text-xs mt-1 hidden font-medium"></p>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-primary text-on-primary rounded-xl font-semibold shadow-sm hover:opacity-90 transition-all">
                    Cambiar Contraseña
                </button>
            </form>
        </div>
    </main>
</body>
<script src="{{ asset('assets/js/tallwind-config.js') }}" defer></script>
<script src="{{ asset('assets/js/reset-password.js') }}"></script>

</html>
