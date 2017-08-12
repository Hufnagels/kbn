<nav class="panel">
  <p class="panel-heading is-warning">Categories</p>
  <div class="panel-block">
    <p class="control has-icons-left">
      <input class="input is-small" type="text" placeholder="search">
      <span class="icon is-small is-left"><i class="fa fa-search"></i></span>
    </p>
  </div>

  @foreach($categories as $category)
    @if($category->news->count() )
    <a class="panel-block" href="{{ route('news.category', $category->slug)}}">
      <span class="panel-icon"><i class="fa fa-book"></i></span>{{ $category->title}}
      <span class="tag is-rounded is-light is-sup">{{ $category->news->count()}}</span>
    </a>
    @endif
  @endforeach

</nav>

<nav class="panel">
  <p class="panel-heading is-info">Popular news</p>


  @foreach ($popularposts as $post)
  <a class="panel-block" href="{{ route('news.show', $post->slug)}}">
    <article class="media">
      <figure class="media-left">
        <p class="image is-64x64">
          <img src="{{ $post->imageUrl }}">
        </p>
      </figure>
      <div class="media-content">
        <div class="content">
          {{$post->title}}
        </div>
      </div>
    </article>
  </a>
  @endforeach

</nav>
