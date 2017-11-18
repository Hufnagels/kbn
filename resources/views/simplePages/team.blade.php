@extends('layouts.app')
@section('title',' - Team')
@section('styles')
<style>

</style>
@endsection
@section('content')

<section id="ourTeam" class="hero is-warning">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">{{ __('simplePages.teamSlogen1') }}</h1>
      <h2 class="subtitle has-text-centered">{{ __('simplePages.teamSlogen2') }}</h2>
    </div>
  </div>
</section>
<section id="ourTeamList" class="section teamlist">

  <div class="container">

    <div class="tile is-ancestor">
      <div class="tile is-vertical is-12">
        <div class="tile">
          <div class="tile is-parent is-vertical">
            <article class="tile is-child notificationTeam">
              <div class="card">
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                      <figure class="image is-128x128">
                        <img src="{{ asset('images/team/team-member-1.jpg') }}" alt="Image">
                      </figure>
                    </div>
                    <div class="media-content">
                      <p class="title is-4">Szakmáry Ákos</p>
                      <p class="subtitle is-6">CEO/Founder</p>
                    </div>
                  </div>

                  <div class="content">
                    Fiaim, Boti és Domi felöl záporoztak az ICT kérdések, de észrevettem, hogy az iskolában tanultak nem jutnak el hozzájuk, nem kaptak választ. A táblagépet használva valójában csak filmet néztek, kezdtek „youtube zombiká” válni. Ez így nem mehetett tovább. Összefogva barátommal elkezdtük tanítani őket, hogy „választ kapjanak”.
                  </div>
                </div>
              </div>
            </article>

          </div>
          <div class="tile is-parent">
            <article class="tile is-child notificationTeam">
              <div class="card">
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                      <figure class="image is-128x128">
                        <img src="{{ asset('images/team/team-member-21.jpg') }}" alt="Image">
                      </figure>
                    </div>
                    <div class="media-content">
                      <p class="title is-4">Várkonyi István</p>
                      <p class="subtitle is-6">CEO/Founder</p>
                    </div>
                  </div>

                  <div class="content">
                    Az elmúlt években számtalan informatikai projekten dolgoztam nemzetközi és hazai vállalatoknál egyaránt. Amikor lányom, Gréti azt látta, hogy otthon is a számítógép előtt dolgozom, elkezdte érdekelni a számítástechnika. Én meg azon kezdtem töprengeni, hogyan tudom elmagyarázni az Ő nyelvén. Ez lett belőle...
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="tile is-parent">
          <article class="tile is-child notificationTeam">
            <div class="card">
              <div class="card-content">
                <div class="media">
                  <div class="media-left">
                    <figure class="image is-128x128">
                      <img src="{{ asset('images/team/team-member-3.jpg') }}" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <p class="title is-4">Tóthné Pálmai Zita</p>
                    <p class="subtitle is-6">Veszprémi oktatás szervező</p>
                  </div>
                </div>

                <div class="content">
                  Több mint 30 éve része az életemnek a tanítás. A Kódvetők Digitális Oktatási Műhely világ rögtön magával ragadott. Hiszek a már kipróbált módszerekben és szeretem megismertetni másokkal. A világ változik. Más hozzáállást követel pedagógusként és szülőként is. A 18 éves lányom és 20 éves fiam is érzékeltetik ezt velem.
                  <br>
 „A hit sohasem hiszékenység, hanem energia, amelyből egy mustármagnyi hegyeket mozdíthat meg, feltéve, hogy akiben felfénylik, a szívével gondolkodik és az agyával is érez.”
<br>
Szepes Mária
                </div>
              </div>
            </div>
          </article>
        </div>
      </div>

    </div>
  </div>
  <?php
  $relatedTeacherCount = count($teachers);
  ?>
  @if($relatedTeacherCount > 0)
    <div class="container">
      <div class="notification is-primary">
        <h2 class="title has-text-centered has-text-grey-dark">Tanáraink</h2>
      </div>
        <div class="tile is-parent">
          <article class="tile is-child notificationTeam">
            @foreach($teachers as $teacher)
              @if(($teacher->bio != Null) && ($teacher->image != Null))
              <div class="card m-b-10 is-4">
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                      <figure class="image is-128x128">
                        @if($teacher->image != NULL)
                        <img src="{{  asset($teacher->image) }}" alt="Image">
                        @endif
                      </figure>
                    </div>
                    <div class="media-content">
                      <p class="title is-4">{{ $teacher->name}}</p>
                      <p class="subtitle is-6">Tanár</p>
                    </div>
                  </div>
                  <div class="content">
                    {{ $teacher->bio}}
                  </div>
                </div>
              </div>
              @endif
            @endforeach
          </article>
        </div>

    </div>
  @endif
</section>


@endsection
