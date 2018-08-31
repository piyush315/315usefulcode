<?php
// First Register the Tab by hooking into the 'woocommerce_product_data_tabs' filter
add_filter( 'woocommerce_product_data_tabs', 'add_my_custom_product_data_tab' );
function add_my_custom_product_data_tab( $product_data_tabs ) 
{
    $product_data_tabs['zip-based-cod'] = array(
        'label' => __( 'Zip Code Based COD', 'woocommerce' ),
        'target' => 'my_custom_product_data',
        'class'     => array( 'show_if_simple' ),
    );
    return $product_data_tabs;
}

/** CSS To Add Custom tab Icon */
function wcpp_custom_style() 
{
	?>
	<style>
	#woocommerce-product-data ul.wc-tabs li.my-custom-tab_options a:before { font-family: WooCommerce; content: '\e006'; }
	</style>
	<?php 
}
add_action( 'admin_head', 'wcpp_custom_style' );
?>