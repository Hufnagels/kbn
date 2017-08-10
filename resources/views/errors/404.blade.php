@extends('layouts.app')
@section('title',' - Error')
@section('styles')
<style>
#app {
    margin-right: 0px;
}
.image.is-256x256 {
    height: 256px;
    width: 256px;
}
.errorPages {
  margin-top:150px;
  margin-bottom: 200px;
}
</style>
@endsection
@section('content')

<section id="errorPages" class="hero is-danger m-b-20">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">Page not found error</h1>
      <h2 class="subtitle has-text-centered"></h2>
    </div>
  </div>
</section>

<div class="container errorPages">
  <div class="columns">
    <div class="column">
      <article class="media">
        <figure class="media-left">
          <p class="image is-256x256">
            <img src="/images/error.png">
          </p>
        </figure>
        <div class="media-content">
          <div class="content">
            <h1>Something<br>went wrong</h1>
            <h4>The page you are looking for might have been removed, had its name changed or is temporarily unavailable</h4>
            <h3>
              <a href="{{ route('welcome') }}" class="button is-dark is-medium">Go to the welcome page</a>
              <a href="{{ url()->previous() }}" class="button is-dark is-inverted is-medium">Go to the previous page</a>
            </h3>
          </div>
        </div>
      </article>
    </div>
  </div>
</div>

@endsection
