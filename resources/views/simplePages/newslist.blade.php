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
        News list
      </h1>
      <h2 class="subtitle has-text-centered">
        Primary subtitle
      </h2>
    </div>
  </div>
</section>

<div class="container">
  <div class="columns">
    <div class="column is-three-quarters">

      <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
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

      <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
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

      <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
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

      <div class="box">
        <article class="media">
          <div class="media-left">
            <figure class="image is-64x64">
              <img src="http://bulma.io/images/placeholders/128x128.png" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <div class="content">
              <p>
                <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla egestas. Nullam condimentum luctus turpis.
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

    </div>
    <div class="column">
      Second column
    </div>

  </div>

</div>





@endsection
