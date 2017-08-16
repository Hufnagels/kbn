@if ( session('message'))
<div class="notification is-success"><strong>{{ session('message')}}</strong></div>
@endif
@if ( session('error'))
<div class="notification is-danger"><strong>{{ session('error')}}</strong></div>
@endif
