@extends('layouts.manage')
@section('title',' - Edit News post')
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
          <div class="title">Edit news post</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $post, [
                'method' => 'PUT',
                'route' => ['post.update', $post->id],
                'files' => TRUE,
                'id' => 'update-post-form',
                'enctype' => 'multipart/form-data'

                ])  !!}

                @include('manage.news.form')


        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.news.newsscripts')
