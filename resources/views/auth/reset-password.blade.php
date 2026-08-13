@extends('layouts.app')

@section('title', "Ch'Tacos - Restablecer Contraseña")

@section('content')
<main class="flex items-center justify-center min-h-[calc(100vh-140px)] px-4 py-10">
    <div class="w-full max-w-md bg-surface-container-low rounded-xl p-6 border border-outline-variant shadow-lg">
        <h2 class="text-headline-md font-bold text-on-surface text-center mb-2">Restablecer Contraseña</h2>
        <p class="mb-6 text-center text-sm text-on-surface-variant">Ingresa el código que te enviamos por correo.</p>

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
                <input type="text" name="code" id="code" maxlength="6" required class="mt-1 block w-full text-center text-xl font-bold tracking-widest rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-on-surface focus:border-primary">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-on-surface">Nueva Contraseña</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-sm text-on-surface focus:border-primary">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-on-surface">Confirmar Nueva Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 block w-full rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-sm text-on-surface focus:border-primary">
            </div>

            <button type="submit" class="w-full py-3 bg-primary text-on-primary rounded-xl font-semibold shadow-sm hover:opacity-90 transition-all">
                Cambiar Contraseña
            </button>
        </form>
    </div>
</main>
@endsection