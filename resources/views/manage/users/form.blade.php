<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-12">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('title',  __('forms.name') ) !!}</label>
            <div class="control {{ $errors->has('name') ? 'is-danger' : ''}}">{!! Form::text('name', null, ['class' => 'input']) !!}</div>
            @if($errors->has('name'))
            <p class="help is-danger">{{ __('forms.errors.title') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug',  __('forms.slug') ) !!}</label>
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            @if($errors->has('slug'))
            <p class="help is-danger">{{ __('forms.errors.slug') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('email',  __('forms.email') ) !!}</label>
            <div class="control {{ $errors->has('email') ? 'is-danger' : ''}}">{!! Form::text('email', null, ['class' => 'input']) !!}</div>
            @if($errors->has('email'))
            <p class="help is-danger">{{ __('forms.errors.email') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('password',  __('forms.password') ) !!}</label>
            <div class="control {{ $errors->has('password') ? 'is-danger' : ''}}">{!! Form::password('password',  ['class' => 'input']) !!}</div>
            @if($errors->has('password'))
            <p class="help is-danger">{{ __('forms.errors.password') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('password_confirmation',  __('forms.passwordConfirm') ) !!}</label>
            <div class="control {{ $errors->has('password_confirmation') ? 'is-danger' : ''}}">{!! Form::password('password_confirmation',  ['class' => 'input']) !!}</div>
            @if($errors->first('password_confirmation'))
            <p class="help is-danger">{{ __('forms.errors.passwordConfirm') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('role',  __('forms.role') ) !!}</label>
            @if($user->exists && $user->id == config('userAttributes.users_default.id'))
              {!! Form::hidden('role', $user->roles->first()->id ) !!}
              <p class="is-size-6 has-text-primary">{{ $user->roles->first()->display_name}}</p>
            @else
              <div class="select {{ $errors->has('role') ? 'is-danger' : ''}}">
                {!! Form::select('role', App\Role::pluck('display_name', 'id'), $user->exists ? $user->roles : null, ['placeholder' =>  __('forms.selectRole') ]) !!}
              </div>
              @if($errors->first('role'))
              <p class="help is-danger">{{ __('forms.selectRole') }}</p>
              @endif
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('bio',  __('forms.bio') ) !!}</label>
            <div class="control {{ $errors->has('bio') ? 'is-danger' : ''}}">{!! Form::textarea('bio', null, ['class' => 'textarea']) !!}</div>
            @if($errors->has('bio'))
            <p class="help is-danger">{{ __('forms.errors.bio') }}</p>
            @endif
          </div>

          <div class="field">
            <div class="control">
              <button type="submit" class="button is-primary">{{ $user->id ?  __('forms.button.update') : __('forms.button.publish') }}</button>
              <a href="{{ route('users.index') }}" class="button">Cancel</a>
            </div>
          </div>


        </article>
      </div>
    </div>
  </div>

</div>
