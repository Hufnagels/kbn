
<script type="text/javascript" src="/assets/js/masonry.min.js"></script>
<script type="text/javascript">
var columnNumber = 3;
var time = undefined;
if(document.body.clientWidth < 769)
{
  columnNumber = 1;
} else {
  columnNumber = 3;
}
$('.msrItems').msrItems({
  'colums': columnNumber, //columns number
  'margin': 20 //right and bottom margin
});
$( window ).on('resize', function(e) {
  clearTimeout(time);
  time = setTimeout(function(){
    if(document.body.clientWidth < 769)
    {
      columnNumber = 1;
    } else {
      columnNumber = 3;
    }
    $('.msrItems').msrItems({
      'colums': columnNumber, //columns number
      'margin': 10 //right and bottom margin
    });
    console.log('resized')
  }, 100);
});
</script>

