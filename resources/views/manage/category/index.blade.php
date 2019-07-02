@extends('layouts.manage')
@section('title',' - ' . __('manageCategory.manage'))
@section('content')

<div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary" style="padding: .25rem 2.5rem .25rem 1.5rem;">
          <div class="column">
            <div class="title">{{ __('manageCategory.manage') }}</div>
          </div>
          <div class="column">
            <a href="{{ route('category.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right">
              <i class="fa fa-plus m-r-10"></i> {{ __('manageCategory.create') }}</a>
          </div>
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $categoriesCount}} {{ __('manageCategory.category') }} {{str_plural('Item',$categoriesCount)}}</p>
<!---->
          <div class="tabs is-small is-right">
            <ul>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">{{ __('forms.all') }}</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">{{ __('forms.trash') }}</a></li>
            </ul>
          </div>

          @include('manage.partials.message')

          @if ( ! $categoriesCount)
            <div class="notification is-warning"><strong>{{ __('manageCategory.noCategory') }}</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.category.table-trashed')
            @else
              @include('manage.category.table-all')
            @endif


            {{$categories->appends(Request::query())->render() }}
          @endif

        </div>
      </div>

    </div>
  </div>

@endsection
