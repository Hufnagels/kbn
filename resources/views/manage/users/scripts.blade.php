@section('scripts')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script type="text/javascript">
$(function () {
  $('#name').on('keyup', function() {
    var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = slugize(theTitle);
        slugInput.val(theSlug);
        if($('.slugtext')){
          $('.slugtext').html(theSlug);
        }
  });
  // $('#name').on('blur', function() {
  //   var theTitle = this.value.toLowerCase().trim(),
  //       slugInput = $('#slug'),
  //       theSlug = slugize(theTitle).replace("-", "");
  //   slugInput.val(theSlug);
  // });
  /* {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}*/
  var route_prefix = "{{ url(config('lfm.prefix')) }}";
    $('#lfm').filemanager('image', {prefix: route_prefix});
});
</script>
@endsection
