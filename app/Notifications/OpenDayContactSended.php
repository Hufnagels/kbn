<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Carbon\Carbon;

class OpenDayContactSended extends Notification
{
    use Queueable;

    public function __construct($email, $type)
    {
        $this->email = $email;
        $this->type = $type;
    }

    public function via($notifiable)
    {
      //  return ['mail'];
      //  return ['database'];
      return ['database','mail'];
    }

    public function toDatabase($notifiable)
    {

        $data  = $this->email;
        return [
            'type' => $this->type,
            'name' => $data['name'],
            'age' => $data['age'],
            'selectedDateTime' => $data['selectedDateTime'],
            'contact' => $data['contact'],
        ];
    }

    public function toMail($notifiable)
    {
      $data  = $this->email;
//         return (new MailMessage)->view(
//                     'emails.webcontact', [
//                       'type' => $this->type,
//                       'name' => $data['name'],
//                       'email' => $data['email'],
//                       'created_at' => Carbon::now(),
//                       'message' => $data['message'],
//                     ]
//                 );
        return (new MailMessage)
                ->greeting('Contact us email from website!')
                ->line('Sender name: '. $data['name'])
                ->line('Sender email: '. $data['email'])
                ->line('Sender message: '. $data['message']);

                // ->action('View Invoice', $data['email'])
                // ->line('Thank you for using our application!');
        // \Mail::send('emails.webcontact', ['user' => $data], function ($m) use ($data) {
        //
        //      $m->from('kbvconsulting@gmail.com', 'Kodvetok website contact sender');
        //
        //      $m->to('kbvconsulting@gmail.com', 'admin')
        //        ->subject('From Your Website (a new contact): ' );
        //
        //  });
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


}
