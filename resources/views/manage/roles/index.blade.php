@extends('layouts.manage')
@section('title',' - Roles list')
@section('content')
@if (Laratrust::can(['create-acl', 'create-user']) )
@endif
  <div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary" style="padding: .25rem 2.5rem .25rem 1.5rem;">
          <div class="column">
            <div class="title">Manage Roles</div>
          </div>
          <div class="column">
            <a href="{{route('roles.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Role</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="columns is-multiline">
      @foreach ($roles as $role)
        <div class="column is-half roleitem">
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <h3 class="title">{{$role->display_name}} - <em>{{$role->name}}</em></h3>

                  <p>
                    {{$role->description}}
                  </p>
                </div>

                <div class="columns is-mobile">
                  <div class="column is-one-half">
                    <a href="{{route('roles.show', $role->id)}}" class="button is-primary is-fullwidth">Details</a>
                  </div>
                  <div class="column is-one-half">
                    <a href="{{route('roles.edit', $role->id)}}" class="button is-light is-fullwidth">Edit</a>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      @endforeach
    </div>

@endsection
