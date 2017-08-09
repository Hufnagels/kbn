@extends('layouts.manage')


@section('content')

<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">Create New User</div>
        </div>
      </div>
      <div class="card-content">
        <form action="{{ route('users.store')}}" method="POST">
          {{ csrf_field() }}
          <div class="columns">

            <div class="column">
              <div class="field">
                <label class="label">Name</label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input" type="text" placeholder="Name" value="" id="name" name="name" required autofocus>
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
                  <input class="input" type="text" placeholder="Email" value="" id="email" type="email" name="email" required>
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
                <div class="control has-icons-left has-icons-right">
                  <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
                    id="password" type="password" name="password"
                    :disabled="auto_password"

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
              <b-checkbox name="auto_generate" class="vueItem m-t-20" :checked="false" v-model="auto_password">Auto generate password</b-checkbox>
            </div>

          </div><!-- end of .columns for forms -->
          <div class="columns">
            <div class="column">
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
          </div><!-- end of .columns for forms -->

          <div class="columns">
            <div class="column">
              <div class="field">
                <label class="label">Biography</label>
                <div class="control">
                  <textarea class="textarea" placeholder="Textarea"></textarea>
                </div>
              </div>
            </div>
          </div><!-- end of .columns for forms -->

          <div class="columns">
            <div class="column">
              <div class="field is-grouped">
                <div class="control">
                  <button class="button is-primary">Submit</button>
                </div>
                <div class="control">
                  <a href="{{ url()->previous() }}" class="button is-primary is-outlined is-pulled-right">Back</a>
                </div>
              </div>
            </div>
          </div><!-- end of .columns for forms -->

        </form>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
var app = new Vue({
     el: '#app',
     data: {
       auto_password: false,
       rolesSelected: {!! old('roles') ? old('roles') : '[]' !!}
     }
});
</script>
@endsection
