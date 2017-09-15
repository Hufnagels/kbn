@extends('layouts.manage')
@section('title',' - ' . __('manageTag.manage'))
@section('content')

<div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">{{__('manageTag.manage')}}</div>
          </div>
          <div class="column">
            <a href="{{ route('tag.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right">
              <i class="fa fa-plus m-r-10"></i> {{__('manageTag.create')}}</a>
          </div>
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $tagsCount}} {{__('manageTag.tag')}} {{str_plural('Item',$tagsCount)}}</p>
<!---->
          <div class="tabs is-small is-right">
            <ul>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">{{ __('forms.all') }}</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">{{ __('forms.trash') }}</a></li>
            </ul>
          </div>

          @include('manage.partials.message')

          @if ( ! $tagsCount)
            <div class="notification is-warning"><strong>{{__('manageTag.noTag')}}</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.tag.table-trashed')
            @else
              @include('manage.tag.table-all')
            @endif


            {{$tags->appends(Request::query())->render() }}
          @endif

        </div>
      </div>

    </div>
  </div>

@endsection
