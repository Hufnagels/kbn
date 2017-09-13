@section('scripts')
<!-- -->
<script type="text/javascript" src="/assets/js/vendor/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/assets/js/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
$(function () {
  function myCustomURLConverter(url, node, on_save, name) {
    // Do some custom URL conversion
    url = url.substring(3);
console.log(url);
    // Return new URL
    return url;
  };
  $('#title').on('keyup', function() {
    var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = slugize(theTitle);
        slugInput.val(theSlug);
        if($('.slugtext')){
          $('.slugtext').html(theSlug);
        }
  });

  var editor_config = {
    path_absolute : "{{ URL::to('/manage') }}/",
    selector: "#body",
    height: 500,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    remove_script_host: true,
    urlconverter_callback : function(url, node, on_save, name) {
      // Do some custom URL conversion
      if(name == 'href'){
        var type = url.match(/.(jpg|jpeg|png|gif)$/i);
        var full = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');
  // console.log('Betöltés');
  // console.log('full: ', full);
  // console.log('host: ', window.location.hostname);
  // console.log('url: ',url);
  url = url.replace(full, '');
  // console.log('Newurl: ',url);
  // console.log('node:', node);
  // console.log('name: ', name);
      }

      // Return new URL
      return url;
    },
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

    tinymce.init(editor_config);

/*
  $.trumbowyg.svgPath = "{!! asset('/assets/js/ui/icons.svg') !!}";

  //$('#excerpt').trumbowyg({resetCss: true});
  $('#body').trumbowyg({
    resetCss: true,
    btnsDef: {
    // Customizables dropdowns
      image: {
        dropdown: ['insertImage', 'upload', 'base64', 'noembed'],
        ico: 'insertImage'
      }
    },
    btns : [
      ['viewHTML'],
      ['formatting'],
      'btnGrp-semantic',
      ['superscript', 'subscript'],
      ['link'],
      ['image'],
      'btnGrp-justify',
      'btnGrp-lists',
      ['removeformat'],
      ['fullscreen']
    ],
    autogrow: true
  });
*/
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
      placeholder: "Please enter tags",
    });
  }

  if($("#tag_edit")){
    $("#tag_edit").select2({
      tags: true,
      multiple: true,
      placeholder: "Please enter tags",
    });
    $("#tag_edit").select2().val( {!! $post->tags()->allRelatedIds() !!} ).trigger("change");
  }

});

</script>
@endsection
