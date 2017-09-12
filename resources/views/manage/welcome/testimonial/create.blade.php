@extends('layouts.manage')
@section('title',' - Create Testimonial')
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
          <div class="title">Create new Testimonial</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $testimonial, [
                'method' => 'POST',
                'route' => 'testimonial.store',
                'files' => TRUE,
                'id' => 'create-post-form'
                ])  !!}

                @include('manage.welcome.testimonial.formcreate')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.welcome.testimonial.scripts')
