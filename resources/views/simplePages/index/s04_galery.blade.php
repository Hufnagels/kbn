<div class="hero-body">
  <div class="container">
    <h1 class="title has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s" >Emlékezetes pillanatok</h1>
    <h2 class="subtitle has-text-centered has-text-white-bis wow zoomIn" data-wow-duration="5s" data-wow-delay="1s">Szösszenetek a műhelyéletből</h2>
  </div>
</div>

<div class="columns is-mobile p-b-10">
  <div class="column is-8 is-offset-2">

    <div class="columns owl-carousel owl-theme" id="gt_testimonial_slider">
@for($i=0; $i<8;$i++)
      <div class="column is-one-quarter">
        <div class="card">
          <div class="card-content">
            <div class="content">
              <div class="gt_testi2_wrap">
                  <p>Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet aenean sollicitudin, lorem quis bibendum auctor.</p>
                  <div class="gt_testi2_detail"><div class="gt_testi2_name"><h6>Janifer Steel</h6><span>Parents</span></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endfor
    </div>

  </div>
</div>
