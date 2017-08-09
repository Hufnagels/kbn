@extends('layouts.manage')

@section('content')
  <div class="flex-container"></div>
    <div class="columns">
      <div class="column">
        <div class="card">
          <div class="card-header notification is-primary">
            <div class="column">
              <div class="title">Show Permission Details of <strong>{{$permission->display_name}}</strong></div>
            </div>
          </div>
          <div class="card-content">
            <div class="media">
              <div class="media-content">
                <div class="content">
                  <p>
                  <strong>{{$permission->display_name}}</strong> <small>{{$permission->name}}</small>
                  <br>
                  {{$permission->description}}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <footer class="card-footer">
            <a href="{{route('permissions.edit', $permission->id)}}" class="card-footer-item is-pulled-left">Edit</a>
            <a href="{{ url()->previous() }}" class="card-footer-item is-pulled-right">Back</a>
          </footer>
        </div>
      </div>
    </div>
@endsection
