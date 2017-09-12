<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-6">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('testi_text', 'Testimonial text') !!}</label>
            <div class="control {{ $errors->has('testi_text') ? 'is-danger' : ''}}">{!! Form::textarea('testi_text', null, ['class' => 'textarea', 'maxlength'=>255] ,['attributes' => ['cols'=> 50, 'rows'=> 10]]) !!}</div>
            @if($errors->has('testi_text'))
            <p class="help is-danger">Title is invalid</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug', 'Slug (SEO friendly url piece)') !!}</label>
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            @if($errors->has('slug'))
            <p class="help is-danger">Slug must be set and must be unique</p>
            @endif
          </div>

        </article>
      </div>
    </div>

  </div>
  <div class="tile is-parent is-paddingless">
    <article class="tile is-child notification ">
          <div class="field">
            <label class="label">{!! Form::label('testi_name', 'Who sad') !!}</label>
            <div class="control">{!! Form::text('testi_name', null, ['class' => 'input', 'maxlength' => 35]) !!}</div>
            @if($errors->has('testi_name'))
            <p class="help is-danger">Name is invalid</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('testi_title', 'Title') !!}</label>
            <div class="control">{!! Form::text('testi_title', null, ['class' => 'input', 'maxlength' => 35]) !!}</div>
            @if($errors->has('testi_title'))
            <p class="help is-danger">Title is invalid</p>
            @endif
          </div>

      <div class="field">
        <label class="label">{!! Form::label('published_at', 'Publishing date') !!}</label>
        <div class="control">{!! Form::text('published_at', null, ['class' => 'input', 'id' => 'datetimepicker']) !!}</div>
      </div>


      <hr>
      <div class="control m-t-30">
        @if (Auth::user()->hasRole(['admin','editor','author']))
        {!! Form::submit('Create', ['class' => 'button is-primary']) !!}
        @endif
        <a href="{{ route('lession.index') }}" class="button">Cancel</a>
      </div>

    </article>
  </div>
</div>
