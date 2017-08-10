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
.panel-heading.is-warning {
    background-color: #ffdd57;
    border-color: transparent;
    color: rgba(0, 0, 0, 0.7);
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

<div class="container m-t-20">
  <div class="columns">
    <div class="column is-three-quarters">
      @foreach ($news as $item)

      <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-150x150">
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

      <nav class="panel">
        <p class="panel-heading is-warning">
          repositories
        </p>
        <div class="panel-block">
          <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="search">
            <span class="icon is-small is-left">
              <i class="fa fa-search"></i>
            </span>
          </p>
        </div>
        <p class="panel-tabs">
          <a class="is-active">all</a>
          <a>public</a>
          <a>private</a>
          <a>sources</a>
          <a>forks</a>
        </p>
        <a class="panel-block is-active">
          <span class="panel-icon">
            <i class="fa fa-book"></i>
          </span>
          bulma
        </a>
        <a class="panel-block">
          <span class="panel-icon">
            <i class="fa fa-book"></i>
          </span>
          marksheet
        </a>
        <a class="panel-block">
          <span class="panel-icon">
            <i class="fa fa-book"></i>
          </span>
          minireset.css
        </a>
        <a class="panel-block">
          <span class="panel-icon">
            <i class="fa fa-book"></i>
          </span>
          jgthms.github.io
        </a>
        <a class="panel-block">
          <span class="panel-icon">
            <i class="fa fa-code-fork"></i>
          </span>
          daniellowtw/infboard
        </a>
        <a class="panel-block">
          <span class="panel-icon">
            <i class="fa fa-code-fork"></i>
          </span>
          mojs
        </a>
        <label class="panel-block">
          <input type="checkbox">
          remember me
        </label>
        <div class="panel-block">
          <button class="button is-primary is-outlined is-fullwidth">
            reset all filters
          </button>
        </div>
      </nav>



    </div>

  </div>

</div>





@endsection
