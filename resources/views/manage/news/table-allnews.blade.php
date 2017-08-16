<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="name">Title</abbr></th>
      <th><abbr title="Email">Author</abbr></th>
      <th><abbr title="Date created">Created</abbr></th>
      <th><abbr title="Date created">Published</abbr></th>
      <th><abbr title="Published state">Publish state</abbr></th>
      <th><abbr title="Actions">Actions</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($newses as $news)
    <tr>
      <!--<td>{{$news->id}}</td>-->
      <td>{{$news->title}}</td>
      <td>{{$news->author->name}}</td>
      <td>{{$news->created_at->toFormattedDateString()}}</td>
      <td>{{ $news->published_at ? $news->published_at->toFormattedDateString() : 'not yet published'}}</td>
      <td>{!! $news->publicationStatusLabel() !!}</td>
      <td>

        {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $news->id],'class'=>'allnewstable']) !!}
        <a href="{{ route('post.edit', $news->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
