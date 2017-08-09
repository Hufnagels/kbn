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

<section id="ourTeam" class="hero is-dark">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">
        News name is ...
      </h1>
      <h2 class="subtitle has-text-centered">
        Primary subtitle
      </h2>
    </div>
  </div>
</section>
@endsection
