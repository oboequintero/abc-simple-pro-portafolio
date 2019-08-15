<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ClienteResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            //->line('You are receiving this email because we received a password reset request for your account.')
            //->action('Reset Password', url('cliente/password/reset', $this->token))
            //->line('If you did not request a password reset, no further action is required.');
            ->subject('Recuperar contraseña')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Estás recibiendo este correo porque hiciste una solicitud de recuperacion de contraseña para tu cuenta.')
            //->action('Recuperar contraseña', url('cliente/password/reset', $this->token))
            ->action('Recuperar contraseña', url('cliente/password/reset', $this->token))
            ->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
            ->salutation('Saludos');
    }
}