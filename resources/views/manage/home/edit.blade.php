@extends('layouts.manage')
@section('title',' - ' . __('manageUser.profile'))
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
          <div class="title">{{__('manageUser.profile')}}</div>
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
                            <label class="label">{!! Form::label('name', __('forms.name')) !!}</label>
                            <div class="control {{ $errors->has('name') ? 'is-danger' : ''}}">{!! Form::text('name', null, ['class' => 'input']) !!}</div>
                            @if($errors->has('name'))
                            <p class="help is-danger">Name is invalid</p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('slug', __('forms.slug')) !!}</label>
                            <p class="is-size-6 has-text-primary">{{ $user->slug}}</p>
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('email', __('forms.email')) !!}</label>
                            <p class="is-size-6 has-text-primary">{{ $user->email}}</p>
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('password', __('forms.password')) !!}</label>
                            <div class="control {{ $errors->has('password') ? 'is-danger' : ''}}">{!! Form::password('password',  ['class' => 'input']) !!}</div>
                            @if($errors->has('password'))
                            <p class="help is-danger">{{ __('forms.errors.password') }}</p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('password_confirmation', __('forms.passwordConfirm')) !!}</label>
                            <div class="control {{ $errors->has('password_confirmation') ? 'is-danger' : ''}}">{!! Form::password('password_confirmation',  ['class' => 'input']) !!}</div>
                            @if($errors->first('password_confirmation'))
                            <p class="help is-danger">{{ __('forms.errors.passwordConfirm') }}</p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('role', __('forms.role')) !!}</label>
                              <p class="is-size-6 has-text-primary">{{ $user->roles->first()->display_name}}</p>
                          </div>

                          @if (Auth::user()->hasRole(['admin','editor','author']))
                            <div class="field">
                              <label class="label">{!! Form::label('bio', __('forms.bio')) !!}</label>
                              <div class="control {{ $errors->has('bio') ? 'is-danger' : ''}}">{!! Form::textarea('bio', null, ['class' => 'textarea']) !!}</div>
                              @if($errors->has('bio'))
                              <p class="help is-danger">{{ __('forms.errors.bio') }}</p>
                              @endif
                            </div>
                          @endif

                          <div class="field">
                            <div class="control">
                              <button type="submit" class="button is-primary">{{__('forms.button.update')}}</button>
                              <a href="{{ route('home') }}" class="button">{{__('forms.button.cancel')}}</a>
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
