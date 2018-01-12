@extends('layouts.app')
@section('title',' - Home')
@section('styles')
<style>

.owl-theme .owl-nav.disabled + .owl-dots {
    display: block;
}
.has-text-kv0 {
    color: #9E9E9E !important;
    margin-bottom: 0 !important;
    font-family: 'SilomRegular' !important;
    text-transform: none !important;
}
.headersection .hero .title:not(.has-text-kv) {
    /* font-size: 4rem !important; */

}
@media screen and (max-width: 768px)
{

    .owl-theme .owl-nav.disabled + .owl-dots {
        display: none;
    }
}
</style>
@endsection
@section('content')

  <section class="headersection" id="headersection">

    <div class="parallax-window" >
      <a class="" href="{{ route('enigma')}}" ><img class="parallaxImage" src="{{ asset('/images/header/enigma_kod_v007_folap1.jpg') }}"></a>
      <!-- <div class="hero has-text-right">
        <div class="hero-body">
          <div class="container">
            <h1 class="title is-size-3 is-spaced has-text-kv0 is-uppercase  bounceInDown" data-wow-duration="1s" data-wow-delay=".1s" >
              Első feladvány
            </h1>
            <h2 class="title is-size-3 is-spaced has-text-kv is-uppercase m-t-0  bounceInDown" data-wow-duration="2s" data-wow-delay=".1s" >
              2018
            </h2>
            <h2 class="title is-size-3 is-spaced has-text-kv is-uppercase m-t-0  bounceInDown" data-wow-duration="3s" data-wow-delay=".1s" >
              01.08.
            </h2>

            <p class="is-size-4 is-spaced has-text-white-bis has-text-weight-semibold has-text-right m-t-50 bounceInDown" data-wow-duration="5s" data-wow-delay=".1s" >
              <a class="button is-game is-medium" href="{{ route('enigma')}}" >Irány a kódtörés!</a>
            </p>

          </div>
        </div>
      </div> -->

    </div>



  </section>
<div class="wrapper">
  <div class="headersection2">
    @include('simplePages.index.s01_posts')
  </div>
  <div class="pen"><img src="/images/pen_v001.png" style="width: 300px; display:none;"></div>

  <section class="aboutsection about fadeInUp" id="aboutsection">
    @include('simplePages.index.s06_about')
  </section>

  <section class="testimonialsection testimonial fadeInUp" id="testimonialsection" style="display:none;">
    @include('simplePages.index.s02_testimonial')
  </section>

  <section class="photossection zoomIn m-b-10" id="teamsection">
    @include('simplePages.index.s05_team')
  </section>

  <section class="videosection video zoomIn m-b-10" id="videosection">
    @include('simplePages.index.s03_video')
  </section>

  <section class="photossection zoomIn m-b-10" id="imagesection">
    @include('simplePages.index.s04_galery')
  </section>

</div>
@endsection

@section('scripts')
  @include('simplePages.scripts.parallax')
@endsection
