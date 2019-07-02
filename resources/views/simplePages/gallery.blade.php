@extends('layouts.app')
@section('title',' - Team')
@section('styles')
<style>
.big {
  margin-top: 0.9rem;
}
.intrinsic-container iframe{
  margin: 0px auto 0px;width: 100%;min-height: 100%;
}
@media screen and (max-width: 768px) {
  .big {
    margin-top: 0rem;
  }
}
</style>
@endsection
@section('content')
<?php
$relatedVideosCount = count($videos);
?>
<section id="ourTeam" class="hero is-warning">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s" >{{ __('indexPage.moments') }}</h1>
      <h2 class="subtitle has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s">{{ __('indexPage.momentsSub') }}</h2>
    </div>
  </div>
</section>
<section id="ourTeamList" class="section teamlist">
  <?php
        $directory = realpath(dirname(__FILE__)); //$_SERVER['REQUEST_URI']. "fm/photos/IndexGalery/";
        $pos = strpos($directory, 'storage/'); //48
        $basedir = substr($directory, 0, $pos); // /Users/pisti/Projects/kodvetok.com.new_site/kvn/
        $galeryDir = $basedir. "public/fm/photos/shares/IndexGalery/thumbs";
        $scanned_directory = array_diff(scandir($galeryDir), array('..', '.', 'thumbs'));

  ?>

  @if(!empty($scanned_directory))
  <div class="container">
    <div class="columns is-mobile p-b-10">
      <div class="column is-8 is-offset-2">

        <div class="columns owl-carousel owl-theme" id="gt_testimonial_slider">

          @foreach($scanned_directory as $image)
            <div class="column is-one-quarter">
              <div class="card">
                <div class="card-image">
                  <figure class="image">
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
</section>

@if($relatedVideosCount > 0)
<section class="videosection video zoomIn m-b-10" id="videosection">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s" >{{ __('indexPage.ourFavVideos') }}</h1>
      <h2 class="subtitle has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s">{{ __('indexPage.ourFavVideosSub') }}</h2>
    </div>
  </div>

<?php $num = (int)floor($relatedVideosCount / 3 ); ?>
  @if($num > 0)
    @for($n=1;$n<$num+1;$n++)
      <div class="columns is-mobile p-b-10">
        <div class="column is-8 is-offset-2">
          <div class="tile is-ancestor">
            @if($n % 2 == 0)
              <div class="tile is-4 is-vertical is-parent">
                <div class="tile is-child box videocontent">
                  <div class="intrinsic-container intrinsic-container-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $videos[3*$n-2]->yt_video_id}}" allowfullscreen="" style=""></iframe>
                  </div>
                </div>
                <div class="tile is-child box videocontent">
                  <div class="intrinsic-container intrinsic-container-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $videos[3*$n-1]->yt_video_id}}" allowfullscreen="" style=""></iframe>
                  </div>
                </div>
              </div>

              <div class="tile is-parent">
                <div class="tile is-child box videocontent">
                  <div class="intrinsic-container intrinsic-container-16x9 big" style="">
                    <iframe src="https://www.youtube.com/embed/{{ $videos[3*$n-3]->yt_video_id}}" allowfullscreen="" style=""></iframe>
                  </div>
                </div>
              </div>
            @else
              <div class="tile is-parent">
                <div class="tile is-child box videocontent">
                  <div class="intrinsic-container intrinsic-container-16x9 big" style="">
                    <iframe src="https://www.youtube.com/embed/{{ $videos[3*$n-3]->yt_video_id}}" allowfullscreen="" style=""></iframe>
                  </div>
                </div>
              </div>

              <div class="tile is-4 is-vertical is-parent">
                <div class="tile is-child box videocontent">
                  <div class="intrinsic-container intrinsic-container-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $videos[3*$n-2]->yt_video_id}}" allowfullscreen="" style=""></iframe>
                  </div>
                </div>
                <div class="tile is-child box videocontent">
                  <div class="intrinsic-container intrinsic-container-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $videos[3*$n-1]->yt_video_id}}" allowfullscreen="" style=""></iframe>
                  </div>
                </div>
              </div>
            @endif
          </div>
        </div>
      </div>
    @endfor
  @else
  <div class="columns is-mobile p-b-10">
    <div class="column is-6 is-offset-3">
      <div class="tile is-ancestor">

        <div class="tile is-parent">
          <div class="tile is-child box videocontent">
            <div class="intrinsic-container intrinsic-container-16x9 " style="">
              <iframe src="https://www.youtube.com/embed/{{ $videos[0]->yt_video_id}}" allowfullscreen="" style=""></iframe>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  @endif
</section>
@endif



@endsection
