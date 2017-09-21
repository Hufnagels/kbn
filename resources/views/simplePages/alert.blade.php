@if(isset($tagName))
<div class="notification is-alert subtitle"><strong>{{ __('simplePages.searchResults.tagged') }}: </strong>{{$tagName}}</div>
@endif
@if(isset($categoryName))
<div class="notification is-alert subtitle"><strong>{{ __('simplePages.searchResults.category') }}: </strong>{{$categoryName}}</div>
@endif
@if(isset($authorName))
<div class="notification is-alert subtitle"><strong>{{ __('simplePages.searchResults.author') }}: </strong>{{$authorName}}</div>
@endif
@if($term=request('term'))
<div class="notification is-alert subtitle"><strong>Search results for{{ __('simplePages.searchResults.searchTerm') }}: </strong>{{$term}}</div>
@endif
