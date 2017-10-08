<?php

namespace App\Listeners;

use Illuminate\Events\Dispatcher;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class UploadListener
{
    protected $events;
    protected $event;

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     */

     public function subscribe($events)
     {
         $events->listen(
            'Unisharp\Laravelfilemanager\Events\ImageWasUploaded',
            'App\Listeners\UploadListener@onImageWasUploaded'
         );

         $events->listen(
            'Unisharp\Laravelfilemanager\Events\ImageWasRenamed',
            'App\Listeners\UploadListener@onImageWasRenamed'
         );

         $events->listen(
            'Unisharp\Laravelfilemanager\Events\ImageWasDeleted',
            'App\Listeners\UploadListener@onImageWasDeleted'
         );

         $events->listen(
            'Unisharp\Laravelfilemanager\Events\FolderWasRenamed',
            'App\Listeners\UploadListener@onFolderWasRenamed'
         );
     }

/*
    public function subscribe(Dispatcher $events)
    {
        $this->events = $events;
        $events->listen('Unisharp\Laravelfilemanager\Events\*', UploadListener::class);
    }

*/
/*
    public function handle($event)
    {
        $this->event = $event;
//dd($event);
        $method = 'on'.class_basename($event);
        if (method_exists($this, $method)) {
            call_user_func([$this, $method], $event);
        }
    }
*/
    public function onImageWasUploaded($event)
    {
        $path = $event->path();
/*
echo $path;
*/
        // $path : /Users/pisti/Projects/kodvetok.com.new_site/kvn/public/fm/photos/shares/Veszprem/IMG_20170726_115529.jpg
        $pos = strpos($path, 'public/'); //48
        $lfmString = substr($path, $pos + 6); // /fm/photos/shares/Veszprem/IMG_20170726_115529.jpg
        $lfmThumbDir = config('lfm.thumb_folder_name');

        //path info of given file
        $path_parts = pathinfo($lfmString);
        $dirname = $path_parts['dirname']; // /fm/photos/shares/Veszprem
        $basename =  $path_parts['basename']; // IMG_20170726_115529.jpg
        $ext =  $path_parts['extension']; // jpg
        $filename = $path_parts['filename']; // IMG_20170726_115529

        $base_dir = substr($path, 0, strpos($path, $basename)); // //Users/pisti/Projects/kodvetok.com.new_site/kvn/public/fm/photos/shares/Veszprem/
/* TEST IF PROFILE PICTURE */
        $teampos = strpos($dirname, config('ownAttributes.lfmSettings.image.avatar.path'));
//dd($teampos);
        if($teampos > 0)
        {
          /* RESIZE ORIG IMAGE */
          Image::make($path)
               ->resize(null, config('ownAttributes.lfmSettings.image.avatar.height'), function ($constraint) {
                   $constraint->aspectRatio();
                   })
              //->fit(config('ownAttributes.lfmSettings.image.avatar.width'), config('ownAttributes.lfmSettings.image.avatar.height'))
              ->save($path, 90);
        } else {
          /* RESIZE ORIG IMAGE */
          Image::make($path)
              // ->resize(config('ownAttributes.lfmSettings.image.resized.width'), null, function ($constraint) {
              //     $constraint->aspectRatio();
              //     })
              ->fit(config('ownAttributes.lfmSettings.image.resized.width'), config('ownAttributes.lfmSettings.image.resized.height'))
              ->save($path, 90);
        }



        /* OPTIMIZE IMAGE*/
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($path);
//app(Spatie\ImageOptimizer\OptimizerChain::class)->optimize($path);

        /* CREATE INDIVIDUAL THUMBS */
        /*
        $thumbTypeArray = config('ownAttributes.lfmSettings.image.thumbs');
        foreach($thumbTypeArray as $thumbArray)
        {

            $new_file_path = $base_dir . $lfmThumbDir . "/" . $filename . "_" . $thumbArray['extPref']. "." . $ext;
            Image::make($path)
            ->orientate() //Apply orientation from exif data
            ->resize($thumbArray['width'], null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($new_file_path, 90);
        }
        */
/**
TODO
DB:save
**/


    }

    public function onImageWasRenamed($event)
    {
        // image was renamed
    }

    public function onImageWasDeleted($event)
    {
        // image was deleted
    }

    public function onFolderWasRenamed($event)
    {
        // folder was renamed
    }

}
