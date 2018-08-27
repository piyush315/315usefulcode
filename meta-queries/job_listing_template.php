<?php
/**
* Template Name: Job Listing Template
*
*/
get_header();
global $wpdb;
$postmeta = $wpdb->prefix . 'postmeta';
?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri();?>/css/custom_bootstrap.css"/>
<?php
/*********** Custom Search Form ***************/
?>
<div class="container_job_list">  <!-- Start Main Container -->
<div class="row col-md-12 form_div">
    <div class="col-md-6 keyword_div">
        <input type="text" name="search_keyword" class="keyword_cls" id="search_keyword"/>
    </div>
    <div class="col-md-4 job_region_div">       
        <?php
                $list_city = get_terms( array(
                    'taxonomy' => 'listing_job_cities',
                    'hide_empty' => false,
                ) );
                echo '<select class="job_region_cls" name="job_region" id="job_region">';
                echo '<option value="">Select Region</option>';
                if ( $list_city ) {
                    foreach( $list_city as $cities ) {
                        $slug_city = $cities->slug;
                        $slug_name = $cities->name;
                       echo '<option value="'.$slug_city. '">' . $slug_name . '</option>';
                    }
                }
                echo '</select>';
        ?>
    </div>
    <div class="col-md-2 search_btn_cls"><button class="search_cls">Search</button></div>
</div>
<?php


/********************************** New Functionality for get Custom Post and data ***************/
echo '<div class="row col-md-12 job_container">'; //12 Column div job Container
$args = array(
    'post_type'      =>     'job_listing',
	'posts_per_page' =>     10,
    'orderby'        =>     'modified',
    'order'          =>     'DESC'
    );
