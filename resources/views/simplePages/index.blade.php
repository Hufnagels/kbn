@extends('layouts.app')
@section('title',' - Home')
@section('styles')
<style>
.headersection {
  min-height:900px;
}
.headersection .parallax-window {
  min-height:900px;
}
.headersection .tile.information
{
    margin-left: 10%;
    margin-right: 10%;
    position: relative;
    top: -50px;
}
.headersection .notification
{
  padding: 0;
}

.headersection .card {
  background: transparent;
  -webkit-box-shadow: none;
    box-shadow: none;
}

.testimonial {
  min-height:400px;
  background-image: url( '/images/header/testimonial-overlay.png' );
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    padding-bottom: 65px;
    background-color: rgb(175, 23, 65);
    position: relative;
}
.testimonial:before {
    content: "";
    position: absolute;
    top: 0px;
    width: 100%;
    height: 100%;
    background-image: url('/images/header/testimonial-overlay.png');
    background-repeat: repeat;
    background-position: center;
    opacity: 1;
}
.gt_hdg_1 {

    width: 100%;
    position: relative;
    text-align: center;

}
.gt_hdg_1.white_hdg h1, .gt_hdg_1.white_hdg h2 {
    color: #fff;
}
.gt_hdg_1 h1 {
    text-transform: uppercase;
    font-weight: 600;
}
</style>
@endsection
@section('content')


<!--
<div class="home-welcome is-fixed" style="position:absolute;top0;bottom:0;left:0;right:0;">Welcome page</div>
-->
<section class="headersection" id="">

  <div class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('/images/header/render07.png') }}">

    <section class="hero has-text-centered">
      <div class="hero-body m-t-40">
        <div class="container">
          <h1 class="title is-size-1 has-text-danger is-uppercase wow bounceInDown" data-wow-duration="5s" data-wow-delay=".1s" style="visibility:hidden;">Kódvetők</h1>
          <h2 class="title is-size-3 has-text-warning is-lowercase m-t-20 wow bounceInDown" data-wow-duration="2s" data-wow-delay=".1s" style="visibility:hidden;">Kódfarm</h2>
        </div>
      </div>
    </section>
  </div>

  <div class="tile is-ancestor information">
    <?php
    $colorArray = ['is-success', 'is-warning', 'is-info', 'is-danger'];
    $index = 0;
    ?>
    @foreach ($latestpostswithimages as $post)

    <div class="tile is-parent ">
      <article class="tile is-child notification {{ $colorArray[$index]}}  wow bounceInDown" data-wow-duration="2s" data-wow-delay="1s">
        <div class="card wow animated ">
          <!-- -->
          <div class="card-image"><figure class="image is-4by3"><img src="{{ $post->image_thumb_url }}" alt="{{$post->title}}"></figure></div>

          <div class="card-content">

            <div class="content">
              <h3 class="subtitle"><a class="" href="{{ route('news.show', $post->slug)}}">{{$post->title}}</a></h3>
              <!--<p>{{$post->excerpt}}</p>-->

              <p>
                <strong><a href="{{ route('news.author', $post->author->slug)}}">{{$post->author->name}}</a></strong> |
                <small>{{ '@'.str_slug($post->author->name,'') }}</small> |
                <small>{{$post->date}}</small> |
                <small><a href="{{ route('news.category', $post->category->slug)}}">{{$post->category->title}}</a></small> |
                {!! $post->tags_html !!}
              </p>
              <!-- -->
            </div>

          </div>
        </div>
      </article>
    </div>
    <?php
    $index++;
    ?>
    @endforeach

    <div class="tile is-parent">
      <article class="tile is-child notification is-danger">
        <p class="title">Two</p>
        <p class="subtitle">Subtitle</p>
      </article>
    </div>

</div>

</section>

<section class="testimonial wow fadeInUp" id="" style="visibility:hidden;" data-wow-duration="5s" data-wow-delay="1s">
  <div class="hero-body">
    <div class="container gt_hdg_1 white_hdg">
      <h1 class="title has-text-centered wow zoomIn" data-wow-duration="5s" data-wow-delay="1s" >Rólunk mondták</h1>
      <h2 class="subtitle has-text-centered wow zoomIn" data-wow-duration="5s" data-wow-delay="1s">Kik vagyunk mi?</h2>
    </div>
  </div>
</section>

<section class="" id="">

</section>

<section class="" id="">

</section>

<section class="" id="">

</section>


@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/parallax.min.js"></script>
<script type="text/javascript">

  $('.headersection .parallax-window').parallax({imageSrc: "{{ asset('/images/header/headerimage.jpg') }}"});
  alert( 'js works:' + $('.parallax-window') );
</scripts>
@endsection
