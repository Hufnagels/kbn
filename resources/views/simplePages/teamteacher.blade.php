@if(count($teachers))
<div class="container is-fluid">
  <div class="notification1">

    <div class="tile is-parent">
      <article class="tile is-child notification">
        @foreach($teachers as $teacher)
          <div class="card m-b-10">
            <div class="card-content">
              <div class="media">
                <div class="media-left">
                  <figure class="image is-128x128"><img src="{{ asset('images/team/team-member-3.jpg') }}" alt="Image"></figure>
                </div>
                <div class="media-content">
                  <p class="title is-4">{{ $teacher->name}}</p>
                  <p class="subtitle is-6">{{ $teacher->bio}}</p>
                </div>
              </div>

            </div>
          </div>
        @endforeach
      </article>
    </div>

  </div>
</div>
@endif
