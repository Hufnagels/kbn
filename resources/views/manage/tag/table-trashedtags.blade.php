<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="Name">Name</abbr></th>
      <th><abbr title="Slug">slug</abbr></th>
      <th><abbr title="Created at">Date Created</abbr></th>
      <th><abbr title="Actions">Actions</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($tags as $tag)
    <tr>
      <!--<td>{{$tag->id}}</td>-->
      <td>{{$tag->name}}</td>
      <td>{{$tag->slug}}</td>
      <td>{{$tag->created_at->toFormattedDateString()}}</td>


      <td>
        {!! Form::open([
          'method' => 'PUT',
          'route' => ['tag.restore', $tag->id],
          'class'=>'trashtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button trashtable is-info is-outlined is-small" title="Restore"><span class="fa fa-reply"></span></button>
        {!! Form::close() !!}


        {!! Form::open([
          'method' => 'DELETE',
          'route' => ['tag.force-destroy', $tag->id],
          'class'=>'alltagtable',
          'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;' ]) !!}
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
