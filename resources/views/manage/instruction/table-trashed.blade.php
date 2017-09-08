<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="name">Title</abbr></th>
      <th><abbr title="Email">Author</abbr></th>
      <th><abbr title="Category">Category</abbr></th>
      <th><abbr title="Date created">Created</abbr></th>
      <th><abbr title="Date created">Published</abbr></th>
      <th><abbr title="Actions">Actions</abbr></th>
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
      <td>{{ $instruction->published_at ? $instruction->published_at->toFormattedDateString() : 'not yet published'}}</td>

      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['instruction.restore', $instruction->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="Restore"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}
        @if (Auth::user()->hasPermission('delete-instruction'))
        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['instruction.force-destroy', $instruction->id],
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-danger is-outlined is-small" title="Delete"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
