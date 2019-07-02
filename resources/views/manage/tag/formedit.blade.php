<div class="tile is-ancestor is-marginless ">
  <div class="tile is-vertical is-12">
    <div class="tile">
      <div class="tile is-parent is-vertical is-paddingless">
        <article class="tile is-child notification">

          <div class="field">
            <label class="label">{!! Form::label('name', __('forms.name')) !!}</label>
            <div class="control {{ $errors->has('name') ? 'is-danger' : ''}}">{!! Form::text('name', null, ['class' => 'input']) !!}</div>
            @if($errors->has('name'))
            <p class="help is-danger">{{ __('forms.errors.name') }}</p>
            @endif
          </div>

          <div class="field">
            <label class="label">{!! Form::label('slug', __('forms.slug') ) !!}</label>

            @if($errors->has('slug'))
            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
            <p class="help is-danger">{{ __('forms.errors.slug') }}</p>
            @else
            <p class="is-size-6 has-text-primary slugtext" style="min-height:24px;width:100%;">{{$tag->slug}}</p>
            <div class="control">{!! Form::hidden('slug', null, ['class' => 'input']) !!}</div>
            @endif
          </div>

          <div class="control">
            <button type="submit" class="button is-primary">{{ $tag->id ? __('forms.button.update') : __('forms.button.publish') }}</button>
            <a href="{{ route('tag.index') }}" class="button">{{ __('forms.button.cancel') }}</a>
          </div>


        </article>
      </div>
    </div>
    @if($tag->id)
    <div class="tile">
      <article class="tile is-child notification">
        <p class="subtitle">{{ __('manageTag.inTag', ['name' => __('manageNews.news')]) }}</p>
      @if( $tag->news )
        <table class="table is-narrow">
          <thead>
            <tr>
              <th width="100"><abbr title="Image"></abbr></th>
              <th width="70%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
              <th><abbr title="{{ __('forms.author') }}">{{ __('forms.author') }}</abbr></th>
              <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
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
        <p class="subtitle">{{ __('manageTag.inTag', ['name' => __('manageInstruction.instruction')]) }}</p>
      @if( $tag->instruction )
        <table class="table is-narrow">
          <thead>
            <tr>
              <th width="100"><abbr title="Image"></abbr></th>
              <th width="70%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
              <th><abbr title="{{ __('forms.author') }}">{{ __('forms.author') }}</abbr></th>
              <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
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
        <p class="subtitle">{{ __('manageTag.inTag', ['name' => __('manageLession.lession')]) }}</p>
      @if( $tag->lession )
        <table class="table is-narrow">
          <thead>
            <tr>
              <th width="100"><abbr title="Image"></abbr></th>
              <th width="70%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
              <th><abbr title="{{ __('forms.author') }}">{{ __('forms.author') }}</abbr></th>
              <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
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
