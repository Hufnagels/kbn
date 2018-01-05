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

<div class="container aboutUs m-b-20">


      @if (!Auth::guest())
        @if( Auth::user()->hasRole(['student']))

            <div class="columns is-multiline m-t-20 m-b-20">
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">1. feladat</a></h3>
                      <p>2018. Január 8.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">2. feladat</a></h3>
                      <p>2018. Január 22.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">3. feladat</a></h3>
                      <p>2018. Február 5.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">4. feladat</a></h3>
                      <p>2018. Február 19.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">5. feladat</a></h3>
                      <p>2018. Március 5.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">6. feladat</a></h3>
                      <p>2018. Március 19.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">7. feladat</a></h3>
                      <p>2018. Április 2.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">8. feladat</a></h3>
                      <p>2018. Április 16.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="column is-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">9. feladat</a></h3>
                      <p>2018. Április 30.</p>
                    </div>
                  </div>
                </div>
              </div>

              </div>
              <div class="columns m-t-20 m-b-20">
              <div class="column is-4 is-offset-4">
                <div class="card">
                  <div class="card-image"><figure class="image"><img src="{{ asset('/images/games/questionmark.png') }}" alt=""></figure></div>
                  <div class="card-content">
                    <div class="content">
                      <h3 class="subtitle"><a class="" href="#">+1. feladat</a></h3>
                      <p>2018. Május 14.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>


        @endif
      @else
      <div class="columns">
      <div class="column is-10 is-offset-1">
      <section class="loginPage p-t-0">
        <div class="columns">
          <div class="column ">
            <div class="card">
              <div class="card-image">
                <figure class="image">
                  <img src="{{ asset('/images/games/enigma_kod_v007_folap_signup.jpg') }}" alt="Image">
                </figure>
              </div>
              <div class="card-content">
                <div class="content">
                  <section id="gameContent" class="hero m-b-20">
                    <div class="hero-body">
                      <div class="containers">
                        <h2 class="subtitle has-text-centered m-t-5">Ha már jelentkeztél, akkor <a class="" style="color:#ffffff;" href="{{ route('login') }}">lépj be!</a></h2>
                        <h2 class="subtitle has-text-centered">Ha nem, akkor itt jelentkezhetsz a játékra. <br>Kérlek, a szülőd vagy tanárod töltse ki jelentkezési lapot!</h2>
                        <h4 class="subtitle has-text-centered m-t-5">A csillagal jelölt mezők kitöltése kötelező!</h4>
                      </div>
                    </div>
                  </section>


                  <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                      {{ csrf_field() }}

                      <div class="field">
                        <label class="label">Kódtörő neve<sup>*</sup></label>
                        <div class="control has-icons-left has-icons-right">
                          <input class="input {{ $errors->has('name') ? ' is-danger' : '' }}" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                          <span class="icon is-small is-left">
                            <i class="fa fa-user"></i>
                          </span>
                          @if ($errors->has('name'))
                          <span class="icon is-small is-right">
                            <i class="fa fa-warning"></i>
                          </span>
                          @endif
                        </div>
                          @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif
                      </div>

                      <div class="field">
                        <label class="label">Melyik suliba jársz?</label>
                        <div class="control has-icons-left has-icons-right">
                          <input class="input {{ $errors->has('iskola') ? ' is-danger' : '' }}" id="iskola" type="text" name="iskola" value="{{ old('iskola') }}" required>
                          <span class="icon is-small is-left">
                            <i class="fa fa-bank"></i>
                          </span>
                          @if ($errors->has('iskola'))
                          <span class="icon is-small is-right">
                            <i class="fa fa-warning"></i>
                          </span>
                          @endif
                        </div>
                          @if ($errors->has('iskola'))
                        <p class="help is-danger">{{ $errors->first('iskola') }}</p>
                        @endif
                      </div>

                      <div class="field">
                        <label class="label">Email cím<sup>*</sup></label>
                        <div class="control has-icons-left has-icons-right">
                          <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" id="email" type="email" name="email" value="{{ old('email') }}" required>
                          <span class="icon is-small is-left">
                            <i class="fa fa-envelope"></i>
                          </span>
                          @if ($errors->has('email'))
                          <span class="icon is-small is-right">
                            <i class="fa fa-warning"></i>
                          </span>
                          @endif
                        </div>
                          @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                        @endif
                      </div>

                      <div class="field">
                        <label class="label">Jelszó<sup>*</sup></label>
                        <div class="control has-icons-left has-icons-right">
                          <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" id="password" type="password" name="password" required>
                          <span class="icon is-small is-left">
                            <i class="fa fa-key"></i>
                          </span>
                          @if ($errors->has('password'))
                          <span class="icon is-small is-right">
                            <i class="fa fa-warning"></i>
                          </span>
                          @endif
                        </div>
                        @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                        @endif
                      </div>

                      <div class="field">
                        <label class="label">Jelszó újra<sup>*</sup></label>
                        <div class="control has-icons-left has-icons-right">
                          <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" id="password-confirm" type="password" name="password_confirmation" required>
                          <span class="icon is-small is-left"><i class="fa fa-key"></i></span>
                        </div>

                      </div>

                      <div class="field">
                        <div class="control">
                          <button class="button is-primary">Kezdjük a kódtörést</button>
                        </div>
                      </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      </div>
      </div>
      @endif



</div>
@endsection
