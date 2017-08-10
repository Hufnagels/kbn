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

<section id="newsList" class="hero is-dark">
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

<div class="container m-t-20">
  <div class="columns">
    <div class="column is-three-quarters">
      @foreach ($news as $item)

      <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-128x128">
              <img src="{{ $item->imageUrl }}" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <div class="content">
              <h3 class="subtitle"><a class="" href="{{ route('news.show', $item->id)}}">{{$item->title}}</a></h3>
              <p>{{$item->excerpt}}</p>
              <p><strong>{{$item->author->name}}</strong> <small>{{ '@'.str_slug($item->author->name,'') }}</small> <small>{{$item->date}}</small></p>
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

      {{$news->links()}}
    </div>
    <div class="column">
      Second column
    </div>

  </div>

</div>





@endsection
