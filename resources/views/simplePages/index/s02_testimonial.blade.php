<div class="hero-body">
  <div class="container">
    <h1 class="title has-text-centered has-text-white-bis  zoomIn" data-wow-duration="3s" data-wow-delay=".5s" >{{ __('indexPage.testimonial') }}</h1>
    <h2 class="subtitle has-text-centered has-text-white-bis  zoomIn" data-wow-duration="3s" data-wow-delay=".5s">{{ __('manageTesti.testimonials') }}</h2>
  </div>
</div>

<div class="columns is-mobile">
  <div class="column is-8 is-offset-2">

    <div class="columns owl-carousel owl-theme" id="gt_testimonial_slider">
      @foreach($testimonials as $testimonial)
      <div class="column is-one-quarter testi-item">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <div class="gt_testi2_wrap">
                  <p>{{ $testimonial->testi_text}}</p>
                  <div class="gt_testi2_detail"><div class="gt_testi2_name">
                      <h6>{{ $testimonial->testi_name}}</h6>
                      <span>{{ $testimonial->testi_title}}</span>
                    </div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>
<style>

</style>
