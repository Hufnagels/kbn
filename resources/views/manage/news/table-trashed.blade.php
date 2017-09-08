<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="name">Title</abbr></th>
      <th><abbr title="Email">Author</abbr></th>
      <th><abbr title="Date created">Created</abbr></th>
      <th><abbr title="Date created">Published</abbr></th>
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

      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['post.restore', $news->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="Restore"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}
        @if (Auth::user()->hasPermission('delete-news'))
        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['post.force-destroy', $news->id],
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-danger is-outlined is-small" title="Delete"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
