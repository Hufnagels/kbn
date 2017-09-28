<?php

namespace App\Jobs;

use App\Notifications\ContactSended;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ContactEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $type;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$type)
    {
        $this->email = $email;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//dd($this->post->slug);  
$user = \App\User::where('email','kbvconsulting@gmail.com')->find(1);
//dd(new NewsCreated($this->post));
$user->notify( new ContactSended($this->email, $this->type) );
    }
}
