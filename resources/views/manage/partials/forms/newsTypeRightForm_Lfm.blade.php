<div class="field">
  <label class="label">{!! Form::label('image',  __('forms.image')  ) !!}</label>
  <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
    <figure>
      <img id="holder" class="image is-250x170" src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : 'http://placehold.it/250x170&text=No+image%20(250x170)'}}" alt="">
    </figure>
    <div class="file m-t-20">
      <label class="file-label">
        <input class="file-input" type="text" name="image"  id="thumbnail">
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
