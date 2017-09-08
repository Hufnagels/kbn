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
    @foreach($lessions as $lession)
    <tr>
      <!--<td>{{$lession->id}}</td>-->
      <td>{{$lession->title}}</td>
      <td>{{$lession->author->name}}</td>
      <td>{!! $lession->category[0]->title !!}</td>
      <td>{{$lession->created_at->toFormattedDateString()}}</td>
      <td>{{ $lession->published_at ? $lession->published_at->toFormattedDateString() : 'not yet published'}}</td>

      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['lession.restore', $lession->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="Restore"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}
        @if (Auth::user()->hasPermission('delete-lession'))
        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['lession.force-destroy', $lession->id],
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-danger is-outlined is-small" title="Delete"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
