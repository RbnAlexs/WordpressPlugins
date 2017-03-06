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

		echo $args['before_widget']; 
			?>
				<?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>
			<?php
		echo $args['after_widget'];

}

// Widget Backend 
public function form( $instance ) { 

	$instance = wp_parse_args( (array) $instance, array('text' => ''));    
    $text = esc_textarea($instance['text']); 

?>
	<p>
	<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Insertar Script aquí' ); ?></label> 
		<textarea class="widefat" rows="10" cols="15" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>">
	        <?php echo $text; ?>
		</textarea>
	</p>
<?php 
}
    
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) { 
	$instance = array();				

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