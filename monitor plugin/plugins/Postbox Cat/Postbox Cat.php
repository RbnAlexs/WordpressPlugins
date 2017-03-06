<?php

/*
Plugin Name: Related Article Category
Plugin URI: No public
Description: Muestra la composición del Related Article Category
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: recent-postbox-widget
*/

// Creating the widget 
class recent_postbox_cat extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'recent_postbox_cat', 
// Nombre público del widget en UI
__('Related Article Category', 'recent_postbox_cat_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra una serie de post recientes' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

$text = apply_filters( 'mytheme_widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
$title = apply_filters( 'widget_title', $instance['title'] );
$list = apply_filters( 'widget_list', $instance['list'] );
$thumb = apply_filters( 'widget_thumb', $instance['thumb'] );
$author = apply_filters( 'widget_author', $instance['author'] );
$date = apply_filters( 'widget_date', $instance['date(format)'] );
$excerpt = apply_filters( 'widget_excerpt', $instance['excerpt'] );
$repeat = apply_filters( 'widget_repeat', $instance['repeat'] );
$name = apply_filters( 'widget_name', $instance['name'] );
$ofst = apply_filters( 'widget_ofst', $instance['ofst'] );

$more_in = apply_filters( 'widget_more_in', $instance['more_in'] );

$extra_small = apply_filters( 'widget_extra_small', $instance['extra_small'] );
$small = apply_filters( 'widget_small', $instance['small'] );
$medium = apply_filters( 'widget_medium', $instance['medium'] );


$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr';
$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';

$cadena = $title;
$cadena = ereg_replace( "([ ]+)", "", $cadena );
$cadena = utf8_decode($cadena);
$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
$cadena = strtolower($cadena);
$cadena = utf8_encode($cadena);




// before and after widget arguments are defined by themes

echo $args['before_widget'];

// This is where you run the code and display the output ?>
      

<div class="<?php echo $title ?> ">

  <?php if('on' == $instance['more_in'] ) { ?>
   <div class="nombre_categoria"><h2> Más de <?php $category = get_the_category(); echo $category[0]->cat_name; ?> </h2></div>
  <?php }else {  } ?>

  <?php if('on' == $instance['name'] ) { ?>
   <?php if ( $title ){ echo ($title); } else { }?>
  <?php } else {  } ?>

  <div class="row">

  <?php
  global $post;
  $category = get_the_category($post->ID);
  $category = $category[0]->cat_ID;
  $myposts = get_posts(array('numberposts' =>$instance["repeat"], 'offset' => $instance["ofst"], 'category__in' => array($category), 'post__not_in' => array($post->ID),'post_status'=>'publish'));
  foreach($myposts as $post) :
  setup_postdata($post);
  ?>
  
  <div class="<?php echo "col-xs-".$instance["extra_small"]; echo " col-sm-".$instance["small"]; echo " col-md-".$instance["medium"];?>">
  <div>
   <?php if('on' == $instance['thumb'] ) { ?>
   <div class="imagen_categoria">
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
    <?php if ( has_post_thumbnail() ) {
    the_post_thumbnail();} else { ?> 
    <img src="<?php bloginfo('template_directory'); ?>/images/fallback_image.jpg" alt="<?php the_title(); ?>" />
    <?php } ?>
    </a>
   </div> 
   <?php } else { ?> <?php }?>

   <div class="titulo_categoria"><a href="<?php the_permalink() ?>"><?php the_title('')?></a></div>  
  
   <?php if('on' == $instance['excerpt'] ) { ?>
   <div class="extracto_categoria"><?php echo get_the_excerpt(); ?></div>
   <?php }else { } ?>


   <?php if('on' == $instance['date'] ) { ?>
   <span class="date"><?php echo 'Publicado hace '. human_time_diff(get_the_time('U'), current_time('timestamp')); ?></span>
   <?php } else {  } ?>

   <?php if('on' == $instance['author'] ) { ?>
   <span class="author"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></span>
   <?php } else { } ?>
  
  </div>
  </div>

<?php wp_reset_postdata();?>
<?php endforeach; ?>
  </div>
<span class="subscrize">
	<a href="/suscribirse/" rel="category tag"  data-fancybox-type="iframe" ><i class="fa fa-rss"></i><?php printf("Suscribase a %s",$title);?></a>
</span>
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


if ( isset( $instance[ 'more_in' ] ) ) {
$more_in = $instance[ 'more_in' ];
}
else {
}

if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
}
if ( isset( $instance[ 'thumb' ] ) ) {
$thumb = $instance[ 'thumb' ];
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
if ( isset( $instance[ 'excerpt' ] ) ) {
$excerpt = $instance[ 'excerpt' ];
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
if ( isset( $instance[ 'list' ] ) ) {
$list = $instance[ 'list' ];
}
else {
}
if ( isset( $instance[ 'repeat' ] ) ) {
$repeat = $instance[ 'repeat' ];
}
else {
}
if ( isset ($instance['boton'])){
    $boton = $instance ['boton'];
}
else{
}
if ( isset ($instance['name'])){
    $boton = $instance ['name'];
}
else{
}if ( isset ($instance['ofst'])){
    $ofst = $instance ['ofst'];
}
else{
}

  $instance = wp_parse_args( (array) $instance, array('text' => ''));    
    $text = esc_textarea($instance['text']); 

// Widget admin form

?>

<!-- Parte del nombre -->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['name'], 'on'); ?> id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" />    
<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Mostrar el nombre del widget' ); ?></label> 
</p>

<!--Parte de la categoria-->
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Escriba el nombre de la sección:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" style= "width:70%" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>

<!-- Parte del more in... -->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['more_in'], 'on'); ?> id="<?php echo $this->get_field_id('more_in'); ?>" name="<?php echo $this->get_field_name('more_in'); ?>" />    
<label for="<?php echo $this->get_field_id( 'more_in' ); ?>"><?php _e( 'Mostrar "Más de..."' ); ?></label> 
</p>

<!--Parte del Thumb-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['thumb'], 'on'); ?> id="<?php echo $this->get_field_id('thumb'); ?>" name="<?php echo $this->get_field_name('thumb'); ?>" />    
<label for="<?php echo $this->get_field_id( 'thumb' ); ?>"><?php _e( 'Mostrar la imagen de la entrada' ); ?></label> 
</p>

