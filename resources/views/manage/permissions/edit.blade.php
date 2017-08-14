@extends('layouts.manage')
@section('title',' - Edit permission')
@section('content')
  <div class="flex-container"></div>

    <div class="columns">
      <div class="column">
        <div class="card">
          <div class="card-header notification is-primary">
            <div class="column">
              <div class="title">Edit Permission Details of <strong>{{$permission->display_name}}</strong>
              </div>
            </div>
          </div>
          <div class="card-content">
            <form action="{{route('permissions.update', $permission->id)}}" method="POST">
              {{csrf_field()}}
              {{method_field('PUT')}}

              <div class="columns">
                <div class="column">
                  <div class="field">
                    <label class="label">Name (Display Name)</label>
                    <div class="control">
                      <input type="text" class="input" name="display_name" id="display_name" value="{{$permission->display_name}}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="columns">
                <div class="column">
                  <div class="field">
                    <label class="label">Slug <small>(Cannot be changed)</small></label>
                    <div class="control">
                      <input type="text" class="input" name="name" id="name" value="{{$permission->name}}" disabled>
                    </div>
                  </div>
                </div>
              </div>
              <div class="columns">
                <div class="column">
                  <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                      <input type="text" class="input" name="description" id="description" placeholder="Describe what this permission does" value="{{$permission->description}}">
                    </div>
                  </div>
                </div>
              </div>

              <div class="columns">
                <div class="column">
                  <div class="field is-grouped">
                    <div class="control">
                      <button class="button is-primary">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <footer class="card-footer">
            <a href="{{ url()->previous() }}" class="card-footer-item is-pulled-right">Back</a>
          </footer>
        </div>
      </div>
    </div>

@endsection
