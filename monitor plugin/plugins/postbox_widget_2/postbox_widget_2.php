<?php

/*
Plugin Name: Postbox Widget 2 
Plugin URI: No public
Description: Muestra la composición de una o varias publicaciones de una categoría específica. 
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: postbox-widget
*/

// Creating the widget 
class postbox_widget_2 extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'postbox_widget_2', 
// Nombre público del widget en UI
__('Postbox Widget 2', 'postbox_widget_2_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra la composición de una o varias publicaciones de una categoría específica. ' ), ) 
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
$author_image = apply_filters( 'widget_author_image', $instance['author_image'] );

$date = apply_filters( 'widget_date', $instance['date(format)'] );
$excerpt = apply_filters( 'widget_excerpt', $instance['excerpt'] );
$repeat = apply_filters( 'widget_repeat', $instance['repeat'] );
$name = apply_filters( 'widget_name', $instance['name'] );
$ofst = apply_filters( 'widget_ofst', $instance['ofst'] );
$category = apply_filters( 'widget_category', $instance['category'] );
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


<?php if ( $repeat >= 1 ) { ?>  

<div class="<?php echo ($cadena); ?>">
    
    <?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>

    <?php if('on' == $instance['name'] ) { ?>
    <?php if ( $title ){ echo "<h2>"; echo ($title); echo "</h2>"; } else { }?>
    <?php } else { } ?>


    <?php $recent = new WP_Query('cat='. $instance["list"] .'&showposts=' . $instance["repeat"] . '&offset=' . $instance["ofst"] ); 
    while($recent->have_posts()) : $recent->the_post();?>
    
    <div class="<?php echo "col-xs-".$instance["extra_small"]; echo " col-sm-".$instance["small"]; echo " col-md-".$instance["medium"];?>">
    <div class="<?php echo "inner".$repeat; ?>">
    <?php if(current_user_can("manage_options")) :?>
	<span class="subscrize">
		<a href="<?php printf("%s?cat=%d","/desuscribirse/",$cat_id);?>" rel="category tag"  data-fancybox-type="iframe" ><i class="fa fa-rss"></i> <?php printf("Gestione sus suscripciones");?></a>
	</span>
	<?php endif; ?>
    <div class="titulo">
    <h3 class="lead"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>  
    </div>

    <?php if('on' == $instance['thumb']) { ?>
    <div class="<?php echo "thumb_".$repeat; ?>"> 
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
    <?php if ( has_post_thumbnail() ) {
    the_post_thumbnail();} else { ?>
    <img src="<?php bloginfo('template_directory'); ?>/images/fallback_image.jpg" alt="<?php the_title(); ?>" />
    <?php } ?> 
    </a>
    </div>
    <?php } else { }?>

    <?php if('on' == $instance['author_image'] ) { ?>
    <span class="author_image"><?php echo get_avatar(get_the_author_meta('ID')); ?> <?php get_avatar(); ?></span>
    <?php } else { } ?>  



    <?php if('on' == $instance['author'] ) { ?>
    <span class="author"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?> </a></span>
    <?php } else { } ?>  

    <?php if('on' == $instance['date'] ) { ?>
    <span class="fecha"><?php echo 'Publish on '; the_time('F j, Y'); ?></span>
    <?php } else { } ?>

    <?php if('on' == $instance['excerpt'] ) { ?>
    <div class="<?php echo "extracto_".$repeat; ?>"><?php echo get_the_excerpt(); ?></div>
    <?php } else { } ?>    
   
    <?php if('on' == $instance['category'] ) { ?>
    <div class="<?php echo "categoria_".$repeat; ?>">
    <?php $category = get_the_category(); $category_link = get_category_link($category[0]);?>
    <a href="<?php echo $category_link; ?>">
    <?php $category = get_the_category(); echo "Portada"; $main_title = $category[0]->cat_name; $cat_id =  $category[0]->term_id; //$category[0]->cat_name;  ?>
    </a>
    </div>
    <?php } else {} ?>
</div>
<?php if( ('on' == $instance['name']  || 'on' == $instance['category']) && current_user_can("manage_options")) { ?>
<span class="subscrize">
	<a href="<?php printf("%s?cat=%d","/suscribirse/",$cat_id);?>" rel="category tag"  data-fancybox-type="iframe" ><i class="fa fa-rss"></i> <?php printf("Suscribase a noticias de %s",$main_title );?></a>
</span>
<?php  } ?>
</div>

<?php $repeat--; endwhile; ?>


</div>
<?php  } ?>
  

