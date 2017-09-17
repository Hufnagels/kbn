<table class="table is-narrow">
  <thead>
    <tr>
      <th width="15%"><abbr title="thumb">Thumb</abbr></th>
      <th width="25%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
      <th><abbr title="{{ __('forms.author') }}">{{ __('forms.author') }}</abbr></th>
      <th><abbr title="{{ __('forms.category') }}">{{ __('forms.category') }}</abbr></th>
      <th><abbr title="{{ __('forms.created') }}">{{ __('forms.created') }}</abbr></th>
      <th><abbr title="{{ __('forms.published_at') }}">{{ __('forms.published_at') }}</abbr></th>
      <th><abbr title="{{ __('forms.publishedState') }}">{{ __('forms.publishedState') }}</abbr></th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($videos as $video)
    <tr>
      <td><figure class="image is-4by3"><img src="http://img.youtube.com/vi/{{$video->yt_video_id}}/default.jpg"></figure></td>
      <td>{{$video->title}}</td>
      <td>{{$video->author->name}}</td>
      <td>
        @foreach($video->category as $category)
          {{$category->title}}
        @endforeach
      </td>
      <td>{{$video->created_at->toFormattedDateString()}}</td>
      <td>{{ $video->published_at ? Carbon\Carbon::parse($video->published_at)->toFormattedDateString() : __('forms.noStatus') }}</td>
      <td>{!! $video->publicationStatusLabel() !!}</td>
      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['video.edit', $video->id],'class'=>'allnewstable']) !!}
        @if (check_user_permissions(request(), "News@edit", $video->id))
        <a href="{{ route('video.edit', $video->id)}}" title="{{ __('forms.button.edit') }}"><span class="fa fa-edit"></span></a>
        @endif
        @if (check_user_permissions(request(), "News@destroy", $video->id))
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
