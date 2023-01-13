<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class notificationMailable extends Mailable
{
    use Queueable, SerializesModels;
     
    public function __construct()
    {
        //
    }
   
    public function envelope()
    {
        return new Envelope(
            subject: 'Notificación de registro',
        );
    }
   
    public function content()
    {
        return new Content( view: 'emails.notificacion', );
    }
   
    public function attachments()
    {
        return [];
    }
}
