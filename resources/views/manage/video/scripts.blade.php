@section('scripts')
<!-- -->

<script type="text/javascript" src="/assets/js/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
$(function () {

  function youtube_id_from_url(url) {
      var pattern = '%^(?:https?://)?(?:www\.)?(?:youtu\.be/| youtube\.com(?:/embed/| /v/| /watch\?v=))([\w-]{10,12})$%x';
      var result = preg_match(pattern, url, matches);
      if (result) {
          return matches[1];
      }
      return false;
  }
  $('#previewVideo').on('click', function() {
    if($('#url').val().length > 0)
    {
      var theTitle = $('#url').val();
      var videoId = theTitle.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);//videyoutube_id_from_url(this.value);
      $('[name=yt_video_id]').val(videoId[1]);
      $('#previewIframe').attr('src', 'https://www.youtube.com/embed/'+videoId[1])
    }
  });

  $('#title').on('keyup', function() {
    var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = slugize(theTitle);
        slugInput.val(theSlug);
        if($('.slugtext')){
          $('.slugtext').html(theSlug);
        }
  });

  // $('#title').on('blur', function() {
  //   var theTitle = this.value.toLowerCase().trim(),
  //       slugInput = $('#slug'),
  //       theSlug = theTitle.replace(/&/g, '-and-')
  //                         .replace(/[^a-z0-9-]+/g, '-')
  //                         .replace(/\-\-+/g, '-')
  //                         .replace(/^-+|-+$/g, '');
  //       slugInput.val(theSlug);
  //
  //       var videoId = this.value.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);//videyoutube_id_from_url(this.value);
  //       var apiKey = '668486990036-gb7rhommjftgeliq35ife1jl60r2bgd4.apps.googleusercontent.com';
  //       // alert(videoId[1]);
  //       $.ajax({
  //         url: 'https://www.googleapis.com/youtube/v3/videos?id=' + videoId[1] + '&key='+ apiKey + "&part=snippet",// + "&fields=items(snippet(title))&part=snippet",
  //         dataType: "jsonp",
  //         crossDomain:true,
  //         xhrFields: {
  //             withCredentials: true
  //          }
  //       }).done(function(data, error) {
  //         // if(error) alert(error);
  //         console.log(data, error);
  //         // if (typeof(data.items[0]) != "undefined") {
  //         //     console.log('video exists ' + data.items[0].snippet.title);
  //         //   } else {
  //         //     console.log('video not exists');
  //         // }
  //       });
  // });
  //$('.fileinput').fileinput();

  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#target').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInp").change(function(){
    readURL(this);
  });

  $('#datetimepicker').datetimepicker({
    // locale: 'hu',
    format: 'YYYY-MM-DD HH:mm:ss',
    showClear: true
  });

  if($("#tag_create")){
    $("#tag_create").select2({
      tags: true,
      multiple: true,
      placeholder: "Please add tag",
    });
  }

  if($("#tag_edit")){
    $("#tag_edit").select2({
      tags: true,
      multiple: true,
      placeholder: "Please enter tags",
    });
    $("#tag_edit").select2().val( {!! $video->tags()->allRelatedIds() !!} ).trigger("change");
  }

});

</script>
@endsection
