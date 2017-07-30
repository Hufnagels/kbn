@extends('layouts.manage')

@section('content')


  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">Manage Users</div>
          </div>
          <div class="column">
            <a href="{{ route('users.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"> Create user</a>
          </div>
        </div>
        <div class="card-content">
          <table class="table">
            <thead>
              <tr>
                <th><abbr title="Position">ID</abbr></th>
                <th><abbr title="Played">Name</abbr></th>
                <th><abbr title="Won">Email</abbr></th>
                <th><abbr title="Drawn">Date created</abbr></th>
                <th><abbr title="Lost">Actions</abbr></th>
              </tr>
            </thead>

            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td><a href="{{ route('users.edit', $user->id)}}" title="Edit"><span class="fa fa-edit"></span></a></td>
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
