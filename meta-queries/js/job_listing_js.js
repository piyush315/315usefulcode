(function($)
{
    $(document).ready(function()
    {
        
        //alert("hii");
        //var host = window.location.hostname;
		//alert(host);
		/* custom functionality for add to cart */		
		$(".cust-testimonial .sc_team_item_title a").removeAttr("href");
		$(".page-id-102 .sc_price_item_link:eq(0)").addClass('order_now1');
		$(".page-id-102 .sc_price_item_link:eq(1)").addClass('order_now2');
		$(".page-id-102 .sc_price_item_link:eq(2)").addClass('order_now3');
			
		$('.order_now1').on('click', function(e) {
			e.preventDefault();
			$('.modal1').addClass('is-visible');
			//$('.modal2, .modal3').removeClass('is-visible');
		});
		
		$('.order_now2').on('click', function(e) {
			e.preventDefault();
			$('.modal2').addClass('is-visible');			
			
		});
		
		$('.order_now3').on('click', function(e) {
			e.preventDefault();
			$('.modal3').addClass('is-visible');			
        });

        $('.web_service_cls').on('click', function(e) {
			e.preventDefault();
			$('.web_modal').addClass('is-visible');    		
        });

        $('.graphic_service_cls').on('click', function(e) {
			e.preventDefault();
			$('.graphic_modal').addClass('is-visible');			
        });       
        

		
		$('.modal-toggle').on('click', function(e) {
			e.preventDefault();
			$('.modal1, .modal2, .modal3, .web_modal, .graphic_modal').removeClass('is-visible');
		});
		
		
			
		/* custom functionality for add to cart */
		$('#form_7_1-element-16').click(function(e) {
		  //e.preventDefault();		  
		  addToCart(3589);          
	   });  

		$('#form_8_1-element-16').click(function(e) {
		  //e.preventDefault();		  
		  addToCart(3590);          
	   });
	   
	   $('#form_9_1-element-16').click(function(e) {
		  //e.preventDefault();		  
		  addToCart(3591);          
       });

       $('#form_3_1-element-19').click(function(e) {
        //e.preventDefault();		  
        addToCart(3594);          
        });

        $('#form_4_1-element-17').click(function(e) {
            //e.preventDefault();		  
            addToCart(3593);          
        });

       function addToCart(p_id) {
		  
            $.get('/wp/?post_type=product&add-to-cart=' + p_id, function() {  
             
          });
       }
	   /* custom functionality for add to cart */
	   
        $('.search_cls').on("click", function(e) {
            var search_keyword = $("#search_keyword").val();
            var job_regions = $('select#job_region option:selected').text();
            var job_region_val = $('select#job_region option:selected').val();

            if( job_region_val == '' ) {
                alert("Please Enter Location");
            }
            else {
                $('.loader_progress').addClass('loader');
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    dataType: 'html',
                    data: {
                        'search_keyword': search_keyword,
                        'job_regions': job_regions,                    
                        'action': 'location_function'
                    },                
                    success: function(html) {
                        $('.loader_progress').removeClass('loader');
                        $('.custom_cls_row').html(html);
                       // alert(html);
                    },
                    error: function(MLHttpRequest, textStatus, errorThrown)
                    {
                    }
                });
            }
        });
        $('.filter_cls').on("click", function(e) {

            var radioValue = '';
            if($('.date_post_group').is(':checked')) 
            { 
                
                radioValue = $("input[name='date_group']:checked").val();                
                console.log(radioValue);             
            }
            else 
            {
                console.log("hell");
            }

            var vacancy_arr = new Array();
            $.each($("input[name='vacancy_group[]']:checked"), function() 
            {
                vacancy_arr.push($(this).val());
                
            });
            console.log(vacancy_arr);

            var speciality_arr = new Array();
            $.each($("input[name='speciality_group[]']:checked"), function() 
            {
                speciality_arr.push($(this).val());
                
            });
            console.log(speciality_arr);

            var salary_arr = new Array();
            $.each($("input[name='salary_group[]']:checked"), function() 
            {
                salary_arr.push($(this).val());
                
            });
            console.log(salary_arr);
            

            //Ajax Query 
            $('.loader_progress').addClass('loader');
            $.ajax({
                type: 'POST',
                url: ajaxJobListing.ajaxurl,
                dataType: 'html',
                data: {
                    'radioValue': radioValue,
                    'salary_arr': salary_arr,
                    'vacancy_arr': vacancy_arr,
                    'speciality_arr': speciality_arr,
                    'action': 'shop_filter_search_ajax'
                },                
                success: function(html) {
                    $('.loader_progress').removeClass('loader');
                    $('.custom_cls_row').html(html);
                   // alert(html);
                },
                error: function(MLHttpRequest, textStatus, errorThrown)
                {
                }
            });           
                      
        });
    
    });
})(jQuery);