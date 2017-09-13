@section('scripts')
<!-- -->
<script type="text/javascript" src="/assets/js/vendor/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/assets/js/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
$(function () {

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
    $("#tag_edit").select2().val( {!! $instruction->tags()->allRelatedIds() !!} ).trigger("change");
  }

  if($("#lession_create")){
    $("#lession_create").select2({
      tags: true,
      multiple: true,
      placeholder: "Please select lession",
    });
  }

  if($("#lession_edit")){
    $("#lession_edit").select2({
      tags: true,
      multiple: true,
      placeholder: "Please select lession",
    });
    $("#lession_edit").select2().val( {!! $instruction->lessions()->allRelatedIds() !!} ).trigger("change");
  }

});

</script>
@endsection
