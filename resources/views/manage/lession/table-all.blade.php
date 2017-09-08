<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="Title">Title</abbr></th>
      <th><abbr title="Author">Author</abbr></th>
      <th><abbr title="Category">Category</abbr></th>
      <th><abbr title="Date created">Created</abbr></th>
      <th><abbr title="Date created">Published</abbr></th>
      <th><abbr title="Published state">Publish state</abbr></th>
      <th><abbr title="Actions">Actions</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($lessions as $lession)
    <tr>

      <td>{{$lession->title}}</td>
      <td>{{$lession->author->name}}</td>
      <td>{!! $lession->category[0]->title !!}</td>
      <td>{{$lession->created_at->toFormattedDateString()}}</td>
      <td>{{ $lession->published_at ? $lession->published_at->toFormattedDateString() : 'not yet published'}}</td>
      <td>{!! $lession->publicationStatusLabel() !!}</td>
      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['lession.destroy', $lession->id],'class'=>'allnewstable']) !!}
        @if (Auth::user()->hasPermission('crud-lession'))
        <a href="{{ route('lession.edit', $lession->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
        @endif
        @if (Auth::user()->hasPermission('crud-lession'))
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>