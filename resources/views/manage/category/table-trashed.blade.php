<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
      <th><abbr title="{{ __('forms.slug') }}">{{ __('forms.slug') }}</abbr></th>
      <th><abbr title="{{ __('forms.created') }}">{{ __('forms.created') }}</abbr></th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($categories as $category)
    <tr>
      <!--<td>{{$category->id}}</td>-->
      <td>{{$category->title}}</td>
      <td>{{$category->slug}}</td>
      <td>{{$category->created_at->toFormattedDateString()}}</td>


      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['category.restore', $category->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="Restore"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}

        @if (Auth::user()->hasPermission('delete-category'))
        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['category.force-destroy', $category->id],
          'class'=>'allcategorytable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        {!! Form::close()
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
