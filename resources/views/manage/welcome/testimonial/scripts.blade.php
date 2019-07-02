@section('scripts')
<script type="text/javascript" src="/assets/js/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
function countChar(val) {
      var len = val.value.length,
          max = $(val).attr('maxlength'),
          id =  $(val).attr('id'),
          rest;
      if (len >= max) {
        val.value = val.value.substring(0, max);
        $('#'+id+'_counter').text("{{ __('manageTesti.charsLeft')}}: 0");
      } else {
        rest = max - len;
        $('#'+id+'_counter').text("{{ __('manageTesti.charsLeft')}}: " + rest);
      }
    };
$(function () {

  $('#title').on('blur', function() {
    var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = slugize(theTitle);
        slugInput.val(theSlug);
  });

  $('#datetimepicker').datetimepicker({
    // locale: 'hu',
    format: 'YYYY-MM-DD HH:mm:ss',
    showClear: true
  });



});

</script>
@endsection
