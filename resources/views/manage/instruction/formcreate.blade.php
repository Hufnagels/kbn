<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          @include('manage.partials.forms.newsTypeLeftForm_edit')

        </article>
      </div>
    </div>

  </div>
  <div class="tile is-parent is-paddingless">
    <article class="tile is-child notification ">

      @include('manage.partials.forms.newsTypeRightForm_Publish')

      <div class="field">
        <label class="label">{!! Form::label('category_id', __('forms.category')) !!}</label>
        <div class="control {{ $errors->has('category_id') ? 'is-danger' : ''}}">
          <div class="select">{!! Form::select('category_id', App\Category::where('id',config('ownAttributes.default_instruction_category.id'))->pluck('title', 'id'), null, ['placeholder' =>  __('forms.selectCategory')]) !!}</div>
        </div>
        @if($errors->has('category_id'))
        <p class="help is-danger">{{ __('forms.errors.category') }}</p>
        @endif
      </div>

      @include('manage.partials.forms.newsTypeRightForm_Tag')

      <div class="field">
        <label class="label">{!! Form::label('lessions',  __('manageLession.lession') ) !!}</label>
        <div class="control {{ $errors->has('lessions') ? 'is-danger' : ''}}">
          <div class="select1">
            <select class="select2-multi" id="lession_edit" multiple="multiple" style="width:100%;" name="lessions[]">
              @foreach($lessions as $lession)
                <option value="{{ $lession->id }}">{{ $lession->title }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <hr>
      <div class="control m-t-30">
        @if (Auth::user()->hasPermission('crud-instruction'))
        {!! Form::submit(__('forms.button.publish') , ['class' => 'button is-primary']) !!}
        @endif
        <a href="{{ route('instruction.index') }}" class="button">{{ __('forms.button.cancel') }}</a>
      </div>

    </article>
  </div>
</div>
