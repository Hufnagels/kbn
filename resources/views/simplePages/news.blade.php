@extends('layouts.app')
@section('title',' - News')
@section('styles')
<style>
#app {
    margin-right: 0px;
}
.notification {
    padding: 1.25rem;
    background-color:transparent;
}
.notification .card{
    margin: 1.25rem;
}
</style>
@endsection
@section('content')

<section id="ourTeam" class="hero is-info">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">{{$item->title}}</h1>
      <h2 class="subtitle has-text-centered">{{$item->subtitle}}</h2>
    </div>
  </div>
</section>

  <div class="container m-t-20">
    <div class="columns">
      <div class="column is-three-quarters">

        <div class="box">
          <article class="media">
            @if ($item->imageUrl)
            <div class="media-left">
              <figure class="image is-150x150">
                <img src="{{ $item->imageUrl }}" alt="{{$item->title}}">
              </figure>
            </div>
            @endif
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{$item->author->name}}</strong> |
                  <small>{{ '@'.str_slug($item->author->name,'') }}</small> |
                  <small>{{$item->date}}</small> | 
                  <small><a href="{{ route('news.category', $item->category->slug)}}">{{$item->category->title}}</a></small>
                </p>
              </div>
              <nav class="level is-mobile">
                <div class="level-left">
                  <a class="level-item"><span class="icon is-small"><i class="fa fa-reply"></i></span></a>
                  <a class="level-item"><span class="icon is-small"><i class="fa fa-retweet"></i></span></a>
                  <a class="level-item"><span class="icon is-small"><i class="fa fa-heart"></i></span></a>
                </div>
              </nav>
              <div class="content">
                <h3>{!! $item->excerpt_html !!}</h3>
              </div>

            </div>
          </article>
          <div class="content">
            {!! $item->body_html !!}
          </div>
        </div>

      </div><!-- end of left column -->

      <div class="column">

        @include('simplePages.sidebar')

      </div>
    </div>
  </div>
@endsection