<?php

echo $args['after_widget'];

}
        
// Widget Backend 
public function form( $instance ) {

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
if ( isset( $instance[ 'author_image' ] ) ) {
$author_image = $instance[ 'author_image' ]; 
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
}
if ( isset ($instance['ofst'])){
    $ofst = $instance ['ofst'];
}
else{
}
if ( isset ($instance['category'])){
    $category = $instance ['category'];
}
else{
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

<!--Parte de la selección de Categoria-->
<p>
<label for="<?php echo $this->get_field_id( 'list' ); ?>"><?php _e( 'Elija una categoría:' ); ?></label> 
    <?php wp_dropdown_categories( array(
    'name' => $this->get_field_name( 'list' ),
    'selected' => $instance["list"]
        ) );
    ?>
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

<!--Parte de categoría-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['category'], 'on'); ?> id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" />  
<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Mostrar categoria' ); ?></label> 
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

<p>
<input class="checkbox" type="checkbox" <?php checked($instance['author_image'], 'on'); ?> id="<?php echo $this->get_field_id('author_image'); ?>" name="<?php echo $this->get_field_name('author_image'); ?>" />     
<label for="<?php echo $this->get_field_id( 'author_image' ); ?>"><?php _e( 'Mostrar el imagen del autor de la entrada' ); ?></label> 
</p>


<p>
<input class="checkbox" type="checkbox" <?php checked($instance['boton'], 'on'); ?> id="<?php echo $this->get_field_id('boton'); ?>" name="<?php echo $this->get_field_name('boton'); ?>" />  
<label for="<?php echo $this->get_field_id( 'boton' ); ?>"><?php _e( 'Mostrar "ver más"' ); ?></label> 
</p>


<!--Parte del número de post-->
<p>
<label for="<?php echo $this->get_field_id( 'repeat' ); ?>"><?php _e( 'Asigne el no. de entradas a mostrar:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'repeat' ); ?>" name="<?php echo $this->get_field_name( 'repeat' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $repeat ); ?>" />

</p>

<p>
<label for="<?php echo $this->get_field_id( 'ofst' ); ?>"><?php _e( 'Asigne el no. de entradas a omitir:' ); ?></label> 
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

    
<p>
<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Insertar Script aquí' ); ?></label> 
    <textarea class="widefat" rows="5" cols="5" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>">
        <?php echo $text; ?>
    </textarea>
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
$instance['author_image'] = ( ! empty( $new_instance['author_image'] ) ) ? strip_tags( $new_instance['author_image'] ) : '';

$instance['date'] = ( ! empty( $new_instance['date'] ) ) ? strip_tags( $new_instance['date'] ) : '';
$instance['excerpt'] = ( ! empty( $new_instance['excerpt'] ) ) ? strip_tags( $new_instance['excerpt'] ) : '';
$instance['repeat'] = ( ! empty( $new_instance['repeat'] ) ) ? strip_tags( $new_instance['repeat'] ) : '';
$instance['boton'] = ( ! empty( $new_instance['boton'] ) ) ? strip_tags( $new_instance['boton'] ) : '';
$instance['name'] = ( ! empty( $new_instance['name'] ) ) ? strip_tags( $new_instance['name'] ) : '';
$instance['ofst'] = ( ! empty( $new_instance['ofst'] ) ) ? strip_tags( $new_instance['ofst'] ) : '';
$instance['category'] = ( ! empty( $new_instance['category'] ) ) ? strip_tags( $new_instance['category'] ) : '';
$instance['extra_small'] = ( ! empty( $new_instance['extra_small'] ) ) ? strip_tags( $new_instance['extra_small'] ) : '';
$instance['small'] = ( ! empty( $new_instance['small'] ) ) ? strip_tags( $new_instance['small'] ) : '';
$instance['medium'] = ( ! empty( $new_instance['medium'] ) ) ? strip_tags( $new_instance['medium'] ) : '';

    if ( current_user_can('unfiltered_html') )
      $instance['text'] =  $new_instance['text']; 

return $instance;
}
} // Class postbox_widget_2 ends here

// Register and load the widget
function wpb2_load_widget() {
    register_widget( 'postbox_widget_2' );
}
add_action( 'widgets_init', 'wpb2_load_widget' );

?>