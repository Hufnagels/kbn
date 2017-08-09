@extends('layouts.app')

@section('content')
<section class="loginPage">
  <div class="columns">
    <div class="column is-offset-one-third is-one-third">
      <div class="card">
        <div class="card-image">
          <figure class="image is-3by1">
            <img src="{{ asset('/images/logo_kv_004.png') }}" alt="Image">
          </figure>
        </div>
        <div class="card-content">
          <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="field">
                  <label class="label">Name</label>
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
                  <label class="label">E-Mail Address</label>
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
                  <label class="label">Password</label>
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
                  <label class="label">Re-type Password</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" id="password-confirm" type="password" name="password_confirmation" required>
                    <span class="icon is-small is-left"><i class="fa fa-key"></i></span>
                  </div>

                </div>

                <div class="field">
                  <div class="control">
                    <button class="button is-primary">Register</button>
                  </div>
                </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
