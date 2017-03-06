<?php

/*
Plugin Name: Post_Elements_Widget
Plugin URI: No public
Description: Muestra la composición de las entradas. 
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: Post_Elements_Widget
*/

// Creating the widget 
class post_elements_widget extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'post_elements_widget', 
// Nombre público del widget en UI
__('Post Elements Widget', 'post_elements_widget_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra la composición de las entradas. ' ), ) 
);
}

public function widget( $args, $instance ) { 
	$text = apply_filters( 'mytheme_widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
$img = apply_filters( 'widget_img', $instance['img'] );
$cat = apply_filters( 'widget_cat', $instance['cat'] );
$tit = apply_filters( 'widget_tit', $instance['tit'] );
$descprod = apply_filters( 'widget_descprod', $instance['descprod'] );
$contprod = apply_filters( 'widget_contprod', $instance['contprod'] );
$width = apply_filters( 'widget_width', $instance['width'] );
$height = apply_filters( 'widget_height', $instance['height'] );



echo $args['before_widget']; ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php

if('on' == $instance['cat']) { ?>
	<div class="category_post">
	<h2><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h2>
    </div>
<?php } else { ?>
<?php }

 if('on' == $instance['tit']) { ?>
	<h1 class="title_post">
	<?php the_title(); ?>
    </h1>
    	<?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>
<?php } else { ?> <?php }


 if('on' == $instance['img']) { ?>
	<div class="thumbs" style="height:<?php echo $instance["height"] ?>px" title="<?php the_title(); ?>">
    <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
	<?php echo the_post_thumbnail(); ?></br>
    </div>
<?php } else { ?> <?php }  


if('on' == $instance['descprod']) { ?>
	<h2 class="description_post">
	<?php echo get_the_excerpt(); ?></br>
    </h2>
<?php } else { ?> <?php }

/*?>
<span class="date"><?php echo 'Publicado hace '. human_time_diff(get_the_time('U'), current_time('timestamp')); ?></span>
<?php*/

if('on' == $instance['contprod']) { ?>
	<div class="content">
	<?php the_content(); ?>
    </div>
<?php } else { ?>
<?php } ?>

<?php endwhile; ?>
<?php endif; ?>

<?php

echo $args['after_widget'];

}

public function form( $instance ) { 
if ( isset( $instance[ 'img' ] ) ) {
$img = $instance[ 'img' ];
}
else {
}
if ( isset( $instance[ 'cat' ] ) ) {
$cat = $instance[ 'cat' ];
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
if ( isset( $instance[ 'contprod' ] ) ) {
$contprod = $instance[ 'contprod' ];
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

  $instance = wp_parse_args( (array) $instance, array('text' => ''));    
    $text = esc_textarea($instance['text']); 
?>

<p>
<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'Mostrar Categoría:' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['cat'], 'on'); ?> 
id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e( 'Mostrar Imagen:' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['img'], 'on'); ?> 
id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" /></br>
<label><?php _e( 'Asigne el tamaño de la imagen en px:' ); ?></label></br>
<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Ancho:' ); ?></label>
<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>" />
<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Alto:' ); ?></label>
<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" />
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
<label for="<?php echo $this->get_field_id( 'contprod' ); ?>"><?php _e( 'Mostrar Contenido' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['contprod'], 'on'); ?> 
id="<?php echo $this->get_field_id('contprod'); ?>" name="<?php echo $this->get_field_name('contprod'); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Insertar Script aquí' ); ?></label> 
 <textarea class="widefat" rows="5" cols="5" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>">
        <?php echo $text; ?>
    </textarea>
</p>
<?php
}

public function update( $new_instance, $old_instance ) { 
$instance = array();
$instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
$instance['cat'] = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';
$instance['tit'] = ( ! empty( $new_instance['tit'] ) ) ? strip_tags( $new_instance['tit'] ) : '';
$instance['descprod'] = ( ! empty( $new_instance['descprod'] ) ) ? strip_tags( $new_instance['descprod'] ) : '';
$instance['contprod'] = ( ! empty( $new_instance['contprod'] ) ) ? strip_tags( $new_instance['contprod'] ) : '';
$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';

    if ( current_user_can('unfiltered_html') )
      $instance['text'] =  $new_instance['text']; 

return $instance;
}
}

function pew_load_widget() {
	register_widget( 'post_elements_widget' );
}
add_action( 'widgets_init', 'pew_load_widget' );

?>