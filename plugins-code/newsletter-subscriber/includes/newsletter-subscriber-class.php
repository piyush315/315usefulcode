<?php
class Newsletter_Subscriber_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'newsletter_subscriber_widget', // Base ID
			esc_html__( 'Newsletter Subscriber', 'ns_domain' ), // Name
			array( 'description' => esc_html__( 'A simple email subscriber', 'ns_domain' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];

        echo $args['before_title'];
            
        if ( ! empty( $instance['title'] ) ) {
                echo $instance['title'];
            }
        echo $args['after_title'];
        ?>
            
            <div id="form-msg"></div>
            <form id="subscriber-form" method="POST" action="<?php echo plugins_url() . '/newsletter-subscriber/includes/newsletter-subscriber-mailer.php'?>">
                <div class="form-group">
                    <label for="name">Name:</label><br/>
                    <input type= "text" id="name" name ="name" class="form-control"  >
                </div>
                <div class="form-group">
                    <label for="email">Email:</label><br/>
                    <input type= "text" id="email" name ="email" class="form-control"  >
                </div>
                <br/>
                <input type="hidden" name="recipient" value="<?php echo $instance['recipient']; ?>">
                <input type="hidden" name="subject" value="<?php echo $instance['subject']; ?>">
                <input type="submit" name="subscriber_submit" class="btn btn-primary" value ="Subscribe">
                <br/>
            </form>
        <?php
        echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
        // outputs the options form on admin
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Newsletter Subscriber', 'ns_domain' );
        $recipient = $instance['recipient'];
        $subject = ! empty( $instance['subject'] ) ? $instance['subject'] : __( 'You have a new subscriber', 'ns_domain' );
     ?>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id('title') );?>"><?php _e('Title:');?></label></br>
    <input type="text" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo esc_attr( $title );?>"/>
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('recipient');?>"><?php _e('Recipient:');?></label></br>
    <input type="text" id="<?php echo $this->get_field_id('recipient');?>" name="<?php echo $this->get_field_name('recipient');?>" value="<?php echo esc_attr( $recipient );?>"/>
    </p>

     <p>
    <label for="<?php echo $this->get_field_id('subject');?>"><?php _e('subject:');?></label></br>
    <input type="text" id="<?php echo $this->get_field_id('subject');?>" name="<?php echo $this->get_field_name('subject');?>" value="<?php echo esc_attr($subject);?>"/>
    </p>
<?php
    }
	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        
        $instance = array(
            'title' => ( !empty ( $new_instance['title'] ) ) ? strip_tags ( $new_instance['title'] ) : '',
            'recipient' => ( !empty ( $new_instance['recipient'] ) ) ? strip_tags ( $new_instance['recipient'] ) : '',
            'subject' => ( !empty ( $new_instance['subject'] ) ) ? strip_tags ( $new_instance['subject'] ) : '',
        );
        return $instance;
    }
    
}
?>