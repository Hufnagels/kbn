@extends('layouts.manage')
@section('title',' - ' . __('manageTag.create'))
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
          <div class="title">{{__('manageTag.create')}}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createcategory">

        {!! Form::model( $tag, [
                'method' => 'POST',
                'route' => 'tag.store',
                'id' => 'create-tag-form'
                ])  !!}

                @include('manage.tag.formcreate')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.tag.scripts')
