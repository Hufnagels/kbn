<nav class="panel is-rounded-border-5">
  <div class="panel-block">
    <form action="{{ route('newses')}}" class="news-search-form is-fullwidth">
      <div class="field is-grouped">
        <p class="control is-expanded"><input class="input is-small" type="text" name="term" placeholder="" value="{{ request('term')}}"></p>
        <p class="control"><button class="button is-primary is-small" type="submit"><i class="fa fa-search"></i></button></p>
      </div>
    </form>
  </div>
</nav>

<nav class="panel is-rounded-border-5">
  <div class="panel-heading is-warning">Categories</div>

  @foreach($categories as $category)
    @if($category->news->count() )
    <a class="panel-block" href="{{ route('news.category', $category->slug)}}">
      <span class="panel-icon"><i class="fa fa-book"></i></span>{{ $category->title}}
      <span class="tag is-rounded is-light is-sup">{{ $category->news->count()}}</span>
    </a>
    @endif
  @endforeach

</nav>

<nav class="panel  is-rounded-border-5">
  <div class="panel-heading is-info">Popular news</div>

  @foreach ($popularposts as $post)
  <a class="panel-block" href="{{ route('news.show', $post->slug)}}">
    <article class="media">
      @if( $post->image_thumb_url )
      <figure class="media-left"><p class="image is-64x64"><img src="{{ $post->image_thumb_url }}" alt="{{ $post->title }}" style="font-size:12px;"></p></figure>
      @endif
      <div class="media-content"><div class="content">{{$post->title}}</div></div>
    </article>
  </a>
  @endforeach

</nav>

<nav class="panel  is-rounded-border-5">
  <div class="panel-heading is-dark">Tags</div>
  <div class="panel-block">
    <div class="field is-grouped is-grouped-multiline">
      @foreach($tags as $tag)

      <div class="control">
        <div class="tags has-addons">
          <a href="{{ route('news.tags', $tag->slug) }}" class="tags has-addons">
            <span class="tag is-dark">{{ $tag->name }}</span>
            <!--<span class="tag is-info">0.5.0</span>-->
          </a>
        </div>
      </div>

      @endforeach




    </div>



  </div>
</nav>
