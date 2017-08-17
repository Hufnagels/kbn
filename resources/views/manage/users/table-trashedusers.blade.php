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
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['users.restore', $user->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="Restore"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}


        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['users.force-destroy', $user->id],
          'class'=>'allcategorytable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
