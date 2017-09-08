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
    @foreach($instructions as $instruction)
    <tr>

      <td>{{$instruction->title}}</td>
      <td>{{$instruction->author->name}}</td>
      <td>{!! $instruction->category[0]->title !!}</td>
      <td>{{$instruction->created_at->toFormattedDateString()}}</td>
      <td>{{ $instruction->published_at ? $instruction->published_at->toFormattedDateString() : 'not yet published'}}</td>
      <td>{!! $instruction->publicationStatusLabel() !!}</td>
      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['instruction.destroy', $instruction->id],'class'=>'allnewstable']) !!}
        @if (Auth::user()->hasPermission('crud-instruction'))
        <a href="{{ route('instruction.edit', $instruction->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
        @endif
        @if (Auth::user()->hasPermission('crud-instruction'))
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
