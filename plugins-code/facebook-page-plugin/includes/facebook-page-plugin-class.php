<?php
class Facebook_Page_Plugin_Widget extends WP_Widget {
    //Construct
    public function __construct() {
        parent:: __construct(
            'facebook_page_plugin_widget', //Base ID
            __( 'Facebook Page Plugin', 'fpp-domain' ),
            array( 'description'=> __( 'Shows a Facebook page plugin in a widget', 'fpp-domain' ) )
        );
    }

    //Display widget
    public function widget( $args, $instance ) {
        $data = array();
        $data['page_url']               = esc_attr( $instance['page_url'] );
        $data['show_timeline']          = esc_attr( $instance['show_timeline'] );
        $data['adapt_container']        = esc_attr( $instance['adapt_container'] );
        $data['width']                  = esc_attr( $instance['width'] );
        $data['height']                 = esc_attr( $instance['height'] );
        $data['hide_cover']             = esc_attr( $instance['hide_cover'] );
        $data['use_small_header']       = esc_attr( $instance['use_small_header'] );        
        $data['show_facepile']          = esc_attr( $instance['show_facepile'] );

        echo $args['before_widget'];
        echo $args['before_title'];
        echo $instance['title'];

        //Get main content
        echo $this->getPagePlugin( $data );
        echo $args['after_title'];
        echo $args['after_widget'];
    }

    // Backend Widget Form
    public function form( $instance ) {
        $this->getAdminForm( $instance );
    }

