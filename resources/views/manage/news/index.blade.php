@extends('layouts.manage')
@section('title',' - News list')
@section('content')

<div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">Manage News posts</div>
          </div>
          <div class="column">
            <a href="{{ route('post.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create news post</a>
          </div>
        </div>
        <div class="card-content">
          @if ( session('message'))
          <div class="notification is-success"><strong>{{ session('message')}}</strong></div>
          @endif
          @if ( ! $newsCount)
          <div class="notification is-warning"><strong>Currently no news found</strong></div>
          @else

          <p class="has-text-right">{{ $newsCount}} {{str_plural('Item',$newsCount)}}</p>
          <table class="table is-narrow">
            <thead>
              <tr>
                <!--<th><abbr title="Id">ID</abbr></th>-->
                <th width="40%"><abbr title="name">Title</abbr></th>
                <th><abbr title="Email">Author</abbr></th>
                <th><abbr title="Date created">Created</abbr></th>
                <th><abbr title="Date created">Published</abbr></th>
                <th><abbr title="Published state">Publish state</abbr></th>
                <th><abbr title="Actions">Actions</abbr></th>
              </tr>
            </thead>

            <tbody>
              @foreach($newses as $news)
              <tr>
                <!--<td>{{$news->id}}</td>-->
                <td>{{$news->title}}</td>
                <td>{{$news->author->name}}</td>
                <td>{{$news->created_at->toFormattedDateString()}}</td>
                <td>{{ $news->published_at ? $news->published_at->toFormattedDateString() : 'not yet published'}}</td>
                <td>{!! $news->publicationStatusLabel() !!}</td>
                <td>
                  <a href="{{ route('post.edit', $news->slug)}}" title="Edit"><span class="fa fa-edit"></span></a>
                  <a href="{{ route('post.show', $news->slug)}}" title="Show"><span class="fa fa-eye"></span></a>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$newses->links()}}
          @endif
        </div>
      </div>

    </div>
  </div>

@endsection
