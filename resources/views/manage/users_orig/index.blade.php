@extends('layouts.manage')
@section('title',' - Users list')
@section('content')

<div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">Manage Users</div>
          </div>
          <div class="column">
            <a href="{{ route('users.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create user</a>
          </div>
        </div>
        <div class="card-content">
          <table class="table is-narrow">
            <thead>
              <tr>
                <th><abbr title="Id">ID</abbr></th>
                <th><abbr title="name">Name</abbr></th>
                <th><abbr title="Email">Email</abbr></th>
                <th><abbr title="Date created">Date created</abbr></th>
                <th><abbr title="Role">Role</abbr></th>
                <th><abbr title="Actions">Actions</abbr></th>
              </tr>
            </thead>

            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td>
                  @foreach( $user->roles as $role)
                    {{$role->name}}
                  @endforeach
                </td>
                <td>
                  <a href="{{ route('users.edit', $user->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
                  <a href="{{ route('users.destroy', $user->id)}}" title="Delete"><span class="fa fa-remove"></span></a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>
          {{$users->links()}}
        </div>
      </div>

    </div>
  </div>

@endsection
