<?php
/* Add Some Hooks for changing custom columns */
add_filter('manage_posts_columns', 'tf_events_edit_columns');
add_action('manage_posts_custom_column', 'tf_events_custom_columns', 10, 2);

function tf_events_edit_columns($columns)
{ 
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"tf_col_ev_cat" => "Title",		
		"tf_col_ev_thumb" => "Thumbnail",		
		"tf_col_ev_desc" => "Description",
		);
	return $columns;
}

function tf_events_custom_columns($column)
{
	global $post;
	$custom = get_post_custom();
	switch ($column)
	{
		case "tf_col_ev_cat":
			the_title();
		break;		
		
		case "tf_col_ev_thumb":
			// - show thumb -
			$post_image_id = get_post_thumbnail_id(get_the_ID());
			if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
			if ($thumbnail) (string)$thumbnail = $thumbnail[0];
			echo '<img src="'. $thumbnail . '" alt="" height="100" width="100"';			
		}
		break;
		
		case "tf_col_ev_desc";
			the_excerpt();
		break;
		 
	}
}