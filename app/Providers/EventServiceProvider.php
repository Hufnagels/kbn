<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Unisharp\Laravelfilemanager\Events\ImageIsUploading;
use Unisharp\Laravelfilemanager\Events\ImageWasUploaded;

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

    protected $subscribe = [
        \App\Listeners\UploadListener::class
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
/*
        //dd('vege');
         Event::listen('Unisharp\Laravelfilemanager\Events\Image*', function ($eventName, $data){

           switch ($eventName) {
             case 'Unisharp\Laravelfilemanager\Events\FolderIsRenaming': break;
             case 'Unisharp\Laravelfilemanager\Events\FolderWasRenamed':
// dd($eventName);
// dd($data);
//               break;
             case 'Unisharp\Laravelfilemanager\Events\ImageWasDeleted': break;
             case 'Unisharp\Laravelfilemanager\Events\ImageWasRenamed': break;
             case 'Unisharp\Laravelfilemanager\Events\ImageWasUploaded':
             
             echo '<pre>';
             $array =  (array) $data[0];
             foreach($array as $key => $value)
             print_r($value);
             
             echo '</pre>';


                break;
             case 'Unisharp\Laravelfilemanager\Events\ImageIsUploading':
//dd($data);
                 break;
           }
         });
*/
    }
}
