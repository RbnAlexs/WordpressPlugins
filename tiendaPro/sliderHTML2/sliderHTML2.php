<?php
/*
Plugin Name: sliderHTML2 
Plugin URI: No public
Description: Slider de post's
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: sliderHTML2
*/

// Creating the widget 

  


class sliderHTML2 extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'sliderHTML2', 
// Nombre público del widget en UI
__('SliderHTML2', 'sliderHTML2_widget_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra un slideshow' ), ) 
);
}


public function widget( $args, $instance ) {
    $width = apply_filters( 'widget_width', $instance['width'] );
    $height = apply_filters( 'widget_height', $instance['height'] );
    $slide = apply_filters( 'widget_slide', $instance['slide'] );
 
    $repeat = apply_filters( 'widget_repeat', $instance['repeat'] );
    $ofst = apply_filters( 'widget_ofst', $instance['ofst'] );  

    $sel1 = apply_filters( 'widget_sel1', $instance['sel1'] );
       

echo $args['before_widget'];
?>

<link rel="stylesheet" type="text/css" href="wp-content/plugins/sliderHTML2/css/style.css">
<script type="text/javascript" src="wp-content/plugins/sliderHTML2/js/jssor.js"></script>
<script type="text/javascript" src="wp-content/plugins/sliderHTML2/js/jssor.slider.js"></script>
<script type="text/javascript" src="wp-content/plugins/sliderHTML2/js/jssor.slider.options.js"></script>

<div id="slider1_container" >


      
        <!-- Slides Container -->
        <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 720px; height: 400px;
            overflow: hidden;">

        <?php if ( $repeat >= 1 ) { ?>
        <?php $recent = new WP_Query('&showposts='. $instance["repeat"] . '&offset=' . $instance["ofst"] );  
        while($recent->have_posts()) : $recent->the_post();?>

            <div>
                <a href="<?php the_permalink() ?>" style="text-decoration:none;">
                    <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
                    <div class="caption"><h1><?php the_excerpt();?></h1></div>
                    <div u="image"><?php the_post_thumbnail();?></div>
                </a>
                <div u="thumb">

                    <div class="i"><?php the_post_thumbnail(array(50, 50));?></div><div class="t"><?php the_title();?></div>
                    <div class="c"></div>
                </div>
            </div>


        <?php endwhile; ?>
        <?php } ?>

         </div>


        <div u="thumbnavigator" class="jssort11" style="float: right; position: relative; width: 250px; height: 311px; right: 7px; top: 43px; overflow: visible;">
          
             <div u="slides" class="thumbs_position" style="cursor: pointer; "><!-- COLUMNA THUMBS-->
                <div u="prototype" class="p" style="position: absolute; width: 266px; height: 82px; top: 0; left: 0;
                  border-top: 2px solid #fff;
                  border-right: 0px solid #fff;
                  border-bottom: 1px solid #d5c2be;
                  border-left: 0px solid #fff;
                  margin-top: -4;
                  margin-bottom: 0;
                  overflow: visible;
                  ">
                    <div u="thumbnailtemplate" style=" width: 100%; height: 100%;position:absolute; top: 0; left: 0;"></div>
                </div>
            </div>
        </div>
  
    </div>

<script>jssor_slider1_starter('slider1_container');</script>




<?php 

echo $args['after_widget'];

}

public function form( $instance ) {

if ( isset( $instance[ 'repeat' ] ) ) {
$repeat = $instance[ 'repeat' ];
}
else {
}

if ( isset ($instance['ofst'])){
    $ofst = $instance ['ofst'];
}
else{
}

if ( isset( $instance[ 'slide' ] ) ) {
$slide = $instance[ 'slide' ];
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

<p>
<label for="<?php echo $this->get_field_id( 'repeat' ); ?>"><?php _e( 'Asigne el número de entradas a mostrar:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'repeat' ); ?>" name="<?php echo $this->get_field_name( 'repeat' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $repeat ); ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id( 'ofst' ); ?>"><?php _e( 'Asigne el número de entradas a omitir:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'ofst' ); ?>" name="<?php echo $this->get_field_name( 'ofst' ); ?>" style= "width:25%" type="text" value="<?php echo esc_attr( $ofst ); ?>" />
</p>



<?php 
}


public function update( $new_instance, $old_instance ) {
$instance = array();

$instance['slide'] = ( ! empty( $new_instance['slide'] ) ) ? strip_tags( $new_instance['slide'] ) : '';

$instance['repeat'] = ( ! empty( $new_instance['repeat'] ) ) ? strip_tags( $new_instance['repeat'] ) : '';
$instance['ofst'] = ( ! empty( $new_instance['ofst'] ) ) ? strip_tags( $new_instance['ofst'] ) : '';


$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';

$instance['sel1'] = ( ! empty( $new_instance['sel1'] ) ) ? strip_tags( $new_instance['sel1'] ) : '';

return $instance;
}
} // Class postbox_widget ends here

// Register and load the widget
function wpzh_load_widget() {
    register_widget( 'sliderHTML2' ); 
}
add_action( 'widgets_init', 'wpzh_load_widget' );

function ons__widget_style(){
    $pluginDirComplete = plugin_basename(dirname(__FILE__));
    $pluginsWPDirComplete = basename(dirname(dirname(__FILE__)));
 
    $urlSite = get_settings('siteurl');
    $urlCSS = $urlSite . '/wp-content/'.$pluginsWPDirComplete.'/'.$pluginDirComplete.'/css/styles.css';
 
    wp_enqueue_style('on__traffsend', $urlCSS);
}   
    add_action('wp_print_styles', 'ons__widget_style');

?>