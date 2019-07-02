@extends('layouts.manage')
@section('title',' - ' . __('manageUser.confirm.delete'))
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
          <div class="title">{{ __('manageUser.confirm.delete') }}</div>
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
                    <h1 class="title is-spaced">
                      {{ __('manageUser.confirm.text1') }}: <strong>{{$user->name}}, ID #{{$user->id}}</strong> {{ __('manageUser.confirm.text2') }}</h1>
                    <h2 class="subtitle ">{{ __('manageUser.confirm.question') }}</h2>
                    <div class="field">
                      <div class="control m-t-20">
                        <label class="radio confirm">
                          <input type="radio" name="delete_option" value="delete">{{ __('manageUser.confirm.option1', ['name' => $user->name]) }} </label>
                      </div>
                      <div class="control m-t-20">
                        <label class="radio confirm"><input type="radio" name="delete_option" value="attribute" checked>
                          {{ __('manageUser.confirm.option2') }}:
                          <div class="select m-l-10">
                            {!! Form::select('selected_user', $users, null) !!}
                          </div>
                        </label>
                      </div>
                  </div>
                  <div class="field">
                    <div class="control">
                      <button type="submit" class="button is-danger">{{ __('manageUser.confirm.delete') }}</button>
                      <a href="{{ route('users.index') }}" class="button">{{ __('forms.button.cancel') }}</a>
                    </div>
                  </div>

        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection

@include('manage.users.scripts')
