@extends('layouts.manage')
@section('title',' - Permissions list')
@section('content')
@if (Laratrust::can(['create-acl', 'crud-permission']) )

  <div class="flex-container"></div>

      <div class="columns">
        <div class="column">
          <div class="card">
            <div class="card-header notification is-primary" style="padding: .25rem 2.5rem .25rem 1.5rem;">
              <div class="column">
                <div class="title">Manage Permissions</div>
              </div>
              <div class="column">
                <a href="{{route('permissions.create')}}" class="button is-primary is-inverted is-outlined is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Create New Permission</a>
              </div>
            </div>

            <div class="card-content">
              <table class="table is-narrow">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($permissions as $permission)
                    <tr>
                      <td>{{$permission->display_name}}</td>
                      <td>{{$permission->name}}</td>
                      <td>{{$permission->description}}</td>
                      <td class="has-text-left">
                        <a class="" href="{{route('permissions.show', $permission->id)}}"><span class="fa fa-eye"></span></a>
                        <a class="" href="{{route('permissions.edit', $permission->id)}}"><span class="fa fa-edit"></span></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endif
@endsection
