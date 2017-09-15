@extends('layouts.manage')
@section('title',' - ' . __('manageInstruction.edit'))
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
          <div class="title">{{ __('manageInstruction.edit') }}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $instruction, [
                'method' => 'PUT',
                'route' => ['instruction.update', $instruction->id],
                'files' => TRUE,
                'id' => 'update-post-form',
                'enctype' => 'multipart/form-data'

                ])  !!}

                @include('manage.instruction.formedit')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.instruction.scripts')
