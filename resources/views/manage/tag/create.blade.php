@extends('layouts.manage')
@section('title',' - Edit Tag')
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
          <div class="title">Create new Tag</div>
        </div>
      </div>
      <div class="card-content is-paddingless createtag">

        {!! Form::model( $tag, [
                'method' => 'POST',
                'route' => 'tag.store',
                'id' => 'create-tag-form'
                ])  !!}

                @include('manage.tag.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.tag.tagscripts')
