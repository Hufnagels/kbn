<div class="card">
  @if( $post->image_url != NULL)
    <div class="card-image"
      @if ( strpos(Route::currentRouteName(), 'welcome') > -1)
        style="border: 10px solid {{ $colorArray[$index] }}"
      @endif
        >
        <figure class="image is-4by3"><img src="{{ $post->image_url }}" alt="{{$post->title}}"></figure>
      </div>

  @endif
  <div class="card-content">
    <div class="content">
      <h3 class="subtitle"><a class="" href="{{ route('news.show', $post->slug)}}">{{$post->title}}</a></h3>
      @if ( strpos(Route::currentRouteName(), 'news') > -1)
      <p class="excerpt is-hidden-desktop">{{$post->excerpt}}</p>
      @endif
      <p>
        @if ( strpos(Route::currentRouteName(), 'news') > -1)
        <strong><a href="{{ route('news.author', $post->author->slug)}}">{{ '@'.split_name_lastName($post->author->name) }}</a></strong>
        @endif
        <br>
        <small>{{$post->date}}</small>
        <br>
        {!! $post->category_html !!}

        {!! $post->tags_html !!}
      </p>
    </div>
  </div>
</div>
