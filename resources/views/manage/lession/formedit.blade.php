<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-8">
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
            <label class="label">{!! Form::label('subtitle', 'SubTitle') !!}</label>
            <div class="control {{ $errors->has('subtitle') ? 'is-danger' : ''}}">{!! Form::text('subtitle', null, ['class' => 'input']) !!}</div>
            @if($errors->has('subtitle'))
            <p class="help is-danger">Title is invalid</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug', 'Slug (SEO friendly url piece)') !!}</label>
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input', 'disabled' => 'disabled']) !!}</div>
            @if($errors->has('slug'))
            <p class="help is-danger">Slug must be set and must be unique</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('excerpt', 'Excerpt') !!}</label>
            <div class="control">{!! Form::textarea('excerpt', null, ['class' => 'textarea excerpt'] ,['attributes' => ['cols'=> 50, 'rows'=> 5]]) !!}</div>
          </div>

          <div class="field">
            <label class="label">{!! Form::label('body', 'Body') !!}</label>
            <div class="control {{ $errors->has('body') ? 'is-danger' : ''}}">{!! Form::textarea('body', null, ['class' => 'textarea']) !!}</div>
            @if($errors->has('body'))
            <p class="help is-danger">Body is invalid</p>
            @endif
          </div>

        </article>
      </div>
    </div>

  </div>
  <div class="tile is-parent is-paddingless">
    <article class="tile is-child notification ">

      <div class="field">
        <label class="label">{!! Form::label('published_at', 'Publishing date') !!}</label>
        <div class="control">{!! Form::text('published_at', null, ['class' => 'input', 'id' => 'datetimepicker']) !!}</div>
      </div>

      <div class="field">
        <label class="label">{!! Form::label('category_id', 'Category') !!}</label>
        <div class="control {{ $errors->has('category_id') ? 'is-danger' : ''}}">
          <div class="select">{!! Form::select('category_id', App\Category::where('id',config('ownAttributes.default_lession_category.id'))->pluck('title', 'id'), null, ['placeholder' => 'Select a category']) !!}</div>
        </div>
        @if($errors->has('category_id'))
        <p class="help is-danger">Select one</p>
        @endif
      </div>
<!--
      <div class="field">
        <label class="label">{!! Form::label('image', 'Lession header image') !!}</label>
        <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
          <figure>
            <img id="target" class="image is-250x170" src="{{ ($lession->image_thumb_url) ? $lession->image_thumb_url : 'http://placehold.it/250x170&text=No+image%20(250x170)'}}" alt="">
          </figure>
          <div class="file m-t-20">
            <label class="file-label">
              <input class="file-input" type="file" name="image" id="imgInp">
              <span class="file-cta">
                <span class="file-icon"><i class="fa fa-upload"></i></span>
                <span class="file-label">Choose a file…</span>
              </span>
            </label>
          </div>

        </div>
        @if($errors->has('image'))
        <p class="help is-danger">Upload one</p>
        @endif
      </div>
-->
      <div class="field">
        <label class="label">{!! Form::label('tags', 'Tags') !!}</label>
        <div class="control {{ $errors->has('tags') ? 'is-danger' : ''}}">
          <div class="select1">
            <select class="select2-multi" id="tag_edit" multiple="multiple" style="width:100%;" name="tags[]">
              @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
              @endforeach

            </select>
          </div>
        </div>
        @if($errors->has('tag_id'))
        <p class="help is-danger">Select one</p>
        @endif
      </div>

      <hr>
      <div class="control m-t-30">
        @if (Auth::user()->hasPermission('crud-lession'))
        {!! Form::submit('Update', ['class' => 'button is-primary']) !!}
        @endif
        <a href="{{ route('lession.index') }}" class="button">Cancel</a>
      </div>

    </article>
  </div>
</div>
