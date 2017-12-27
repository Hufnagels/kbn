@extends('layouts.app')
@section('title',' - Enigma challenge')
@section('styles')
<style>
#app {
    margin-right: 0px;
}
#gameContent {
  background-color:#5c7ffb;
}
.gameContent .notification {
    font-size: .9rem;
}
.gameContent .notification .title {
    font-size: 1.25rem;
    font-weight:600;
}
</style>
@endsection
@section('content')

<section id="gameContent" class="hero m-b-0">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">{{ __('simplePages.gameEnigmaSlogen3') }}</h1>
      <h2 class="subtitle has-text-centered m-t-5">{{ __('simplePages.gameEnigmaSlogen4') }}</h2>
    </div>
  </div>
</section>

<div class="container aboutUs m-b-0">
  <div class="columns">
    <div class="column is-10 is-offset-1">
      <figure class="image"><img src={{ asset("/images/games/enigma_kod_leiras_v003-1_96.jpg") }}></figure>
    </div>
  </div>
</div>
@endsection
