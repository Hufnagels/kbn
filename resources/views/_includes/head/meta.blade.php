<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="KODVETOK">
<meta name="keywords" content="KODVETOK, kodvetok, microbit, micro:bit, scratch, arduino, genuino ">
<meta name="author" content="KODVETOK">

<!-- FAV.ICO settings -->
<link rel="apple-touch-icon" sizes="57x57" href="/fav/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/fav/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/fav/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/fav/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/fav/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/fav/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/fav/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/fav/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/fav/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/fav/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/fav/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/fav/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/fav/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<!-- Facebook settings -->
<!-- You can use Open Graph tags to customize link previews.
Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url"           content="{{ Request::url() }}" />
<meta property="og:type"          content="article" />
<meta property="og:title"
  @if(isset($item))
    content="{{$item->title}}"
  @else
    content="Kódvetők - Digitális Oktatási Műhely"
  @endif
/>
<meta property="og:description"
  @if(isset($item))
    content="{{$item->excerpt}}"
  @else
    content="KODVETOK, kodvetok, microbit, micro:bit, scratch, arduino, genuino "
  @endif
/>
<meta property="og:image"
  @if( (isset($item) && $item->imageUrl !== NULL))
    content="{{ $item->imageUrl }}"
  @else
    content="{{ asset('/images/header/render07.png') }}"
  @endif
/>
<meta property="og:image:width" content="500"/>
<meta property="og:image:height" content="340"/>

<meta name="csrf-token" content="{{ csrf_token() }}">
