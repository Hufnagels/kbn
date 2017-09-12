<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="Title">Title</abbr></th>
      <th><abbr title="Slug">slug</abbr></th>
      <th><abbr title="Newscount">Newses</abbr></th>
      <th><abbr title="Actions">Actions</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($categories as $category)
    <tr>
      <!--<td>{{$category->id}}</td>-->
      <td>{{$category->title}}</td>
      <td>{{$category->slug}}</td>
      <td class="has-text-centered">{{$category->news->count()}}</td>


      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id],'class'=>'allnewstable']) !!}
        <a href="{{ route('category.edit', $category->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
        @if (Auth::user()->hasPermission('crud-lession'))
          
          @if( !in_array($category->id,config('ownAttributes.protected_categories')) )
          <button type="submit"
          @if($category->news->count() > 0)
            onclick="return confirm('This category has {{ $category->news->count() }} News binded to it');"
          @endif
          class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
          @endif
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
