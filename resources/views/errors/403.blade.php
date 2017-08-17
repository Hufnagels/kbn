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
      <h1 class="title has-text-centered">Something<br>went wrong</h1>
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
            <h1>{{ $exception->getMessage() }}</h1>
          </div>
            <div class="content m-t-50">
            <p>
              <a href="javascript:history.back()" class="button is-dark is-outlined is-small">Back to previous page</a>
            <p>
              <a href="{{ route('welcome') }}" class="button  is-small">Go to the welcome page</a>
            </p>

          </div>

        </div>
      </article>
    </div>
  </div>
</div>

@endsection
