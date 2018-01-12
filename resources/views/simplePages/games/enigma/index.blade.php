@extends('layouts.app')
@section('title',' - Enigma')
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
      <h1 class="subtitle has-text-centered" style="color: #acfa32 !important;font-weight: 600;">
A Pannon Egyetem Műszaki Informatikai Kara és a Kódvetők Digitális Oktatási Műhely<br>
meghírdeti<br>
a Pannon Enigma Informatikai Programozási Kódtörő versenyt<br>
általános iskolások, osztályok, tanuló csoportok részére.<br>
A verseny fődíja a tudás megszerzésén kívül egy Apple számítógép!
<p class="m-t-15" style="color: #f0b9d8;background-color: rgba(57, 61, 72, 0.611764705882353);padding: 1rem;border-radius: 2rem;">
A verseny kiírását olvassátok el figyelmesen!<br>
A jelentkezésedet egészen 2018. május 14-ig elfogadjuk, de siess!
</p>
      </h1>
      <h2 class="subtitle has-text-centered m-t-5">
        <a class="button" style="background-color: rgba(172, 250, 50, 0.95);border-color: transparent;color: rgb(56, 44, 73);" href="{{ route('enigmatasks') }}">
          @if (!Auth::guest())
          {{ __('simplePages.gameEnigmaSlogen2') }}
          @else
          Jelentkezz a játékra!
          @endif
        </a>
      </h2>
    </div>
  </div>
</section>

<div class="container aboutUs m-b-0">
  <div class="columns">
    <div class="column is-10 is-offset-1">
      <figure class="image"><img src={{ asset("/images/games/enigma_kod_hatlap_leiras_v0071_96.jpg") }}></figure>
    </div>
  </div>
</div>
@endsection
