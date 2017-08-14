@extends('layouts.manage')
@section('title',' - Create News post')
@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">Create news post</div>
        </div>
      </div>
      <div class="card-content">
        {!! Form::model( $post, ['method' => 'POST', 'route' => 'post.store' ])  !!}

        <div class="field">
          <label class="label">{!! Form::label('title', 'Title') !!}</label>
          <div class="control {{ $errors->has('title') ? 'is-danger' : ''}}">{!! Form::text('title', null, ['class' => 'input']) !!}</div>
          @if($errors->has('title'))
          <p class="help is-danger">Title is invalid</p>
          @endif
        </div>

        <div class="field">
          <label class="label">{!! Form::label('subtitle', 'SubTitle') !!}</label>
          <div class="control {{ $errors->has('subtitle') ? 'is-danger' : ''}}">{!! Form::text('subtitle', null, ['class' => 'input']) !!}</div>
          @if($errors->has('subtitle'))
          <p class="help is-danger">Title is invalid</p>
          @endif
        </div>

        <div class="field">
          <label class="label">{!! Form::label('slug', 'Slug') !!}</label>
          <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
          @if($errors->has('slug'))
          <p class="help is-danger">Slug is invalid</p>
          @endif
        </div>

        <div class="field">
          <label class="label">{!! Form::label('excerpt', 'Excerpt') !!}</label>
          <div class="control">{!! Form::textarea('excerpt', null, ['class' => 'textarea']) !!}</div>
        </div>

        <div class="field">
          <label class="label">{!! Form::label('body', 'Body') !!}</label>
          <div class="control {{ $errors->has('body') ? 'is-danger' : ''}}">{!! Form::textarea('body', null, ['class' => 'textarea']) !!}</div>
          @if($errors->has('body'))
          <p class="help is-danger">Body is invalid</p>
          @endif
        </div>

        <div class="field">
          <label class="label">{!! Form::label('published_at', 'Publishing date') !!}</label>
          <div class="control">{!! Form::date('published_at', \Carbon\Carbon::now()->format('yyyy-mm-dd'), ['class' => 'input']) !!}</div>
        </div>

        <div class="field">
          <label class="label">{!! Form::label('category_id', 'Category') !!}</label>
          <div class="control {{ $errors->has('category_id') ? 'is-danger' : ''}}">
            <div class="select">{!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['placeholder' => 'Select a category']) !!}</div>
          </div>
          @if($errors->has('category_id'))
          <p class="help is-danger">Select one</p>
          @endif
        </div>

        <div class="field">
          <label class="label">{!! Form::label('image', 'List image') !!}</label>
          <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
            {!! Form::file('image') !!}
          </div>
          @if($errors->has('image'))
          <p class="help is-danger">Upload one</p>
          @endif
        </div>


        <div class="control">
          {!! Form::submit('Create', ['class' => 'button is-primary']) !!}
        </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
