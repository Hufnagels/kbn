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
  <p class="is-size-6 has-text-primary slugtext" style="min-height:24px;width:100%;"></p>
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
