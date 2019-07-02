@extends('layouts.manage')
@section('title',' - ' . __('manageUser.edit'))
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
          <div class="title">{{ __('manageUser.edit') }}</div>
        </div>
      </div>
      <div class="card-content is-paddingless createcategory">

        {!! Form::model( $user, [
                'method' => 'PUT',
                'route' => ['users.update', $user->id],
                'id' => 'update-user-form',
                'enctype' => 'multipart/form-data'
                ])  !!}

                @include('manage.users.form-edit')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
@include('manage.users.scripts')
