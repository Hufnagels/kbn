<div class="tile is-ancestor information">
  <?php
  $colorArray = ['is-success', 'is-warning', 'is-info', 'is-danger'];
  $index = 0;
  ?>
  @foreach ($latestpostswithimages as $post)

  <div class="tile is-parent ">
    <article class="tile is-child notification {{ $colorArray[$index]}}  wow bounceInDown" data-wow-duration="2s" data-wow-delay="1s">
      <div class="card wow animated ">
        <!-- -->
        <div class="card-image"><figure class="image is-4by3"><img src="{{ $post->image_thumb_url }}" alt="{{$post->title}}"></figure></div>

        <div class="card-content">

          <div class="content">
            <h3 class="subtitle"><a class="" href="{{ route('news.show', $post->slug)}}">{{$post->title}}</a></h3>
            <!--<p>{{$post->excerpt}}</p>-->

            <p>
              <strong><a href="{{ route('news.author', $post->author->slug)}}">{{$post->author->name}}</a></strong> |
              <small>{{ '@'.str_slug($post->author->name,'') }}</small> |
              <small>{{$post->date}}</small> |
              <small><a href="{{ route('news.category', $post->category->slug)}}">{{$post->category->title}}</a></small> |
              {!! $post->tags_html !!}
            </p>
            <!-- -->
          </div>

        </div>
      </div>
    </article>
  </div>
  <?php
  $index++;
  ?>
  @endforeach
  <?php
  $colorArray = ['is-success', 'is-warning', 'is-info', 'is-danger'];
  $index = 0;
  ?>
  @foreach ($projectcategories as $post)

  <div class="tile is-parent ">
    <article class="tile is-child notification {{ $colorArray[$index]}}  wow bounceInDown" data-wow-duration="2s" data-wow-delay="1s">
      <div class="card wow animated ">
        <!-- -->
        <div class="card-image"><figure class="image is-4by3"><img src="{{ $post->image_thumb_url }}" alt="{{$post->title}}"></figure></div>

        <div class="card-content">

          <div class="content">
            <h3 class="subtitle"><a class="" href="{{ route('news.show', $post->slug)}}">{{$post->title}}</a></h3>
            <!--<p>{{$post->excerpt}}</p>-->

            <p>
              <strong><a href="{{ route('news.author', $post->author->slug)}}">{{$post->author->name}}</a></strong> |
              <small>{{ '@'.str_slug($post->author->name,'') }}</small> |
              <small>{{$post->date}}</small> |
              <small><a href="{{ route('news.category', $post->category->slug)}}">{{$post->category->title}}</a></small> |
              {!! $post->tags_html !!}
            </p>
            <!-- -->
          </div>

        </div>
      </div>
    </article>
  </div>
  <?php
  $index++;
  ?>
  @endforeach

</div>
