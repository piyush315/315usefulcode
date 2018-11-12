<script>
(function ($)
{
$(document).ready(function() {
	let count = true;
	$(window).scroll(function() {
   var hT = $('#progress_circle_id').offset().top,
       hH = $('#progress_circle_id').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);
   if (wS > (hT+hH-wH) && count){
	   count = false;
      $(".my-progress-bar").circularProgress({
        line_width: 8,
        color: "#00d1d0",
        starting_position: 0, // 12.00 o' clock position, 25 stands for 3.00 o'clock (clock-wise)
        percent: 0, // percent starts from
        percentage: true,
        text: ""
    }).circularProgress('animate', 98, 4000);
   }
});
	
	
});
})(jQuery);
</script>