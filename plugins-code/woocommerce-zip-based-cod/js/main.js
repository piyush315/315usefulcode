(function ($)
{
    $(document).ready(function(e) 
	{
		$(document).on('click', '.check_cls', function(e)
	    {
			//alert(wp_ajax_param.ajaxurl);
			var cod_text = $('#cod_text').val();
			var p_id = $('#p_id').val();
			//alert( cod_text + p_id );
			var pincode = new RegExp('^[1-9][0-9]{5}$');
			if ( cod_text == '' )
			{
				$('.valid_msg').html('<span class="pin_not_valid">Pincode blank</span>');
			}
			else if ( ! pincode.test(cod_text) ) 
			{
				
				//alert("Please Enter valid pincode");
				//$( '.valid_msg' ).addClass('valid_pin_error');
				$('.valid_msg').html('<span class="pin_not_valid">Please Enter valid pincode</span>');
			}
			else
			{
				//alert('right');
				$('.ajax_loader').addClass('loader');
				var data = {
					action: 'test_response',
					cod_text: cod_text,
					p_id: p_id					
				};
				// the_ajax_script.ajaxurl is a variable that will contain the url to the ajax processing file
				$.post(wp_ajax_param.ajaxurl, data, function(response) 
				{
					
					$( '.valid_msg' ).html(response);
					$('.ajax_loader').removeClass('loader');
					
				});
				return false;
			}
		
	    });   
	});
})(jQuery);