@extends('layouts.manage')
@section('title',' - Instructions list')
@section('content')

  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column"><div class="title">Manage Instruction Materials</div></div>
          @if (Auth::user()->hasPermission('crud-instruction'))
          <div class="column">
            <a href="{{ route('instruction.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-plus m-r-10"></i> Create instruction material</a>
          </div>
          @endif
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $instructionCount}} News {{str_plural('Item',$instructionCount)}}</p>
          <div class="tabs is-small is-right">
            <ul>
              <li {{ (app('request')->input('status') == 'own' ? 'class=is-active' : '') }}><a href="?status=own">Own</a></li>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">All</a></li>
              <li {{ (app('request')->input('status') == 'published' ? 'class=is-active' : '') }}><a href="?status=published">Published</a></li>
              <li {{ (app('request')->input('status') == 'scheduled' ? 'class=is-active' : '') }}><a href="?status=scheduled">Scheduled</a></li>
              <li {{ (app('request')->input('status') == 'draft' ? 'class=is-active' : '') }}><a href="?status=draft">Draft</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">in Trash</a></li>
            </ul>
          </div>
          @include('manage.instruction.message')
          @if ( ! $instructionCount)
          <div class="notification is-warning"><strong>Currently no instruction found</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.instruction.table-trashed')
            @else
              @include('manage.instruction.table-all')
            @endif
          {{$instructions->appends(Request::query())->render() }}
          @endif
        </div>
      </div>

    </div>
  </div>

@endsection
