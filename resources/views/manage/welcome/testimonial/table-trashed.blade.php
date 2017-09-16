<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="30%"><abbr title="{{ __('forms.text') }}">{{ __('forms.text') }}</abbr></th>
      <th><abbr title="{{ __('forms.name') }}">{{ __('forms.name') }}</abbr></th>
      <th><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
      <th><abbr title="{{ __('forms.author') }}">{{ __('forms.author') }}</abbr></th>
      <th><abbr title="{{ __('forms.created') }}">{{ __('forms.created') }}</abbr></th>
      <th><abbr title="{{ __('forms.published_at') }}">{{ __('forms.published_at') }}</abbr></th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($testimonials as $testimonial)
    <tr>
      <!--<td>{{$testimonial->id}}</td>-->
      <td>{{$testimonial->testi_text}}</td>
      <td>{{ $testimonial->testi_name }}</td>
      <td>{{$testimonial->testi_title}}</td>
      <td>{{$testimonial->author->name}}</td>
      <td>{{$testimonial->created_at->toFormattedDateString()}}</td>
      <td>{{ $testimonial->published_at ? $testimonial->published_at->toFormattedDateString() : 'not yet published'}}</td>

      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['testimonial.restore', $testimonial->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="Restore"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}
        @if (Auth::user()->hasRole(['admin','editor','author']))
        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['testimonial.force-destroy', $testimonial->id],
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-danger is-outlined is-small" title="Delete"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
