<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th><abbr title="Id">Image</abbr></th>
      <th width="35%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
      <th><abbr title="{{ __('forms.author') }}">{{ __('forms.author') }}</abbr></th>
      <th><abbr title="{{ __('forms.category') }}">{{ __('forms.category') }}</abbr></th>
      <th><abbr title="{{ __('forms.created') }}">{{ __('forms.created') }}</abbr></th>
      <th><abbr title="{{ __('forms.published_at') }}">{{ __('forms.published_at') }}</abbr></th>
      <th><abbr title="{{ __('forms.publishedState') }}">{{ __('forms.publishedState') }}</abbr></th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($newses as $news)
    <tr>
      <!--<td>{{$news->id}}</td>-->
      <td><img src="{{ asset($news->image) }}" class="128x128"/></td>
      <td>{{$news->title}}</td>
      <td>{{$news->author->name}}</td>
      <td>
        @foreach($news->category as $category)
        {{$category->title}}
        @endforeach
      </td>
      <td>{{$news->created_at->toFormattedDateString()}}</td>
      <td>{{ $news->published_at ? $news->published_at->toFormattedDateString() : __('forms.noStatus')}}</td>
      <td>{!! $news->publicationStatusLabel() !!}</td>
      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $news->id],'class'=>'allnewstable']) !!}
        @if (check_user_permissions(request(), "News@edit", $news->id))
        <a href="{{ route('post.edit', $news->id)}}" title="{{ __('forms.button.edit') }}"><span class="fa fa-edit"></span></a>
        @endif
        @if (check_user_permissions(request(), "News@destroy", $news->id))
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
