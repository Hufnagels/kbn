@extends('layouts.manage')
@section('title',' - Create instruction material')
@section('styles')
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
  <styles>

  </styles>
@endsection
@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">Create instruction material</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $instruction, [
                'method' => 'POST',
                'route' => 'instruction.store',
                'files' => TRUE,
                'id' => 'create-post-form',
                'enctype' => 'multipart/form-data'
                
                ])  !!}

                @include('manage.instruction.formcreate')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.instruction.scripts')
