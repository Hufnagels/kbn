<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-12">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('name', 'Name') !!}</label>
            <div class="control {{ $errors->has('name') ? 'is-danger' : ''}}">{!! Form::text('name', null, ['class' => 'input']) !!}</div>
            @if($errors->has('name'))
            <p class="help is-danger">Name is invalid</p>
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
            <button type="submit" class="button is-primary">{{ $tag->id ? 'Update' : 'Store'}}</button>
            <a href="{{ route('tag.index') }}" class="button">Cancel</a>
          </div>


        </article>
      </div>
    </div>
    @if($tag->id)
    <div class="tile">
      <article class="tile is-child notification">
        <p class="subtitle">News in this tag</p>
      @if( $tag->news )
        <table class="table is-narrow">
          <thead>
            <tr>
              <th width="100"><abbr title="Image"></abbr></th>
              <th width="70%"><abbr title="Name">Name</abbr></th>
              <th><abbr title="Author">Author</abbr></th>
              <th><abbr title="Action">Action</abbr></th>
            </tr>
          </thead>

          <tbody>
          @foreach ($tag->news as $news)
              <tr>
                <td>
                  @if( $news->image_url )
                    <img src="{{ $news->image_thumb_url }}" class="image is-125x85" ></td>
                  @endif
                <td><a class="" href="{{ route('news.show', $news->slug)}}">{{$news->title}}</a></td>
                <td>{{ $news->author->name }}</td>
                <td><a href="{{ route('post.edit', $tag->id)}}" title="Edit"><span class="fa fa-edit"></span></a></td>
              </tr>
          @endforeach
            <tbody>
        </table>
      @endif
      </article>
    </div>

    <div class="tile">
      <article class="tile is-child notification">
        <p class="subtitle">Instructions in this tag</p>
      @if( $tag->instruction )
        <table class="table is-narrow">
          <thead>
            <tr>
              <th width="100"><abbr title="Image"></abbr></th>
              <th width="70%"><abbr title="Name">Name</abbr></th>
              <th><abbr title="Author">Author</abbr></th>
              <th><abbr title="Action">Action</abbr></th>
            </tr>
          </thead>

          <tbody>
          @foreach ($tag->instruction as $instruction)
              <tr>
                <td>
                  @if( $instruction->image_url )
                    <img src="{{ $instruction->image_thumb_url }}" class="image is-125x85" ></td>
                  @endif
                <td>{{$instruction->title}}</td>
                <td>{{ $instruction->author->name }}</td>
                <td><a href="{{ route('instruction.edit', $instruction->id)}}" title="Edit"><span class="fa fa-edit"></span></a></td>
              </tr>
          @endforeach
            <tbody>
        </table>
      @endif
      </article>
    </div>

    <div class="tile">
      <article class="tile is-child notification">
        <p class="subtitle">Lessions in this tag</p>
      @if( $tag->lession )
        <table class="table is-narrow">
          <thead>
            <tr>
              <th width="100"><abbr title="Image"></abbr></th>
              <th width="70%"><abbr title="Name">Name</abbr></th>
              <th><abbr title="Author">Author</abbr></th>
              <th><abbr title="Action">Action</abbr></th>
            </tr>
          </thead>

          <tbody>
          @foreach ($tag->lession as $lession)
              <tr>
                <td>
                  @if( $lession->image_url )
                    <img src="{{ $news->image_thumb_url }}" class="image is-125x85" ></td>
                  @endif
                <td>{{$lession->title}}</td>
                <td>{{ $lession->author->name }}</td>
                <td><a href="{{ route('lession.edit', $lession->id)}}" title="Edit"><span class="fa fa-edit"></span></a></td>
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
