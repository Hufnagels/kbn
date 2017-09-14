<div class="card">
  @if( $post->image_url != NULL)
  <div class="card-image">
    <figure class="image is-4by3"><img src="{{ $post->image_url }}" alt="{{$post->title}}"></figure>
  </div>
  @endif
  <div class="card-content">
    <div class="content">
      <h3 class="subtitle"><a class="" href="{{ route('news.show', $post->slug)}}">{{$post->title}}</a></h3>
      <p class="excerpt is-hidden-desktop">{{$post->excerpt}}</p>
      <p>
        @if ( strpos(Route::currentRouteName(), 'news') > -1)
        <strong><a href="{{ route('news.author', $post->author->slug)}}">{{$post->author->name}}</a></strong> | <small>{{ '@'.str_slug($post->author->name,'') }}</small>
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
