@extends('layouts.app') {{-- Reemplaza por tu layout principal --}}

@section('content')
    <div class="container py-4">
        <div class="card shadow-sm border-0 mx-auto" style="max-width: 500px;">
            <div class="card-header bg-danger text-white text-center py-3">
                <h5 class="mb-0 fw-bold">Registrar Nuevo Usuario</h5>
            </div>
            <div class="card-body p-4">

                @if (session('success'))
                    <div
                        class="mb-4 flex flex-col gap-1 rounded-xl border border-emerald-300 bg-emerald-100 p-4 text-emerald-900 shadow-sm">
                        <div class="flex items-center justify-between">
                            <h5 class="text-sm font-bold text-emerald-950">¡Registro Exitoso!</h5>
                            <button type="button" onclick="this.parentElement.parentElement.remove()"
                                class="text-emerald-700 hover:text-emerald-950">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <p class="text-xs text-emerald-800">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-on-surface">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="mt-1 block w-full rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-sm text-on-surface placeholder:text-on-surface-variant focus:border-primary focus:ring-primary"
                            placeholder="Ej. Jesus Alberto" required>
                    </div>

                    <div class="mb-4">
                        <label for="last_name" class="block text-sm font-medium text-on-surface">Apellidos</label>
                        <input type="text" name="last_name" id="last_name"
                            class="mt-1 block w-full rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-sm text-on-surface placeholder:text-on-surface-variant focus:border-primary focus:ring-primary"
                            placeholder="Ej. Cruz Hernández" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-on-surface">Correo Electrónico</label>
                        <input type="email" name="email" id="email"
                            class="mt-1 block w-full rounded-lg border border-outline-variant bg-surface-container-highest px-3 py-2 text-sm text-on-surface placeholder:text-on-surface-variant focus:border-primary focus:ring-primary"
                            placeholder="ejemplo@chtacos.com" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-on-surface">Contraseña</label>
                        <div class="relative mt-1">
                            <input type="password" name="password" id="password" required placeholder="••••••••"
                                class="block w-full rounded-lg border border-outline-variant bg-surface-container-highest pl-3 pr-10 py-2 text-sm text-on-surface placeholder:text-on-surface-variant focus:border-primary focus:ring-primary">

                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-on-surface-variant hover:text-on-surface transition-colors focus:outline-none"
                                aria-label="Mostrar u ocultar contraseña">
                                <i id="toggleIcon" class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between gap-4 mt-6">
                        <a href="javascript:history.back()"
                            class="inline-flex items-center justify-center rounded-xl border border-outline-variant bg-transparent px-4 py-2.5 text-sm font-medium text-on-surface-variant transition hover:bg-surface-container-highest">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-xl bg-primary px-5 py-2.5 text-sm font-semibold text-on-primary shadow-sm transition hover:opacity-90 active:scale-[0.99]">
                            Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@push ('scripts')
<script src="{{ asset('assets/js/register.js') }}"></script>
@endpush
@endsection
