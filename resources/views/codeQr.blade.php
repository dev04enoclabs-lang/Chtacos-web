@extends('layouts.app')

@section('title', "Ch'Tacos - Qr de Contacto ")

@section('content')
    <div class="flex min-h-[calc(100vh-140px)] items-center justify-center px-4 py-8">
        <div
            class="w-full max-w-md rounded-[28px] border border-outline-variant bg-surface-container-lowest p-6 text-center shadow-lg">

            <!-- Encabezado de la Sección -->
            <div class="mb-6">
                <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full bg-primary/10 text-primary">
                    <i class="fa-solid fa-qrcode text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-on-surface">Escanea para Obtener la Clave de Transferencia</h2>
                <p class="mt-1 text-sm text-on-surface-variant">
                    Escanea con la cámara de tu celular el Qr para obtener la clave de tranferencia de <span
                        class="font-semibold text-primary">Ch'Tacos</span> en WhatsApp
                </p>
            </div>
            <!-- Div donde se renderiza el QR -->
            <div class="my-6 flex justify-center">
                <div class="rounded-2xl border border-outline-variant bg-white p-4 shadow-sm">
                    <div id="qrcode" class="flex justify-center"></div>
                </div>
            </div>

            <!-- Acceso Directo por Botón -->
            <div class="mt-6 space-y-3">
                <a href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#25D366] px-5 py-3.5 text-base font-semibold text-white shadow-sm transition hover:bg-[#20bd5a] active:scale-[0.99]">
                    <i class="fa-brands fa-whatsapp text-xl"></i>
                    Abrir WhatsApp Directo
                </a>
                {{-- <p class="text-xs text-on-surface-variant">
                ¿Estás navegando desde tu celular? Haz clic en el botón superior.
            </p> --}}
            </div>

        </div>
    </div>

    <!-- Librería JS ligera para renderizado de QR -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const qrContainer = document.getElementById('qrcode');
            const whatsappUrl = @json($whatsappUrl);

            if (qrContainer && whatsappUrl) {
                new QRCode(qrContainer, {
                    text: whatsappUrl,
                    width: 220,
                    height: 220,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });
            }
        });
    </script>
@endsection
