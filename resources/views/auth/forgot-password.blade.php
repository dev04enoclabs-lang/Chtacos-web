@extends('layouts.app')

@section('title', "Ch'Tacos - Recuperar Contraseña")

@section('content')
<main class="flex items-center justify-center min-h-[calc(100vh-140px)] px-4 py-10">
    <div class="w-full max-w-md bg-surface-container-low rounded-xl p-6 border border-outline-variant shadow-lg">
        <h2 class="text-headline-md font-bold text-on-surface text-center mb-2">Recuperar Contraseña</h2>
        <p class="mb-6 text-center text-sm text-on-surface-variant">Ingresa tu correo para recibir un código de verificación.</p>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-50 border border-green-200 text-green-700 text-xs rounded-xl">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-600 text-xs rounded-xl">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-on-surface">Correo Electrónico</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-sm text-on-surface focus:border-primary">
            </div>

            <button type="submit" class="w-full py-3 bg-primary text-on-primary rounded-xl font-semibold shadow-sm hover:opacity-90 transition-all">
                Enviar Código
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-xs text-primary font-medium hover:underline">Volver al inicio de sesión</a>
        </div>
    </div>
</main>
@endsection