<table class="table is-narrow">
  <thead>
    <tr>
      <!--<th><abbr title="Id">ID</abbr></th>-->
      <th width="40%"><abbr title="{{ __('forms.title') }}">{{ __('forms.title') }}</abbr></th>
      <th><abbr title="{{ __('forms.slug') }}">{{ __('forms.slug') }}</abbr></th>
      <th><abbr title="{{__('manageTag.newsCount')}}">{{__('manageTag.newsCount')}}</abbr></th>
      <th><abbr title="{{__('manageTag.photoCount')}}">{{__('manageTag.photoCount')}}</abbr></th>
      <th><abbr title="{{__('manageTag.videoCount')}}">{{__('manageTag.videoCount')}}</abbr></th>
      <th><abbr title="{{ __('forms.action') }}">{{ __('forms.action') }}</abbr></th>
    </tr>
  </thead>

  <tbody>
    @foreach($tags as $tag)
    <tr>
      <!--<td>{{$tag->id}}</td>-->
      <td>{{$tag->name}}</td>
      <td>{{$tag->slug}}</td>
      <td class="has-text-centered">{{$tag->news->count()}}</td>
      <td class="has-text-centered">{{$tag->photos->count()}}</td>
      <td class="has-text-centered">{{$tag->videos->count()}}</td>

      <td>
        {!! Form::open(['method' => 'DELETE', 'route' => ['tag.destroy', $tag->id],'class'=>'alltagtable']) !!}
        <a href="{{ route('tag.edit', $tag->id)}}" title="Edit"><span class="fa fa-edit"></span></a>
        @if( ! ($tag->id == config('ownAttributes.default_tag.id')) )
          <button type="submit"
          @if($tag->news->count() > 0)
            onclick="return confirm('This tag has {{ $tag->news->count() + $tag->photos->count() + $tag->videos->count()}} Items binded to it');"
          @endif
          class="button alltagtable is-danger is-outlined is-small"><span class="fa fa-remove"></span></button>
        @endif
        {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
