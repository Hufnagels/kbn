<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
      <th><abbr title="{{ __('forms.author') }}">{{ __('forms.author') }}</abbr></th>
      <th><abbr title="{{ __('forms.category') }}">{{ __('forms.category') }}</abbr></th>
      <th><abbr title="{{ __('forms.created') }}">{{ __('forms.created') }}</abbr></th>
      <th><abbr title="{{ __('forms.published_at') }}">{{ __('forms.published_at') }}</abbr></th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($newses as $news)
    <tr>
      <!--<td>{{$news->id}}</td>-->
      <td>{{$news->title}}</td>
      <td>{{$news->author->name}}</td>
      <td>{!! $news->category[0]->title !!}</td>
      <td>{{$news->created_at->toFormattedDateString()}}</td>
      <td>{{ $news->published_at ? $news->published_at->toFormattedDateString() : 'not yet published'}}</td>

      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['post.restore', $news->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="{{ __('forms.restore') }}"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}
        @if (Auth::user()->hasPermission('delete-news'))
        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['post.force-destroy', $news->id],
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-danger is-outlined is-small" title="{{ __('forms.forceDestroy') }}"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
