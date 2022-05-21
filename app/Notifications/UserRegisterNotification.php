<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class UserRegisterNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //Log::info("Notifiable");
       // Log::info($notifiable['name']);
        return (new MailMessage)
        ->subject('Bienvenido a Alercom')
        ->from("alercom@gmail.com")
        ->view('content.mails.user_register',[
            'user'=>$notifiable,
            "token"=>$notifiable->remember_token
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type_notification'=>'Registro de usuario',          
            'message'=>($notifiable['name'])." se ha registrado",
            'url'=>"/admin/users/".$notifiable['id']."/edit",
            'created_at'=>date("Y-m-d H:i:s"),
            'icon'=>'fas fa-user'
        ];
    }
}
