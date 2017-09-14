<div class="tile is-ancestor information">
  <?php

  function random_color_part() {
    return str_pad( dechex( mt_rand( 80, 255 ) ), 2, '0', STR_PAD_LEFT);
  }

  function random_color() {
      return random_color_part() . random_color_part() . random_color_part();
  }
  function randomColor ($minVal = 0, $maxVal = 255)
  {

      // Make sure the parameters will result in valid colours
      $minVal = $minVal < 0 || $minVal > 255 ? 0 : $minVal;
      $maxVal = $maxVal < 0 || $maxVal > 255 ? 255 : $maxVal;

      // Generate 3 values
      $r = mt_rand($minVal, $maxVal);
      $g = mt_rand($minVal, $maxVal);
      $b = mt_rand($minVal, $maxVal);

      // Return a hex colour ID string
      return sprintf('#%02X%02X%02X', $r, $g, $b);

  }
  $colorArray = ['#00d84c', '#008dd2', '#ffb100', '#f50808'];
  $index=0;
  ?>

  @foreach ($latestpostswithimages as $post)
  <?php
  // shuffle($colorArray);
  // $index = rand(1, 100);
  // $colorArray = randomColor(85,205);//random_color();

  ?>
  <div class="tile is-parent ">
    <article class="tile is-child notification fadeInUp" data-wow-duration="2s" data-wow-delay="1s" style="background-color:{{ $colorArray[$index] }}">
      @include('manage.partials.newsBox')
    </article>
  </div>
  <?php $index++; ?>
  @endforeach

  <?php
  //$colorArray = ['is-success', 'is-warning', 'is-info', 'is-primary'];
  ?>
  @foreach ($projectcategories as $post)
  <?php
  // shuffle($colorArray);
  // $index = rand(0, 3);
  //$colorArray = $colorArray = randomColor(100,255);//random_color();
  ?>
  <div class="tile is-parent ">
    <article class="tile is-child notification fadeInUp" data-wow-duration="2s" data-wow-delay="1s" style="background-color:{{ $colorArray[$index] }}">
      @include('manage.partials.newsBox')
    </article>
  </div>
  <?php $index++; ?>
  @endforeach

</div>
