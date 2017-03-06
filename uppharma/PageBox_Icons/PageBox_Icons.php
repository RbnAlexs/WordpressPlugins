<?php

/*
Plugin Name: PageBox_Icons
Plugin URI: No public
Description: Muestra la composición de una o varias publicaciones de una categoría específica. 
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: pagebox_iconos
*/

// Creating the widget 
class pagebox_iconos extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'pagebox_iconos', 
// Nombre público del widget en UI
__('PageBox_Icons', 'pagebox_iconos_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Selecciona una o varias páginas para mostrar sólo titulo y thumb.' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
    $text = apply_filters( 'mytheme_widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );
$width = apply_filters( 'widget_width', $instance['width'] );
$height = apply_filters( 'widget_height', $instance['height'] );
$title = apply_filters( 'widget_title', $instance['title'] );
$list = apply_filters( 'widget_list', $instance['list'] );
$thumb = apply_filters( 'widget_thumb', $instance['thumb'] );
$author = apply_filters( 'widget_author', $instance['author'] );
$date = apply_filters( 'widget_date', $instance['date(format)'] );
$excerpt = apply_filters( 'widget_excerpt', $instance['excerpt'] );
$titlepage = apply_filters( 'widget_titlepage', $instance['titlepage'] );
  $page_1 = apply_filters( 'widget_page_1', $instance['page_1'] );
    $page_2 = apply_filters( 'widget_page_2', $instance['page_2'] );
    $page_3 = apply_filters( 'widget_page_3', $instance['page_3'] );
    $page_4 = apply_filters( 'widget_page_4', $instance['page_4'] );

// before and after widget arguments are defined by themes

echo $args['before_widget'];

// This is where you run the code and display the output ?>
            <div class="icono_1">
            <?php $recent = new WP_Query('page_id='. $instance["page_1"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div><h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h3></div>
             <div class="thumbs"><?php the_post_thumbnail();?></div>

             <?php endwhile; ?>
            </div>

             <div class="icono_2">
            <?php $recent = new WP_Query('page_id='. $instance["page_2"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div><h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h3></div>
             <div class="thumbs"><?php the_post_thumbnail();?></div>

             <?php endwhile; ?>
            </div>

              <div class="icono_3">
            <?php $recent = new WP_Query('page_id='. $instance["page_3"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div><h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h3></div>
             <div class="thumbs"><?php the_post_thumbnail();?></div>

             <?php endwhile; ?>
            </div>

              <div class="icono_4">
            <?php $recent = new WP_Query('page_id='. $instance["page_4"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div><h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h3></div>
             <div class="thumbs"><?php the_post_thumbnail();?></div>

             <?php endwhile; ?>
            </div>



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
if ( isset ($instance['titlepage'])){
    $titlepage = $instance ['titlepage'];
}
else{
}
if ( isset ($instance['boton'])){
    $boton = $instance ['boton'];
}
else{
}
if ( isset( $instance[ 'page_1' ] ) ) {
$page_1 = $instance[ 'page_1' ];
}
else {
}
if ( isset( $instance[ 'page_2' ] ) ) {
$page_2 = $instance[ 'page_2' ];
}
else {
}
if ( isset( $instance[ 'page_3' ] ) ) {
$page_3 = $instance[ 'page_3' ];
}
else {
}
if ( isset( $instance[ 'page_4' ] ) ) {
$page_4 = $instance[ 'page_4' ];
}
else {

}

  $instance = wp_parse_args( (array) $instance, array('text' => ''));    
    $text = esc_textarea($instance['text']); 

// Widget admin form
?>


<!--Parte de la páginas-->
<p>
<label for="<?php echo $this->get_field_id( 'page_1' ); ?>"><?php _e( 'Elija una página:' ); ?></label> 
    <?php wp_dropdown_pages(
    array(
    'name' => $this->get_field_name( 'page_1' ),
    'selected' => $instance["page_1"]
        ) );  
    ?>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'page_2' ); ?>"><?php _e( 'Elija una página:' ); ?></label> 
    <?php wp_dropdown_pages(
    array(
    'name' => $this->get_field_name( 'page_2' ),
    'selected' => $instance["page_2"]
        ) );  
    ?>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'page_3' ); ?>"><?php _e( 'Elija una página:' ); ?></label> 
    <?php wp_dropdown_pages(
    array(
    'name' => $this->get_field_name( 'page_3' ),
    'selected' => $instance["page_3"]
        ) );  
    ?>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'page_4' ); ?>"><?php _e( 'Elija una página:' ); ?></label> 
    <?php wp_dropdown_pages(
    array(
    'name' => $this->get_field_name( 'page_4' ),
    'selected' => $instance["page_4"]
        ) );  
    ?>
</p>



<!--Parte del Thumb-->
<p>
<label for="<?php echo $this->get_field_id( 'thumb' ); ?>"><?php _e( 'Mostrar la imagen de la entrada' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['thumb'], 'on'); ?> id="<?php echo $this->get_field_id('thumb'); ?>" name="<?php echo $this->get_field_name('thumb'); ?>" />    
</p>

<!--Parte del tamaño del Thumb-->
<p>
<label><?php _e( 'Asigne el tamaño de la imagen en px:' ); ?></label></br>
<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Ancho:' ); ?></label>
<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>" />
<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Alto:' ); ?></label>
<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" />
</p>

<!--Parte del Author-->
<p>
<label for="<?php echo $this->get_field_id( 'author' ); ?>"><?php _e( 'Mostrar el autor de la entrada' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['author'], 'on'); ?> id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>" />     
</p>
<!--Parte del Date-->
<p>
<label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e( 'Mostrar la fecha de la entrada' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['date'], 'on'); ?> id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" />   
</p>
<!--Parte del Excerpt-->
<p>
<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e( 'Mostrar el extracto de la entrada' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['excerpt'], 'on'); ?> id="<?php echo $this->get_field_id('excerpt'); ?>" name="<?php echo $this->get_field_name('excerpt'); ?>" />  
</p>
<!--Parte del Titulo-->
<p>
<label for="<?php echo $this->get_field_id( 'titlepage' ); ?>"><?php _e( 'Mostrar el titulo de la entrada' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['titlepage'], 'on'); ?> id="<?php echo $this->get_field_id('titlepage'); ?>" name="<?php echo $this->get_field_name('titlepage'); ?>" />  
</p>

<p>
<label for="<?php echo $this->get_field_id( 'boton' ); ?>"><?php _e( 'Mostrar botón de "ver más"' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['boton'], 'on'); ?> id="<?php echo $this->get_field_id('boton'); ?>" name="<?php echo $this->get_field_name('boton'); ?>" />  
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
$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['list'] = ( ! empty( $new_instance['list'] ) ) ? strip_tags( $new_instance['list'] ) : '';
$instance['thumb'] = ( ! empty( $new_instance['thumb'] ) ) ? strip_tags( $new_instance['thumb'] ) : '';
$instance['author'] = ( ! empty( $new_instance['author'] ) ) ? strip_tags( $new_instance['author'] ) : '';
$instance['date'] = ( ! empty( $new_instance['date'] ) ) ? strip_tags( $new_instance['date'] ) : '';
$instance['excerpt'] = ( ! empty( $new_instance['excerpt'] ) ) ? strip_tags( $new_instance['excerpt'] ) : '';
$instance['titlepage'] = ( ! empty( $new_instance['titlepage'] ) ) ? strip_tags( $new_instance['titlepage'] ) : '';
$instance['boton'] = ( ! empty( $new_instance['boton'] ) ) ? strip_tags( $new_instance['boton'] ) : '';
$instance['page_1'] = ( ! empty( $new_instance['page_1'] ) ) ? strip_tags( $new_instance['page_1'] ) : '';
$instance['page_2'] = ( ! empty( $new_instance['page_2'] ) ) ? strip_tags( $new_instance['page_2'] ) : '';
$instance['page_3'] = ( ! empty( $new_instance['page_3'] ) ) ? strip_tags( $new_instance['page_3'] ) : '';
$instance['page_4'] = ( ! empty( $new_instance['page_4'] ) ) ? strip_tags( $new_instance['page_4'] ) : '';

    if ( current_user_can('unfiltered_html') )
      $instance['text'] =  $new_instance['text']; 

return $instance;
}
} // Class postbox_widget ends here

// Register and load the widget
function wpbi_load_widget() {
    register_widget( 'pagebox_iconos' );
}
add_action( 'widgets_init', 'wpbi_load_widget' );

?>