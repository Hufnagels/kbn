<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="Title">Title</abbr></th>
      <th><abbr title="Slug">slug</abbr></th>
      <th><abbr title="Newscount">News count</abbr></th>
      <th><abbr title="Actions">Actions</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($categories as $category)
    <tr>
      <!--<td>{{$category->id}}</td>-->
      <td>{{$category->title}}</td>
      <td>{{$category->slug}}</td>
      <td>{{$category->news->count()}}</td>


      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id],'class'=>'allnewstable']) !!}
        <a href="{{ route('category.edit', $category->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
        @if( ! ($category->id == config('categoryAttributes.default_category.id')) )
        <button type="submit"
        @if($category->news->count() > 0)
          onclick="return confirm('This category has {{ $category->news->count() }} News binded to it');" 
        @endif
        class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
