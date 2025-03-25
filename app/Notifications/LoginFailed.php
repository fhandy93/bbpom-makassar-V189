<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginFailed extends Notification
{
    use Queueable;

    protected $email;
    protected $time;

    public function __construct($email, $time)
    {
        $this->email = $email;
        $this->time = $time;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Login Attempt Failed')
                    ->line('A login attempt failed for the email: ' . $this->email)
                    ->line('Time of attempt: ' . $this->time)
                    ->line('If this was not you, please take appropriate action.');
    }
}
