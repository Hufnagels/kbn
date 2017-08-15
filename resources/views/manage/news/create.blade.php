@extends('layouts.manage')
@section('title',' - Create News post')
@section('styles')
<styles>
  *!
 * Jasny Bootstrap v3.1.0 (http://jasny.github.com/bootstrap)
 * Copyright 2011-2014 Arnold Daniels.
 * Licensed under Apache-2.0 (https://github.com/jasny/bootstrap/blob/master/LICENSE)
 */

.nav-tabs-bottom {
  border-bottom: 0;
  border-top: 1px solid #dddddd;
}
.nav-tabs-bottom > li {
  margin-bottom: 0;
  margin-top: -1px;
}
.nav-tabs-bottom > li > a {
  border-radius: 0 0 4px 4px;
}
.nav-tabs-bottom > li > a:hover,
.nav-tabs-bottom > li > a:focus,
.nav-tabs-bottom > li.active > a,
.nav-tabs-bottom > li.active > a:hover,
.nav-tabs-bottom > li.active > a:focus {
  border: 1px solid #dddddd;
  border-top-color: transparent;
}
.nav-tabs-left {
  border-bottom: 0;
  border-right: 1px solid #dddddd;
}
.nav-tabs-left > li {
  margin-bottom: 0;
  margin-right: -1px;
  float: none;
}
.nav-tabs-left > li > a {
  border-radius: 4px 0 0 4px;
  margin-right: 0;
  margin-bottom: 2px;
}
.nav-tabs-left > li > a:hover,
.nav-tabs-left > li > a:focus,
.nav-tabs-left > li.active > a,
.nav-tabs-left > li.active > a:hover,
.nav-tabs-left > li.active > a:focus {
  border: 1px solid #dddddd;
  border-right-color: transparent;
}
.row > .nav-tabs-left {
  padding-right: 0;
  padding-left: 15px;
  margin-right: -1px;
  position: relative;
  z-index: 1;
}
.row > .nav-tabs-left + .tab-content {
  border-left: 1px solid #dddddd;
}
.nav-tabs-right {
  border-bottom: 0;
  border-left: 1px solid #dddddd;
}
.nav-tabs-right > li {
  margin-bottom: 0;
  margin-left: -1px;
  float: none;
}
.nav-tabs-right > li > a {
  border-radius: 0 4px 4px 0;
  margin-left: 0;
  margin-bottom: 2px;
}
.nav-tabs-right > li > a:hover,
.nav-tabs-right > li > a:focus,
.nav-tabs-right > li.active > a,
.nav-tabs-right > li.active > a:hover,
.nav-tabs-right > li.active > a:focus {
  border: 1px solid #dddddd;
  border-left-color: transparent;
}
.row > .nav-tabs-right {
  padding-left: 0;
  padding-right: 15px;
}
.btn-file {
  overflow: hidden;
  position: relative;
  vertical-align: middle;
}
.btn-file > input {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  opacity: 0;
  filter: alpha(opacity=0);
  font-size: 23px;
  height: 100%;
  width: 100%;
  direction: ltr;
  cursor: pointer;
}
.fileinput {
  margin-bottom: 9px;
  display: inline-block;
}
.fileinput .form-control {
  padding-top: 7px;
  padding-bottom: 5px;
  display: inline-block;
  margin-bottom: 0px;
  vertical-align: middle;
  cursor: text;
}
.fileinput .thumbnail {
  overflow: hidden;
  display: inline-block;
  margin-bottom: 5px;
  vertical-align: middle;
  text-align: center;
}
.fileinput .thumbnail > img {
  max-height: 100%;
}
.fileinput .btn {
  vertical-align: middle;
}
.fileinput-exists .fileinput-new,
.fileinput-new .fileinput-exists {
  display: none;
}
.fileinput-inline .fileinput-controls {
  display: inline;
}
.fileinput-filename {
  vertical-align: middle;
  display: inline-block;
  overflow: hidden;
}
.form-control .fileinput-filename {
  vertical-align: bottom;
}
.fileinput.input-group {
  display: table;
}
.fileinput.input-group > * {
  position: relative;
  z-index: 2;
}
.fileinput.input-group > .btn-file {
  z-index: 1;
}
.fileinput-new.input-group .btn-file,
.fileinput-new .input-group .btn-file {
  border-radius: 0 4px 4px 0;
}
.fileinput-new.input-group .btn-file.btn-xs,
.fileinput-new .input-group .btn-file.btn-xs,
.fileinput-new.input-group .btn-file.btn-sm,
.fileinput-new .input-group .btn-file.btn-sm {
  border-radius: 0 3px 3px 0;
}
.fileinput-new.input-group .btn-file.btn-lg,
.fileinput-new .input-group .btn-file.btn-lg {
  border-radius: 0 6px 6px 0;
}
.form-group.has-warning .fileinput .fileinput-preview {
  color: #8a6d3b;
}
.form-group.has-warning .fileinput .thumbnail {
  border-color: #faebcc;
}
.form-group.has-error .fileinput .fileinput-preview {
  color: #a94442;
}
.form-group.has-error .fileinput .thumbnail {
  border-color: #ebccd1;
}
.form-group.has-success .fileinput .fileinput-preview {
  color: #3c763d;
}
.fileinput .thumbnail {
  border-color: #d6e9c6;
}
.input-group-addon:not(:first-child) {
  border-left: 0;
}
</styles>
@endsection
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
                        <label class="label">{!! Form::label('image', 'News header image') !!}</label>
                        <div class="control {{ $errors->has('image') ? 'is-danger' : ''}}">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview fileinput-exists thumbnail image is-16by9" style=""></div>
                            <div class="m-t-20">
                              <span href="#" class="button btn-default btn-file">
                                <!--<span class="fileinput-new">Select image</span>
                                <span class="button fileinput-exists">Change</span>-->
                                {!! Form::file('image') !!}
                              </span>
                              <a href="#" class="button fileinput-exists m-t-10" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div>
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
