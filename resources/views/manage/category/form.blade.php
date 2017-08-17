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
            <label class="label">{!! Form::label('slug', 'Slug') !!}</label>
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            @if($errors->has('slug'))
            <p class="help is-danger">Slug must be set and must be unique</p>
            @endif
          </div>

          <div class="control">
            <button type="submit" class="button is-primary">{{ $category->id ? 'Update' : 'Store'}}</button>
            <a href="{{ route('category.index') }}" class="button">Cancel</a>
          </div>


        </article>
      </div>
    </div>
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
            </tr>
          </thead>

          <tbody>
          @foreach ($category->news as $news)
              <tr>
                <td><img src="{{ $news->image_thumb_url }}" class="image is-125x85" ></td>
                <td><a class="" href="{{ route('news.show', $news->slug)}}">{{$news->title}}</a></td>
                <td>{{ $news->author->name }}</td>
              </tr>
          @endforeach
            <tbody>
        </table>
      @endif
      </article>
    </div>

  </div>

</div>
