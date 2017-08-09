@extends('layouts.app')
@section('title',' - Team')
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

<section id="ourTeam" class="hero is-warning">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">
        A csapat
      </h1>
      <h2 class="subtitle has-text-centered">
        Kik vagyunk mi?
      </h2>
    </div>
  </div>
</section>

<div class="container is-fluid">
  <div class="notification">

    <div class="card">
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-128x128">
              <img src="{{ asset('images/team/team-member-1.jpg') }}" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-4">Ákos Szakmáry</p>
            <p class="subtitle is-6">CEO/Founder</p>
          </div>
        </div>

        <div class="content">
          Fiaim, Boti és Domi felöl záporoztak az ICT kérdések, de észrevettem, hogy az iskolában tanultak nem jutnak el hozzájuk, nem kaptak választ. A táblagépet használva valójában csak filmet néztek, kezdtek „youtube zombiká” válni. Ez így nem mehetett tovább. Összefogva barátommal elkezdtük tanítani őket, hogy „választ kapjanak”.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-128x128">
              <img src="{{ asset('images/team/team-member-21.jpg') }}" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-4">István Várkonyi</p>
            <p class="subtitle is-6">CEO/Founder</p>
          </div>
        </div>

        <div class="content">
          Az elmúlt években számtalan informatikai projekten dolgoztam nemzetközi és hazai vállalatoknál egyaránt. Amikor lányom, Gréti azt látta, hogy otthon is a számítógép előtt dolgozom, elkezdte érdekelni a számítástechnika. Én meg azon kezdtem töprengeni, hogyan tudom elmagyarázni az Ő nyelvén. Ez lett belőle...
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-128x128">
              <img src="{{ asset('images/team/team-member-3.jpg') }}" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-4">Zita Tóthné Pálmai</p>
            <p class="subtitle is-6">Veszprémi Műhelyvezető</p>
          </div>
        </div>

        <div class="content">
          Több mint 30 éve része az életemnek a tanítás. A Kódvetők Digitális Oktatási Műhely világa rögtön magával ragadott. A gondolkodás fejlesztése, a tantárgyak összefüggéseinek felismertetése, tartalommal megtöltése lényeges, ezt 18 éves lányom és 20 éves fiam is érzékeltetik velem, aki ma nem halad, az lemarad.
        </div>
      </div>
    </div>

  </div>
</div>



@endsection
