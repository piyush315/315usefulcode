<?Php
add_action('woocommerce_product_data_panels', 'woocom_custom_product_data_fields');

function woocom_custom_product_data_fields() 
{
    global $post;

    // Note the 'id' attribute needs to match the 'target' parameter set above
    ?> <div id = 'my_custom_product_data' class = 'panel woocommerce_options_panel' >
	<p><strong>Set Pin code for First City </strong>(Second Pin Code Should always greater than first)</p>
	<div class = 'options_group' > <?php
              // Text Field
 
   
   woocommerce_wp_text_input(
    array(
      'id' => '_first_pin_code',
	  'class'=> 'custom_pin_code',
      'label' => __( 'Enter First Postal Code', 'woocommerce' ),
      'placeholder' => '',
	  'desc_tip' => 'true',
      'description' => __( 'Enter the First Postal Code to applicable for COD.', 'woocommerce' ),
      'type' => 'number',
      'custom_attributes' => array(
         'step' => 'any',
         'min' => '111111',
		 'max' => '999999'
      )
    )
  );
  woocommerce_wp_text_input(
    array(
      'id' => '_second_pin_code',
	  'class'=> 'custom_pin_code',
      'label' => __( 'Enter Second Postal Code', 'woocommerce' ),
      'placeholder' => '',
	  'desc_tip' => 'true',
      'description' => __( 'Second Pin Code should always greater than First.', 'woocommerce' ),
      'type' => 'number',
      'custom_attributes' => array(
         'step' => 'any',
         'min' => '111111',
		 'max' => '999999'
      )
    )
  );
  

        ?> </div>
	<p><strong>Set Pin code for Second City</strong></p>
	<div class = 'options_group' > <?php
              // Text Field
 
   
   woocommerce_wp_text_input(
    array(
      'id' => '_third_pin_code',
	  'class'=> 'custom_pin_code',
      'label' => __( 'Enter First Postal Code', 'woocommerce' ),
      'placeholder' => '',
	  'desc_tip' => 'true',
      'description' => __( 'Enter the First Postal Code to applicable for COD.', 'woocommerce' ),
      'type' => 'number',
      'custom_attributes' => array(
         'step' => 'any',
         'min' => '111111',
		 'max' => '999999'
      )
    )
  );
  woocommerce_wp_text_input(
    array(
      'id' => '_fourth_pin_code',
	  'class'=> 'custom_pin_code',
      'label' => __( 'Enter Second Postal Code', 'woocommerce' ),
      'placeholder' => '',
	  'desc_tip' => 'true',
      'description' => __( 'Second Pin Code should always greater than First.', 'woocommerce' ),
      'type' => 'number',
      'custom_attributes' => array(
         'step' => 'any',
         'min' => '111111',
		 'max' => '999999'
      )
    )
  );
  

        ?> </div>
		
	<p><strong>Set Pin code for Third City</strong></p>
<div class = 'options_group' > <?php
              // Text Field
   woocommerce_wp_text_input(
    array(
      'id' => '_fifth_pin_code',
	  'class'=> 'custom_pin_code',
      'label' => __( 'Enter First Postal Code', 'woocommerce' ),
      'placeholder' => '',
	  'desc_tip' => 'true',
      'description' => __( 'Enter the First Postal Code to applicable for COD.', 'woocommerce' ),
      'type' => 'number',
      'custom_attributes' => array(
         'step' => 'any',
         'min' => '111111',
		 'max' => '999999'
      )
    )
  );
  woocommerce_wp_text_input(
    array(
      'id' => '_sixth_pin_code',
	  'class'=> 'custom_pin_code',
      'label' => __( 'Enter Second Postal Code', 'woocommerce' ),
      'placeholder' => '',
	  'desc_tip' => 'true',
      'description' => __( 'Second Pin Code should always greater than First.', 'woocommerce' ),
      'type' => 'number',
      'custom_attributes' => array(
         'step' => 'any',
         'min' => '111111',
		 'max' => '999999'
      )
    )
  ); 

        ?> </div>	
    </div><?php
}

/** Hook callback function to save custom fields information */

function woocom_save_proddata_custom_fields($post_id) 
{
    // Save Text Field First
    $text_field1 = $_POST['_first_pin_code'];
    if (! empty($text_field1)) {
        update_post_meta($post_id, '_first_pin_code', esc_attr($text_field1));
    }

	// Save Text Field Second
    
	$text_field2 = $_POST['_second_pin_code'];
    if ( ! empty($text_field2) ) {
		$pincode1 = get_post_meta( $post_id, '_first_pin_code', $single=true );
		
		if ( $pincode1 < $text_field2 ) {
			update_post_meta($post_id, '_second_pin_code', esc_attr($text_field2));
		}
		else
		{
			update_post_meta($post_id, '_second_pin_code', '' );
		}        
    }
	
	// Save Text Field Third
	$text_field1 = $_POST['_third_pin_code'];
    if (! empty($text_field1)) {
        update_post_meta($post_id, '_third_pin_code', esc_attr($text_field1));
    }

	// Save Text Field Fourth
    
	$text_field2 = $_POST['_fourth_pin_code'];
    if ( ! empty($text_field2) ) {
		$pincode1 = get_post_meta( $post_id, '_third_pin_code', $single=true );
		
		if ( $pincode1 < $text_field2 ) {
			update_post_meta($post_id, '_fourth_pin_code', esc_attr($text_field2));
		}
		else
		{
			update_post_meta($post_id, '_fourth_pin_code', '' );
		}        
    }
	
	// Save Text Field Fifth
	
	$text_field1 = $_POST['_fifth_pin_code'];
    if ( ! empty( $text_field1 ) ) {
        update_post_meta( $post_id, '_fifth_pin_code', esc_attr( $text_field1 ) );
    }

	// Save Text Field Sixth
    
	$text_field2 = $_POST['_sixth_pin_code'];
    if ( ! empty($text_field2) ) {
		$pincode1 = get_post_meta( $post_id, '_fifth_pin_code', $single=true );
		
		if ( $pincode1 < $text_field2 ) {
			update_post_meta($post_id, '_sixth_pin_code', esc_attr($text_field2));
		}
		else
		{
			update_post_meta($post_id, '_sixth_pin_code', '' );
		}        
    }
    
}
add_action( 'woocommerce_process_product_meta_simple', 'woocom_save_proddata_custom_fields'  );
