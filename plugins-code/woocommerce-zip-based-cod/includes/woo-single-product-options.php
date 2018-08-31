<?php
add_action( 'woocommerce_before_add_to_cart_form', 'bbloomer_custom_action', 5 );
 
function bbloomer_custom_action() 
{
	$id = get_the_ID();
	?>
	<div class="check_availability">
		<label for="cod_text">Enter Pin Code to check Availability for COD</label>
		<input type="number" id="cod_text" placeholder="Enter Postal Code"/>
		<input type="hidden" value="<?php echo $id;?>" id="p_id"/>
		<br/>
		<p class="valid_msg"></p>
		<button type="button" class="button alt check_cls">Check Availability</button>
	</div>
	<div class="ajax_loader"></div>
	<br/>
	<?php
}