<?php

/*
Plugin Name: Related Article
Plugin URI: No public
Description: Muestra las notas relacionadas basadas en los tags
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: related_article
*/

// Creating the widget 
class related_article extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'related_article', 
// Nombre público del widget en UI
__('Related Article', 'related_article_widget_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra las notas relacionadas basadas en los tags' ), ) 
);
}

public function widget( $args, $instance ) { 
	$width = apply_filters( 'widget_width', $instance['width'] );
	$height = apply_filters( 'widget_height', $instance['height'] );
	
	echo $before_widget; 
			?>
	<div class="relatedposts"> 
	<h3>Artículos Relacionados</h3>  
	<?php  
    $orig_post = $post;  
    global $post;  
    $tags = wp_get_post_tags($post->ID);  
      
    if ($tags) {  
    $tag_ids = array();  
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
    $args=array(  
    'tag__in' => $tag_ids,  
    'post__not_in' => array($post->ID),  
    'posts_per_page'=>3, // Number of related posts to display.  
    'caller_get_posts'=>1  
    );  
      
    $my_query = new wp_query( $args );  
  
    while( $my_query->have_posts() ) {  
    $my_query->the_post();  
    ?>  
      
    <div class="related">
    	<div class="thumb" style="height:<?php echo $instance["height"] ?>px">  
        <a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
        <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
    	<?php the_post_thumbnail(); ?> 
        </a>
        </div> 
        <a href="<?php the_permalink()?>"><?php the_title(); ?></a>
    </div>  

    <? }  
    }  
    $post = $orig_post;  
    wp_reset_query();  
    ?>  
    </div>
	<?php
	echo $after_widget;
}
// Widget Backend 
public function form( $instance ) {
	if ( isset( $instance[ 'related' ] ) ) {
	$related = $instance[ 'related' ];
	}
	else {
	}
	if ( isset( $instance[ 'width' ] ) ) {
	$width = $instance[ 'width' ];
	}
	else {
	}
	if ( isset( $instance[ 'height' ] ) ) {
	$height = $instance[ 'height' ];
	}
	else {
	}
		
?>
	<p>
	<label for="<?php echo $this->get_field_id( 'related' ); ?>"><?php _e( 'Mostrar notas relacionadas' ); ?></label> 
	<input class="checkbox" type="checkbox" <?php checked($instance['related'], 'on'); ?> id="<?php echo $this->get_field_id('related'); ?>" name="<?php echo $this->get_field_name('related'); ?>" />  
	</p>

	<p>
	<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Ancho:' ); ?></label>
	<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>" />
	<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Alto:' ); ?></label>
	<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" />
	</p>
<?php 
}
    
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) { 
$instance = array();
	$instance['related'] = ( ! empty( $new_instance['related'] ) ) ? strip_tags( $new_instance['related'] ) : '';
	$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
	$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';
return $instance;

}
} // Class postbox_widget ends here

// Register and load the widget
function wprp_load_widget() {
    register_widget( 'related_article' );
}
add_action( 'widgets_init', 'wprp_load_widget' );

?>