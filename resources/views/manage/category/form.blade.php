<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-12">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('title', 'Title') !!}</label>
            <div class="control {{ $errors->has('title') ? 'is-danger' : ''}}">{!! Form::text('title', null, ['class' => 'input']) !!}</div>
            @if($errors->has('title'))
            <p class="help is-danger">Title is invalid</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug', 'Slug (SEO friendly url piece)') !!}</label>

            @if($errors->has('slug'))
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            <p class="help is-danger">Slug must be set and must be unique</p>
            @else
            <p class="is-size-6 has-text-primary slugtext" style="min-height:24px;width:100%;">
              @if($category->slug)
                {{$category->slug}}
              @endif
            </p>
            <div class="control">{!! Form::hidden('slug', null, ['class' => 'input']) !!}</div>
            @endif
          </div>

          <div class="control">
            <button type="submit" class="button is-primary">{{ $category->id ? 'Update' : 'Store'}}</button>
            <a href="{{ route('category.index') }}" class="button">Cancel</a>
          </div>


        </article>
      </div>
    </div>
    @if( $category->id )
    <div class="tile">
      <article class="tile is-child notification">
        <p class="subtitle">News in this category</p>
      @if( $category->news )
        <table class="table is-narrow">
          <thead>
            <tr>
              <th width="100"><abbr title="Image"></abbr></th>
              <th width="70%"><abbr title="Title">Title</abbr></th>
              <th><abbr title="Author">Author</abbr></th>
              <th><abbr title="Action">Action</abbr></th>
            </tr>
          </thead>

          <tbody>
          @foreach ($category->news as $news)
              <tr>
                <td>
                  @if( $news->image_url )
                    <img src="{{ $news->image_thumb_url }}" class="image is-125x85" ></td>
                  @endif
                <td><a class="" href="{{ route('news.show', $news->slug)}}">{{$news->title}}</a></td>
                <td>{{ $news->author->name }}</td>
                <td><a href="{{ route('post.edit', $news->id)}}" title="Edit"><span class="fa fa-edit"></span></a></td>
              </tr>
          @endforeach
            <tbody>
        </table>
      @endif
      </article>
    </div>
    @endif
  </div>

</div>
