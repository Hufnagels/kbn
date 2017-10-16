@extends('layouts.app')
@section('title',' - About')
@section('styles')
<style>
#app {
    margin-right: 0px;
}
.aboutUs .notification {
    font-size: .9rem;
}
.aboutUs .notification .title {
    font-size: 1.25rem;
    font-weight:600;
}
</style>
@endsection
@section('content')

<section id="aboutUs" class="hero is-warning m-b-20">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">{{ __('simplePages.aboutSlogen1') }}</h1>
      <h2 class="subtitle has-text-centered">{{ __('simplePages.aboutSlogen2') }}</h2>
    </div>
  </div>
</section>

<div class="container aboutUs m-b-20">
  <div class="columns">
    <div class="column is-two-thirds">

      @include('simplePages._partials.aboutLeft')

    </div>
    <div class="column">
      <div class="notification is-primary">
        <p class="title">Felfedezés öröme</p>
        Minden gyermek számára meg kell engedni a felfedezés örömét
      </div>

      <div class="notification is-info">
        <p class="title">Inspiráló környezet</p>
        A gyermek számára, olyan környezetet kell biztosítani, ami örömet nyújt és fejlesztő tevékenységre motivál.
      </div>

      <div class="notification is-success">
        <p class="title">Projekt alapú oktatás</p>
        A gyermekek feladatokat (projekteket) vállalhatnak, akár egyedül vagy csoportosan, melyet elvégeznek majd beszámolnak eredményeikről a közösségnek.
      </div>

      <div class="notification is-warning">
        <p class="title">Optimális eszközrendszer</p>
        Biztosítani kell a fejlődéshez szükséges optimális eszközrendszert.
      </div>

      <div class="notification is-danger">
        <p class="title">Önellenőrzés</p>
        Közös megbeszéléseken, helyzetelemzéseken kerül sor a gyermekek tudásának önellenőrzésére, korrekciókra.
      </div>
    </div>
  </div>
</div>


@endsection