    // Update Values
    public function update( $new_instance, $old_instance ) {

        //processes widget options to be saved
        $instance = array();
        $instance['title'] = ( ! empty ( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['page_url'] = ( ! empty ( $new_instance['page_url'] ) ) ? strip_tags( $new_instance['page_url'] ) : '';
        $instance['show_timeline'] = ( ! empty ( $new_instance['show_timeline'] ) ) ? strip_tags( $new_instance['show_timeline'] ) : '';
        $instance['width'] = ( ! empty ( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
        $instance['height'] = ( ! empty ( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';
        $instance['show_facepile'] = ( ! empty ( $new_instance['show_facepile'] ) ) ? strip_tags( $new_instance['show_facepile'] ) : '';
        $instance['use_small_header'] = ( ! empty ( $new_instance['use_small_header'] ) ) ? strip_tags( $new_instance['use_small_header'] ) : '';
        $instance['hide_cover'] = ( ! empty ( $new_instance['hide_cover'] ) ) ? strip_tags( $new_instance['hide_cover'] ) : '';
        $instance['adapt_container'] = ( ! empty ( $new_instance['adapt_container'] ) ) ? strip_tags( $new_instance['adapt_container'] ) : '';

        return $instance;      
    }

    // Build Widget Admin Form

    public function getAdminForm( $instance ) {

        //Get Title
        if ( isset( $instance['title'] ) ) {            
            $title = $instance['title'];

        } else {
            $title = __('Like Us On Facebook', 'fpp-domain' );
        }

        //Get Page URL

        if ( isset( $instance['page_url'] ) ) {            
            $page_url = $instance['page_url'];

        } else {
            $page_url = 'https://www.facebook.com/facebook';
        }

        //Get Adapt Container

        if ( isset( $instance['adapt_container'] ) ) {            
            $adapt_container = $instance['adapt_container'];

        } else {
            $adapt_container = 'true';
        }

        //Get Width
         if ( isset( $instance['width'] ) ) {            
            $width = $instance['width'];

        } else {
            $width = 250;
        }

        //Get Height
         if ( isset( $instance['height'] ) ) {
            $height = $instance['height'];

        } else {
            $height = 500;
        }

        //Show Timeline
        if ( isset( $instance['show_timeline'] ) ) {
            $show_timeline = $instance['show_timeline'];

        } else {
            $show_timeline = 'true';
        }

        //Show Faces
        if ( isset( $instance['show_facepile'] ) ) {
            $show_facepile = $instance['show_facepile'];

        } else {
            $show_facepile = 'true';
        }

        //Small Header
        if ( isset( $instance['use_small_header'] ) ) {
            $use_small_header = $instance['use_small_header'];

        } else {
            $use_small_header = 'false';
        }
        
        //Hide Cover
         if ( isset( $instance['hide_cover'] ) ) {
            $hide_cover = $instance['hide_cover'];

        } else {
            $hide_cover = 'false';
        }   
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' )?>"><?php _e( 'Title','fpp-domain' ); ?></label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo esc_attr( $title  );?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'page_url' )?>"><?php _e( 'Page URL','fpp-domain' ); ?></label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('page_url');?>" name="<?php echo $this->get_field_name('page_url');?>" value="<?php echo esc_attr( $page_url  );?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'show_timeline' )?>"><?php _e( 'Show Timeline','fpp-domain' ); ?></label>            
            <select class="widefat" id="<?php echo $this->get_field_id('show_timeline');?>" name="<?php echo $this->get_field_name('show_timeline');?>">
                <option value="true" <?php echo ( $show_timeline == 'true' ) ? 'selected' : ''; ?>>True</option>
                <option value="false" <?php echo ( $show_timeline == 'false' ) ? 'selected' : ''; ?>>False</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'adapt_container' )?>"><?php _e( 'Adapt Container','fpp-domain' ); ?></label>            
            <select class="widefat" id="<?php echo $this->get_field_id('adapt_container');?>" name="<?php echo $this->get_field_name('adapt_container');?>">
                <option value="true" <?php echo ( $adapt_container == 'true' ) ? 'selected' : ''; ?>>True</option>
                <option value="false" <?php echo ( $adapt_container == 'false' ) ? 'selected' : ''; ?>>False</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'width' )?>"><?php _e( 'Width','fpp-domain' ); ?></label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('width');?>" name="<?php echo $this->get_field_name('width');?>" value="<?php echo esc_attr( $width  );?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'height' )?>"><?php _e( 'Height','fpp-domain' ); ?></label>
            <input type="text" class="widefat"  id="<?php echo $this->get_field_id('height');?>" name="<?php echo $this->get_field_name('height');?>" value="<?php echo esc_attr( $height  );?>"/>
        </p>    

        <p>
            <label for="<?php echo $this->get_field_id( 'show_facepile' )?>"><?php _e( 'Show faces','fpp-domain' ); ?></label>            
            <select class="widefat" id="<?php echo $this->get_field_id('show_facepile');?>" name="<?php echo $this->get_field_name('show_facepile');?>">
                <option value="true" <?php echo ( $show_facepile == 'true' ) ? 'selected' : ''; ?>>True</option>
                <option value="false" <?php echo ( $show_facepile == 'false' ) ? 'selected' : ''; ?>>False</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'use_small_header' )?>"><?php _e( 'Use Small Header','fpp-domain' ); ?></label>            
            <select class="widefat" id="<?php echo $this->get_field_id('use_small_header');?>" name="<?php echo $this->get_field_name('use_small_header');?>">
                <option value="true" <?php echo ( $use_small_header == 'true' ) ? 'selected' : ''; ?>>True</option>
                <option value="false" <?php echo ( $use_small_header == 'false' ) ? 'selected' : ''; ?>>False</option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'hide_cover' )?>"><?php _e( 'Hide Cover','fpp-domain' ); ?></label>            
            <select class="widefat" id="<?php echo $this->get_field_id('hide_cover');?>" name="<?php echo $this->get_field_name('hide_cover');?>">
                <option value="true" <?php echo ( $hide_cover == 'true' ) ? 'selected' : ''; ?>>True</option>
                <option value="false" <?php echo ( $hide_cover == 'false' ) ? 'selected' : ''; ?>>False</option>
            </select>
        </p>

        <?php
    }

    //Show Frontend Content

    public function getPagePlugin( $data ) {
        ?>
            <div class="fb-page" 
            data-href = "<?php echo $data['page_url']?>"
            <?php if ( $data['show_timeline'] == 'true') : ?>
            data-tabs = "timeline"
            <?php endif; ?>
            data-small-header = "<?php echo $data['use_small_header']; ?>"
            <?php if ( $data['show_timeline'] == 'false') :?>
            data-width = "<?php echo $data['width']; ?>"
            data-height = "<?php echo $data['height']; ?>"
            <?php else: ?>
            data-adapt-container-width = "<?php echo $data['adapt_container']; ?>"
            <?php endif; ?>
            data-hide-cover = "<?php echo $data['hide_cover']; ?>"
            data-show-facepile = "<?php echo $data['show_facepile']; ?>">

            <div class="fb-xfbml-parse-ignore">
                <blockquote cite "https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>            
            </div>

            </div>
        <?php   
    }
}
?>