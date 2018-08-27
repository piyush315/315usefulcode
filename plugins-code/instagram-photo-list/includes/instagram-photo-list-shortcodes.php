<?php
// List Photos

function ipl_list_photos( $atts, $content=NULL ) {
    global $ipl_options;

    $atts = shortcode_atts( array(
        'title' => 'Instagram Photo List',
        'count' =>  10
    ), $atts );
	$userId= amrdiab;
    $url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $ipl_options['access_token'] . '&count=' . $atts['count'];
	//$url = 'https://api.instagram.com/v1/users/piyushmarothi/media/recent/?client_id=74bf1c1543d7455ab05120b3ec13827d';
	
	//$url="https://www.instagram.com/$userId/?__a=1";
    $options = array( 'http' => array('user_agent' => $_SERVER['HTTP_USER_AGENT'] ) );
    $context = stream_context_create( $options );
    $response = file_get_contents( $url, false, $context );
    $data = json_decode( $response )->data;
	//$data = json_decode( $response );
	echo '<pre>';	
	print_r($data);

   
    $output      = '<div class="ipl-photos">';  
    $output     .=  '<p>' . $ipl_options['page_caption'] . '</p>';
    foreach( $data as $photo ) {    
        $output .= '<div class="photo-col">';
        if ( $ipl_options['linked'] ) {
            //$output .=  '<img src="' . $photo->images->standard_resolution->url . '"/>';
             $output .= '<a title="' . $photo->caption->text . '" target = "_blank" href="' . $photo->link . '"><img src="' . $photo->images->standard_resolution->url . '"/></a>';
        }
        else {
            $output .=  '<img src="' . $photo->images->standard_resolution->url . '"/>';
        }       
        $output .= '</div>';
    }
    $output     .= '</div>';

    return $output;
}

//Add Shortcode
add_shortcode( 'photos', 'ipl_list_photos' );
?>