<!--Parte del Excerpt-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['excerpt'], 'on'); ?> id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>" />  
<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e( 'Mostrar el extracto de la entrada' ); ?></label> 
</p>

<!--Parte del Date-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['date'], 'on'); ?> id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" />   
<label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e( 'Mostrar la fecha de la entrada' ); ?></label> 
</p>

<!--Parte del Author-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['author'], 'on'); ?> id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>" />       
<label for="<?php echo $this->get_field_id( 'author' ); ?>"><?php _e( 'Mostrar el autor de la entrada' ); ?></label> 
</p>

<!--Parte del número de post-->
<p>
<label for="<?php echo $this->get_field_id( 'repeat' ); ?>"><?php _e( 'Asigne el número de entradas a mostrar:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'repeat' ); ?>" name="<?php echo $this->get_field_name( 'repeat' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $repeat ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'ofst' ); ?>"><?php _e( 'Asigne el número de entradas a omitir:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'ofst' ); ?>" name="<?php echo $this->get_field_name( 'ofst' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $ofst ); ?>" />
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
$instance['list'] = ( ! empty( $new_instance['list'] ) ) ? strip_tags( $new_instance['list'] ) : '';
$instance['thumb'] = ( ! empty( $new_instance['thumb'] ) ) ? strip_tags( $new_instance['thumb'] ) : '';
$instance['author'] = ( ! empty( $new_instance['author'] ) ) ? strip_tags( $new_instance['author'] ) : '';
$instance['date'] = ( ! empty( $new_instance['date'] ) ) ? strip_tags( $new_instance['date'] ) : '';
$instance['excerpt'] = ( ! empty( $new_instance['excerpt'] ) ) ? strip_tags( $new_instance['excerpt'] ) : '';
$instance['repeat'] = ( ! empty( $new_instance['repeat'] ) ) ? strip_tags( $new_instance['repeat'] ) : '';
$instance['boton'] = ( ! empty( $new_instance['boton'] ) ) ? strip_tags( $new_instance['boton'] ) : '';
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
$instance['ofst'] = ( ! empty( $new_instance['ofst'] ) ) ? strip_tags( $new_instance['ofst'] ) : '';
$instance['more_in'] = ( ! empty( $new_instance['more_in'] ) ) ? strip_tags( $new_instance['more_in'] ) : '';
$instance['extra_small'] = ( ! empty( $new_instance['extra_small'] ) ) ? strip_tags( $new_instance['extra_small'] ) : '';
$instance['small'] = ( ! empty( $new_instance['small'] ) ) ? strip_tags( $new_instance['small'] ) : '';
$instance['medium'] = ( ! empty( $new_instance['medium'] ) ) ? strip_tags( $new_instance['medium'] ) : '';


    if ( current_user_can('unfiltered_html') )
      $instance['text'] =  $new_instance['text']; 

return $instance;
}
} // Class postbox_widget ends here

// Register and load the widget
function wrpbcat_load_widget() {
    register_widget( 'recent_postbox_cat' );
}
add_action( 'widgets_init', 'wrpbcat_load_widget' );

?>