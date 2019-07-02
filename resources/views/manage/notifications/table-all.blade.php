<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th><abbr title="{{ __('manageNotifications.forms.state') }}">{{ __('manageNotifications.forms.state') }}</abbr></th>
      <th width="10%"><abbr title="{{ __('manageNotifications.forms.type') }}">{{ __('manageNotifications.forms.type') }}</abbr></th>
      <th width="20%"><abbr title="{{ __('manageNotifications.forms.from') }}">{{ __('manageNotifications.forms.from') }}</abbr></th>
      <th><abbr title="{{ __('manageNotifications.forms.data') }}">{{ __('manageNotifications.forms.data') }}</abbr></th>
      <th><abbr title="{{ __('manageNotifications.forms.created') }}">{{ __('manageNotifications.forms.created') }}</abbr></th>
      <th><abbr title="{{ __('manageNotifications.forms.action') }}">{{ __('manageNotifications.forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($notifications as $notification)
    <tr>
      <td>{{$notification->read_at}}</td>
      <td>{{$notification->type}}</td>
      <td>{!! $notification->type !!}</td>
      <td>
        @foreach($notification->data as $item => $value)
        {{$item}}<br>
        @endforeach
      </td>
      <td>{{$notification->created_at}}</td>
      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['notification.destroy', $notification->id],'class'=>'allnewstable']) !!}
        @if (check_user_permissions(request(), "News@edit", $notification->id))
        <a href="{{ route('notification.update', $notification->id)}}" title="{{ __('forms.button.edit') }}"><span class="fa fa-edit"></span></a>
        @endif
        @if (check_user_permissions(request(), "News@destroy", $notification->id))
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
