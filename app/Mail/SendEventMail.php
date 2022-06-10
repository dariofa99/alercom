<?php

namespace App\Mail;

use App\Models\EventReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEventMail extends Mailable
{
    use Queueable, SerializesModels;

    private $token;
    private $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token,EventReport $event)
    {
        $this->token = $token; 
        $this->event = $event; 
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
            'token'=>$this->token,
            'event'=>$this->event
        ])
        ->subject("Alercom: Alerta")
        ->from('djdchave@gmail.com', 'PENUD')
          ;
    }
}
