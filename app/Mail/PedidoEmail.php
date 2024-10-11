<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class PedidoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido = [];
    /**
     * Create a new message instance.
     */
    public function __construct(array $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pedido #' . $this->pedido['pedidoToken'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('emails.pedido')
                    ->with([
                        'pedidoId' => $this->pedido['pedidoToken'],
                        'clienteNome' => $this->pedido['clienteNome'],
                        'produtos' => $this->pedido['produtos']
                    ]);
        
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
