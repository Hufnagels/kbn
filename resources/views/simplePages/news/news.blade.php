@extends('layouts.app')
@section('title',' - News')
@section('styles')
<style>


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
                  <small>{{ '@'.str_slug($item->author->name,'') }}</small> |
                  <?php $postCount = $item->author->news->count(); ?>
                  <small class="icon is-small postcount"><i class="fa fa-clone"></i>{{$postCount}} {{str_plural('post', $postCount)}}</small>
                  <br>
                  <small>{{$item->date}}</small>
                  @if( !( $item->category->id == config('ownAttributes.default_category.id') ))
                  <br>
                  <small><a href="{{ route('news.category', $item->category->slug)}}">{{$item->category->title}}</a></small>
                  @endif
                  {!! $item->tags_html !!}
                </p>
              </div>
              <nav class="level is-mobile">
                <div class="level-left">
                  <!--<a class="level-item"><span class="icon is-small"><i class="fa fa-reply"></i></span></a>
                  <a class="level-item"><span class="icon is-small"><i class="fa fa-facebook-square"></i></span></a>
                  <a class="level-item"><span class="icon is-small"><i class="fa fa-heart"></i></span></a>
                  -->
                  <a class="fbshare" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}&display=popup" target="_blank"><span class="icon is-small"><i class="fa fa-facebook-square"></i></span>Megosztás</a>
                </div>
              </nav>


            </div>
          </article>
          <div class="content m-t-30">
            <h3>{!! $item->excerpt_html !!}</h3>
          </div>
          <div class="content m-t-10">
            {!! $item->body_html !!}
          </div>

          @if (!Auth::guest())
            @if (check_user_permissions(request(), "ManageNews@edit", $item->id))
            <footer class="card-footer">
              <p class="card-footer-item"><span><a href="{{ route('post.edit', $item->id)}}" title="Edit">Edit</a></span></p>
            </footer>
            @endif
          @endif
        </div>

      </div><!-- end of left column -->

      <div class="column news-sidebar">

        @include('simplePages.sidebar')

      </div>
    </div>
  </div>
@endsection
