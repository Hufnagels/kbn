<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="KODVETOK">
<meta name="keywords" content="KODVETOK, kodvetok, microbit, micro:bit, scratch, arduino, genuino ">
<meta name="author" content="KODVETOK">
<meta name="copyright" content="http://index.hu/copyright/">

<!-- Facebook settings -->
<!-- You can use Open Graph tags to customize link previews.
Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
<meta property="og:url"           content="{{ Request::url() }}" />
<meta property="og:type"          content="article" />
<meta property="og:title"         content=
<?php
if(isset($item))
  echo '"' . $item->title.'"';
else
echo "Kódvetők - Digitális Oktatási Műhely"
?>
/>
<meta property="og:description"   content=
<?php
if(isset($item))
  echo '"' . $item->excerpt .'"';
else
echo "KODVETOK, kodvetok, microbit, micro:bit, scratch, arduino, genuino ";
?>
/>

<meta property="og:image"         content="{{ asset('/images/header/render07.png') }}" />
<meta property="og:image:width" content="450"/>
<meta property="og:image:height" content="298"/>

<!-- CSRF Token
http://kep.cdn.index.hu/1/0/1822/18221/182218/18221803_1114737_4bd1354ee8beae18d5f35c4a036731a2_wm.jpg"
-->
<meta name="csrf-token" content="{{ csrf_token() }}">
