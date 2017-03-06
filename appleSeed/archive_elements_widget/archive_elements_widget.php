<?php

/*
Plugin Name: Archive Elements Widget
Plugin URI: No public
Description: Muestra la composición de las categoría.
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: Archive Elements Widget
*/

// Creating the widget 
class archive_elements_widget extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'archive_elements_widget', 
// Nombre público del widget en UI
__('Archive Elements Widget', 'archive_elements_widget_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra la composición del sistema de archivos' ), ) 
);
}

public function widget( $args, $instance ) { 
$img = apply_filters( 'widget_img', $instance['img'] );
$tit = apply_filters( 'widget_tit', $instance['tit'] );
$descprod = apply_filters( 'widget_descprod', $instance['descprod'] );
$readmore = apply_filters( 'widget_readmore', $instance['readmore'] );
$extra_small = apply_filters( 'widget_extra_small', $instance['extra_small'] );
$small = apply_filters( 'widget_small', $instance['small'] );
$medium = apply_filters( 'widget_medium', $instance['medium'] );

echo $args['before_widget']; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="row">
    <div class="cat_post">
 <?php
  if('on' == $instance['tit']) { ?>
 
    <h2 class="title_cat"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php } else { ?> <?php }

 if('on' == $instance['img']) { ?>
 
	<div class="thumbs">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <?php set_post_thumbnail_size(); ?>
	<?php if ( has_post_thumbnail() ) {
        the_post_thumbnail();} else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/images/fallback_image.jpg" alt="<?php the_title(); ?>" />
    <?php } ?>
	</a>
    </div>

<?php } else { ?> <?php }  
/*
?>
<span class="date"><?php echo 'Publicado hace '. human_time_diff(get_the_time('U'), current_time('timestamp')); ?></span>
<?php
*/
if('on' == $instance['descprod']) { ?>
	<div class="excerpt_cat">
	<h5><?php the_excerpt(); ?></h5>
    </div>
<?php } else { ?> <?php }

if('on' == $instance['readmore']) { ?>
	<div class="readmore">
	<a href="<?php the_permalink(); ?>">Ver más</a>
    </div>
<?php } else { ?> <?php }?>


</div>
</div>

 
<?php endwhile; ?>
<?php endif; ?>
<?php
if ( function_exists('bootstrap_pagination') ) {
  bootstrap_pagination();
}
?>
<?php

echo $args['after_widget'];

}

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
if ( isset( $instance[ 'img' ] ) ) {
$img = $instance[ 'img' ];
}
else {
}
if ( isset( $instance[ 'tit' ] ) ) {
$tit = $instance[ 'tit' ];
}
else {
}
if ( isset( $instance[ 'descprod' ] ) ) {
$descprod = $instance[ 'descprod' ];
}
else {
}
if ( isset( $instance[ 'readmore' ] ) ) {
$readmore = $instance[ 'readmore' ];
}
else {
}

?>

<p>
<label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e( 'Mostrar Imagen:' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['img'], 'on'); ?> 
id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" /></br>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'tit' ); ?>"><?php _e( 'Mostrar Titulo' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['tit'], 'on'); ?> 
id="<?php echo $this->get_field_id('tit'); ?>" name="<?php echo $this->get_field_name('tit'); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'descprod' ); ?>"><?php _e( 'Mostrar Descripción' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['descprod'], 'on'); ?> 
id="<?php echo $this->get_field_id('descprod'); ?>" name="<?php echo $this->get_field_name('descprod'); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'readmore' ); ?>"><?php _e( 'Mostrar Botón "Ver Más"' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['readmore'], 'on'); ?> 
id="<?php echo $this->get_field_id('readmore'); ?>" name="<?php echo $this->get_field_name('readmore'); ?>" />
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

public function update( $new_instance, $old_instance ) { 
$instance = array();
$instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
$instance['tit'] = ( ! empty( $new_instance['tit'] ) ) ? strip_tags( $new_instance['tit'] ) : '';
$instance['descprod'] = ( ! empty( $new_instance['descprod'] ) ) ? strip_tags( $new_instance['descprod'] ) : '';
$instance['readmore'] = ( ! empty( $new_instance['readmore'] ) ) ? strip_tags( $new_instance['readmore'] ) : '';
$instance['extra_small'] = ( ! empty( $new_instance['extra_small'] ) ) ? strip_tags( $new_instance['extra_small'] ) : '';
$instance['small'] = ( ! empty( $new_instance['small'] ) ) ? strip_tags( $new_instance['small'] ) : '';
$instance['medium'] = ( ! empty( $new_instance['medium'] ) ) ? strip_tags( $new_instance['medium'] ) : '';

return $instance;
}
}

function aew_load_widget() {
	register_widget( 'archive_elements_widget' );
}
add_action( 'widgets_init', 'aew_load_widget' );

?>