@extends('layouts.manage')
@section('title',' - ' . __('manageTesti.edit'))
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
          <div class="title">{{ __('manageTesti.edit') }}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $testimonial, [
                'method' => 'PUT',
                'route' => ['testimonial.update', $testimonial->id],
                'files' => TRUE,
                'id' => 'update-post-form',
                ])  !!}

                @include('manage.welcome.testimonial.formedit')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.welcome.testimonial.scripts')
