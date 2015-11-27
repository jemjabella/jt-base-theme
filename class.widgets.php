<?php

class BTAddress_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'BTAddress_Widget',
			__( 'Address Widget', 'jtbt' ),
			array( 'description' => __( 'Display address as defined in Theme Settings', 'jtbt' ), )
		);
	}
	
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( !empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		if ( !empty( $instance['text'] ) ) {
			echo wpautop( $instance['text'] );
		}
		
		$jt_base_options = get_option( 'jt_base_options' );
		$address = null;
		
		if ( isset( $jt_base_options['company_name'] ) ) 
			$address .= '<br>'. esc_attr( $jt_base_options['company_name'] );
		if ( isset( $jt_base_options['address_1'] ) )
			$address .= '<br>'. esc_attr( $jt_base_options['address_1'] );
		if ( isset( $jt_base_options['address_2'] ) )
			$address .= '<br>'. esc_attr( $jt_base_options['address_2'] );
		if ( isset( $jt_base_options['town_city'] ) )
			$address .= '<br>'. esc_attr( $jt_base_options['town_city'] );
		if ( isset( $jt_base_options['postcode'] ) )
			$address .= '<br>'. esc_attr( $jt_base_options['postcode'] );
		
		echo wpautop( $address );
		
		
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'jtbt' );
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

<?php
		$text = !empty( $instance['text'] ) ? $instance['text'] : '';
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text before address:' ); ?></label> 
		<textarea class="widefat" cols="20" rows="16" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_attr( $text ); ?></textarea>
		</p>

<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_kses( $new_instance['text'] ) : '';

		return $instance;
	}
}

class BTContact_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'BTContact_Widget',
			__( 'Contact Details Widget', 'jtbt' ),
			array( 'description' => __( 'Display contact details as defined in Theme Settings', 'jtbt' ), )
		);
	}
	
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( !empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		if ( !empty( $instance['text'] ) ) {
			echo wpautop( $instance['text'] );
		}
		
		$jt_base_options = get_option( 'jt_base_options' );
		
		$telpref = !empty( $instance['telpref'] ) ? $instance['telpref'] : __( 'Tel:', 'jtbt' );
		$faxpref = !empty( $instance['faxpref'] ) ? $instance['faxpref'] : __( 'Fax:', 'jtbt' );
		$emlpref = !empty( $instance['emlpref'] ) ? $instance['emlpref'] : __( 'Email:', 'jtbt' );
		
		$contact = null;
		if ( !empty( $jt_base_options['telephone'] ) )
			$contact .= $telpref . $jt_base_options['telephone'] .'<br>';
		if ( !empty( $jt_base_options['fax'] ) )
			$contact .= $faxpref . $jt_base_options['fax'] .'<br>';
		if ( !empty( $jt_base_options['email'] ) )
			$contact .= $emlpref . $jt_base_options['email'] .'<br>';
		
		echo wpautop( $contact );
		
		
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'jtbt' );
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

<?php
		$text = !empty( $instance['text'] ) ? $instance['text'] : '';
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text before contact details:' ); ?></label> 
		<textarea class="widefat" cols="20" rows="16" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
		</p>

<?php
		$telpref = !empty( $instance['telpref'] ) ? $instance['telpref'] : '';
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'telpref' ); ?>"><?php _e( 'Telephone prefix:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'telpref' ); ?>" name="<?php echo $this->get_field_name( 'telpref' ); ?>" type="text" value="<?php echo esc_attr( $telpref ); ?>">
		</p>

<?php
		$faxpref = !empty( $instance['faxpref'] ) ? $instance['faxpref'] : '';
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'faxpref' ); ?>"><?php _e( 'Fax prefix:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'faxpref' ); ?>" name="<?php echo $this->get_field_name( 'faxpref' ); ?>" type="text" value="<?php echo esc_attr( $faxpref ); ?>">
		</p>

<?php
		$emlpref = !empty( $instance['emlpref'] ) ? $instance['emlpref'] : '';
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'emlpref' ); ?>"><?php _e( 'E-mail prefix:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'emlpref' ); ?>" name="<?php echo $this->get_field_name( 'emlpref' ); ?>" type="text" value="<?php echo esc_attr( $emlpref ); ?>">
		</p>

<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_kses( $new_instance['text'] ) : '';
		$instance['telpref'] = ( ! empty( $new_instance['telpref'] ) ) ? wp_kses( $new_instance['telpref'] ) : '';
		$instance['faxpref'] = ( ! empty( $new_instance['faxpref'] ) ) ? wp_kses( $new_instance['faxpref'] ) : '';
		$instance['emlpref'] = ( ! empty( $new_instance['emlpref'] ) ) ? wp_kses( $new_instance['emlpref'] ) : '';

		return $instance;
	}
}

class BTSocMed_Widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'BTSocMed_Widget',
			__( 'Social Media Widget', 'jtbt' ),
			array( 'description' => __( 'Display social media links as defined in Theme Settings', 'jtbt' ), )
		);
	}
	
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( !empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		if ( !empty( $instance['text'] ) ) {
			echo wpautop( $instance['text'] );
		}
		
		$jt_base_options = get_option( 'jt_base_options' );
		
		$social_media = '<ul class="social-media-list">';
		
		if ( isset( $jt_base_options['facebook'] ) )
			$social_media .= '<li class="facebook"><a href="'. esc_url( $jt_base_options['facebook'] ) .'">facebook</a></li>';		
		if ( isset( $jt_base_options['twitter'] ) )
			$social_media .= '<li class="twitter"><a href="'. esc_url( $jt_base_options['twitter'] ) .'">twitter</a></li>';
		if ( isset( $jt_base_options['linkedin'] ) )
			$social_media .= '<li class="linkedin"><a href="'. esc_url( $jt_base_options['linkedin'] ) .'">linkedin</a></li>';
		if ( isset( $jt_base_options['gplus'] ) )
			$social_media .= '<li class="gplus"><a href="'. esc_url( $jt_base_options['gplus'] ) .'">gplus</a></li>';
		if ( isset( $jt_base_options['pinterest'] ) )
			$social_media .= '<li class="pinterest"><a href="'. esc_url( $jt_base_options['pinterest'] ) .'">pinterest</a></li>';
		if ( isset( $jt_base_options['youtube'] ) )
			$social_media .= '<li class="youtube"><a href="'. esc_url( $jt_base_options['youtube'] ) .'">youtube</a></li>';
		
		$social_media = '</ul>';
		
		echo $social_media;
		
		
		echo $args['after_widget'];
	}
	
	public function form( $instance ) {
		$title = !empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'jtbt' );
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

<?php
		$text = !empty( $instance['text'] ) ? $instance['text'] : '';
?>
		<p>
		<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text before social media links:' ); ?></label> 
		<textarea class="widefat" cols="20" rows="16" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo esc_textarea( $text ); ?></textarea>
		</p>
<?php
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? wp_kses( $new_instance['text'] ) : '';

		return $instance;
	}
}

function register_jems_bt_widgets() {
	register_widget( 'BTAddress_Widget' );
	register_widget( 'BTContact_Widget' );
}

if ( class_exists( 'jtThemeBackend' ) === true ) {
	add_action( 'widgets_init', 'register_jems_bt_widgets' );
}