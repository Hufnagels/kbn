@extends('layouts.manage')
@section('title',' - Edit Lession Material')
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
          <div class="title">Edit Lession Material</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $lession, [
                'method' => 'PUT',
                'route' => ['lession.update', $lession->id],
                'files' => TRUE,
                'id' => 'update-post-form',
                'enctype' => 'multipart/form-data'

                ])  !!}

                @include('manage.lession.formedit')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.lession.scripts')
