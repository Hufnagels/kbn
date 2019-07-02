@extends('layouts.manage')

@section('content')
<div class="columns m-t-10 news-container">
  <div class="column">
    
      <div class="card m-b-10">
        <header class="card-header"></header>
        <div class="card-content">
          <div class="content">
            <p class="card-header-title subtitle is-6" >A játékra jelentkezők száma: {{count($users)}}</p>
          </div>
        </div>
        <footer class="card-footer"></footer>
      </div>

  </div>
</div>
@endsection
@section('scripts')

@endsection
