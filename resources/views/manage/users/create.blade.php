@extends('layouts.manage')
@section('title',' - Edit user')
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
          <div class="title">Create new User</div>
        </div>
      </div>
      <div class="card-content is-paddingless createcategory">

        {!! Form::model( $user, [
                'method' => 'POST',
                'route' => 'users.store',
                'id' => 'create-user-form'
                ])  !!}

                @include('manage.users.form')

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.users.scripts')
