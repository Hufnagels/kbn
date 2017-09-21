<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('title',  __('forms.title') ) !!}</label>
            <div class="control {{ $errors->has('title') ? 'is-danger' : ''}}">{!! Form::text('title', null, ['class' => 'input']) !!}</div>
            @if($errors->has('title'))
            <p class="help is-danger">{{ __('forms.errors.title') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('subtitle',  __('forms.subtitle')  ) !!}</label>
            <div class="control {{ $errors->has('subtitle') ? 'is-danger' : ''}}">{!! Form::text('subtitle', null, ['class' => 'input']) !!}</div>
            @if($errors->has('subtitle'))
            <p class="help is-danger">{{ __('forms.errors.subtitle') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug',  __('forms.slug')  ) !!}</label>

            @if($errors->has('slug'))
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            <p class="help is-danger">{{ __('forms.errors.slug') }}</p>
            @else
            <p class="is-size-6 has-text-primary slugtext" style="min-height:24px;width:100%;">{{$post->slug}}</p>
            <div class="control">{!! Form::hidden('slug', null, ['class' => 'input']) !!}</div>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('excerpt',  __('forms.excerpt')  ) !!}</label>
            <div class="control">{!! Form::textarea('excerpt', null, ['class' => 'textarea excerpt'] ,['attributes' => ['cols'=> 50, 'rows'=> 5]]) !!}</div>
            @if($errors->has('excerpt'))
            <p class="help is-danger">{{ __('forms.errors.excerpt') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('body',  __('forms.body')  ) !!}</label>
            <div class="control {{ $errors->has('body') ? 'is-danger' : ''}}">{!! Form::textarea('body', null, ['class' => 'textarea']) !!}</div>
            @if($errors->has('body'))
            <p class="help is-danger">{{ __('forms.errors.body') }}</p>
            @endif
          </div>

        </article>
      </div>
    </div>

  </div>
  <div class="tile is-parent is-paddingless">
    <article class="tile is-child notification ">

      <div class="field">
        <label class="label">{!! Form::label('published_at',  __('forms.published_at')  ) !!}</label>
        <div class="control">{!! Form::text('published_at', null, ['class' => 'input', 'id' => 'datetimepicker']) !!}</div>
      </div>

      <div class="field">
        <label class="label">{!! Form::label('category_id',  __('forms.category') ) !!}</label>
        <div class="control {{ $errors->has('category_id') ? 'is-danger' : ''}}">
          <div class="select">{!! Form::select('category_id', App\Category::whereNotIn('id',config('ownAttributes.not_news_categories'))->pluck('title', 'id'), null, ['placeholder' =>  __('forms.selectCategory') ]) !!}</div>
        </div>
        @if($errors->has('category_id'))
        <p class="help is-danger">{{ __('forms.errors.category') }}</p>
        @endif
      </div>

      <div class="field">
        <label class="label">{!! Form::label('image',  __('forms.image')  ) !!}</label>
        <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
          <figure>
            <img id="holder" class="image is-250x170" src="{{ ($post->image) ? $post->image : 'http://placehold.it/250x170&text=No+image%20(250x170)'}}" alt="">
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
        <label class="label">{!! Form::label('tags',  __('forms.tag')  ) !!}</label>
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
        <p class="help is-danger">{{ __('forms.selectTag') }}</p>
        @endif
      </div>

      <hr>
      <div class="control m-t-30">
        @if (check_user_permissions(request(), "News@edit", $post->id))
        {!! Form::submit(__('forms.button.update'), ['class' => 'button is-primary']) !!}
        @endif
        <a href="{{ route('post.index') }}" class="button">{{ __('forms.button.cancel') }}</a>
      </div>

    </article>
  </div>
</div>

<script>
{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
var route_prefix = "{{ url(config('lfm.prefix')) }}";
  $('#lfm').filemanager('image', {prefix: route_prefix});
</script>
