<?php
/*
Plugin Name: PageBox_Slider 
Plugin URI: No public
Description: Slider de post's
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: PageBox_Slider
*/

// Creating the widget 

  


class PageBox_Slider extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'PageBox_Slider', 
// Nombre público del widget en UI
__('PageBox_Slider', 'PageBox_Slider_widget_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra un slideshow' ), ) 
);
}


public function widget( $args, $instance ) {
    $width = apply_filters( 'widget_width', $instance['width'] );
    $height = apply_filters( 'widget_height', $instance['height'] );
    $slide = apply_filters( 'widget_slide', $instance['slide'] );
    $page_1 = apply_filters( 'widget_page_1', $instance['page_1'] );
    $page_2 = apply_filters( 'widget_page_2', $instance['page_2'] );
    $page_3 = apply_filters( 'widget_page_3', $instance['page_3'] );


    $arrows = apply_filters( 'widget_arrows', $instance['arrows'] );
    $thumb_option= apply_filters( 'widget_thumb', $instance['thumb_option'] );

    $text = apply_filters( 'mytheme_widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );



    $sel1 = apply_filters( 'widget_sel1', $instance['sel1'] );
       

echo $args['before_widget'];
?>


<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicators 
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>-->

    <div class="carousel-inner" role="listbox">

            <div class="item active">
            <div>
            <?php $recent = new WP_Query('page_id='. $instance["page_1"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                             
            
             <div class="slider_box"> 
             <a href="<?php the_permalink(); ?>" >
             <?php the_post_thumbnail();?>
             <div class="slider_text">  
                 <div> <?php the_title();?></div> 
                 <p><?php the_excerpt();?></p>
             </div>  
             </a>
             </div>  

            <?php endwhile; ?>
            </div>
            </div>

            <div class="item">
            <div>
            <?php $recent = new WP_Query('page_id='. $instance["page_2"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                
             <div class="slider_box"> 
             <a href="<?php the_permalink(); ?>" > 
             <?php the_post_thumbnail();?>
             <div class="slider_text">  
             <div> <?php the_title();?></div> 
             <p><?php the_excerpt();?></p>
             </div>  
             </a>
             </div>

             <?php endwhile; ?>
            </div>
            </div>
            
            <div class="item">
            <div>
            <?php $recent = new WP_Query('page_id='. $instance["page_3"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                
             <div class="slider_box">  
             <a href="<?php the_permalink(); ?>" >
             <?php the_post_thumbnail();?>
             <div class="slider_text">  
             <div><?php the_title();?></div>    
             <p><?php the_excerpt();?></p>  
             </div>  
             </a>
             </div>  
             
             <?php endwhile; ?>
            </div>
            </div>

        </div>

    <a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="fa fa-2x fa-chevron-circle-left"></i></a>   
    <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="fa fa-2x fa-chevron-circle-right"></i></a>      
                   
</div>

<script>
    $(window).load(function() {
    $('#myCarousel').carousel({
        interval: 9500
        })
    });
</script>


<?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>

<?php 

echo $args['after_widget'];

}

public function form( $instance ) {

if ( isset( $instance[ 'arrows' ] ) ) {
$arrows = $instance[ 'arrows' ];
}
else {
}

if ( isset( $instance[ 'thumb_option' ] ) ) {
$thumb_option = $instance[ 'thumb_option' ];
}
else {
}


if ( isset( $instance[ 'slide' ] ) ) {
$slide = $instance[ 'slide' ];
}
else {
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

if ( isset( $instance[ 'sel1' ] ) ) {
$sel1 = $instance[ 'sel1' ];
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


    $instance = wp_parse_args( (array) $instance, array('text' => ''));    
    $text = esc_textarea($instance['text']); 

?>

<p>
<label for="<?php echo $this->get_field_id( 'slide' ); ?>"><?php _e( 'Mostrar la imagen de la entrada' ); ?></label> 
</p>

<!--Parte del tamaño del Thumb-->
<p>
<label><?php _e( 'Asigne el tamaño de la imagen en px:' ); ?></label></br>
<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Ancho:' ); ?></label>
<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" type="text" value="<?php echo esc_attr( $width ); ?>" />
<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Alto:' ); ?></label>
<input style="width:24%; margin-right: 10px" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $height ); ?>" />
</p>





<!--arrows -->
<p>
<label for="<?php echo $this->get_field_id( 'arrows' ); ?>"><?php _e( 'Mostrar flechas en slider' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['arrows'], 'on'); ?> id="<?php echo $this->get_field_id('arrows'); ?>" name="<?php echo $this->get_field_name('arrows'); ?>" />    
</p>

<!--thumbs -->


<p>
<label for="<?php echo $this->get_field_id( 'thumb_option' ); ?>"><?php _e( 'Mostrar Thumbs en slider' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['thumb_option'], 'on'); ?> id="<?php echo $this->get_field_id('thumb_option'); ?>" name="<?php echo $this->get_field_name('thumb_option'); ?>" />    
</p>


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





<?php 
}


public function update( $new_instance, $old_instance ) {
$instance = array();

$instance['slide'] = ( ! empty( $new_instance['slide'] ) ) ? strip_tags( $new_instance['slide'] ) : '';
$instance['page_1'] = ( ! empty( $new_instance['page_1'] ) ) ? strip_tags( $new_instance['page_1'] ) : '';
$instance['page_2'] = ( ! empty( $new_instance['page_2'] ) ) ? strip_tags( $new_instance['page_2'] ) : '';
$instance['page_3'] = ( ! empty( $new_instance['page_3'] ) ) ? strip_tags( $new_instance['page_3'] ) : '';


$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';

$instance['sel1'] = ( ! empty( $new_instance['sel1'] ) ) ? strip_tags( $new_instance['sel1'] ) : '';
$instance['arrows'] = ( ! empty( $new_instance['arrows'] ) ) ? strip_tags( $new_instance['arrows'] ) : '';
$instance['thumb_option'] = ( ! empty( $new_instance['thumb_option'] ) ) ? strip_tags( $new_instance['thumb_option'] ) : '';

  if ( current_user_can('unfiltered_html') )
      $instance['text'] =  $new_instance['text']; 

return $instance;
}
} // Class postbox_widget ends here

// Register and load the widget
function wpbs_load_widget() {
    register_widget( 'PageBox_Slider' ); 
}
add_action( 'widgets_init', 'wpbs_load_widget' );

function ons___widget_style(){
    $pluginDirComplete = plugin_basename(dirname(__FILE__));
    $pluginsWPDirComplete = basename(dirname(dirname(__FILE__)));
 
    $urlSite = get_settings('siteurl');
    $urlCSS = $urlSite . '/wp-content/'.$pluginsWPDirComplete.'/'.$pluginDirComplete.'/css/styles.css';
 
    wp_enqueue_style('on__traffsend', $urlCSS);
}   
    add_action('wp_print_styles', 'ons__widget_style');

?>