<table class="table is-narrow">
  <thead>
    <tr>
      <th width="40%"><abbr title="{{ __('forms.name') }}">{{ __('forms.name') }}</abbr></th>
      <th><abbr title="{{ __('forms.email') }}">{{ __('forms.email') }}</abbr></th>
      <th><abbr title="{{ __('forms.role') }}">{{ __('forms.role') }}</abbr></th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($users as $user)
    <tr>

      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        @foreach( $user->roles as $role)
          {{$role->display_name}}
        @endforeach
      </td>
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
