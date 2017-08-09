@extends('layouts.manage')

@section('content')
  <div class="flex-container"></div>
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">Editing role: <strong>{{$role->display_name}}</strong></div>
          </div>
        </div>
        <div class="card-content">
          <form action="{{route('roles.update', $role->id)}}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="columns">
              <div class="column">
                <div class="title">Role detail</div>
                <div class="field">
                  <label class="label">Name (Human Readable)</label>
                  <div class="control">
                    <input type="text" class="input" name="display_name" value="{{$role->display_name}}" id="display_name">
                    @if ($errors->has('display_name'))
                    <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                    @endif
                  </div>
                  @if ($errors->has('display_name'))
                  <p class="help is-danger">{{ $errors->first('display_name') }}</p>
                  @endif
                </div>
                <div class="field">
                  <label class="label">Slug (Can not be edited)</label>
                  <div class="control">
                    <input type="text" class="input" name="name" value="{{$role->name}}" disabled id="name">
                  </div>
                </div>
                <div class="field">
                  <label class="label">Description</label>
                  <div class="control">
                    <input type="text" class="input" value="{{$role->description}}" id="description" name="description">
                    @if ($errors->has('description'))
                    <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                    @endif
                  </div>
                  @if ($errors->has('description'))
                  <p class="help is-danger">{{ $errors->first('description') }}</p>
                  @endif
                </div>
                <input type="hidden" :value="permissionsSelected" name="permissions">
              </div>
              <div class="column">
                <div class="title">Permissions</div>
                <b-checkbox-group v-model="permissionsSelected">
                  @foreach ($permissions as $permission)
                    <div class="field">
                      <b-checkbox class="vueItem" :custom-value="{{$permission->id}}">{{$permission->display_name}} <em>({{$permission->description}})</em></b-checkbox>
                    </div>
                  @endforeach
                </ul>
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


@section('scripts')
  <script>
  var app = new Vue({
    el: '#app',
    data: {
      permissionsSelected: {!!$role->permissions->pluck('id')!!}
    }
  });
  </script>
@endsection
