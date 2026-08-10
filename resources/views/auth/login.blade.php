<!DOCTYPE html>
<html class="light" lang="es-mx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ch'Tacos - Login</title>
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
        <div
            class="w-full max-w-md overflow-hidden rounded-[28px] border border-outline-variant bg-surface-container-lowest shadow-[0_20px_60px_rgba(0,0,0,0.08)]">
            <div class="bg-primary-container px-6 py-8 text-center">
                <div
                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-primary text-on-primary shadow-sm">
                    <i class="fa-solid fa-utensils text-2xl"></i>
                </div>
                <p class="text-xs font-medium uppercase tracking-[0.25em] text-on-primary-container/100">Ch'Tacos</p>
                <h2 class="mt-3 text-3xl font-bold text-on-primary-container">Bienvenido</h2>
            </div>

            <div class="p-6 sm:p-8">
                <p class="mb-6 text-center text-sm text-on-surface-variant">
                    Ingresa tus credenciales que se te proporciono
                </p>
                @if (session('error'))
                    <div
                        class="mb-4 flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 p-3.5 text-xs font-semibold text-red-600">
                        <i class="fa-solid fa-triangle-exclamation text-sm"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div
                        class="mb-4 flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 p-3.5 text-xs font-semibold text-red-600">
                        <i class="fa-solid fa-circle-exclamation text-sm"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-medium text-on-surface">Correo
                            Electrónico</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-sm text-on-surface placeholder:text-on-surface-variant focus:border-primary focus:ring-primary">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-on-surface">Contraseña</label>
                        <div class="relative mt-1">
                            <input type="password" name="password" id="password" required
                                class="block w-full rounded-lg border border-outline-variant bg-surface-container-highest pl-3 pr-10 py-2 text-sm text-on-surface placeholder:text-on-surface-variant focus:border-primary focus:ring-primary">

                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-on-surface-variant hover:text-on-surface transition-colors focus:outline-none"
                                aria-label="Mostrar u ocultar contraseña">
                                <i id="toggleIcon" class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                        class="inline-flex w-full items-center justify-center rounded-xl bg-primary px-5 py-3.5 text-base font-semibold text-on-primary shadow-sm transition hover:opacity-90 active:scale-[0.99]">
                        iniciar sesión
                    </button>
            </div>
        </div>
    </main>
</body>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/login.js') }}"></script>
<script src="{{ asset('assets/js/tallwind-config.js') }}"></script>

</html>
