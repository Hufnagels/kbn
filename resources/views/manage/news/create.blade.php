@extends('layouts.manage')
@section('title',' - Create News post')
@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">Create news post</div>
        </div>
      </div>
      <div class="card-content is-paddingless createnewspost">

        {!! Form::model( $post, [
                'method' => 'POST',
                'route' => 'post.store',
                'files' => TRUE
                ])  !!}

                <div class="tile is-ancestor is-marginless ">
                  <div class="tile is-vertical is-8">
                    <div class="tile">
                      <div class="tile is-parent is-vertical is-paddingless">
                        <article class="tile is-child notification">

                          <div class="field">
                            <label class="label">{!! Form::label('title', 'Title') !!}</label>
                            <div class="control {{ $errors->has('title') ? 'is-danger' : ''}}">{!! Form::text('title', null, ['class' => 'input']) !!}</div>
                            @if($errors->has('title'))
                            <p class="help is-danger">Title is invalid</p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('subtitle', 'SubTitle') !!}</label>
                            <div class="control {{ $errors->has('subtitle') ? 'is-danger' : ''}}">{!! Form::text('subtitle', null, ['class' => 'input']) !!}</div>
                            @if($errors->has('subtitle'))
                            <p class="help is-danger">Title is invalid</p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('slug', 'Slug') !!}</label>
                            <div class="control {{ $errors->has('slug') ? 'is-danger' : ''}}">{!! Form::text('slug', null, ['class' => 'input']) !!}</div>
                            @if($errors->has('slug'))
                            <p class="help is-danger">Slug must be set and must be unique</p>
                            @endif
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('excerpt', 'Excerpt') !!}</label>
                            <div class="control">{!! Form::textarea('excerpt', null, ['class' => 'textarea excerpt'] ,['attributes' => ['cols'=> 50, 'rows'=> 5]]) !!}</div>
                          </div>

                          <div class="field">
                            <label class="label">{!! Form::label('body', 'Body') !!}</label>
                            <div class="control {{ $errors->has('body') ? 'is-danger' : ''}}">{!! Form::textarea('body', null, ['class' => 'textarea']) !!}</div>
                            @if($errors->has('body'))
                            <p class="help is-danger">Body is invalid</p>
                            @endif
                          </div>

                        </article>
                      </div>
                    </div>

                  </div>
                  <div class="tile is-parent is-paddingless">
                    <article class="tile is-child notification ">

                      <div class="field">
                        <label class="label">{!! Form::label('published_at', 'Publishing date') !!}</label>
                        <div class="control">{!! Form::date('published_at', \Carbon\Carbon::now()->format('yyyy-mm-dd'), ['class' => 'input']) !!}</div>
                      </div>

                      <div class="field">
                        <label class="label">{!! Form::label('category_id', 'Category') !!}</label>
                        <div class="control {{ $errors->has('category_id') ? 'is-danger' : ''}}">
                          <div class="select">{!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['placeholder' => 'Select a category']) !!}</div>
                        </div>
                        @if($errors->has('category_id'))
                        <p class="help is-danger">Select one</p>
                        @endif
                      </div>

                      <div class="field">
                        <label class="label">{!! Form::label('image', 'List image') !!}</label>
                        <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
                          {!! Form::file('image') !!}
                        </div>
                        @if($errors->has('image'))
                        <p class="help is-danger">Upload one</p>
                        @endif
                      </div>
                      <div class="control">
                        {!! Form::submit('Create', ['class' => 'button is-primary']) !!}
                      </div>
                    </article>
                  </div>
                </div>








        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<!-- include summernote css/js-->

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
        $.trumbowyg.btns = [
            ['viewHTML'],
            ['formatting'],
            'btnGrp-semantic',
            ['superscript', 'subscript'],
            ['link'],
            ['insertImage'],
            'btnGrp-justify',
            'btnGrp-lists',
            ['horizontalRule'],
            ['removeformat'],
            ['fullscreen']
        ];

        $('#excerpt').trumbowyg({resetCss: true});
        $('#body').trumbowyg({resetCss: true, autogrow:true});
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
