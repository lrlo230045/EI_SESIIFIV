<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscripcionTallerMail extends Mailable
{
    public $taller;
    public $usuario;

    public function __construct($taller, $usuario)
    {
        $this->taller = $taller;
        $this->usuario = $usuario;
    }

    public function build()
    {
        return $this->subject('Inscripción confirmada')
                    ->view('emails.inscripcion');
    }
}
