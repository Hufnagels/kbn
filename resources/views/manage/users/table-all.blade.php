<table id="user-list"class="table is-narrow">
  <thead>
    <tr>
      <th width="100"><abbr title="Image"></abbr></th>
      <th class="userName" width="40%"><abbr title="{{ __('forms.name') }}">{{ __('forms.name') }}</abbr>
        <a href="javascript:sorting(true, 'userName', 'user-list')"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
				<a href="javascript:sorting(false, 'userName', 'user-list');" ><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
      </th>
      <th class="userEmail"><abbr title="{{ __('forms.email') }}">{{ __('forms.email') }}</abbr></th>
      <th class="userRole"><abbr title="{{ __('forms.role') }}">{{ __('forms.role') }}</abbr>
        <a href="javascript:sorting(true, 'userRole', 'user-list')"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></a>
				<a href="javascript:sorting(false, 'userRole', 'user-list');" ><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i></a>
      </th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($users as $user)
    <tr>
      <td>

        @if($user->image != NULL)
        <img src="{{  asset($user->image) }}" class="image is-125x125" alt="">
        @endif

      </td>
      <td class="userName">{{$user->name}}</td>
      <td class="userEmail">{{$user->email}}</td>
      <td class="userRole">
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
