<?php
function text_ajax_process_request() {
	// first check if data is being sent and that it is the data we want
  	if ( isset( $_POST["cod_text"] ) ) 
	{
		$cod_text = $_POST["cod_text"];
		$p_id = $_POST["p_id"];	
		$first_pin = get_post_meta( $p_id, $key = '_first_pin_code', $single = true );
		$second_pin = get_post_meta( $p_id, $key = '_second_pin_code', $single = true );
		$third_pin = get_post_meta( $p_id, $key = '_third_pin_code', $single = true );
		$fourth_pin = get_post_meta( $p_id, $key = '_fourth_pin_code', $single = true );
		$fifth_pin = get_post_meta( $p_id, $key = '_fifth_pin_code', $single = true );
		$sixth_pin = get_post_meta( $p_id, $key = '_sixth_pin_code', $single = true );
		if ( ( ( $cod_text == $first_pin || $cod_text > $first_pin ) && ( $cod_text == $second_pin || $cod_text < $second_pin ) ) ||  ( ( $cod_text == $third_pin || $cod_text > $third_pin ) && ( $cod_text == $fourth_pin || $cod_text < $fourth_pin ) ) || ( ( $cod_text == $fifth_pin || $cod_text > $fifth_pin ) && ( $cod_text == $sixth_pin || $cod_text < $sixth_pin ) ) )
		{
			echo '<span class="pin_success">COD available for this pincode</span>';
		}
		else
		{
			echo '<span class="pin_not_valid">OOPS! COD not available for this pincode';			
		}		
		die();
	}
}
add_action('wp_ajax_test_response', 'text_ajax_process_request');
add_action('wp_ajax_nopriv_test_response', 'text_ajax_process_request');
?>