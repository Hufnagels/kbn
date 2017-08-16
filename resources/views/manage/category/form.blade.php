<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-12">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('title', 'Title') !!}</label>
            <div class="control {{ $errors->has('title') ? 'is-danger' : ''}}">{!! Form::text('title', null, ['class' => 'input']) !!}</div>
            @if($errors->has('title'))
            <p class="help is-danger">Title is invalid</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug', 'Slug') !!}</label>
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            @if($errors->has('slug'))
            <p class="help is-danger">Slug must be set and must be unique</p>
            @endif
          </div>

          <div class="control">
            <button type="submit" class="button is-primary">{{ $category->id ? 'Update' : 'Store'}}</button>
            <a href="{{ route('category.index') }}" class="button">Cancel</a>
          </div>

        </article>
      </div>
    </div>
    @if( $category->id)
    news lista
    @endif
  </div>

</div>
