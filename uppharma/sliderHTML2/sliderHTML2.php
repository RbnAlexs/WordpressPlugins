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
    $cat1 = apply_filters( 'widget_cat1', $instance['cat1'] );
    $cat2 = apply_filters( 'widget_cat2', $instance['cat2'] );
    $cat3 = apply_filters( 'widget_cat3', $instance['cat3'] );
    $cat4 = apply_filters( 'widget_cat4', $instance['cat4'] );

    $arrows = apply_filters( 'widget_arrows', $instance['arrows'] );
    $thumb_option= apply_filters( 'widget_thumb', $instance['thumb_option'] );



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
            <div>
                <?php $recent = new WP_Query("cat=" .$instance["cat1"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
                
                <a href="<?php the_permalink() ?>" style="text-decoration:none;">
                    <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
                    <div class="caption_slider"><h1><?php the_title();?></h1></div>
                    <div u="image"><?php the_post_thumbnail();?></div>
                </a>

                <div u="thumb">

                    <div class="i"><?php the_post_thumbnail(array(50, 50));?></div><div class="t"><?php the_title();?></div>
                    <div class="c"></div>
                </div>

               <?php endwhile; ?>
            </div>



            <div>
               <?php $recent = new WP_Query("cat=" .$instance["cat2"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
                
               <a href="<?php the_permalink() ?>" style="text-decoration:none;">
                    <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
                    <div class="caption_slider"><h1><?php the_excerpt();?></h1></div>
                    <div u="image"><?php the_post_thumbnail();?></div>                </a>
                <div u="thumb">
                    <div class="i"><?php the_post_thumbnail(array(50, 50));?></div><div class="t"><?php the_title();?></div>

                    <div class="c"></div>
                </div>

                <?php endwhile; ?>
            </div>


            <div>
             <?php $recent = new WP_Query("cat=" .$instance["cat3"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
                
                <a href="<?php the_permalink() ?>" style="text-decoration:none;">
                    <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
                     <div class="caption_slider
"><h1><?php the_excerpt();?></h1></div>
                    <div u="image"><?php the_post_thumbnail();?></div>
                                    </a>                 
                                    <div u="thumb">
                                       <div class="i"><?php the_post_thumbnail(array(50, 50));?></div><div class="t"><?php the_title();?></div>

                    <div class="c"></div>
                </div>

                <?php endwhile; ?>
            </div>


            <div>
                <?php $recent = new WP_Query("cat=" .$instance["cat4"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
                
                <a href="<?php the_permalink() ?>" style="text-decoration:none;">
                    <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
                    <div class="caption_slider"><h1><?php the_excerpt();?></h1></div>
                    <div u="image"><?php the_post_thumbnail();?></div>
                                    </a>               
                     <div u="thumb">
                                      <div class="i"><?php the_post_thumbnail(array(50, 50));?></div><div class="t"><?php the_title();?></div>

                    <div class="c"></div>
                </div>

           <?php endwhile; ?>
            </div>

            <div>
                <?php $recent = new WP_Query("cat=" .$instance["cat5"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
                
                <a href="<?php the_permalink() ?>" style="text-decoration:none;">
                    <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
                    <div class="caption_slider"><h1><?php the_excerpt();?></h1></div>
                    <div u="image"><?php the_post_thumbnail();?></div>    
                                </a>                
                <div u="thumb">
                    <div class="i"><?php the_post_thumbnail(array(50, 50));?></div><div class="t"><?php the_title();?></div>

                    <div class="c"></div>
                </div>

           <?php endwhile; ?>
            </div>


            <?php if('on' == $instance['arrows']) { ?>

            <!-- Arrow Left -->
        <span  u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 123px; left: 0px;">
        </span>
        <!-- Arrow Right -->
        <span  u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 123px; right: 0px">
        </span>
        <!-- Arrow Navigator Skin End -->
        <?php } else { ?> <?php }?>

        


        </div>
        
            <?php if('on' == $instance['thumb_option']) { ?>


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
                <?php } else { ?> <?php }?>


                <!-- Arrow Navigator Skin Begin -->
        <style>
            /* jssor slider arrow navigator skin 12 css */
            /*
            .jssora12l              (normal)
            .jssora12r              (normal)
            .jssora12l:hover        (normal mouseover)
            .jssora12r:hover        (normal mouseover)
            .jssora12ldn            (mousedown)
            .jssora12rdn            (mousedown)
            */
            .jssora12l, .jssora12r, .jssora12ldn, .jssora12rdn {
                position: absolute;
                cursor: pointer;
                display: block;
                background: url(wp-content/plugins/sliderHTML2/img/a12.png) no-repeat;
                overflow: hidden;
            }

            .jssora12l {
                background-position: -16px -37px;
            }

            .jssora12r {
                background-position: -75px -37px;
            }

            .jssora12l:hover {
                background-position: -136px -37px;
            }

            .jssora12r:hover {
                background-position: -195px -37px;
            }

            .jssora12ldn {
                background-position: -256px -37px;
            }

            .jssora12rdn {
                background-position: -315px -37px;
            }
        </style>

        
  
    </div>

<script>jssor_slider1_starter('slider1_container');</script>




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
if ( isset( $instance[ 'cat1' ] ) ) {
$cat1 = $instance[ 'cat1' ];
}
else {
}
if ( isset( $instance[ 'cat2' ] ) ) {
$cat2 = $instance[ 'cat2' ];
}
else {
}
if ( isset( $instance[ 'cat3' ] ) ) {
$cat3 = $instance[ 'cat3' ];
}
else {
}
if ( isset( $instance[ 'cat4' ] ) ) {
$cat4 = $instance[ 'cat4' ];
}
else {

}
if ( isset( $instance[ 'cat5' ] ) ) {
$cat4 = $instance[ 'cat5' ];
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

<!--arrows -->
<p>
<label for="<?php echo $this->get_field_id( 'arrows' ); ?>"><?php _e( 'Mostrar flechas en slider' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['arrows'], 'on'); ?> id="<?php echo $this->get_field_id('arrows'); ?>" name="<?php echo $this->get_field_name('arrows'); ?>" />    
</p>

<p>
<label for="<?php echo $this->get_field_id( 'thumb_option' ); ?>"><?php _e( 'Mostrar Thumbs en slider' ); ?></label> 
<input class="checkbox" type="checkbox" <?php checked($instance['thumb_option'], 'on'); ?> id="<?php echo $this->get_field_id('thumb_option'); ?>" name="<?php echo $this->get_field_name('thumb_option'); ?>" />    
</p>


<p>
<label for="<?php echo $this->get_field_id( 'cat1' ); ?>"><?php _e( 'Elija una categoría:' ); ?></label> 
    <?php wp_dropdown_categories( array(
    'name' => $this->get_field_name( 'cat1' ),
    'selected' => $instance["cat1"]
        ) );
    ?>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'cat2' ); ?>"><?php _e( 'Elija una categoría:' ); ?></label> 
    <?php wp_dropdown_categories( array(
    'name' => $this->get_field_name( 'cat2' ),
    'selected' => $instance["cat2"]
        ) );
    ?>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'cat3' ); ?>"><?php _e( 'Elija una categoría:' ); ?></label> 
    <?php wp_dropdown_categories( array(
    'name' => $this->get_field_name( 'cat3' ),
    'selected' => $instance["cat3"]
        ) );
    ?>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'cat4' ); ?>"><?php _e( 'Elija una categoría:' ); ?></label> 
    <?php wp_dropdown_categories( array(
    'name' => $this->get_field_name( 'cat4' ),
    'selected' => $instance["cat4"]
        ) );
    ?>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'cat5' ); ?>"><?php _e( 'Elija una categoría:' ); ?></label> 
    <?php wp_dropdown_categories( array(
    'name' => $this->get_field_name( 'cat5' ),
    'selected' => $instance["cat5"]
        ) );
    ?>
</p>

<?php 
}


public function update( $new_instance, $old_instance ) {
$instance = array();

$instance['slide'] = ( ! empty( $new_instance['slide'] ) ) ? strip_tags( $new_instance['slide'] ) : '';
$instance['cat1'] = ( ! empty( $new_instance['cat1'] ) ) ? strip_tags( $new_instance['cat1'] ) : '';
$instance['cat2'] = ( ! empty( $new_instance['cat2'] ) ) ? strip_tags( $new_instance['cat2'] ) : '';
$instance['cat3'] = ( ! empty( $new_instance['cat3'] ) ) ? strip_tags( $new_instance['cat3'] ) : '';
$instance['cat4'] = ( ! empty( $new_instance['cat4'] ) ) ? strip_tags( $new_instance['cat4'] ) : '';
$instance['cat5'] = ( ! empty( $new_instance['cat5'] ) ) ? strip_tags( $new_instance['cat5'] ) : '';

$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';

$instance['sel1'] = ( ! empty( $new_instance['sel1'] ) ) ? strip_tags( $new_instance['sel1'] ) : '';
$instance['arrows'] = ( ! empty( $new_instance['arrows'] ) ) ? strip_tags( $new_instance['arrows'] ) : '';
$instance['thumb_option'] = ( ! empty( $new_instance['thumb_option'] ) ) ? strip_tags( $new_instance['thumb_option'] ) : '';



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