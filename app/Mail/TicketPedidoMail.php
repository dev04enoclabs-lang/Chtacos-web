<?php

namespace App\Mail;

use Dom\Implementation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketPedidoMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $datos;

    public function __construct(array $datos)
    {
        $this->datos = $datos;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ticket de compra - ' . ($this->datos['establecimiento'] ?? 'Ch\'Tacos'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.tickkey',
            with: ['datos' => $this->datos],
        );
    }
}
