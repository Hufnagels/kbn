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
          <div class="title">Edit Tag</div>
        </div>
      </div>
      <div class="card-content is-paddingless createcategory">

        {!! Form::model( $tag, [
                'method' => 'PUT',
                'route' => ['tag.update', $tag->id],
                'id' => 'update-tag-form'
                ])  !!}

                @include('manage.tag.formedit')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
