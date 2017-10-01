@extends('layouts.app')
@section('title',' - Home')
@section('styles')
<style>



</style>
@endsection
@section('content')


<!--
<div class="home-welcome is-fixed" style="position:absolute;top0;bottom:0;left:0;right:0;">Welcome page</div>
-->

  <section class="headersection" id="headersection">

    <div class="parallax-window" data-parallax="scroll" data-position="left top" data-positionX="left" data-positionY="top" data-androidFix="false" data-image-src="{{ asset('/images/header/headerimage_copy1.jpg') }}">

      <div class="hero has-text-right">
        <div class="hero-body">
          <div class="container">
            <h1 class="title is-size-3 is-spaced has-text-kv is-uppercase wow bounceInDown" data-wow-duration="1s" data-wow-delay=".1s" style="visibility:hidden;">
              {{ __('indexPage.slogen1') }}
            </h1>
            <h2 class="title is-size-3 is-spaced has-text-kv is-uppercase m-t-0 wow bounceInDown" data-wow-duration="2s" data-wow-delay=".1s" style="visibility:hidden;">
              {{ __('indexPage.slogen2') }}
            </h2>
            <h2 class="title is-size-3 is-spaced has-text-kv is-uppercase m-t-0 wow bounceInDown" data-wow-duration="3s" data-wow-delay=".1s" style="visibility:hidden;">
              {{ __('indexPage.slogen3') }}
            </h2>
            <p class="is-size-4 is-spaced has-text-white-bis has-text-weight-semibold m-t-50 wow bounceInDown" data-wow-duration="5s" data-wow-delay=".1s" style="visibility:hidden;">
              {{ __('indexPage.text1') }}<br>
              {{ __('indexPage.text2') }}
            </p>
          </div>
        </div>
      </div>

    </div>

    @include('simplePages.index.s01_posts')

  </section>
<div class="wrapper">

  <div class="pen"><img src="/images/pen_v001.png" style="width: 300px; display:none;"></div>
  <section class="testimonialsection testimonial fadeInUp" id="testimonialsection">
    @include('simplePages.index.s02_testimonial')
  </section>

  <section class="videosection video zoomIn m-b-10" id="videosection">
    @include('simplePages.index.s03_video')
  </section>

  <section class="photossection zoomIn m-b-10" id="postsection">
    @include('simplePages.index.s04_galery')
  </section>

</div>
@endsection

@section('scripts')
  @include('simplePages.scripts.parallax')
@endsection
