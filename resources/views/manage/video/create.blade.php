@extends('layouts.manage')
@section('title',' - Upload Video to Youtube')
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
          <div class="title">Upload new Video to Youtube</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $video, [
                'method' => 'POST',
                'route' => 'video.store',
                'files' => TRUE,
                'id' => 'create-video-form'
                ])  !!}

                @include('manage.video.formcreate')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.video.videoscripts')