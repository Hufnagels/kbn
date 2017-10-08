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
<?php
$relatedVideosCount = count($videos);
?>
@if($relatedVideosCount > 0)
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s" >{{ __('indexPage.ourFavVideos') }}</h1>
      <h2 class="subtitle has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s">{{ __('indexPage.ourFavVideosSub') }}</h2>
    </div>
  </div>


  @if($relatedVideosCount > 2)
  <div class="columns is-mobile p-b-10">
    <div class="column is-8 is-offset-2">

      <div class="columns owl-carousel owl-theme" id="gt_testimonial_slider">

        @foreach($videos as $video)
          <div class="column is-one-quarter">
            <div class="card">
              <div class="card-image">
                <div class="tile is-child box videocontent">
                  <div class="intrinsic-container intrinsic-container-16x9 big" style="">
                    <iframe src="https://www.youtube.com/embed/{{ $video->yt_video_id}}" allowfullscreen="" style=""></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </div>
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
@endif
