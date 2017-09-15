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
