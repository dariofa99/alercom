<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEventMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->cuerpo = 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // dd("hols");
        return $this->view('content.mails.event_report',[
            'cuerpo'=>"msg"
        ])
        ->subject("Alercom: Alerta")
        //->bcc('darioj99@gmail.com')
        ->from('djdchave@gmail.com', 'PENUR')
          ;
    }
}
