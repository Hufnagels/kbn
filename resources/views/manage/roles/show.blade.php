@extends('layouts.manage')
@section('title',' - Show role')
@section('content')
  <div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">Show role {{$role->display_name}}<small class="m-l-25"><em>({{$role->name}})</em></small></div>
          </div>
        </div>
        <div class="card-content">
          <div class="media">
            <div class="media-content">
              <p class="title is-4">Permissions</p>
              <ul>
                @foreach ($role->permissions as $r)
                  <li>{{$r->display_name}} <em class="m-l-15">({{$r->description}})</em></li>
                @endforeach
              </ul>
            </div>
          </div>

        </div>
        <footer class="card-footer">
          <a href="{{route('roles.edit', $role->id)}}" class="card-footer-item is-pulled-left">Edit</a>
          <a href="{{ url()->previous() }}" class="card-footer-item is-pulled-right">Back</a>
        </footer>

      </div>

    </div>
  </div>

@endsection
