<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class ContactSended extends Notification
{
    use Queueable;

    public function __construct($email, $type)
    {
        $this->email = $email;
        $this->type = $type;
    }

    public function via($notifiable)
    {
//        return ['mail'];
        return ['database'];
    }

    public function toDatabase($notifiable)
    {

        $data  = $this->email;
        return [
            'type' => $this->type,
            'name' => $data['name'],
            'email' => $data['email'],
            'created_at' => Carbon::now(),
            'message' => $data['message'],
        ];
    }
    
    public function toMail($notifiable)
    {
        return [];
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    
}
