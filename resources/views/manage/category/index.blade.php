@extends('layouts.manage')
@section('title',' - Category list')
@section('content')

<div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">Manage Categories</div>
          </div>
          <div class="column">
            <a href="{{ route('category.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-plus m-r-10"></i> Create new Category</a>
          </div>
        </div>
        <div class="card-content p-t-0">

          <p class="has-text-right m-b-10">{{ $categoriesCount}} Category {{str_plural('Item',$categoriesCount)}}</p>
<!---->
          <div class="tabs is-small is-right">
            <ul>
              <li {{ ( ((app('request')->input('status') == 'all') || (app('request')->input('status') == '')) ? 'class=is-active' : '') }}><a href="?status=all">All category</a></li>
              <li {{ (app('request')->input('status') == 'trash' ? 'class=is-active' : '') }}><a href="?status=trash">Category in Trash</a></li>
            </ul>
          </div>

          @include('manage.partials.message')

          @if ( ! $categoriesCount)
            <div class="notification is-warning"><strong>Currently no category found</strong></div>
          @else
            @if($onlyTrashed)
              @include('manage.category.table-trashedcategories')
            @else
              @include('manage.category.table-allcategories')
            @endif


            {{$categories->appends(Request::query())->render() }}
          @endif

        </div>
      </div>

    </div>
  </div>

@endsection
