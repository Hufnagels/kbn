@if(isset($tagName))
<div class="notification is-alert subtitle"><strong>Tagged: </strong>{{$tagName}}</div>
@endif
@if(isset($categoryName))
<div class="notification is-alert subtitle"><strong>Category: </strong>{{$categoryName}}</div>
@endif
@if(isset($authorName))
<div class="notification is-alert subtitle"><strong>Author: </strong>{{$authorName}}</div>
@endif
@if($term=request('term'))
<div class="notification is-alert subtitle"><strong>Search results for: </strong>{{$term}}</div>
@endif
