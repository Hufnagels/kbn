@if ( session('message'))
<div class="notification is-success"><strong>{{ session('message')}}</strong></div>
@endif
@if(session('trash-message'))
<div class="notification is-warning">
    <?php list($message, $postId) = session('trash-message'); ?>
  <strong>{{ $message}}</strong>
  {!! Form::open([
    'method' => 'PUT',
    'route' => ['post.restore', $postId], 'style' => 'display:-webkit-inline-box; margin-top:0;line-height:1.8rem;'
    ]) !!}
  <button class="button is-outlined is-small"> Undo delete</button>
  {!! Form::close() !!}
</div>
@endif
