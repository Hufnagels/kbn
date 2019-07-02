<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('testi_text', __('manageTesti.text')) !!}</label>
            <div class="control {{ $errors->has('testi_text') ? 'is-danger' : ''}}">
              {!! Form::textarea('testi_text', null, ['class' => 'textarea', 'maxlength'=>255, 'onkeyup'=>'countChar(this)'] ,['attributes' => ['cols'=> 50, 'rows'=> 10]]) !!}</div>
            <p class="help is-primary is-pulled-right" id="testi_text_counter"></p>
            @if($errors->has('testi_text'))
            <p class="help is-danger">{{ __('manageTesti.errors.text') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug',  __('forms.slug')  ) !!}</label>

            @if($errors->has('slug'))
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            <p class="help is-danger">{{ __('forms.errors.slug') }}</p>
            @else
            <p class="is-size-6 has-text-primary slugtext" style="min-height:24px;width:100%;">{{$testimonial->slug}}</p>
            <div class="control">{!! Form::hidden('slug', null, ['class' => 'input']) !!}</div>
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
            <div class="control">{!! Form::text('testi_name', null, ['class' => 'input', 'maxlength' => 35, 'onkeyup'=>'countChar(this)']) !!}</div>
            <p class="help is-primary is-pulled-right" id="testi_name_counter"></p>
            @if($errors->has('testi_name'))
            <p class="help is-danger">Name is invalid</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('testi_title', __('manageTesti.title')) !!}</label>
            <div class="control">{!! Form::text('testi_title', null, ['class' => 'input', 'maxlength' => 35, 'onkeyup'=>'countChar(this)']) !!}</div>
            <p class="help is-primary is-pulled-right" id="testi_title_counter"></p>
            @if($errors->has('testi_title'))
            <p class="help is-danger">Title is invalid</p>
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
        <a href="{{ route('testimonial.index') }}" class="button">{{ __('forms.button.cancel') }}</a>
      </div>

    </article>
  </div>
</div>
