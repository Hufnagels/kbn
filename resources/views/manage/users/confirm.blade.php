@extends('layouts.manage')
@section('title',' - Delete confirmation')
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
          <div class="title">Delete confirmation</div>
        </div>
      </div>
      <div class="card-content createcategory">

        {!! Form::model( $user, [
                'method' => 'DELETE',
                'route' => ['users.confirm', $user->id],
                'id' => 'confirm-user-form',
                'class' => 'confirm-user-form',
                ])  !!}


                  <div class="content">
                    <h1 class="title is-spaced">The selected user: <strong>{{$user->name}}, with ID #{{$user->id}}</strong> is author of newses, events.</h1>
                    <h2 class="subtitle ">What would you do?</h2>
                    <div class="field">
                      <div class="control m-t-20">
                        <label class="radio confirm"><input type="radio" name="delete_option" value="delete">Delete the user and all content what user {{$user->name}} created</label>
                      </div>
                      <div class="control m-t-20">
                        <label class="radio confirm"><input type="radio" name="delete_option" value="attribute" checked>
                          Delete the user and Attribute content to another user from the list:
                          <div class="select m-l-10">
                            {!! Form::select('selected_user', $users, null) !!}
                          </div>
                        </label>
                      </div>
                  </div>
                  <div class="field">
                    <div class="control">
                      <button type="submit" class="button is-danger">Delete confirmation</button>
                      <a href="{{ route('users.index') }}" class="button">Cancel</a>
                    </div>
                  </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.users.usersscripts')
