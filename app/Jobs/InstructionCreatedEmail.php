<?php

namespace App\Jobs;

use App\Instruction;
use App\Notifications\InstructionCreated;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class InstructionCreatedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $instruction;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Instruction $instruction)
    {
        $this->instruction = $instruction;
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
$user->notify( new InstructionCreated($this->instruction) );
    }
}
