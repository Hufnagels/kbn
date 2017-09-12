@section('scripts')
<script type="text/javascript">
  $('#name').on('blur', function() {
    var theTitle = this.value.toLowerCase().trim(),
        slugInput = $('#slug'),
        theSlug = slugize(theTitle).replace("-", "");
    slugInput.val(theSlug);
  });
</script>
@endsection
