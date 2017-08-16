@extends('layouts.app')
@section('title',' - News')
@section('styles')
<style>
#app {
    margin-right: 0px;
}

.news-container small.icon.is-small.postcount {
    min-width: 5rem;
}
.news-container .postcount >i.fa.fa-clone {
    margin-right: .3rem;
}
.news-sidebar .panel-heading.is-warning {
    background-color: #ffdd57;
    border-color: transparent;
    color: rgba(0, 0, 0, 0.7);
}
.news-sidebar .panel-heading.is-info {
    background-color: #3273dc;
    border-color: transparent;
    color: rgba(0, 0, 0, 0.7);
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

  <div class="container m-t-20 news-container">
    <div class="columns">
      <div class="column is-three-quarters">

        <div class="box">
          <article class="media">
            @if ($item->imageUrl)
            <div class="media-left">
              <figure class="image is-500x340">
                <img src="{{ $item->imageUrl }}" alt="{{$item->title}}">
              </figure>
            </div>
            @endif
            <div class="media-content">
              <div class="content">
                <p>
                  <strong><a href="{{ route('news.author', $item->author->slug)}}">{{$item->author->name}}</a></strong> |
                  <small>{{ '@'.str_slug($item->author->name,'') }}</small> <br>
                  <small>{{$item->date}}</small> |
                  <small><a href="{{ route('news.category', $item->category->slug)}}">{{$item->category->title}}</a></small> |
                  <?php $postCount = $item->author->news->count(); ?>
                  <small class="icon is-small postcount"><i class="fa fa-clone"></i>{{$postCount}} {{str_plural('post', $postCount)}}</small>
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
          <div class="content m-t-30">
            {!! $item->body_html !!}
          </div>
        </div>

      </div><!-- end of left column -->

      <div class="column news-sidebar">

        @include('simplePages.sidebar')

      </div>
    </div>
  </div>
@endsection
