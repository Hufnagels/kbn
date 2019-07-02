@extends('layouts.manage')
@section('title',' - ' . __('manageCategory.create'))
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
          <div class="title">{{ __('manageCategory.create') }}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createcategory">

        {!! Form::model( $category, [
                'method' => 'POST',
                'route' => 'category.store',
                'id' => 'create-category-form'
                ])  !!}

                @include('manage.category.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.category.scripts')
