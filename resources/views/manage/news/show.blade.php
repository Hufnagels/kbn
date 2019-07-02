@extends('layouts.manage')
@section('title',' - Create News')
@section('content')
<div class="container m-t-20 news-container">
  <div class="columns">
    <div class="column">

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
                <strong><a href="{{ route('news.author', $item->author->slug)}}">{{$item->author->name}}</a></strong> |
                <small>{{ '@'.str_slug($item->author->name,'') }}</small> |
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
        <div class="content">
          {!! $item->body_html !!}
        </div>
      </div>

    </div><!-- end of left column -->


  </div>
</div>
@endsection
