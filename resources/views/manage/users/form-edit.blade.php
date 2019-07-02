<div class="tile is-ancestor marginless">

  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical">

        <article class="tile is-child notification is-primary">

          <div class="field">
            <label class="label">{!! Form::label('title',  __('forms.name') ) !!}</label>
            <div class="control {{ $errors->has('name') ? 'is-danger' : ''}}">{!! Form::text('name', null, ['class' => 'input', 'id' => 'name']) !!}</div>
            @if($errors->has('name'))
            <p class="help is-danger">{{ __('forms.errors.title') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug',  __('forms.slug')  ) !!}</label>

            @if($errors->has('slug'))
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            <p class="help is-danger">{{ __('forms.errors.slug') }}</p>
            @else
            <p class="is-size-6 has-text-primary slugtext" style="min-height:24px;width:100%;">
              @if(isset($user)){{$user->slug}}@endif
            </p>
            <div class="control">{!! Form::hidden('slug', null, ['class' => 'input']) !!}</div>
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

        </article>

      </div>
    </div>

  </div>

  <div class="tile is-parent">
    <article class="tile is-child notification is-success">

      <div class="field">
        <label class="label">{!! Form::label('image',  __('forms.avatar')  ) !!}</label>
        <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
          <figure>
            <img id="holder" class="image is-250x250" src="{{ ($user->image) ? $user->image : 'http://placehold.it/400x400&text=No+image%20(400x400)'}}" alt="">
          </figure>
          <div class="file m-t-20">
            <label class="file-label">
              {!! Form::text('image', null, ['class' => 'file-input', 'id' => 'thumbnail']) !!}
              <!-- <input class="file-input" type="text" name="image"  id="thumbnail"> -->
              <a id="lfm" data-input="thumbnail" data-preview="holder" class="">
                <span class="file-cta">
                  <span class="file-icon"><i class="fa fa-upload"></i></span>
                  <span class="file-label">{{ __('forms.selectImage') }}</span>
                </span>
              </a>

            </label>
          </div>

        </div>
        @if($errors->has('image'))
        <p class="help is-danger">{{ __('forms.selectImage') }}</p>
        @endif
      </div>

      <div class="field">
        <div class="control">
          <button type="submit" class="button is-primary">{{ $user->id ?  __('forms.button.update') : __('forms.button.publish') }}</button>
          <a href="{{ route('users.index') }}" class="button"> {{__('forms.button.cancel')}}</a>
        </div>
      </div>

    </article>
  </div>

</div>
