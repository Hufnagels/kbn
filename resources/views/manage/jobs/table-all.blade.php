<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th><abbr title="{{ __('manageNotifications.forms.state') }}">id</abbr></th>
      <th ><abbr title="{{ __('manageNotifications.forms.type') }}">type</abbr></th>
      <th width="60%"><abbr title="{{ __('manageNotifications.forms.from') }}"></abbr>payload</th>
      <th><abbr title="{{ __('manageNotifications.forms.data') }}">created_at</abbr></th>

      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($jobs as $job)
    <tr>
      <td>{{$job['id']}}</td>
      <td>{{$job['queue']}}</td>
      <td>
        @foreach($job['payload'] as $k=>$v)
        {{$k}} - {{$v}}<br>
        @endforeach
      </td>

      <td>{{$job['created_at']}}</td>
      <td></td>
    </tr>
    @endforeach
  </tbody>
</table>
