@extends('layouts.manage')
@section('title',' - ' . __('manageNews.manage'))
@section('content')

  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary" style="padding: .25rem 2.5rem .25rem 1.5rem;">
          <div class="column"><div class="title">{{ __('manageNews.manage') }}</div></div>
          <div class="column"><a href="{{ route('post.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-plus m-r-10"></i> {{ __('manageNews.create') }}</a></div>
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $newsCount}} {{ __('manageNews.news') }} {{str_plural('Item',$newsCount)}}</p>
          <div class="tabs is-small is-right">
            <ul>
              <li {{ (app('request')->input('status') == 'own' ? 'class=is-active' : '') }}><a href="?status=own">{{ __('forms.own') }}</a></li>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">{{ __('forms.all') }}</a></li>
              <li {{ (app('request')->input('status') == 'published' ? 'class=is-active' : '') }}><a href="?status=published">{{ __('forms.published') }}</a></li>
              <li {{ (app('request')->input('status') == 'scheduled' ? 'class=is-active' : '') }}><a href="?status=scheduled">{{ __('forms.scheduled') }}</a></li>
              <li {{ (app('request')->input('status') == 'draft' ? 'class=is-active' : '') }}><a href="?status=draft">{{ __('forms.draft') }}</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">{{ __('forms.trash') }}</a></li>
            </ul>
          </div>
          @include('manage.news.message')
          @if ( ! $newsCount)
          <div class="notification is-warning"><strong>{{ __('manageNews.noNews') }}</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.news.table-trashed')
            @else
              @include('manage.news.table-all')
            @endif
          {{$newses->appends(Request::query())->render() }}
          @endif
        </div>
      </div>

    </div>
  </div>

@endsection
