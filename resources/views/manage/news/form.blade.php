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
            <label class="label">{!! Form::label('slug', 'Slug') !!}</label>
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
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
        <div class="control">{!! Form::date('published_at', \Carbon\Carbon::now()->format('yyyy-mm-dd'), ['class' => 'input']) !!}</div>
      </div>

      <div class="field">
        <label class="label">{!! Form::label('category_id', 'Category') !!}</label>
        <div class="control {{ $errors->has('category_id') ? 'is-danger' : ''}}">
          <div class="select">{!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['placeholder' => 'Select a category']) !!}</div>
        </div>
        @if($errors->has('category_id'))
        <p class="help is-danger">Select one</p>
        @endif
      </div>

      <div class="field">
        <label class="label">{!! Form::label('image', 'News header image') !!}</label>
        <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
          <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview fileinput-exists thumbnail image is-16by9" style="">
              <img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : 'http://http://placehold.it/250x170&text=No+image%20(250x170)'}}" alt="">
            </div>
            <div class="m-t-20">
              <span href="#" class="button btn-default btn-file">
                <!--<span class="fileinput-new">Select image</span>
                <span class="button fileinput-exists">Change</span>-->
                {!! Form::file('image') !!}
              </span>
              <a href="#" class="button fileinput-exists m-t-10" data-dismiss="fileinput">Remove</a>
            </div>
          </div>
        </div>
        @if($errors->has('image'))
        <p class="help is-danger">Upload one</p>
        @endif
      </div>
      <hr>
      <div class="control m-t-30">
        {!! Form::submit('Publish', ['class' => 'button is-primary']) !!}
        <a href="{{ route('post.index') }}" class="button">Cancel</a>
      </div>

    </article>
  </div>
</div>
