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
      <h1 class="title has-text-centered">{{ __('simplePages.newsSlogen1') }}</h1>
      <h2 class="subtitle has-text-centered">{{ __('simplePages.newsSlogen2') }}</h2>
    </div>
  </div>
</section>

<div class="container m-t-20 news-container  p-b-20">
  <div class="columns">
    <div class="column is-three-quarters">
      @if(!$news->count() )
      <div class="notification is-warning subtitle"><strong>{{ __('messages.noContent') }}</strong></div>
      @else
        @include('simplePages.alert')
        <div class="columns is-multiline msrItems">
          @foreach ($news as $post)
          <div class="column msrItem is-mobile ">

            @include('manage.partials.newsBox')

            @if (!Auth::guest())
              @if (check_user_permissions(request(), "News@edit", $post->id))
              <div class="card">
                <footer class="card-footer">
                  <p class="card-footer-item"><span><a href="{{ route('post.edit', $post->id)}}" class="" title="Edit">{{ __('manageNews.edit') }}</a></span></p>
                </footer>
              </div>
              @endif
            @endif

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
