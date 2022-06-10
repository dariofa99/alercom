<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
class SendUserResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user )
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // dd("hols");
        return $this->view('content.mails.reset_password',[
            'user'=>$this->user,
            "token"=>$this->user->remember_token
        ])
        ->subject("Alercom: Cambio de contraseña")
        //->bcc('darioj99@gmail.com')
        ->from('djdchave@gmail.com', 'PNUD')
          ;
    }
}
