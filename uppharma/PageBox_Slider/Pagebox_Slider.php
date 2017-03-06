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
    $page_4 = apply_filters( 'widget_page_4', $instance['page_4'] );
    $page_5 = apply_filters( 'widget_page_5', $instance['page_5'] );


    $arrows = apply_filters( 'widget_arrows', $instance['arrows'] );
    $thumb_option= apply_filters( 'widget_thumb', $instance['thumb_option'] );

    $text = apply_filters( 'mytheme_widget_text', empty( $instance['text'] ) ? '' : $instance['text'], $instance );



    $sel1 = apply_filters( 'widget_sel1', $instance['sel1'] );
       

echo $args['before_widget'];
?>
<link rel="stylesheet" type="text/css" href="wp-content/plugins/PageBox_Slider/css/style.css">
<script type="text/javascript" src="wp-content/plugins/PageBox_Slider/js/jssor.js"></script>
<script type="text/javascript" src="wp-content/plugins/PageBox_Slider/js/jssor.slider.js"></script>
<script type="text/javascript" src="wp-content/plugins/PageBox_Slider/js/jssor.slider.options.js"></script>

<div id="slider1_container" >




      
        <!-- Slides Container -->
        <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 720px; height: 350px;
            overflow: hidden;">

            <div>
            <?php $recent = new WP_Query('page_id='. $instance["page_1"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div class="caption_slider"><h1><a href="<?php the_permalink() ?>"><?php the_title();?></a></h1></div>
             <div u="image"><?php the_post_thumbnail();?></div>

             <div u="thumb">
               <div class="t"><?php the_title();?></div>
               <div class="c"><?php the_excerpt();?></div>
               <div class="readmore"><a href="<?php the_permalink() ?>">Read More ...</a></div>
             </div>

             <?php endwhile; ?>
            </div>

            <div>
            <?php $recent = new WP_Query('page_id='. $instance["page_2"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <a href="<?php the_permalink() ?>" style="text-decoration:none;">
             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div class="caption_slider"><h1><?php the_title();?></h1></div>
             <div u="image"><?php the_post_thumbnail();?></div>
             </a>

             <div u="thumb">
               <div class="t"><?php the_title();?></div>
               <div class="c"><?php the_excerpt();?></div>
               <div class="readmore"><a href="<?php the_permalink() ?>">Read More ...</a></div>
             </div>

             <?php endwhile; ?>
            </div>

            <div>
            <?php $recent = new WP_Query('page_id='. $instance["page_3"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <a href="<?php the_permalink() ?>" style="text-decoration:none;">
             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div class="caption_slider"><h1><?php the_title();?></h1></div>
             <div u="image"><?php the_post_thumbnail();?></div>
             </a>

             <div u="thumb">
               <div class="t"><?php the_title();?></div>
               <div class="c"><?php the_excerpt();?></div>
               <div class="readmore"><a href="<?php the_permalink() ?>">Read More ...</a></div>
             </div>

             <?php endwhile; ?>
            </div>

            <div>
            <?php $recent = new WP_Query('page_id='. $instance["page_4"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <a href="<?php the_permalink() ?>" style="text-decoration:none;">
             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div class="caption_slider"><h1><?php the_title();?></h1></div>
             <div u="image"><?php the_post_thumbnail();?></div>
             </a>

             <div u="thumb">
               <div class="t"><?php the_title();?></div>
               <div class="c"><?php the_excerpt();?></div>
               <div class="readmore"><a href="<?php the_permalink() ?>" >Read More ...</a></div>
             </div>

             <?php endwhile; ?>
            </div>

             <div>
            <?php $recent = new WP_Query('page_id='. $instance["page_5"] .'&showposts= 1 '); while($recent->have_posts()) : $recent->the_post();?>                

             <a href="<?php the_permalink() ?>" style="text-decoration:none;">
             <?php set_post_thumbnail_size( ''. $instance["width"] . ',' . $instance["height"] . ', true' ); ?>
             <div class="caption_slider"><h1><?php the_title();?></h1></div>
             <div u="image"><?php the_post_thumbnail();?></div>
             </a>

             <div u="thumb">
               <div class="t"><?php the_title();?></div>
               <div class="c"><?php the_excerpt();?></div>
               <div class="readmore"><a href="<?php the_permalink() ?>" >Read More ...</a></div>
             </div>

             <?php endwhile; ?>
            </div>
                  

            <?php if('on' == $instance['arrows']) { ?>
            <!-- Arrow Left -->
            <span  u="arrowleft" class="jssora12l" style="width: 49px; height: 49px; top: 123px; left: 17px;">
            </span>
            <!-- Arrow Right -->
            <span  u="arrowright" class="jssora12r" style="width: 50px; height: 49px; top: 123px; right: 23px">
            </span>
            <!-- Arrow Navigator Skin End -->
            <?php } else { ?> <?php }?>

        


        </div>
        <?php if('on' == $instance['thumb_option']) { ?>
        <div u="thumbnavigator" class="jssort11" style="float: right; position: relative; width: 271px; height: 355px; right: 0px; top: 0px; overflow: hidden;">
          
            <div u="slides" class="thumbs_position" style="cursor: default; "><!-- COLUMNA THUMBS-->
            <div u="prototype" class="p" style="position: absolute; width: 271px; height: 355px; top: 0; left: 0;
          
            margin-top: -4;
            margin-bottom: 0;
            overflow: visible
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
                display: block;
                overflow: hidden;
                cursor: pointer;
            }

            .jssora12l {
                 opacity: 0.4;
                 filter: alpha(opacity=40); 
                background: url(wp-content/plugins/PageBox_Slider/img/izquierda.png) no-repeat;
                background-size: 85%; 

            }

            .jssora12r {
                 opacity: 0.4;
                 filter: alpha(opacity=40); 
                background: url(wp-content/plugins/PageBox_Slider/img/derecha.png) no-repeat;
                background-size: 85%;

            }

            .jssora12l:hover {
                opacity: 0.8;
                 filter: alpha(opacity=80); 
                  background: url(wp-content/plugins/PageBox_Slider/img/izquierda.png) no-repeat;
                background-size: 85%;
            }

            .jssora12r:hover {
                opacity: 0.8;
                 filter: alpha(opacity=80); 
                  background: url(wp-content/plugins/PageBox_Slider/img/derecha.png) no-repeat;
                background-size: 85%;

            }

            .jssora12ldn {
                opacity: 0.9;
                 filter: alpha(opacity=80); 
                  background: url(wp-content/plugins/PageBox_Slider/img/izquierda.png) no-repeat;
                background-size: 85%;
   
            }

            .jssora12rdn {
                opacity: 0.9;
                 filter: alpha(opacity=80); 
                  background: url(wp-content/plugins/PageBox_Slider/img/derecha.png) no-repeat;
                background-size: 85%;
             }

        </style>

        
  
    </div>


<?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>

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
if ( isset( $instance[ 'page_5' ] ) ) {
$page_4 = $instance[ 'page_5' ];
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

<p>
<label for="<?php echo $this->get_field_id( 'page_4' ); ?>"><?php _e( 'Elija una página:' ); ?></label> 
    <?php wp_dropdown_pages(
    array(
    'name' => $this->get_field_name( 'page_4' ),
    'selected' => $instance["page_4"]
        ) );  
    ?>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'page_5' ); ?>"><?php _e( 'Elija una página:' ); ?></label> 
    <?php wp_dropdown_pages(
    array(
    'name' => $this->get_field_name( 'page_5' ),
    'selected' => $instance["page_5"]
        ) );  
    ?>
</p>


    <p>
    <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Insertar Script aquí' ); ?></label> 
        <textarea class="widefat" rows="10" cols="15" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>">
            <?php echo $text; ?>
        </textarea>
    </p>

<?php 
}


public function update( $new_instance, $old_instance ) {
$instance = array();

$instance['slide'] = ( ! empty( $new_instance['slide'] ) ) ? strip_tags( $new_instance['slide'] ) : '';
$instance['page_1'] = ( ! empty( $new_instance['page_1'] ) ) ? strip_tags( $new_instance['page_1'] ) : '';
$instance['page_2'] = ( ! empty( $new_instance['page_2'] ) ) ? strip_tags( $new_instance['page_2'] ) : '';
$instance['page_3'] = ( ! empty( $new_instance['page_3'] ) ) ? strip_tags( $new_instance['page_3'] ) : '';
$instance['page_4'] = ( ! empty( $new_instance['page_4'] ) ) ? strip_tags( $new_instance['page_4'] ) : '';
$instance['page_5'] = ( ! empty( $new_instance['page_5'] ) ) ? strip_tags( $new_instance['page_5'] ) : '';

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