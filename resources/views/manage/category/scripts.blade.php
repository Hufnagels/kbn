@section('scripts')
<script type="text/javascript">
        $('#title').on('keyup', function() {
          var theTitle = this.value.toLowerCase().trim(),
              slugInput = $('#slug'),
              theSlug = slugize(theTitle);
              slugInput.val(theSlug);
              if($('.slugtext')){
                $('.slugtext').html(theSlug);
              }
        });
</script>
@endsection
