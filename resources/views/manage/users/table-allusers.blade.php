<table class="table is-narrow">
  <thead>
    <tr>
      <th width="40%"><abbr title="Name">Name</abbr></th>
      <th><abbr title="Email">Email</abbr></th>
      <th><abbr title="Role">Role</abbr></th>
      <th><abbr title="Actions">Actions</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($users as $user)
    <tr>

      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>*</td>


      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],'class'=>'allnewstable']) !!}
        <a href="{{ route('users.edit', $user->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
        @if( ! (( $user->id == config('userAttributes.users_default.id') ) || ( $user->id ==  Auth::user()->id )) )
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
