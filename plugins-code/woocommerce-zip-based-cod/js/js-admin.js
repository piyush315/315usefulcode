(function ($)
{
    $(document).ready(function(e) 
	{
		
		$(document).on('keyup', '#_first_pin_code, #_third_pin_code, #_fifth_pin_code', function(e)
		{
			var value = $(this).val();
			if ( value.length == 6 ) {
				$('.msg_set').remove();				
			}
			else 
			{
				$('.msg_set').remove();
				$(this).after('<div class="msg_set"><span>Pin Code should Equal to 6 Digit</span></div>');
				return false;
			}			
		});
		
		$(document).on('keyup', '#_second_pin_code', function(e)
		{
			var value = $(this).val();
			var firstval = $('#_first_pin_code').val();
			if ( value.length == 6 ) 
			{
				if ( value > firstval ) {
					$('.msg_set').remove();					
				}
				else {
					$('.msg_set').remove();
					$(this).after('<div class="msg_set"><span>Second Pin Code Should Greater than First</span></div>');
					return false;
				}								
			}
			else 
			{
				$('.msg_set').remove();
				$(this).after('<div class="msg_set"><span>Pin Code should Equal to 6 Digit</span></div>');
				return false;
			}			
		});
		
		$(document).on('keyup', '#_fourth_pin_code', function(e)
		{
			var value = $(this).val();
			var firstval = $('#_third_pin_code').val();
			if ( value.length == 6 ) 
			{
				if ( value > firstval ) {
					$('.msg_set').remove();					
				}
				else {
					$('.msg_set').remove();
					$(this).after('<div class="msg_set"><span>Second Pin Code Should Greater than First</span></div>');
					return false;
				}								
			}
			else 
			{
				$('.msg_set').remove();
				$(this).after('<div class="msg_set"><span>Pin Code should Equal to 6 Digit</span></div>');
				return false;
			}			
		});
		
		$(document).on('keyup', '#_sixth_pin_code', function(e)
		{
			var value = $(this).val();
			var firstval = $('#_fifth_pin_code').val();
			if ( value.length == 6 ) 
			{
				if ( value > firstval ) {
					$('.msg_set').remove();					
				}
				else {
					$('.msg_set').remove();
					$(this).after('<div class="msg_set"><span>Second Pin Code Should Greater than First</span></div>');
					return false;
				}								
			}
			else 
			{
				$('.msg_set').remove();
				$(this).after('<div class="msg_set"><span>Pin Code should Equal to 6 Digit</span></div>');
				return false;
			}			
		});
		
		
	});
})(jQuery);