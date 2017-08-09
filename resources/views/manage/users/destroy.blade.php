@extends('layouts.manage')


@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary">
        <div class="column">
          <div class="title">Delete user: <strong>{{ $user->name }}</strong></div>
        </div>
      </div>
      <div class="card-content">
<!--
        <div class="card-image">
          <figure class="image is-4by3">
            <img src="" alt="Image">
          </figure>
        </div>
-->
        <div class="card-content">
          <div class="media">
            <div class="media-left">
              <figure class="image is-96x96">
                <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
              </figure>
            </div>
            <div class="media-content">
              <p class="title is-4">{{ $user->name }}</p>
              <p class="subtitle is-6">{{ $user->email }}</p>
              <p class="subtitle is-6">{{ $user->created_at }}</p>
            </div>
          </div>

          <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Phasellus nec iaculis mauris. <a>@bulmaio</a>.
            <a>#css</a> <a>#responsive</a>
            <br>
            <small>11:09 PM - 1 Jan 2016</small>
          </div>
        </div>

      </div>

      <footer class="card-footer">
        <a href="{{ route('users.destroy', $user->id)}}" class="card-footer-item is-pulled-left">Edit</a>
        <a href="{{ url()->previous() }}" class="card-footer-item is-pulled-right">Back</a>
      </footer>

    </div>

  </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection
