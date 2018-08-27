<?php
/**
 * Child-Theme functions and definitions
 */

add_theme_support( 'woocommerce' );
add_filter( 'woocommerce_product_tabs', 'wpb_new_product_tab' );
function wpb_new_product_tab( $tabs ) {
    // Add the new tab
  /*  $tabs['previews'] = array(
        'title'       => __( 'Reviews', 'text-domain' ),
        'priority'    => 50,
        'callback'    => 'wpb_previews_tab_content'
    );*/
    $tabs['support_tab'] = array(
        'title'       => __( 'Support', 'text-domain' ),
        'priority'    => 51,
        'callback'    => 'wpb_support_product_tab_content'
    );
   return $tabs;
}

function wpb_previews_tab_content() {
    // The new tab content
    global $product;
    $pid = $product->get_id();
      echo 'No data Found!';
    //echo $techcontent = get_field('_technical_specification',$pid);
  //  echo $techcontent = get_post_meta($pid,'technical_specification',true);



}
function wpb_support_product_tab_content() {
    // The new tab content
      global $product;
      $pid = $product->get_id(); 
      $supportcontent = get_field('support',$pid);
      if($supportcontent)
      {
      	echo $supportcontent;
      }
      else
      {
		echo 'No data Found!';
      }
    //  echo do_shortcode($faqcontent);
        
}
add_filter( 'woocommerce_product_tabs', 'wpb_remove_product_tabs', 98 );
function wpb_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );  // Remove the additional information tab
        // Remove the discount tab
    return $tabs;
}

function end_wrapper_here() { // End wrapper 
    if (is_shop()) {

       echo '</div>';

    } elseif (is_product_category()) {  

       echo '</div>';

    } elseif (is_product()) {

       echo '</div>';

    }
 }

 add_action(  'woocommerce_after_main_content', 'end_wrapper_here', 20  );

 remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


 function time_ago( $time )
    {
        $out    = ''; // what we will print out
        $now    = time(); // current time
        $diff   = $now - $time; // difference between the current and the provided dates

        if( $diff < 60 ) // it happened now
            return TIMEBEFORE_NOW;

        elseif( $diff < 3600 ) // it happened X minutes ago
            return str_replace( '{num}', ( $out = round( $diff / 60 ) ), $out == 1 ? TIMEBEFORE_MINUTE : TIMEBEFORE_MINUTES );

        elseif( $diff < 3600 * 24 ) // it happened X hours ago
            return str_replace( '{num}', ( $out = round( $diff / 3600 ) ), $out == 1 ? TIMEBEFORE_HOUR : TIMEBEFORE_HOURS );

        elseif( $diff < 3600 * 24 * 2 ) // it happened yesterday
            return TIMEBEFORE_YESTERDAY;

        else // falling back on a usual date format as it happened later than yesterday
            return strftime( date( 'Y', $time ) == date( 'Y' ) ? TIMEBEFORE_FORMAT : TIMEBEFORE_FORMAT_YEAR, $time );
    }


add_filter( 'woocommerce_product_tabs', 'wp_woo_rename_reviews_tab', 30);
function wp_woo_rename_reviews_tab($tabs) {

    global $product;
    $check_product_review_count = $product->get_review_count();
    if ( $check_product_review_count == 0 ) {
        $tabs['reviews']['title'] = 'Reviews';
    } else {
        $tabs['reviews']['title'] = 'Reviews';
    }
    return $tabs;
}

// Add price when user click on add to cart button

/*add_action( 'woocommerce_before_calculate_totals', 'add_custom_item_price', 10 );
function add_custom_item_price( $cart_object ) {
    foreach ( $cart_object->get_cart() as $item_values ) {


        ##  Get cart item data
        $item_id = $item_values['data']->id; // Product ID
        $newprice = 10;
        $original_price = $item_values['data']->price; // Product original price

        ## Get your custom fields values
        $price1 = $item_values['custom_data']['price1'];
        $quantity = $item_values['custom_data']['quantity'];

        $original_price = $original_price + $newprice;

        // CALCULATION FOR EACH ITEM:
        ## Make HERE your own calculation 
       // echo $new_price = $price1 ;
       // exit;

        ## Set the new item price in cart
       echo $item_values['data']->set_price($original_price);
    }
} */

add_action('woocommerce_before_main_content', 'remove_sidebar' );
    function remove_sidebar()
    {
        if ( is_shop() ) { 
         remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
       }
    }


    function custom_woocommerce_product_add_to_cart_text( $text ) {


      if ( is_front_page() ) {
          return __( 'Add to Cart' );
       }
      else
      {
          return __( $text );
      }
       

}
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_woocommerce_product_add_to_cart_text' );

add_filter('woocommerce_login_redirect', 'wc_login_redirect');
 
function wc_login_redirect( $redirect_to ) {
     $redirect_to = get_the_permalink('896');
     return $redirect_to;
}

function side_popup() {
    ?>
        <style>
		.side_popup_home {
			width: 100px;
			position: fixed;
			top: 160px;
			right:0;
			z-index: 9999;
			background: white;	
		} 
		
		.side_popup_home .time_circles {font-size:9px !important; max-height: 50px !important;
    overflow: hidden;}
		ul{list-style-type:none;}
		</style>
		
		<div class="side_popup_home" style="display:none;">
			<ul>
				<li><b><a href="javascript:;" style="z-index: 999999;" class="cl_homepop" id="openpop" onclick="openpuphome();">Online Openino</a></b></li>
				<li><?php //echo do_shortcode('[sg_popup id=4]'); ?></li>
				<li><?php //echo do_shortcode('[ycd_countdown id=2128]'); ?></li>
				<li><?php //echo do_shortcode('[ycd_countdown id=2129]'); ?></li>
				<li><?php //echo do_shortcode('[ycd_countdown id=2130]'); ?></li>
				<li><b><a href="javascript:;" style="z-index: 999999;" class="cl_homepop" id="openpop" onclick="openpuphome();">Grand Opening in NYC</a></b></li>
				<li><?php //echo do_shortcode('[ycd_countdown id=2122]'); ?></li>
				<li><?php //echo do_shortcode('[ycd_countdown id=2123]'); ?></li>
				<li><?php //echo do_shortcode('[ycd_countdown id=2124]'); ?></li>
				<li><?php //echo do_shortcode('[ycd_countdown id=2125]'); ?></li>
			</ul>
        </div>
    <?php
	
	function cfp($atts, $content = null) {
    extract(shortcode_atts(array( "id" => "", "title" => "", "pwd" => "" ), $atts));

    if(empty($id) || empty($title)) return "";

    $cf7 = do_shortcode('[contact-form-7 404 "Not Found"]');

    $pwd = explode(',', $pwd);
    foreach($pwd as $p) {
        $p = trim($p);

        $cf7 = preg_replace('/<input type="text" name="' . $p . '"/usi', '<input type="password" name="' . $p . '"', $cf7);
    }

    return $cf7;
}
add_shortcode('cfp', 'cfp');
}
add_filter( 'register_post_type_args', 'wpse247328_register_post_type_args', 10, 2 );
function wpse247328_register_post_type_args( $args, $post_type ) {

    if ( 'cpt_services' === $post_type ) {
        $args['rewrite']['slug'] = 'service';
    }

    return $args;
}

/* Create custom sidebar for job listing post */
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Job listing Filter', 'consultor-child' ),
        'id' => 'job-listing-filter',
        'description' => __( 'Widgets in this area will filter job listings post', 'consultor-child' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}

/************ Add Custom Script for JS and CSS  *******/

function adding_scripts_styles() {
	wp_register_style( 'listing_css', get_stylesheet_directory_uri() . '/css/job_listing_css.css' );
	wp_enqueue_style( 'listing_css' );
	wp_register_script( 'testing_js', get_stylesheet_directory_uri() . '/js/test_only.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'testing_js' );
    wp_register_script( 'listing_js', get_stylesheet_directory_uri() . '/js/job_listing_js.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'listing_js' );
    wp_localize_script('listing_js','ajaxJobListing',array('ajaxurl'=> admin_url( 'admin-ajax.php' )));    
}
add_action( 'wp_enqueue_scripts', 'adding_scripts_styles' );

/************ End  Custom Script for JS and CSS  *******/

function themes_taxonomy() {
    register_taxonomy(  
        'job_speciality',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'job_listing',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Job Specialities',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'job_listing', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            ),
            'show_admin_column' => true,
        )  
    );

    register_taxonomy(  
        'salary_category',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'job_listing',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Job Salary',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'job_listing', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            ),
            'show_admin_column' => true,
        )  
    );

    register_taxonomy(  
        'listing_job_cities',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces). 
        'job_listing',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Job Cities',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'job_listing', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            ),            
        )  
    );
     
}  
add_action( 'init', 'themes_taxonomy');

function wpse_139269_term_radio_checklist( $args ) {
    if ( ! empty( $args['taxonomy'] ) && $args['taxonomy'] === 'salary_category' /* <== Change to your required taxonomy */ ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
            if ( ! class_exists( 'WPSE_139269_Walker_Category_Radio_Checklist' ) ) {
                /**
                 * Custom walker for switching checkbox inputs to radio.
                 *
                 * @see Walker_Category_Checklist
                 */
                class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, $args = array() ) {
                        $output = parent::walk( $elements, $max_depth, $args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );

                        return $output;
                    }
                }
            }

            $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
        }
    }

    return $args;
}

add_filter( 'wp_terms_checklist_args', 'wpse_139269_term_radio_checklist' );

/*** Job Search  Ajax  */
function meks_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}


add_action( 'wp_ajax_location_function', 'location_function' );
add_action( 'wp_ajax_nopriv_location_function', 'location_function' );

function location_function() {

        $search_keyword                 = (isset($_POST['search_keyword'])) ? $_POST['search_keyword'] : "";
        $job_regions                    =    (isset($_POST['job_regions'])) ? $_POST['job_regions'] : "";

        if( ! empty ($search_keyword) ) {

            $rd_args = array(
                'post_type' => 'job_listing',
                'posts_per_page' => '10',
                's' => $search_keyword,   
                'meta_query' => array(
                    'relation' => 'AND', 
                    array(                   
                    'key' => '_job_location',
                    'value' => $job_regions,
                    'compare' => 'LIKE'
                    )
                )
            );           
        }
        else {
            $rd_args = array(
                'post_type' => 'job_listing',
                'posts_per_page' => '10',    
                'meta_query' => array(
                    array(
                    'key' => '_job_location',
                    'value' => $job_regions,
                    'compare' => 'LIKE'
                    )
                )
            );
        }
       

       /* */
        $rd_query = new WP_Query( $rd_args );
        $rd_queryid = array();
        if($rd_query->have_posts() ) : while ( $rd_query->have_posts() ) : $rd_query->the_post();
            $rd_queryid[] = get_the_ID();            
        endwhile;
        wp_reset_postdata();
        endif; 
        
        if ( ! empty ( $rd_queryid ) ) {
            foreach( $rd_queryid as $ID ) {
                /* custom code copy from main file due to design */                
                echo '<div class="col-md-12 custom_cls_col3">';

                $thumb_id = get_post_thumbnail_id( $ID );
                $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
                $img_url =  $thumb_url[0];

                $job_location =  get_post_meta( $ID, '_job_location', true );

                $title = get_the_title($ID);
                $permalink  = get_permalink( $ID );

                echo '<div class="img_div"><img src="' . $img_url . '"/></div>';
                echo '<div class="title_location_div">';
                echo '<a href="' . $permalink . '"><h3 class="title_div">' . $title. '</h3></a>';
                echo '<div class="job_location_div">' . $job_location . '</div>';
                echo '</div>';

                $job_listing_tax = 'job_listing_type';
                $job_listing_speciality = 'job_speciality';
                $args1 = array(
                    'orderby'    => $ID,
                    'order'      => 'ASC',
                );

                $listing_terms = wp_get_post_terms( $ID, $job_listing_tax, $args1 );
                $speciality_terms = wp_get_post_terms( $ID, $job_listing_speciality, $args1 );

                echo '<div class="time_div"><span class="time_span">' . meks_time_ago() . '</span></div>';


                if ( $listing_terms ) {
                    $slug = $listing_terms[0]->slug;
                    echo '<div class="vacancy_type_div"><span class="' . $slug . '_cls">' . $listing_terms[0]->name . '</span></div>';
                    echo '<br/>';
                }

                if ( $job_listing_speciality ) {
                    foreach($speciality_terms as $speciality_term) {
                        /*echo '<div class="job_special_div">' . $speciality_term->name . '</div>';
                        echo '<br/>';*/
                    }
                }
                echo '</div>';
                            }
                        }

                        else {
                            echo '<h3 class="no_post_found" style="text-align:center;"><i class="far fa-frown"></i> Sorry, No Jobs Found</h3>';
                        }
        
        wp_die();
}

add_action( 'wp_ajax_shop_filter_search_ajax', 'shop_filter_search_ajax' );
add_action( 'wp_ajax_nopriv_shop_filter_search_ajax', 'shop_filter_search_ajax' );



	function shop_filter_search_ajax() {
        
        $radioValue                 = (isset($_POST['radioValue'])) ? $_POST['radioValue'] : "";
        $speciality_arr                 = (isset($_POST['speciality_arr'])) ? $_POST['speciality_arr'] : "";
        $salary_arr                 = (isset($_POST['salary_arr'])) ? $_POST['salary_arr'] : "";
        $vacancy_arr                 = (isset($_POST['vacancy_arr'])) ? $_POST['vacancy_arr'] : "";

        /* custom query to get data */
        $final_array = array();
        $t22 = array(
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => array('job_listing'),
            'posts_per_page' => '10',    
            'tax_query' => array(
                'relation' => 'AND',        
            ),
            );
            if ( ! empty($speciality_arr)) {
            
                $job_special_arr = array(
                    'taxonomy'     => 'job_speciality',
                    'field'        => 'slug',
                    'terms'        => $speciality_arr
                );
                array_push( $t22['tax_query'], $job_special_arr );
            }
        
            if ( ! empty($vacancy_arr)) {
            
                $job_type_arr = array(
                    'taxonomy'     => 'job_listing_type',
                    'field'        => 'slug',
                    'terms'        => $vacancy_arr
                );
                array_push( $t22['tax_query'], $job_type_arr );
            }
        
            if ( ! empty($salary_arr)) {
            
                $salar_type_arr = array(
                    'taxonomy'     => 'salary_category',
                    'field'        => 'slug',
                    'terms'        => $salary_arr
                );
                array_push( $t22['tax_query'], $salar_type_arr );
            }
        $custom_query = new WP_Query( $t22 );
        $customq_array = array();
        if($custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post();
            $customq_array[] = get_the_ID();            
        endwhile;
        wp_reset_postdata();
        endif;       
        
        /* custom query to get data */

        if ( ! empty( $radioValue)  ) {
            $date_30days = array(
                'post_type' => 'job_listing',
                'posts_per_page' => '10',    
                'date_query' => array(
                   array(
                         'after' => $radioValue
                         )
                   )
                );            
            $date_query_custom = new WP_Query( $date_30days );
            $date_array = array();
            if($date_query_custom->have_posts() ) : while ( $date_query_custom->have_posts() ) : $date_query_custom->the_post();
                $date_array[] = get_the_ID();               
            endwhile;
            wp_reset_postdata();
            endif;            

            $final_array = array_intersect($customq_array,$date_array);
            
        }
        else {
             $final_array = $customq_array;            
        }
        if ( ! empty ( $final_array ) ) {
            foreach( $final_array as $ID ) {
                /* custom code copy from main file due to design */
                
                echo '<div class="col-md-12 custom_cls_col3">';


$thumb_id = get_post_thumbnail_id( $ID );
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
$img_url =  $thumb_url[0];

$job_location =  get_post_meta( $ID, '_job_location', true );

$title = get_the_title($ID);
$permalink  = get_permalink( $ID );

echo '<div class="img_div"><img src="' . $img_url . '"/></div>';
echo '<div class="title_location_div">';
echo '<a href="' . $permalink . '"><h3 class="title_div">' . $title. '</h3></a>';
echo '<div class="job_location_div">' . $job_location . '</div>';
echo '</div>';

$job_listing_tax = 'job_listing_type';
$job_listing_speciality = 'job_speciality';
$args1 = array(
    'orderby'    => $ID,
    'order'      => 'ASC',
  );

$listing_terms = wp_get_post_terms( $ID, $job_listing_tax, $args1 );
$speciality_terms = wp_get_post_terms( $ID, $job_listing_speciality, $args1 );

echo '<div class="time_div"><span class="time_span">' . meks_time_ago() . '</span></div>';


if ( $listing_terms ) {
    $slug = $listing_terms[0]->slug;
    echo '<div class="vacancy_type_div"><span class="' . $slug . '_cls">' . $listing_terms[0]->name . '</span></div>';
    echo '<br/>';
}

if ( $job_listing_speciality ) {
    foreach($speciality_terms as $speciality_term) {
        /*echo '<div class="job_special_div">' . $speciality_term->name . '</div>';
        echo '<br/>';*/
    }
}
echo '</div>';
            }
        }

        else {
            echo '<h3 class="no_post_found" style="text-align:center;"><i class="far fa-frown"></i> Sorry, No Jobs Found</h3>';
        }

        
       wp_die();
    }

/* Ajax Code Pagination */
add_action( 'wp_ajax_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' );

add_action( 'wp_ajax_nopriv_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' ); 

function cvf_demo_pagination_load_posts() {

    global $wpdb;
    // Set default variables
    $msg = '';

    if(isset($_POST['page']))
    {
        // Sanitize the received page   
        $page = sanitize_text_field($_POST['page']);
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = 3;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;

        // Set the table where we will be querying data
        $table_name = $wpdb->prefix . "posts";

        // Query the necessary posts
        /*
        $all_blog_posts = $wpdb->get_results($wpdb->prepare("
            SELECT * FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );

        // At the same time, count the number of queried posts
        $count = $wpdb->get_var($wpdb->prepare("
            SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish'", array() ) );
        */
        $all_blog_posts = new WP_Query(
            array(
                'post_type'         => 'post',
                'post_status '      => 'publish',
                'orderby'           => 'post_date',
                'order'             => 'DESC',
                'posts_per_page'    => $per_page,
                'offset'            => $start
            )
        );

        $count = new WP_Query(
            array(
                'post_type'         => 'post',
                'post_status '      => 'publish',
                'posts_per_page'    => -1
            )
        );       
        echo '<br/>';
        /* new custom code while loop */
        if( $all_blog_posts->have_posts() ) : while ( $all_blog_posts->have_posts() ) : $all_blog_posts->the_post();
                    $ID = get_the_ID();
                    $title = get_the_title();
                    $msg .= '
                    <div class = "col-md-12">       
                        <h2><a href="' . get_permalink($ID) . '">' . $title . '</a></h2>                          
                    </div>';                    
                    endwhile;                    
                    endif;

        // Optional, wrap the output into a container
        $msg = "<div class='cvf-universal-content'>" . $msg . "</div><br class = 'clear' />";

        // This is where the magic happens
        $no_of_paginations = ceil($count / $per_page);

        if ($cur_page >= 7) {
            $start_loop = $cur_page - 3;
            if ($no_of_paginations > $cur_page + 3)
                $end_loop = $cur_page + 3;
            else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
                $start_loop = $no_of_paginations - 6;
                $end_loop = $no_of_paginations;
            } else {
                $end_loop = $no_of_paginations;
            }
        } else {
            $start_loop = 1;
            if ($no_of_paginations > 7)
                $end_loop = 7;
            else
                $end_loop = $no_of_paginations;
        }

        // Pagination Buttons logic     
        $pag_container .= "
        <div class='cvf-universal-pagination'>
            <ul>";

        if ($first_btn && $cur_page > 1) {
            $pag_container .= "<li p='1' class='active'>First</li>";
        } else if ($first_btn) {
            $pag_container .= "<li p='1' class='inactive'>First</li>";
        }

        if ($previous_btn && $cur_page > 1) {
            $pre = $cur_page - 1;
            $pag_container .= "<li p='$pre' class='active'>Previous</li>";
        } else if ($previous_btn) {
            $pag_container .= "<li class='inactive'>Previous</li>";
        }
        for ($i = $start_loop; $i <= $end_loop; $i++) {

            if ($cur_page == $i)
                $pag_container .= "<li p='$i' class = 'selected' >{$i}</li>";
            else
                $pag_container .= "<li p='$i' class='active'>{$i}</li>";
        }

        if ($next_btn && $cur_page < $no_of_paginations) {
            $nex = $cur_page + 1;
            $pag_container .= "<li p='$nex' class='active'>Next</li>";
        } else if ($next_btn) {
            $pag_container .= "<li class='inactive'>Next</li>";
        }

        if ($last_btn && $cur_page < $no_of_paginations) {
            $pag_container .= "<li p='$no_of_paginations' class='active'>Last</li>";
        } else if ($last_btn) {
            $pag_container .= "<li p='$no_of_paginations' class='inactive'>Last</li>";
        }

        $pag_container = $pag_container . "
            </ul>
        </div>";

        // We echo the final output
        echo 
        '<div class = "cvf-pagination-content">' . $msg . '</div>' . 
        '<div class = "cvf-pagination-nav">' . $pag_container . '</div>';

    }
    // Always exit to avoid further execution
    exit();
}

function more_post_ajax(){
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];
    header("Content-Type: text/html");

    $args = array(
        'post_type' => 'job_listing',
        'posts_per_page' => $ppp,        
        'offset' => $offset,
    );

    $loop = new WP_Query($args);
    while ($loop->have_posts()) { $loop->the_post(); 
       the_title();
       echo '<br/>';
    }

    exit; 
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');