@extends('layouts.manage')
@section('title',' - Edit Profile')
@section('styles')
<styles>

</styles>
@endsection
@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">My Profile</div>
        </div>
      </div>
      <div class="card-content is-paddingless createcategory">
        @if ( session('message'))
        <div class="notification is-success"><strong>{{ session('message')}}</strong></div>
        @endif
        {!! Form::model( $user, [
                'method' => 'PUT',
                'route' => ['manage.account-update', $user->id],
                'id' => 'update-user-form'
                ])  !!}

                <div class="tile is-ancestor is-marginless ">
                  <div class="tile is-vertical is-12">
                    <div class="tile">
                      <div class="tile is-parent is-vertical is-paddingless">
                        <article class="tile is-child notification">

                          <div class="field">
                            <label class="label">{!! Form::label('name', 'Name') !!}</label>
                            <div class="control {{ $errors->has('name') ? 'is-danger' : ''}}">{!! Form::text('name', null, ['class' => 'input']) !!}</div>
                            @if($errors->has('name'))
                            <p class="help is-danger">Name is invalid</p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('slug', 'Slug') !!}</label>
                            <p class="is-size-6 has-text-primary">{{ $user->slug}}</p>
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('email', 'Email') !!}</label>
                            <p class="is-size-6 has-text-primary">{{ $user->email}}</p>
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('password', 'Password') !!}</label>
                            <div class="control {{ $errors->has('password') ? 'is-danger' : ''}}">{!! Form::password('password',  ['class' => 'input']) !!}</div>
                            @if($errors->has('password'))
                            <p class="help is-danger">Password </p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('password_confirmation', 'Confirm password') !!}</label>
                            <div class="control {{ $errors->has('password_confirmation') ? 'is-danger' : ''}}">{!! Form::password('password_confirmation',  ['class' => 'input']) !!}</div>
                            @if($errors->first('password_confirmation'))
                            <p class="help is-danger">Slug must be set and must be unique</p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('role', 'User role') !!}</label>
                              <p class="is-size-6 has-text-primary">{{ $user->roles->first()->display_name}}</p>
                          </div>

                          @if (Auth::user()->hasRole(['admin','editor','author']))
                            <div class="field">
                              <label class="label">{!! Form::label('bio', 'Biography') !!}</label>
                              <div class="control {{ $errors->has('bio') ? 'is-danger' : ''}}">{!! Form::textarea('bio', null, ['class' => 'textarea']) !!}</div>
                              @if($errors->has('bio'))
                              <p class="help is-danger">Biography is invalid</p>
                              @endif
                            </div>
                          @endif

                          <div class="field">
                            <div class="control">
                              <button type="submit" class="button is-primary">Update</button>
                              <a href="{{ route('home') }}" class="button">Cancel</a>
                            </div>
                          </div>


                        </article>
                      </div>
                    </div>
                  </div>

                </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
