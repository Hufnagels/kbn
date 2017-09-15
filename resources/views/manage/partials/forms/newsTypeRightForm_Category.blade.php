<div class="field">
  <label class="label">{!! Form::label('category_id',  __('forms.category') ) !!}</label>
  <div class="control {{ $errors->has('category_id') ? 'is-danger' : ''}}">
    <div class="select">{!! Form::select('category_id', App\Category::where('id','<>',config('ownAttributes.default_category.id'))->pluck('title', 'id'), null, ['placeholder' =>  __('forms.selectCategory') ]) !!}</div>
  </div>
  @if($errors->has('category_id'))
  <p class="help is-danger">{{ __('forms.errors.category') }}</p>
  @endif
</div>
