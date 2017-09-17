<table class="table is-narrow">
  <thead>
    <tr>
      <th><abbr title="thumb">Thumb</abbr></th>
      <th width="40%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
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
      <td><img src="http://img.youtube.com/vi/{{$video->yt_video_id}}/default.jpg"></td>
      <td>{{$video->title}}</td>
      <td>{{$video->author->name}}</td>
      <td>{!! $video->category[0]->title !!}</td>
      <td>
        @foreach($video->category as $category)
          {{$category->title}}
        @endforeach
      </td>
      <td>{{ $video->published_at ? $video->published_at->toFormattedDateString() : __('forms.noStatus')}}</td>

      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['video.restore', $video->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="{{ __('forms.button.restore') }}"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}
        @if (Auth::user()->hasPermission('delete-video'))
        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['video.force-destroy', $video->id],
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-danger is-outlined is-small" title="{{ __('forms.button.delete') }}"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
