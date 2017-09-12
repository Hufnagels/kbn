<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="30%"><abbr title="text">Text</abbr></th>
      <th><abbr title="name">Name</abbr></th>
      <th><abbr title="title">Title</abbr></th>
      <th><abbr title="author">Author</abbr></th>
      <th><abbr title="Date created">Created</abbr></th>
      <th><abbr title="Date created">Published</abbr></th>
      <th><abbr title="Published state">Publish state</abbr></th>
      <th><abbr title="Actions">Actions</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($testimonials as $testimonial)
    <tr>

      <td >{{$testimonial->testi_text}}</td>
      <td>{{ $testimonial->testi_name }}</td>
      <td>{{$testimonial->testi_title}}</td>

      <td>{{$testimonial->author->name}}</td>
      <td>{{$testimonial->created_at->toFormattedDateString()}}</td>
      <td>{{ $testimonial->published_at ? $testimonial->published_at->toFormattedDateString() : 'not yet published'}}</td>
      <td>{!! $testimonial->publicationStatusLabel() !!}</td>
      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['testimonial.destroy', $testimonial->id],'class'=>'allnewstable', 'style' =>'display: inline-flex;']) !!}
        @if (Auth::user()->hasRole(['admin','editor','author']))
        <a href="{{ route('testimonial.edit', $testimonial->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
        <button type="submit" class="button allnewstable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
