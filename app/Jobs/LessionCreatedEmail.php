<?php

namespace App\Jobs;

use App\Lession;
use App\Notifications\LessionCreated;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class LessionCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lession;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Lession $lession)
    {
        $this->lession = $lession;
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
$user->notify( new LessionCreated($this->lession) );
    }
}
