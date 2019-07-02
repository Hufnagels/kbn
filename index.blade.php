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
.opencoursesection {
    margin-top: -1px;
}
.opencoursesection > .hero-body {
  background-color:#110022;
  /* #ff3860; */
  margin-bottom:20px;
}
.headersection2 > .hero-body {
  background-color: #0e2941;
    margin-bottom: 20px;
    margin-top: -6px;
}

</style>
@endsection
@section('content')



<div class="wrapper">





  <section class="headersection" id="headersection">
    <div class="parallax-window" >
      <a class="" href="{{ route('enigma')}}" ><img class="parallaxImage" src="{{ asset('/images/header/enigma_kod_v007_folap3.jpg') }}"></a>
    </div>
  </section>

  <div class="headersection2 m-b-20">
    @include('simplePages.index.s01_posts')
  </div>

  <section class="imagesection" id="imagesection" style="">
    <a class="" href="#opencoursesection"><img class="image" src="{{ asset('/images/header/kodvetoszorolap_A5_v002.jpg') }}"></a>
  </section>

</div>
@endsection
