@extends('layouts.manage')
@section('title',' - ' . __('manageLession.create'))
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
          <div class="title">{{__('manageLession.create')}}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $lession, [
                'method' => 'POST',
                'route' => 'lession.store',
                'files' => TRUE,
                'id' => 'create-post-form',
                'enctype' => 'multipart/form-data'

                ])  !!}

                @include('manage.lession.formcreate')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.lession.scripts')
