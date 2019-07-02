<!--<script type="text/javascript" src="{{ asset('assets/js/parallax.min.js') }}"></script>-->
<script type="text/javascript">
$(document).ready(function(){
  var img = $('.parallaxImage'),
      headerContainer = $('.headersection');
      headerContainer.css('min-height', img.css('height')+20);
  /*
  $('.headersection .parallax-window').parallax({
    position: 'center center',
    positionX : 'center',
    positionY: 'center'
  });*/
  $(window).on('resize', function(){
      var img = $('.parallaxImage'),
          headerContainer = $('.headersection');
          headerContainer.css('min-height', img.height()+20)
    });
  jQuery(window).trigger('resize').trigger('scroll');
  // var mask1 = $('#mask1 circle')[0];
  // var mask2 = $('#mask2 circle')[0];
  // $('.pic').mousemove(function (event) {
  //     event.preventDefault();
  //     var upX = event.clientX;
  //     var upY = event.clientY;
  //     console.log(upX, upY);
  //     mask1.setAttribute("cy", (upY - 5) + 'px');
  //     mask1.setAttribute("cx", (upX) + 'px');
  //     mask2.setAttribute("cy", (upY - 5) + 'px');
  //     mask2.setAttribute("cx", (upX) + 'px');
  // });
});

</script>
