<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Event::listen('*', function ($eventName, array $data){
        //   echo($eventName);
        // });

        //dd('vege');
        // Event::listen('Unisharp\Laravelfilemanager\Events\*', function ($eventName, array $data){
        //   switch ($eventName) {
        //     case 'Unisharp\Laravelfilemanager\Events\FolderIsRenaming': break;
        //     case 'Unisharp\Laravelfilemanager\Events\FolderWasRenamed':
        //     // dd($eventName);
        //     // dd($data);
        //       break;
        //     case 'Unisharp\Laravelfilemanager\Events\ImageWasDeleted': break;
        //     case 'Unisharp\Laravelfilemanager\Events\ImageWasRenamed': break;
        //     case 'Unisharp\Laravelfilemanager\Events\ImageWasUploaded':
        //     // dd($eventName);
        //     dd($data);
        //     break;
        //   }
        //
        // });
        //
    }
}
