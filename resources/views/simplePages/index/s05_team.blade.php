<div class="hero-body">
  <div class="container">
    <h1 class="title has-text-centered has-text-white-bis  zoomIn" data-wow-duration="3s" data-wow-delay=".5s" >A Kódvetők csapata</h1>
    <h2 class="subtitle has-text-centered has-text-white-bis  zoomIn" data-wow-duration="3s" data-wow-delay=".5s">Tanári kar</h2>
  </div>
</div>

<div class="columns is-mobile">
  <div class="column is-8 is-offset-2 m-t-30">
    <div class="columns owl-carousel owl-theme" id="gt_testimonial_slider2">

      <div class="column">
        <div class="card m-b-10 is-4">
          <div class="card-image">
            <figure class="image" style="border:10px solid white;">
              <img src="{{ asset('/fm/photos/shares/team/team-member-1.jpg') }}" alt="Image">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-6">Szakmáry Ákos</p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card m-b-10 is-4">
          <div class="card-image">
            <figure class="image" style="border:10px solid white;">
              <img src="{{ asset('/fm/photos/shares/team/team-member-21.jpg') }}" alt="Image">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-6">Várkonyi István</p>
          </div>
        </div>
      </div>

      <div class="column">
        <div class="card m-b-10 is-4">
          <div class="card-image">
            <figure class="image" style="border:10px solid white;">
              <img src="{{ asset('/fm/photos/shares/team/palmaizita.jpg') }}" alt="Image">
            </figure>
          </div>
          <div class="card-content">
            <p class="title is-6">Tóthné Pálmai Zita</p>
          </div>
        </div>
      </div>

        @foreach($teachers as $teacher)
          @if(($teacher->bio != Null) && ($teacher->image != Null))
          <div class="column">
            <div class="card m-b-10 is-4">
              <div class="card-image">
                <figure class="image" style="border:10px solid white;">
                  @if($teacher->image != NULL)
                  <img src="{{  asset($teacher->image) }}" alt="Image">
                  @endif
                </figure>
              </div>
              <div class="card-content">
                <p class="title is-6">{{ $teacher->name}}</p>
              </div>
            </div>
          </div>
          @endif
      @endforeach

    </div>
  </div>
</div>
