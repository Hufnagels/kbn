@if(isset($tagName))
<div class="notification is-alert subtitle"><strong>{{ __('simplePages.searchResult.tagged') }}: </strong>{{$tagName}}</div>
@endif
@if(isset($categoryName))
<div class="notification is-alert subtitle"><strong>{{ __('simplePages.searchResult.category') }}: </strong>{{$categoryName}}</div>
@endif
@if(isset($authorName))
<div class="notification is-alert subtitle"><strong>{{ __('simplePages.searchResult.author') }}: </strong>{{$authorName}}</div>
@endif
@if($term=request('term'))
<div class="notification is-alert subtitle"><strong>Search results for{{ __('simplePages.searchResult.searchTerm') }}: </strong>{{$term}}</div>
@endif
