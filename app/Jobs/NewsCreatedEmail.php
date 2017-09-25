<?php

namespace App\Jobs;

use App\News;
use App\Notifications\NewsCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NewsCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $post;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(News $post)
    {
        $this->post = $post;
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
$user->notify( new NewsCreated($this->post) );
    }
}
