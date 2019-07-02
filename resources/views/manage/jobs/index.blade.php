@extends('layouts.manage')
@section('title',' - ' . __('manageJobs.manage'))
@section('content')

  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary" style="padding: .25rem 2.5rem .25rem 1.5rem;">
          <div class="column"><div class="title">{{ __('manageJobs.manage') }}</div></div>
          <div class="column"><a href="{{ route('post.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-plus m-r-10"></i> {{ __('forms.create') }}</a></div>
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $jobsCount}} {{ __('manageJobs.notification') }} {{str_plural('Item',$jobsCount)}}</p>
          <div class="tabs is-small is-right">
            <ul>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">{{ __('forms.all') }}</a></li>
              <li {{ (app('request')->input('status') == 'readed' ? 'class=is-active' : '') }}><a href="?status=published">{{ __('readed') }}</a></li>
              <li {{ (app('request')->input('status') == 'unreaded' ? 'class=is-active' : '') }}><a href="?status=scheduled">{{ __('unreaded') }}</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">{{ __('forms.trash') }}</a></li>
            </ul>
          </div>
          @include('manage.jobs.message')
          @if ( ! $jobsCount)
          <div class="notification is-warning"><strong>{{ __('manageJobs.noNotification') }}</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.jobs.table-trash')
            @else
              @include('manage.jobs.table-all')
            @endif

          @endif
        </div>
      </div>

    </div>
  </div>

@endsection
