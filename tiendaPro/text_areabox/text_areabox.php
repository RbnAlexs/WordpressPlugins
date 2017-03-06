<?php

/*
Plugin Name: Text Area Box
Plugin URI: No public
Description: Muestra un espacio para insertar texto aleatorio
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: text-area-box
*/

// Creating the widget 
class text_areabox extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'text_areabox', 
// Nombre público del widget en UI
__('Text Area Box', 'text_areabox_widget_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra un cuadro para insertar texto aleatorio' ), ) 
);
}

public function widget( $args, $instance ) { 
$text = apply_filters( 'mytheme_widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
$extra_small = apply_filters( 'widget_extra_small', $instance['extra_small'] );
$small = apply_filters( 'widget_small', $instance['small'] );
$medium = apply_filters( 'widget_medium', $instance['medium'] );

		echo $args['before_widget']; 
			?>
			 <div class="<?php echo "col-xs-".$instance["extra_small"]; echo " col-sm-".$instance["small"]; echo " col-md-".$instance["medium"];?>">

				<?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>
			</div>

			<?php
		echo $args['after_widget'];

}

// Widget Backend 
public function form( $instance ) { 

if ( isset( $instance[ 'extra_small' ] ) ) {
	$extra_small = $instance[ 'extra_small' ];
	}
	else {
	}

	if ( isset( $instance[ 'small' ] ) ) {
	$small = $instance[ 'small' ];
	}
	else {
	}

	if ( isset( $instance[ 'medium' ] ) ) {
	$medium = $instance[ 'medium' ];
	}
	else {
	}

	$instance = wp_parse_args( (array) $instance, array('text' => ''));    
    $text = esc_textarea($instance['text']); 

?>


	<p>
	<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Insertar Script aquí' ); ?></label> 
		<textarea class="widefat" rows="10" cols="15" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>">
	        <?php echo $text; ?>
		</textarea>
	</p>

	<!--Parte extra small-->
	<p>
	<label for="<?php echo $this->get_field_id( 'extra_small' ); ?>"><?php _e( 'Asigne el no. columnas (XS):' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'extra_small' ); ?>" name="<?php echo $this->get_field_name( 'extra_small' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $extra_small ); ?>" />
	</p>

	<!--Parte  small-->
	<p>
	<label for="<?php echo $this->get_field_id( 'small' ); ?>"><?php _e( 'Asigne el no. de columnas (SM):' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'small' ); ?>" name="<?php echo $this->get_field_name( 'small' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $small ); ?>" />
	</p>

	<!--Parte medium-->  
	<p>
	<label for="<?php echo $this->get_field_id( 'medium' ); ?>"><?php _e( 'Asigne el no. de columnas (MD):' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'medium' ); ?>" name="<?php echo $this->get_field_name( 'medium' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $medium ); ?>" />
	</p>  


<?php 
}
    
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) { 
	$instance = array();	
	$instance['extra_small'] = ( ! empty( $new_instance['extra_small'] ) ) ? strip_tags( $new_instance['extra_small'] ) : '';
$instance['small'] = ( ! empty( $new_instance['small'] ) ) ? strip_tags( $new_instance['small'] ) : '';
$instance['medium'] = ( ! empty( $new_instance['medium'] ) ) ? strip_tags( $new_instance['medium'] ) : '';


	if ( current_user_can('unfiltered_html') )
    $instance['text'] =  $new_instance['text']; 
return $instance;

}
} // Class postbox_widget ends here

// Register and load the widget
function wptab_load_widget() {
    register_widget( 'text_areabox' );
}
add_action( 'widgets_init', 'wptab_load_widget' );

?>