$the_query = new WP_Query( $args );
$i = 1;
echo '<div class="col-md-8 custom_cls_row col-lg-8 col-xl-9">'; //start col-md-8
if( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
echo '<div class="col-md-12 custom_cls_col3">';
$ID = get_the_ID();

$thumb_id = get_post_thumbnail_id( $ID );
$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
$img_url =  $thumb_url[0];

$job_location =  get_post_meta( $ID, '_job_location', true );

$title = get_the_title();
$permalink  = get_permalink( $ID );


echo '<div class="img_div"><img src="' . $img_url . '"/></div>';
echo '<div class="title_location_div">';
echo '<a href="' . $permalink . '"><h3 class="title_div">' . $title. '</h3></a>';
echo '<div class="job_location_div">' . $job_location . '</div>';
echo '</div>';

$job_listing_tax = 'job_listing_type';
$job_listing_speciality = 'job_speciality';

$listing_terms = wp_get_post_terms( $ID, $job_listing_tax, $args );
$speciality_terms = wp_get_post_terms( $ID, $job_listing_speciality, $args );


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


$i++;
echo '</div>';
endwhile; //End While

endif; // End If
echo '</div>'; //End first-col-md-8
/********************************** End New Functionality for get Custom Post and data ***************/


/*************** New Functionality For All Filters **********************************/

/******************************** for date posted  *****************************/
$date_1hour = array(
    'post_type' => 'job_listing',
    'posts_per_page' => '10',    
    'date_query' => array(
       array(
             'after' => '1 hour ago'
             )
       )
    );
$date_1hour_post = new WP_Query( $date_1hour );
$count_1_hour = $date_1hour_post->post_count;

$date_24hour = array(
    'post_type' => 'job_listing',
    'posts_per_page' => '10',    
    'date_query' => array(
       array(
             'after' => '24 hours ago'
             )
       )
    );
$date_24hour_post = new WP_Query( $date_24hour );
$count_24_hour = $date_24hour_post->post_count;

$date_7days = array(
    'post_type' => 'job_listing',
    'posts_per_page' => '10',    
    'date_query' => array(
       array(
             'after' => '7 days ago'
             )
       )
    );
$date_7days = new WP_Query( $date_7days );
$count_7_days = $date_7days->post_count;

$date_30days = array(
    'post_type' => 'job_listing',
    'posts_per_page' => '10',    
    'date_query' => array(
       array(
             'after' => '30 days ago'
             )
       )
    );
$date_30days_post = new WP_Query( $date_30days );
$count_30_days = $date_30days_post->post_count;

echo '<div class="col-md-4 filter_sidebar_div col-lg-4 col-xl-3">'; //Start second col-md 4
    echo '<div class="date_post_group">';
        echo '<h3>Date Posted</h3>';
        echo '<input type="radio" name="date_group" id="1_hour_ago" value="1 hour ago" class="date_post_group filter_cls"/><label for="1_hour_ago">Last Hour' . '<span class="count_post_cls">( ' . $count_1_hour . ')</span></label><br/>';
        echo '<input type="radio" name="date_group" id="24_hours_ago" value="24 hours ago" class="date_post_group filter_cls"/><label for="24_hours_ago">Last 24 Hours' . '<span class="count_post_cls">( ' . $count_24_hour  . ')</span></label>' . '<br/>';
        echo '<input type="radio" name="date_group" id="7_days_ago" value="7 days ago" class="date_post_group filter_cls"/><label for="7_days_ago">Last 7 days' . '<span class="count_post_cls">( ' . $count_7_days . ')</span></label>' . '<br/>';
        echo '<input type="radio" name="date_group" id="30_days_ago" value="30 days ago" class="date_post_group filter_cls"/><label for="30_days_ago">Last 30 days' . '<span class="count_post_cls">( ' .  $count_30_days . ')</span></label>' . '<br/>';
    echo '</div>';

/******************************** End  for date posted  *****************************/


/******************************** For Vacancy Types   *****************************/


$listing_type = get_terms( array(
    'taxonomy' => 'job_listing_type',
    'hide_empty' => false,
) );
echo '<div class="vacancy_sidebar">';
echo '<h3>Vacancy Type</h3>';
if ( $listing_type ) {
    foreach( $listing_type as $type ) {
        $vacancy_slugs = $type->slug;
        echo '<input type="checkbox" name="vacancy_group[]" id="' . $vacancy_slugs . '" value="' .$vacancy_slugs . '" class="vacancy_type_group filter_cls"/><label for="' .$vacancy_slugs . '">'. $type->name . ' <span class="count_post_cls">(' . $type->count . ')</span></label>';
        echo '<br/>';
    }
}
echo '</div>';
/******************************** End  for Vacancy Types   *****************************/


/******************************** for job speciality   *****************************/


$speciality = get_terms( array(
    'taxonomy' => 'job_speciality',
    'hide_empty' => false,
) );

echo '<div class="speciality_sidebar">';
echo '<h3>Speciality</h3>';
if ( $speciality ) {
    foreach( $speciality as $type ) {
        $special_slugs = $type->slug;
        echo '<input type="checkbox" name="speciality_group[]" id="' . $special_slugs . '" value="' . $special_slugs . '" class="vacancy_type_group filter_cls"/><label for="' . $special_slugs . '">'.$type->name . '<span class="count_post_cls">(' . $type->count . ')</span></label>';
        echo '<br/>';
    }
}
echo '</div>';
/******************************** End  for job speciality   *****************************/


/******************************** for Salary Filter   *****************************/


$salary_cat = get_terms( array(
    'taxonomy' => 'salary_category',
    'hide_empty' => false,
) );
echo '<div class="filter_sidebar">';
echo '<h3>Salary Filter</h3>';
if ( $salary_cat ) {
    foreach( $salary_cat as $type ) {
        $salary_slug = $type->slug;
        echo '<input type="checkbox" name="salary_group[]" id="' . $salary_slug . '" value="' . $salary_slug . '" class="vacancy_type_group filter_cls"/><label for="' . $salary_slug . '">'.$type->name . '<span class="count_post_cls">(' . $type->count . ')</span></label>';
        echo '<br/>';
    }
}
echo '</div>';

/******************************** End  for Salary Filter   *****************************/




/* testing for job listing salary meta query */

$special_slug = array( 'art-director', 'illustrator', 'internship', 'web-design' );
$job_listing_slug = array( 'part-time','internship'  );
$salary_slug = array( '50000');

/* testing for  meta queries  only testing */


/******************************** End  For Salary Filters   *****************************/

echo '</div>';//end col-md-4
echo '</div>'; //end colmd-12


echo '<div class="loader_progress"></div>';
echo '</div>'; // End Main Container
/*************** End New Functionality For All Filters **********************************/
get_footer();
