@if((sizeof($files) > 0) || (sizeof($directories) > 0))

<div class="row">

  @foreach($items as $item)
  <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 img-row">
    <?php $item_name = $item->name; ?>
    <?php $thumb_src = $item->thumb; ?>
    <?php $item_path = $item->is_file ? $item->url : $item->path; ?>

    <div class="square clickable {{ $item->is_file ? 'file' : 'folder'}}-item" data-id="{{ $item_path }}">
      @if($thumb_src)
      <img src="{{ $thumb_src }}">
      @else
      <i class="fa {{ $item->icon }} fa-5x"></i>
      @endif
    </div>

    <div class="caption text-center">
      <div class="btn-group">
        <button type="button" data-id="{{ $item_path }}" class="item_name btn btn-default btn-xs {{ $item->is_file ? 'file' : 'folder'}}-item">{{ $item_name }}</button>
        <button type="button" class="btn btn-default dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
        @if ( Auth::user()->hasRole(['editor', 'admin']))
        <ul class="dropdown-menu" role="menu">
          @if ( Auth::user()->hasPermission('rename-file'))
          <li><a href="javascript:rename('{{ $item_name }}')"><i class="fa fa-edit fa-fw"></i> {{ Lang::get('laravel-filemanager::lfm.menu-rename') }}</a></li>
          @endif

          @if($item->is_file)
          <li><a href="javascript:download('{{ $item_name }}')"><i class="fa fa-download fa-fw"></i> {{ Lang::get('laravel-filemanager::lfm.menu-download') }}</a></li>
            @if($thumb_src)
            <li class="divider"></li>
            <li><a href="javascript:fileView('{{ $item_path }}', '{{ $item->updated }}')"><i class="fa fa-image fa-fw"></i> {{ Lang::get('laravel-filemanager::lfm.menu-view') }}</a></li>
            <li><a href="javascript:resizeImage('{{ $item_name }}')"><i class="fa fa-arrows fa-fw"></i> {{ Lang::get('laravel-filemanager::lfm.menu-resize') }}</a></li>
            <li><a href="javascript:cropImage('{{ $item_name }}')"><i class="fa fa-crop fa-fw"></i> {{ Lang::get('laravel-filemanager::lfm.menu-crop') }}</a></li>
            @endif
          @endif

          @if ( Auth::user()->hasPermission('delete-file'))
          <li class="divider"></li>
          <li><a href="javascript:trash('{{ $item_name }}')"><i class="fa fa-trash fa-fw"></i> {{ Lang::get('laravel-filemanager::lfm.menu-delete') }}</a></li>
          @endif
        </ul>
        @endif
      </div>
    </div>

  </div>
  @endforeach

</div>

@else
<p>{{ Lang::get('laravel-filemanager::lfm.message-empty') }}</p>
@endif
