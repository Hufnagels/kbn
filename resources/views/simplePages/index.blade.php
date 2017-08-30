@extends('layouts.app')
@section('title',' - Home')
@section('styles')
<style>
.gt_testi2_wrap p:before {
    content: "\f10d";
    position: absolute;
    font-family: FontAwesome;
    top: -25px;
    left: -10px;
    width: auto;
    height: auto;
    color: rgba(174, 216, 139, 0.57);
    font-size: 45px;
    z-index: -1;
}


.gt_testimonial2_slider, .gt_testi2_wrap, .gt_testi2_detail {

  width: 100%;
  position: relative;
}
.gt_testi2_wrap {
  background-color: #fff;
  z-index: 2;
}

@media screen and (min-width: 769px), print
{

}
.owl-item .column.is-one-quarter,
.owl-item .column.is-one-quarter-tablet {
    width: 100%;
}
.owl-item .column.is-one-quarter .card {
  z-index: 0;
}


</style>
@endsection
@section('content')


<!--
<div class="home-welcome is-fixed" style="position:absolute;top0;bottom:0;left:0;right:0;">Welcome page</div>
-->
<section class="headersection" id="headersection">

  <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('/images/header/render07.png') }}">

    <section class="hero has-text-centered">
      <div class="hero-body m-t-40">
        <div class="container">
          <h1 class="title is-size-1 is-spaced is-uppercase wow bounceInDown" data-wow-duration="5s" data-wow-delay=".1s" style="visibility:hidden;">
            Kódvetők
          </h1>
          <h2 class="subtitle is-size-3 is-spaced has-text-warning is-lowercase m-t-70 wow bounceInDown" data-wow-duration="2s" data-wow-delay=".1s" style="visibility:hidden;">
            a Kódfarmon
          </h2>
        </div>
      </div>
    </section>

  </div>

  @include('simplePages.index.header')

</section>

<section class="testimonial wow fadeInUp" id="testimonialsection"  data-wow-duration="5s" data-wow-delay="1s" style="visibility:hidden;">
  <div class="hero-body">
    <div class="container gt_hdg_1 white_hdg">
      <h1 class="title has-text-centered wow zoomIn" data-wow-duration="5s" data-wow-delay="1s" >Rólunk mondták</h1>
      <h2 class="subtitle has-text-centered wow zoomIn" data-wow-duration="5s" data-wow-delay="1s">Milyenek vagyunk mi?</h2>
    </div>
  </div>

  @include('simplePages.index.testimonial')



</section>

<section class="gallery wow zoomIn" id="gallerysection">

</section>

<section class="" id="">

</section>

<section class="" id="">

</section>


@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/js/parallax.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){

  $('.headersection .parallax-window').parallax({imageSrc: "{{ asset('/images/header/headerimage.jpg') }}"});

  console.log('Owl');

});
  // $('.owl-carousel').owlCarousel()


</scripts>
@endsection
