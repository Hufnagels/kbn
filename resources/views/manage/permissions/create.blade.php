@extends('layouts.manage')
@section('title',' - ' . __('permission.create'))
@section('content')
<div class="columns">
  <div class="column">
    <div class="card">
      <div class="card-header notification is-primary"><div class="column"><div class="title">{{ __('permission.create')}}</div></div></div>
      <div class="card-content createnewpermission">
        <form action="{{route('permissions.store')}}" method="POST">
          {{csrf_field()}}
          


          <button class="button is-primary">{{ __('permission.button.publish')}}</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script src="https://unpkg.com/vue"></script>
<!-- <script src="https://unpkg.com/buefy"></script> -->
  <script>

  </script>
@endsection
