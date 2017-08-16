@section('scripts')
<!-- include summernote css/js-->
    <script type="text/javascript" src="/js/jasny-bootstrap.min.js"></script>
    <script type="text/javascript">
        //$('ul.pagination').addClass('no-margin pagination-sm');

        $('#title').on('blur', function() {
            var theTitle = this.value.toLowerCase().trim(),
                slugInput = $('#slug'),
                theSlug = theTitle.replace(/&/g, '-and-')
                                  .replace(/[^a-z0-9-]+/g, '-')
                                  .replace(/\-\-+/g, '-')
                                  .replace(/^-+|-+$/g, '');

            slugInput.val(theSlug);
        });
        $.trumbowyg.svgPath = '/assets/js/ui/icons.svg';

        //$('#excerpt').trumbowyg({resetCss: true});
        $('#body').trumbowyg({
          resetCss: true,
          btns : [
            ['viewHTML'],
            ['formatting'],
            'btnGrp-semantic',
            ['superscript', 'subscript'],
            ['link'],
            'btnGrp-justify',
            'btnGrp-lists',
            ['removeformat'],
            ['fullscreen']
          ],
          autogrow: true
        });

        $('.fileinput').fileinput();
/*
        var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
        var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            showClear: true
        });

        $('#draft-btn').click(function(e) {
            e.preventDefault();
            $('#published_at').val("");
            $('#post-form').submit();
        });
        */
    </script>
@endsection
