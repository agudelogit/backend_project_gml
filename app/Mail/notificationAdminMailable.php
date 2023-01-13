<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class notificationAdminMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $users;
    public $paises;
   
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users = User::selectRaw('pais, count(*) as total')
        ->groupBy('pais')
        ->get();
        
        $this->paises = array(
            "32" => "Argentina",
            "68" => "Bolivia (Plurinational State of)",
            "76" => "Brazil",
            "152" => "Chile",
            "170" => "Colombia",
            "218" => "Ecuador",
            "238" => "Falkland Islands (Malvinas)",
            "254" => "French Guiana",
            "328" => "Guyana",
            "600" => "Paraguay",
            "604" => "Peru",
            "239" => "South Georgia and the South Sandwich Islands",
            "740" => "Suriname",
            "858" => "Uruguay",
            "862" => "Venezuela (Bolivarian Republic of)"
            );
               
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        
        return new Envelope(
            subject: 'Notificación de registro para Administrador',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {        
        
        return new Content( view: 'emails.notificacionAdmin', );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
