@extends('layouts.app')
@section('title',' - News')
@section('styles')
<style>

</style>
@endsection
@section('content')

<section id="newsList" class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">Hírek</h1>
      <h2 class="subtitle has-text-centered">Amit fontosnak tartunk megosztani</h2>
    </div>
  </div>
</section>

<div class="container m-t-20 news-container">
  <div class="columns">
    <div class="column is-three-quarters">
      @if(!$news->count() )
      <div class="notification is-warning subtitle"><strong>Nothing found</strong></div>
      @else
        @include('simplePages.alert')

        @foreach ($news as $item)

        <div class="box">
          <article class="media">
            <div class="media-left"><figure class="image is-250x170"><img src="{{ $item->image_thumb_url }}" alt="{{$item->title}}"></figure></div>
            <div class="media-content">
              <div class="content">
                <h3 class="subtitle"><a class="" href="{{ route('news.show', $item->slug)}}">{{$item->title}}</a></h3>
                <p>{{$item->excerpt}}</p>
                <p>
                  <strong><a href="{{ route('news.author', $item->author->slug)}}">{{$item->author->name}}</a></strong> |
                  <small>{{ '@'.str_slug($item->author->name,'') }}</small> |
                  <small>{{$item->date}}</small> |
                  <small><a href="{{ route('news.category', $item->category->slug)}}">{{$item->category->title}}</a></small> |

                  {!! $item->tags_html !!}

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


      {{$news->appends( request()->only(['term']) )->links()}}
    </div>
    <div class="column news-sidebar m-t-0">

      @include('simplePages.sidebar')

    </div>

  </div>

</div>





@endsection
