<?php
function wporg_shortcode($atts = [], $content = null)
{
    // do something to $content
 
   //$content = 'testadd';
    return $content;
}
add_shortcode('wporg', 'wporg_shortcode');