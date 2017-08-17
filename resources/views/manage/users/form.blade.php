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
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            @if($errors->has('slug'))
            <p class="help is-danger">Slug must be set and must be unique</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('email', 'Email') !!}</label>
            <div class="control {{ $errors->has('email') ? 'is-danger' : ''}}">{!! Form::text('email', null, ['class' => 'input']) !!}</div>
            @if($errors->has('email'))
            <p class="help is-danger">Email must be valid email address</p>
            @endif
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
            <label class="label">{!! Form::label('bio', 'Biography') !!}</label>
            <div class="control {{ $errors->has('bio') ? 'is-danger' : ''}}">{!! Form::textarea('bio', null, ['class' => 'textarea']) !!}</div>
            @if($errors->has('bio'))
            <p class="help is-danger">Biography is invalid</p>
            @endif
          </div>

          <div class="field">
            <div class="control">
              <button type="submit" class="button is-primary">{{ $user->id ? 'Update' : 'Store'}}</button>
              <a href="{{ route('users.index') }}" class="button">Cancel</a>
            </div>
          </div>


        </article>
      </div>
    </div>
  </div>

</div>
