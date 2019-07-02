@extends('layouts.manage')
@section('title',' - ' .  __('manageVideo.create'))
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
          <div class="title">{{ __('manageVideo.edit') }}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $video, [
                'method' => 'PUT',
                'route' => ['video.update', $video->id],
                'id' => 'update-post-form',
                ])  !!}

                @include('manage.video.formedit')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.video.scripts')
