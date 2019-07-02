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

        <h1 class="title has-text-centered" style="color: rgba(172, 250, 50, 0.95);">A lezajlott verseny feladatai</h1>
        <h2 class="subtitle has-text-centered m-t-5" style="color: rgba(172, 250, 50, 0.95);">Törd fel a az ENIGMA kódját!<br>Állítsd meg a tengeralattjárók farkasfalkáit!</h2>

    </div>
  </div>
</section>

<div class="container aboutUs">
            <div class="columns is-multiline m-t-20 m-b-20">
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_001_feladat_A4_v003.jpg') }}">
                      <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_001_feladat_A4_v003.jpg') }}" alt=""></figure>
                    </a>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_001_feladat_A4_v003.jpg') }}">1. feladat</a></h3>

                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_002_feladat_v004.jpg') }}">
                      <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_002_feladat_v004.jpg') }}" alt=""></figure>
                    </a>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_002_feladat_v004.jpg') }}">2. feladat</a></h3>

                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_003_feladat_v006.jpg') }}">
                      <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_003_feladat_v006.jpg') }}" alt=""></figure>
                    </a>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_003_feladat_v006.jpg') }}">3. feladat</a></h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_004_feladat_v001.jpg') }}">
                      <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_004_feladat_v001.jpg') }}" alt=""></figure>
                    </a>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_004_feladat_v001.jpg') }}">4. feladat</a></h3>
 
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_005_feladat_v001.jpg') }}">
                      <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_005_feladat_v001.jpg') }}" alt=""></figure>
                    </a>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_005_feladat_v001.jpg') }}">5. feladat</a></h3>

                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_006_feladat_v003.jpg') }}" alt=""></figure>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle">6. feladat<a class="" href="#"></a></h3>

                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_007_feladat_v008.jpg') }}">
                    <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_007_feladat_v008.jpg') }}" alt=""></figure>
                    </a>
                    </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_007_feladat_v008.jpg') }}">7. feladat</a></h3>

                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                    <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_008_feladat_v009.jpg') }}">
                      <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_008_feladat_v009.jpg') }}" alt=""></figure>
                    </a>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_008_feladat_v009.jpg') }}">8. feladat</a></h3>

                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image">
                  <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_009_feladat_v002.jpg') }}">
                      <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_009_feladat_v002.jpg') }}" alt=""></figure>
                    </a>
                  </div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_009_feladat_v002.jpg') }}">9. feladat</a></h3>

                    </div>
                  </div>
                </div>
              </div>

              </div>
              <div class="columns m-t-20 m-b-20">
                <div class="column is-4 is-offset-4">
                  <div class="card">
                    <div class="card-image">
                      <a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_010_feladat_v007.jpg') }}">
                        <figure class="image"><img src="{{ asset('/fm/photos/shares/games/enigma/enigma_010_feladat_v007.jpg') }}" alt=""></figure>
                        </a>
                    </div>
                    <div class="card-content">
                      <div class="content">
                        <h3 class="subtitle"><a class="" href="{{ asset('/fm/photos/shares/games/enigma/enigma_010_feladat_v007.jpg') }}">+1. feladat</a></h3>

                      </div>
                    </div>
                  </div>
                </div>
            </div>
</div>
@endsection
