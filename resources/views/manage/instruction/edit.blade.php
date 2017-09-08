@extends('layouts.manage')
@section('title',' - Edit Instruction Material')
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
          <div class="title">Edit Instruction Material</div>
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