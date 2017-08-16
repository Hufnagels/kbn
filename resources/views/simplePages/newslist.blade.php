@extends('layouts.app')
@section('title',' - News')
@section('styles')
<style>
#app {
    margin-right: 0px;
}
.news-container .notification {
    padding: 1.25rem;
}

.news-container .notification .card{
    margin: 1.25rem;
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
.news-sidebar .tag.is-sup {margin-top: -15px;
    font-size: .6rem;
    margin-left: 5px;
}
.news-sidebar .panel .media-content .content {
    color: #6f6f6f;
}

.news-container .box:first-child, :not(.box) + .box {
    margin-top: 1.5rem;
}
</style>
@endsection
@section('content')

<section id="newsList" class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">
        Hírek
      </h1>
      <h2 class="subtitle has-text-centered">
        Amit fontosnak tartunk megosztani
      </h2>
    </div>
  </div>
</section>

<div class="container m-t-20 news-container">
  <div class="columns">
    <div class="column is-three-quarters">
      @if(!$news->count() )
      <div class="notification is-danger title">
        <strong>Sorry</strong>, nothing found yet
      </div>
      @else
        @if(isset($categoryName))
        <div class="notification is-info subtitle">
          <strong>Category: </strong>{{$categoryName}}
        </div>
        @endif
        @if(isset($authorName))
        <div class="notification is-info subtitle">
          <strong>Author: </strong>{{$authorName}}
        </div>
        @endif
        @foreach ($news as $item)

        <div class="box">
          <article class="media">
            <div class="media-left">
              <figure class="image is-250x170">
                <img src="{{ $item->image_thumb_url }}" alt="{{$item->title}}">
              </figure>
            </div>
            <div class="media-content">
              <div class="content">
                <h3 class="subtitle"><a class="" href="{{ route('news.show', $item->slug)}}">{{$item->title}}</a></h3>
                <p>{{$item->excerpt}}</p>
                <p>
                  <strong><a href="{{ route('news.author', $item->author->slug)}}">{{$item->author->name}}</a></strong> |
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
            </div>
          </article>
        </div>

        @endforeach
      @endif


      {{$news->links()}}
    </div>
    <div class="column news-sidebar">

      @include('simplePages.sidebar')

    </div>

  </div>

</div>





@endsection
