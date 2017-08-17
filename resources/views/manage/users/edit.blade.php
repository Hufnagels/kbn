@extends('layouts.manage')
@section('title',' - Edit User')
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
          <div class="title">Edit user</div>
        </div>
      </div>
      <div class="card-content is-paddingless createcategory">

        {!! Form::model( $user, [
                'method' => 'PUT',
                'route' => ['users.update', $user->id],
                'id' => 'update-user-form'
                ])  !!}

                @include('manage.users.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection
