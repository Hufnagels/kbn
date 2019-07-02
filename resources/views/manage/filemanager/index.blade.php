@extends('layouts.manage')
@section('title',' - Filemanager')
@section('content')
<div class="container1">
  <div class="columns">
    <div class="column m-t-0">
      <div class="card">
        <div class="card-header notification is-primary" style="padding: .25rem 2.5rem .25rem 1.5rem;">
          <div class="column"><div class="title">Manage {{ $fmType }}</div></div>
        </div>
        <div class="card-content p-t-0" id="inline-lfm">
          <div class="tabs is-small is-right">
            <ul>
              <li {{ ($fmType == 'Images' ? 'class=is-active' : '') }}><a href="?status=image">Images</a></li>
              <li {{ ($fmType == 'Files' ? 'class=is-active' : '') }}><a href="?status=file">Files</a></li>
            </ul>
          </div>
          <iframe class="in-iframe" src="/laravel-filemanager?type={{ $fmType }}" style="width: 100%; height: 700px; overflow: hidden; border: 1px solid lightgrey;"></iframe>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
