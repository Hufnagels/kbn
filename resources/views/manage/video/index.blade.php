@extends('layouts.manage')
@section('title',' - Video list')
@section('content')

  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column"><div class="title">Manage Videos</div></div>
          <div class="column"><a href="{{ route('video.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-plus m-r-10"></i> Add new video</a></div>
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $videoCount}} News {{str_plural('Item',$videoCount)}}</p>
          <div class="tabs is-small is-right">
            <ul>
              <li {{ (app('request')->input('status') == 'own' ? 'class=is-active' : '') }}><a href="?status=own">Own videos</a></li>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">All videos</a></li>
              <li {{ (app('request')->input('status') == 'published' ? 'class=is-active' : '') }}><a href="?status=published">Published videos</a></li>
              <li {{ (app('request')->input('status') == 'scheduled' ? 'class=is-active' : '') }}><a href="?status=scheduled">Scheduled videos</a></li>
              <li {{ (app('request')->input('status') == 'draft' ? 'class=is-active' : '') }}><a href="?status=draft">Draft videos</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">Videos in Trash</a></li>
            </ul>
          </div>
          @include('manage.partials.message')
          @if ( ! $videoCount)
          <div class="notification is-warning"><strong>Currently no video found</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.video.table-trashedvideo')
            @else
              @include('manage.video.table-allvideo')
            @endif
          {{$videoes->appends(Request::query())->render() }}
          @endif
        </div>
      </div>

    </div>
  </div>

@endsection
