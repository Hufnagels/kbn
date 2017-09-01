@section('scripts')
<!--
    <script type="text/javascript" src="/assets/js/jasny-bootstrap.min.js"></script> -->
<script type="text/javascript" src="/assets/js/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
$(function () {

  $('#title').on('blur', function() {
    var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = theTitle.replace(/&/g, '-and-')
                          .replace(/[^a-z0-9-]+/g, '-')
                          .replace(/\-\-+/g, '-')
                          .replace(/^-+|-+$/g, '');
        slugInput.val(theSlug);
  });

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
