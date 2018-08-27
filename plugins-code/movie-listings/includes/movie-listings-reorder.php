<?php
    function ml_add_submenu_page() {
        add_submenu_page(
            'edit.php?post_type=movie_listing',
            __('Custom Order'),
            __('Custom Order'),
            'manage_options',
            'custom-order',
            'ml_reorder_movies_callback'
        );
    }

    add_action( 'admin_menu', 'ml_add_submenu_page' );

    function ml_reorder_movies_callback() {
        $args = array(
            'post_type'                 =>  'movie_listing',            
            'order'                     =>  'DESC',
            'order_by'                  =>   'modified',
            'post_status'               =>  'publish',                    
        );        
    
    $movie_listing = new WP_Query( $args );
    
    ?>
        <div id="movie-sort" class="wrap">            
            <h2><?php esc_html_e( 'Sort Movie Listings','ml-domain' );?><img class="loading" src="<?php echo esc_url( admin_url() . '/images/loading.gif');?>"/></h2>
            <div class="order-save-msg updated"><?php esc_html_e( 'Listing Order Saved' ); ?></div>
            <div class="order-save-err error"><?php esc_html_e( 'Something Went Wrong' ); ?></div>
            <?php
                if ( $movie_listing->have_posts() ) : $movie_listing->the_post();
            ?>
            <ul class="movie-sort-list"><?php while( $movie_listing->have_posts() ): $movie_listing->the_post();?>
            <li id="<?php esc_attr( the_id() ); ?>"><?php esc_html( the_title() );?></li>
            <?php
                endwhile;
            ?>
            </ul>
            <?php
            else: 
            ?>
            <p><?php esc_html_e( 'No movies to List' ); ?></p>
            <?php endif; ?>
        </div>
    <?php
    }
    
    function save_order() {
        //Check Nonce/ Token
        if( !check_ajax_refer( 'ml-token', 'token' ) ){
            return wp_send_json_error( 'Invalid Token' );
        }

        // Check User
        if ( !current_user_can ( 'manage_options') ) {
            return wp_send_json_error( 'Not Authorized' ); 
        }

        $order = $_POST['order'];
        $counter = 0;

        foreach ( $order as $listing_id ) {
            $listing = array(
                'ID'            => (int)$listing_id,
                'menu_order'    => $counter
            );
            wp_update_post ( $listing );
            $counter++;
        }
        wp_send_json_success( 'Listing Order Saved' );
    }

    add_action( 'wp_ajax_save_order', 'save_order' );
?>