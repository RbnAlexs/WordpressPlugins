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

$repeat = apply_filters( 'widget_repeat', $instance['repeat'] );
$extra_small = apply_filters( 'widget_extra_small', $instance['extra_small'] );
$small = apply_filters( 'widget_small', $instance['small'] );
$medium = apply_filters( 'widget_medium', $instance['medium'] );
$img = apply_filters( 'widget_img', $instance['img'] );
$tit = apply_filters( 'widget_tit', $instance['tit'] );
$author = apply_filters( 'widget_author', $instance['author'] );
$date = apply_filters( 'widget_date', $instance['date'] );
$excerpt = apply_filters( 'widget_excerpt', $instance['excerpt'] );
$title = apply_filters( 'widget_title', $instance['title'] );
$name = apply_filters( 'widget_name', $instance['name'] );


$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr';
$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
$cadena = $title;
$cadena = ereg_replace( "([ ]+)", "", $cadena );
$cadena = utf8_decode($cadena);
$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
$cadena = strtolower($cadena);
$cadena = utf8_encode($cadena);


echo $before_widget; ?>

<div class="<?php echo ($cadena); ?>"> 

 <?php if('on' == $instance['name'] ) { ?>
 <?php if ( $title ){ echo "<h2>"; echo ($title); echo "</h2>"; } else { }?>
 <?php } else { } ?>

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
    'posts_per_page'=>$instance["repeat"],  
    'caller_get_posts'=>1  
 );  
 $my_query = new wp_query( $args );  
 while( $my_query->have_posts() ) {  
 $my_query->the_post(); ?>  


 <div class="<?php echo "col-xs-".$instance["extra_small"]; echo " col-sm-".$instance["small"]; echo " col-md-".$instance["medium"];?>">
  
  <?php if('on' == $instance['img']) { ?>
  <div class="imagen">  
  <a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
    	<?php if ( has_post_thumbnail() ) {
        the_post_thumbnail();} else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/images/fallback_image.jpg" alt="<?php the_title(); ?>" />
        <?php } ?>
  </a>
  </div>
  <?php } else { } ?> 
	     
  <?php if('on' == $instance['tit']) { ?>
  <a href="<?php the_permalink()?>"><?php the_title(); ?></a>
  <?php } else { } ?> 

  <?php if('on' == $instance['author'] ) { ?>
  <span class="autor"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></span>
  <?php } else { } ?>

  <?php if('on' == $instance['date'] ) { ?>
  <span class="fecha"><?php echo 'Publicado hace '. human_time_diff(get_the_time('U'), current_time('timestamp')); ?></span>
  <?php } else { }?>

  <?php if('on' == $instance['excerpt'] ) { ?>
  <p><?php echo get_the_excerpt(); ?></p>
  <?php }else { } ?>

</div>  


 <? }  
 }$post = $orig_post;  
 wp_reset_query(); ?>  

</div>

<?php echo $after_widget; }
// Widget Backend 
public function form( $instance ) {

	if ( isset ($instance['name'])){
    $boton = $instance ['name'];
	}
	else{
	}

	if ( isset( $instance[ 'title' ] ) ) {
	$title = $instance[ 'title' ];
	}
	else {
	}

	if ( isset( $instance[ 'related' ] ) ) {
	$related = $instance[ 'related' ];
	}
	else {
	}

	if ( isset( $instance[ 'repeat' ] ) ) {
	$repeat = $instance[ 'repeat' ];
	}
	else {
	}

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

	if ( isset( $instance[ 'author' ] ) ) {
	$author = $instance[ 'author' ];
	}
	else {
	}

	if ( isset( $instance[ 'date' ] ) ) {
	$date = $instance[ 'date' ];
	}
	else {
	}

	if ( isset( $instance[ 'excerpt' ] ) ) {
	$excerpt = $instance[ 'excerpt' ];
	}
	else {
	}

?>
	

	<!--Nombre de la sección-->
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Escriba el nombre de la sección:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" style= "width:70%" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>

	<!-- Mostrar nombre de la sección -->
	<p>
	<input class="checkbox" type="checkbox" <?php checked($instance['name'], 'on'); ?> id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" />    
	<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Mostrar el nombre del widget' ); ?></label> 
	</p>


	<!--Titulo-->
	<p>
	<input class="checkbox" type="checkbox" <?php checked($instance['tit'], 'on'); ?> 
	id="<?php echo $this->get_field_id('tit'); ?>" name="<?php echo $this->get_field_name('tit'); ?>" />
	<label for="<?php echo $this->get_field_id( 'tit' ); ?>"><?php _e( 'Mostrar Titulo' ); ?></label> 
	</p>

	<!--Imagen-->
	<p>
	<input class="checkbox" type="checkbox" <?php checked($instance['img'], 'on'); ?> 
	id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" />
	<label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e( 'Mostrar Imagen' ); ?></label> 
	</p>

	<!--Autor-->
	<p>
	<input class="checkbox" type="checkbox" <?php checked($instance['author'], 'on'); ?> 
	id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>" />
	<label for="<?php echo $this->get_field_id( 'author' ); ?>"><?php _e( 'Mostrar Autor' ); ?></label> 
	</p>

	<!--Fecha-->
	<p>
	<input class="checkbox" type="checkbox" <?php checked($instance['date'], 'on'); ?> 
	id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" />
	<label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e( 'Mostrar Fecha' ); ?></label> 
	</p>

	<!--Extracto-->
	<p>
	<input class="checkbox" type="checkbox" <?php checked($instance['excerpt'], 'on'); ?> 
	id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>" />
	<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e( 'Mostrar Extracto' ); ?></label> 
	</p>

	<!--Parte del número de post-->
	<p>
	<label for="<?php echo $this->get_field_id( 'repeat' ); ?>"><?php _e( 'Asigne el no. de entradas:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'repeat' ); ?>" name="<?php echo $this->get_field_name( 'repeat' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $repeat ); ?>" />
	
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
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['related'] = ( ! empty( $new_instance['related'] ) ) ? strip_tags( $new_instance['related'] ) : '';
$instance['repeat'] = ( ! empty( $new_instance['repeat'] ) ) ? strip_tags( $new_instance['repeat'] ) : '';
$instance['extra_small'] = ( ! empty( $new_instance['extra_small'] ) ) ? strip_tags( $new_instance['extra_small'] ) : '';
$instance['small'] = ( ! empty( $new_instance['small'] ) ) ? strip_tags( $new_instance['small'] ) : '';
$instance['medium'] = ( ! empty( $new_instance['medium'] ) ) ? strip_tags( $new_instance['medium'] ) : '';
$instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
$instance['tit'] = ( ! empty( $new_instance['tit'] ) ) ? strip_tags( $new_instance['tit'] ) : '';
$instance['author'] = ( ! empty( $new_instance['author'] ) ) ? strip_tags( $new_instance['author'] ) : '';
$instance['date'] = ( ! empty( $new_instance['date'] ) ) ? strip_tags( $new_instance['date'] ) : '';
$instance['excerpt'] = ( ! empty( $new_instance['excerpt'] ) ) ? strip_tags( $new_instance['excerpt'] ) : '';
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';


return $instance;


 
}
} // Class postbox_widget ends here

// Register and load the widget
function wprp_load_widget() {
    register_widget( 'related_article' );
}
add_action( 'widgets_init', 'wprp_load_widget' );

?>