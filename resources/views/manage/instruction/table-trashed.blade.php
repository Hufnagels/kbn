<table class="table is-narrow">
  <thead>
    <tr>
      <th width="40%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
      <th><abbr title="{{ __('forms.author') }}">{{ __('forms.author') }}</abbr></th>
      <th><abbr title="{{ __('forms.category') }}">{{ __('forms.category') }}</abbr></th>
      <th><abbr title="{{ __('forms.created') }}">{{ __('forms.created') }}</abbr></th>
      <th><abbr title="{{ __('forms.published_at') }}">{{ __('forms.published_at') }}</abbr></th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($instructions as $instruction)
    <tr>
      <!--<td>{{$instruction->id}}</td>-->
      <td>{{$instruction->title}}</td>
      <td>{{$instruction->author->name}}</td>
      <td>{!! $instruction->category[0]->title !!}</td>
      <td>{{$instruction->created_at->toFormattedDateString()}}</td>
      <td>{{ $instruction->published_at ? $instruction->published_at->toFormattedDateString() : __('forms.noStatus')}}</td>

      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['instruction.restore', $instruction->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="{{ __('forms.restore') }}"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}
        @if (Auth::user()->hasPermission('delete-instruction'))
        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['instruction.force-destroy', $instruction->id],
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-danger is-outlined is-small" title="{{ __('forms.forceDestroy') }}"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
