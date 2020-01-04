<?php
class Cristiano_Social_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	function __construct() {
		parent::__construct(
			'cristiano_social', // Base ID
			'-' . esc_html__( 'Restaurant Social Links', 'cristiano' ), // Name
			array( 'description' => esc_html__( 'A list of social networks url', 'cristiano' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Follow Us', 'cristiano' ) : $instance['title'], $instance, $this->id_base );	
		$subtitle = apply_filters( 'widget_subtitle', empty( $instance['subtitle'] ) ? __( 'Join us on social networks', 'cristiano' ) : $instance['subtitle'], $instance, $this->id_base );	
		
		// outputs the content of the widget
		echo $args['before_widget'];
			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			if ( $subtitle ) {
				echo '<p>' . $subtitle . '</p>';
			}									
		get_template_part('template-parts/widget', 'social');
		echo $args['after_widget'];	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Follow Us', 'cristiano' );
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : esc_html__( 'Join us on social networks', 'cristiano' );
		
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'cristiano' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Subtitle:', 'cristiano'); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>">
		</p>		
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['subtitle'] = ( ! empty( $new_instance['subtitle'] ) ) ? strip_tags( $new_instance['subtitle'] ) : '';
		
		return $instance;		
	}
}