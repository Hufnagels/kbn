<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-6">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('testi_text', __('manageTesti.text')) !!}</label>
            <div class="control {{ $errors->has('testi_text') ? 'is-danger' : ''}}">{!! Form::textarea('testi_text', null, ['class' => 'textarea', 'maxlength'=>255] ,['attributes' => ['cols'=> 50, 'rows'=> 10]]) !!}</div>
            @if($errors->has('testi_text'))
            <p class="help is-danger">{{ __('manageTesti.errors.text') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug', __('forms.slug')) !!}</label>
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            @if($errors->has('slug'))
            <p class="help is-danger">{{ __('forms.errors.slug') }}</p>
            @endif
          </div>

        </article>
      </div>
    </div>

  </div>
  <div class="tile is-parent is-paddingless">
    <article class="tile is-child notification ">
          <div class="field">
            <label class="label">{!! Form::label('testi_name', __('manageTesti.name')) !!}</label>
            <div class="control">{!! Form::text('testi_name', null, ['class' => 'input', 'maxlength' => 35]) !!}</div>
            @if($errors->has('testi_name'))
            <p class="help is-danger">{{ __('manageTesti.errors.name') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('testi_title', __('manageTesti.title')) !!}</label>
            <div class="control">{!! Form::text('testi_title', null, ['class' => 'input', 'maxlength' => 35]) !!}</div>
            @if($errors->has('testi_title'))
            <p class="help is-danger">{{ __('manageTesti.errors.title') }}</p>
            @endif
          </div>

      <div class="field">
        <label class="label">{!! Form::label('published_at', __('forms.published_at')) !!}</label>
        <div class="control">{!! Form::text('published_at', null, ['class' => 'input', 'id' => 'datetimepicker']) !!}</div>
      </div>


      <hr>
      <div class="control m-t-30">
        @if (Auth::user()->hasRole(['admin','editor','author']))
        {!! Form::submit(__('forms.button.publish'), ['class' => 'button is-primary']) !!}
        @endif
        <a href="{{ route('lession.index') }}" class="button">{{ __('forms.button.cancel') }}</a>
      </div>

    </article>
  </div>
</div>
