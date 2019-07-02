@extends('layouts.manage')
@section('title',' - ' . __('manageNews.create'))
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
          <div class="title">{{ __('manageNews.create') }}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $post, [
                'method' => 'POST',
                'route' => 'post.store',
                'files' => TRUE,
                'id' => 'create-post-form'
                ])  !!}

                @include('manage.news.formcreate_with_lfm')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.news.scripts')
