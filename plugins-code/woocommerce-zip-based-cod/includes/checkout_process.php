<?php
/**
 * Process the checkout.
 * This can be used with any attibute from checkout form.
 * Cash on delivery field. Checking if it is correct and if customer is from Mendoza (state)
 * Note: wc_add_notice is the newest function to send error messages. There are more but they are deprecated.
 */
function k_cod_and_state() {
  // Check if payment method is Cash On Delivery (COD)
	if( isset( $_POST['payment_method']) && $_POST['payment_method'] === 'cod') {
	
	  // If you want to send the product to other address, you can't buy through COD
	  // You have to pay when you receive the products
		/*if( $_POST['shipping_postcode'] === $_POST['billing_postcode'] ) 
		{*/
			
			// Here we filter if the customer is from the state we have COD available
			// If not, we send an error message
			$ship_postcode = $_POST['billing_postcode'];			
			$product_id = array();
			$i = 0;
			$err1 = '';
			foreach( WC()->cart->get_cart() as $cart_item )
			{
				$product_id = $cart_item['product_id'];
				
				$first_pin = get_post_meta( $product_id, $key = '_first_pin_code', $single = true );
				$second_pin = get_post_meta( $product_id, $key = '_second_pin_code', $single = true );
				$third_pin = get_post_meta( $product_id, $key = '_third_pin_code', $single = true );
				$fourth_pin = get_post_meta( $product_id, $key = '_fourth_pin_code', $single = true );
				$fifth_pin = get_post_meta( $product_id, $key = '_fifth_pin_code', $single = true );
				$sixth_pin = get_post_meta( $product_id, $key = '_sixth_pin_code', $single = true );
				if ( ( ( $ship_postcode == $first_pin || $ship_postcode > $first_pin ) && ( $ship_postcode == $second_pin || $ship_postcode < $second_pin ) ) ||  ( ( $ship_postcode == $third_pin || $ship_postcode > $third_pin ) && ( $ship_postcode == $fourth_pin || $ship_postcode < $fourth_pin ) ) || ( ( $ship_postcode == $fifth_pin || $ship_postcode > $fifth_pin ) && ( $ship_postcode == $sixth_pin || $ship_postcode < $sixth_pin ) ) )
				{
					
				}
				else
				{
					$i++;
					$title = get_the_title( $product_id );
					$permalink = '<a href="'.get_the_permalink($product_id) . '">' . $title . '</a>';
					$err1 .= '('. $i . ') ' . $permalink . '<br/>';
					
				}
				
			}
			
			if( $i > 0 ) 
			{
				$string_notice =  'Some Products are not available for COD.<br/>' . $err1;
				wc_add_notice( $string_notice ,'error');
				
			}
			else
			{
				
			}
			
		/*} else {
			wc_add_notice(__('If you want to pay through cash on delivery, your billing and shipping postcode have to be the same.'), 'error');
		}*/
		
	}
}
add_action('woocommerce_checkout_process', 'k_cod_and_state');