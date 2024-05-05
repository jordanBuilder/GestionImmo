<?php

namespace App\Mail;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PropertyContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Property $property,public array $data)
    {
        //contient les infos necessaires à l'envoi d'email

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {   //envelope : represente notre email
        // on y met des infos comme le sujet ou l'expediteur
        return new Envelope(
            subject: 'Property Contact Mail',
            to:'tomegahjordan81@gmail.com',
            replyTo: $this->data['email'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.property.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {   //pour envoyer des fichiers joints
        return [];
    }
}
