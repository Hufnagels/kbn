<script type="text/javascript" src="{{ asset('assets/js/parallax.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.headersection .parallax-window').parallax({
    position: 'left top',
    positionX : 'left',
    positionY: 'top'
  });
  jQuery(window).trigger('resize').trigger('scroll');
});
</scripts>