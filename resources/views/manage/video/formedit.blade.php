<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-6">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field is-clearfix">
            <label class="label">{!! Form::label('url', 'URL') !!}</label>
            <div class="control {{ $errors->has('title') ? 'is-danger' : ''}}">{!! Form::text('url', null, ['class' => 'input']) !!}</div>
            <div class="control">
              {!! Form::hidden('yt_video_id', null, ['class' => 'input']) !!}
              <a class="button is-success is-pulled-right" id="previewVideo">{{ __('manageVideo.button.check') }}</a>
              @if($errors->has('yt_video_id'))
              <p class="help is-danger">{{ __('manageVideo.errors.yt_video_id') }}</p>
              @endif
            </div>
          </div>
          <div class="field videocontent">
            <div class="intrinsic-container intrinsic-container-16x9">
              <iframe id="previewIframe" src="
                @if( $video->yt_video_id !== NULL)
                  https://www.youtube.com/embed/{{$video->yt_video_id}}
                @endif
                  " allowfullscreen style="margin: 0 auto;border:5px double #9fff26; width: 100%; min-height: 100%;"></iframe>
            </div>
          </div>

          <div class="field">
            <label class="label">{!! Form::label('title',  __('forms.title') ) !!}</label>
            <div class="control {{ $errors->has('title') ? 'is-danger' : ''}}">{!! Form::text('title', null, ['class' => 'input']) !!}</div>
            @if($errors->has('title'))
            <p class="help is-danger">{{ __('forms.errors.title') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug',  __('forms.slug')  ) !!}</label>

            @if($errors->has('slug'))
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            <p class="help is-danger">{{ __('forms.errors.slug') }}</p>
            @else
            <p class="is-size-6 has-text-primary slugtext" style="min-height:24px;width:100%;">{{$video->slug}}</p>
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
        <label class="label">{!! Form::label('description',  __('manageVideo.description')  ) !!}</label>
        <div class="control {{ $errors->has('body') ? 'is-danger' : ''}}">{!! Form::textarea('description', null, ['class' => 'textarea']) !!}</div>
        @if($errors->has('description'))
        <p class="help is-danger">{{ __('manageVideo.errors.description') }}</p>
        @endif
      </div>

      <div class="field">
        <label class="label">{!! Form::label('published_at',  __('forms.published_at')  ) !!}</label>
        <div class="control">{!! Form::text('published_at', null, ['class' => 'input', 'id' => 'datetimepicker']) !!}</div>
      </div>

       <div class="field">
        <label class="label">{!! Form::label('category_id', __('forms.category')) !!}</label>
        <div class="control {{ $errors->has('category_id') ? 'is-danger' : ''}}">
          <div class="select">{!! Form::select('category_id', App\Category::where('id','<>',config('ownAttributes.default_category.id'))->pluck('title', 'id'), null, ['placeholder' => __('forms.selectCategory')]) !!}</div>
        </div>
        @if($errors->has('category_id'))
        <p class="help is-danger">{{ __('forms.errors.category') }}</p>
        @endif
      </div>
      <!--
      <div class="field">
        <label class="label">{!! Form::label('image', 'News header image') !!}</label>
        <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
          <figure>
            <img id="target" class="image is-250x170" src="{{ ($video->image_thumb_url) ? $video->image_thumb_url : 'http://placehold.it/250x170&text=No+image%20(250x170)'}}" alt="">
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
      </div> -->

      <div class="field">
        <label class="label">{!! Form::label('tags',  __('forms.tag')  ) !!}</label>
        <div class="control {{ $errors->has('tags') ? 'is-danger' : ''}}">
          <div class="select1">
            <select class="select2-multi" id="tag_create" multiple="multiple" style="width:100%;" name="tags[]">
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

        {!! Form::submit( __('forms.button.publish') , ['class' => 'button is-primary']) !!}

        <a href="{{ route('video.index') }}" class="button">{{ __('forms.button.cancel') }}</a>
      </div>

    </article>
  </div>
</div>
