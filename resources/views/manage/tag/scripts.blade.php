@section('scripts')
<!-- include summernote css/js-->
    <script type="text/javascript">
        //$('ul.pagination').addClass('no-margin pagination-sm');

        $('#name').on('keyup', function() {
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
