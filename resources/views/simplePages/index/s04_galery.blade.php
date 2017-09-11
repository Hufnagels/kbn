<?php
      $directory = realpath(dirname(__FILE__)); //$_SERVER['REQUEST_URI']. "fm/photos/IndexGalery/";
      $pos = strpos($directory, 'storage/'); //48
      $basedir = substr($directory, 0, $pos); // /Users/pisti/Projects/kodvetok.com.new_site/kvn/
      $galeryDir = $basedir. "public/fm/photos/shares/IndexGalery/thumbs";
      $scanned_directory = array_diff(scandir($galeryDir), array('..', '.', 'thumbs'));

?>

@if(!empty($scanned_directory))
<div class="photos">
    <div class="hero-body">
      <div class="container">
        <h1 class="title has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s" >Emlékezetes pillanatok</h1>
        <h2 class="subtitle has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s">Szösszenetek a műhelyéletből</h2>
      </div>
    </div>

    <div class="columns is-mobile p-b-10">
      <div class="column is-8 is-offset-2">

        <div class="columns owl-carousel owl-theme" id="gt_testimonial_slider">
          
          @foreach($scanned_directory as $image)
            <div class="column is-one-quarter">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <img src="{{ asset("/fm/photos/shares/IndexGalery/$image") }}" alt="">
                  </figure>
                </div>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
</div>
  
@endif