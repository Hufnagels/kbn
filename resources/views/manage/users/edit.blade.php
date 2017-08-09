@extends('layouts.manage')

@section('content')
@if(  (Auth::id() !== $user->id) || (!Auth::user()->can('update-profile', $roles)) ) 
 vége
@else
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">Editing User: <strong>{{ $user->name }}</strong>
          </div>
        </div>
      </div>
      <div class="card-content">
        <form action="{{ route('users.update', $user->id)}}" method="POST">
          {{ method_field('PUT') }}
          {{ csrf_field() }}
          <div class="columns">

            <div class="column">
              <div class="field">
                <label class="label">Name</label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input" type="text" placeholder="Name" value="{{ $user->name }}" id="name" name="name" required autofocus>
                  <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                  @if ($errors->has('name'))
                  <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                  @endif
                </div>
                @if ($errors->has('name'))
                <p class="help is-danger">{{ $errors->first('name') }}</p>
                @endif
              </div>
              <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input" type="text" placeholder="Email" value="{{ $user->email }}" id="email" type="email" name="email" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                  </span>
                  @if ($errors->has('email'))
                  <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                  @endif
                </div>
                @if ($errors->has('email'))
                <p class="help is-danger">{{ $errors->first('email') }}</p>
                @endif
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label class="label">Password</label>
                <b-radio-group v-model="password_options">
                    <div class="field"><b-radio value="keep">Do not change</b-radio></div>
                    <div class="field"><b-radio value="auto">Auto generate new</b-radio></div>
                    <div class="field"><b-radio value="manual"> Manually set new</b-radio></div>
                </b-radio-group>
                <div class="field">
                  <div class="control has-icons-left has-icons-right m-t-15">
                    <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
                      id="password" type="password" name="password"
                      v-if="password_options == 'manual'"
                      value=""
                      required>
                    <span class="icon is-small is-left"><i class="fa fa-key"></i></span>
                    @if ($errors->has('password'))
                    <span class="icon is-small is-right"><i class="fa fa-warning"></i></span>
                    @endif
                  </div>
                  @if ($errors->has('password'))
                  <p class="help is-danger">{{ $errors->first('password') }}</p>
                  @endif
                </div>
              </div>
            </div>

          </div>

          <div class="columns">
            <div class="column ">
              <label for="roles" class="label">Roles:</label>
              <input type="hidden" name="roles" :value="rolesSelected" />

              <b-checkbox-group v-model="rolesSelected">
                @foreach ($roles as $role)
                  <div class="field">
                    <b-checkbox class="vueItem" :custom-value="{{$role->id}}">{{$role->display_name}}</b-checkbox>
                  </div>
                @endforeach
              </b-checkbox-group>
            </div>

            <div class="column">
              <div class="field">
                <label class="label">Gender</label>
                <div class="control">
                  <div class="select">
                    <select>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="columns">
            <div class="column">
              <div class="field">
                <label class="label">Biography</label>
                <div class="control">
                  <textarea class="textarea" placeholder="Textarea"></textarea>
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
@endif
@endsection
@section('scripts')
<!-- Inside script -->
<script type="text/javascript">
/*
Inside script
*/
  var app = new Vue( {
    el:'#app',
    data: {
      password_options: 'keep',
      rolesSelected: {!! $user->roles->pluck('id') !!}
    }
  });
</script>
@endsection
