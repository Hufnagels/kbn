@extends('layouts.manage')

@section('content')
<div class="columns m-t-10 news-container">
  <div class="column">
    @foreach($instructions as $instruction)
    <div class="card m-b-10">
      <header class="card-header">
        <a href="#" class="card-header-icon" aria-label="more options"><span class="icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
        <p class="card-header-title subtitle is-6">{{ $instruction->title }}</p>
        <time datetime="2016-1-1" style="margin:15px;">{{ $instruction->published_at}}</time>
      </header>

      <div class="card-content" style="display:none;">

        <div class="media">
          <div class="media-content">
            <div class="content">
              <p>
                <strong><a href="{{ route('news.author', $instruction->author->slug)}}">{{$instruction->author->name}}</a></strong> |
                <small>{{ '@'.str_slug($instruction->author->name,'') }}</small> |
                <br>
                <small>{{$instruction->date}}</small>
                </p>
            </div>

          </div>
        </div>
        <div class="content">
          <div class="content m-t-30"><h3>{!! $instruction->excerpt_html !!}</h3></div>
          <div class="content m-t-10">{!! $instruction->body_html !!}</div>

          @if(count($instruction->lessions))
          <hr>
          <p class="subtitle is-6">Kapcsolódó órai anyagok</p>
          @endif
          @foreach($instruction->lessions as $item)
          <div class="card m-b-10">
            <header class="card-header">
              <a href="#" class="card-header-icon" aria-label="more options"><span class="icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
              <p class="card-header-title subtitle is-6" style="margin-bottom:0;">{{ $item->title }}</p>
              <time datetime="2016-1-1" style="margin:15px;">{{ $item->published_at}}</time>
            </header>

            <div class="card-content" style="display:none;">

              <div class="media">
                <div class="media-content">
                  <div class="content">
                    <p>
                      <strong><a href="{{ route('news.author', $item->author->slug)}}">{{$item->author->name}}</a></strong> |
                      <small>{{ '@'.str_slug($item->author->name,'') }}</small> |
                      <br>
                      <small>{{$item->date}}</small>
                      </p>
                  </div>

                </div>
              </div>
              <div class="content">
                <div class="content m-t-30"><h3>{!! $item->excerpt_html !!}</h3></div>
                <div class="content m-t-10">{!! $item->body_html !!}</div>
              </div>

            </div>
            <footer class="card-footer"></footer>
          </div>
          @endforeach
        </div>

      </div>
      <footer class="card-footer"></footer>
    </div>
    @endforeach
  </div>
</div>
@endsection
@section('scripts')
<script>
$(".card-header").click(function () {

  $header = $(this);
  //getting the next element
  $content = $header.next();
  //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
  $content.slideToggle(500, function () {
      //execute this after slideToggle is done
      //change text of header based on visibility of content div
      $header.text(function () {
          //change text based on condition
          // return $content.is(":visible") ? "Collapse" : "Expand";
      });
  });

});
</script>
@endsection
