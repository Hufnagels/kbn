<div class="card">
  <header class="card-header">
    <a href="#" class="card-header-icon" aria-label="more options"><span class="icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
    <p class="card-header-title subtitle is-6">{{ $lession->title }}</p>
    <time datetime="2016-1-1" style="margin:15px;">{{ $lession->published_at}}</time>
  </header>
  @if ($item->imageUrl)
    <div class="card-image">
      <figure class="image ">
        <img src="{{ $item->imageUrl }}" alt="{{$item->title}}">
      </figure>
    </div>
  @endif
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <div class="content">
          <p>
            <strong><a href="{{ route('news.author', $item->author->slug)}}">{{$item->author->name}}</a></strong> |
            <small>{{ '@'.str_slug($item->author->name,'') }}</small> |
            <?php $postCount = $item->author->news->count(); ?>
            <small class="icon is-small postcount"><i class="fa fa-clone"></i>{{$postCount}} {{str_plural('post', $postCount)}}</small>
            <br>
            <small>{{$item->date}}</small>
            <br>
            {!! $item->category_html !!}
            <br>
            {!! $item->tags_html !!}
          </p>
        </div>
        <nav class="level is-mobile">
          <div class="level-left">
            <a class="fbshare" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}&display=popup" target="_blank"><span class="icon is-small"><i class="fa fa-facebook-square"></i></span>Megosztás</a>
          </div>
        </nav>
      </div>
    </div>
    <div class="content">
      <div class="content m-t-30"><h3>{!! $item->excerpt_html !!}</h3></div>
      <div class="content m-t-10">{!! $item->body_html !!}</div>
    </div>
  </div>
</div>
