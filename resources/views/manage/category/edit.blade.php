@extends('layouts.manage')
@section('title',' - ' . __('manageCategory.edit'))
@section('styles')
<styles>

</styles>
@endsection
@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">{{ __('manageCategory.edit') }}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createcategory">

        {!! Form::model( $category, [
                'method' => 'PUT',
                'route' => ['category.update', $category->id],
                'id' => 'update-category-form'
                ])  !!}

                @include('manage.category.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.category.scripts')
