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
      <h1 class="title has-text-centered">{{ __('simplePages.projectSlogen1') }}</h1>
      <h2 class="subtitle has-text-centered">{{ __('simplePages.projectSlogen2') }}</h2>
    </div>
  </div>
</section>

<div class="container m-t-20 news-container">
  <div class="columns">
    <div class="column is-three-quarters">
      @if(!$news->count() )
      <div class="notification is-warning subtitle"><strong>{{ __('messages.noContent') }}</strong></div>
      @else
        @include('simplePages.alert')
        <div class="columns is-multiline msrItems">

        @foreach ($news as $item)
        <div class="column msrItem">


          <div class="card">
            @if( $item->image_thumb_url != NULL)
            <div class="card-image">
              <figure class="image is-4by3"><img src="{{ $item->image_thumb_url }}" alt="{{$item->title}}"></figure>
            </div>
            @endif
            <div class="card-content">


              <div class="content">
                <h3 class="subtitle"><a class="" href="{{ route('news.show', $item->slug)}}">{{$item->title}}</a></h3>
                <p>{{$item->excerpt}}</p>
                <p>
                  <strong><a href="{{ route('news.author', $item->author->slug)}}">{{$item->author->name}}</a></strong> |
                  <small>{{ '@'.str_slug($item->author->name,'') }}</small>
                  <br>
                  <small>{{$item->date}}</small>
                  <br>

                  {!! $item->tags_html !!}

                </p>
              </div>
            </div>

            @if (!Auth::guest())
              @if (check_user_permissions(request(), "News@edit", $item->id))
              <footer class="card-footer">
                <p class="card-footer-item"><span><a href="{{ route('post.edit', $item->id)}}" title="Edit">{{ __('manageNews.edit') }}</a></span></p>
              </footer>
              @endif
            @endif

          </div>

        </div>
        @endforeach
        </div>
      @endif


      {{$news->appends( request()->only(['term']) )->links()}}
    </div>
    <div class="column news-sidebar m-t-0">

      @include('simplePages.sidebar')

    </div>

  </div>

</div>

@endsection

@section('scripts')
  @include('simplePages.scripts.masonry')
@endsection
