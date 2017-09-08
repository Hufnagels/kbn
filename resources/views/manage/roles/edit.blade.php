@extends('layouts.manage')
@section('title',' - Edit role')
@section('content')
  <div class="columns">
    <div class="column">
      <div class="card">
        <div class="card-header notification is-primary">
          <div class="column">
            <div class="title">Editing role: <strong>{{$role->display_name}}</strong></div>
          </div>
        </div>
        <div class="card-content">
          {!! Form::model( $role, [
                  'method' => 'PUT',
                  'route' => ['roles.update', $role->id],
                  'id' => 'update-post-form',
                  ])  !!}

                  <div class="columns">
                    <div class="column">
                      <div class="title">Role detail</div>
                      <div class="field">
                        <label class="label">{!! Form::label('display_name', 'Name (Human Readable)') !!}</label>
                        <div class="control">{!! Form::text('display_name', null, ['class' => 'input']) !!}
                          <!-- <input type="text" class="input" name="display_name" value="{{$role->display_name}}" id="display_name"> -->
                          @if ($errors->has('display_name'))<span class="icon is-small is-right"><i class="fa fa-warning"></i></span>@endif
                        </div>
                        @if ($errors->has('display_name'))<p class="help is-danger">{{ $errors->first('display_name') }}</p>@endif
                      </div>

                      <div class="field">
                        <label class="label">{!! Form::label('name', 'Slug (Can not be edited)') !!}</label>
                        <div class="control">{!! Form::text('name', null, ['class' => 'input', 'disabled' => 'disabled']) !!}</div>
                      </div>
                      <div class="field">
                        <label class="label">{!! Form::label('description', 'Description') !!}</label>
                        <div class="control">{!! Form::textarea('description', null, ['class' => 'textarea excerpt'] ,['attributes' => ['cols'=> 50, 'rows'=> 3]]) !!}
                          @if ($errors->has('description'))<span class="icon is-small is-right"><i class="fa fa-warning"></i></span>@endif
                        </div>
                        @if ($errors->has('description'))<p class="help is-danger">{{ $errors->first('description') }}</p>@endif
                      </div>
                    </div>
                    <div class="column">
                      <div class="title">Permissions</div>


                        @foreach ($permissions as $permission)
                          <div class="field">
                            <input
                              type="checkbox"
                              name="permissions[]"
                              class="vueItem"
                              @if($permission)
                              value="{{$permission->id}}" {{ (in_array($permission->id, $rolePermissions)) ? 'checked="checked"' : ''}}>
                              @endif
                              {{$permission->display_name}} <em>({{$permission->description}})</em>
                          </div>
                        @endforeach

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


          {!! Form::close() !!}
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
