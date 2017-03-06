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
    $repeat = apply_filters( 'widget_repeat', $instance['repeat'] );
    $ofst = apply_filters( 'widget_ofst', $instance['ofst'] );

    $sel1 = apply_filters( 'widget_sel1', $instance['sel1'] );
       

echo $args['before_widget'];
?>
        <?php if ( is_home()  ) { ?>


<script type="text/javascript" src="wp-content/plugins/sliderHTML2/js/jssor.js"></script>
<script type="text/javascript" src="wp-content/plugins/sliderHTML2/js/jssor.slider.js"></script>
<script type="text/javascript">
        jssor_slider1_starter = function (containerId) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 0,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
                }
            };  

            var jssor_slider1 = new $JssorSlider$(containerId, options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 980));
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
 

 <div class="slider" style="position: relative; width: 100%;  background: url(http://www.developserver.mi.php54-2.ord1-1.websitetestlink.com/america/css_files/images/bg.jpg);background-position-y: -100px;
background-position-x: -150px; overflow: hidden;" >
        <div style="position: relative; left: 45%; width: 5000px; text-align: center; margin-left: -2500px;">
            <!-- Jssor Slider Begin --> 
            <div id="slider1_container" style="position: relative; margin: 0 auto;
                top: 0px; left: 0px; width: 980px; height: 400px; background: url(../img/major/main_bg.jpg) top center no-repeat;">
                <!-- Loading Screen -->
                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                    <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                </div>
                <!-- Slides Container -->
                <div u="slides" style="cursor: pointer; position: absolute; left: 0px; top: 0px; width: 980px;
                    height: 400px; overflow: hidden;">


                    <!--- POST -->
        <?php if ( $repeat >= 1 ) { ?>
        <?php $recent = new WP_Query('&showposts=' . $instance["repeat"] . '&offset=' . $instance["ofst"] . '&cat= -6');  
        while($recent->have_posts()) : $recent->the_post();?>
        
                    <div >
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 515px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 3.5em;
                                color: #FFFFFF;">
                                <a class ="link" href="<?php the_permalink()?>" title="<?php the_title();?>" style="color: #FFF;
                            text-decoration: none;">
                                    <?php the_title();?>
                                </a>
                            </span>
                            <br />
                            
                            <span style="display: block; line-height: 1.1em; font-size: 1.5em; color: #FFFFFF;">
                                <?php the_excerpt();?>
                            </span>
                            <br />
                            <br />
                            
                        </div>


                        <div class="image_slider" style=" position: absolute; top: 45px; left: 0px; ">  
                        <a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
                            <?php the_post_thumbnail();?>
                        </a>
                        </div>
 
                        <div class="thumb_slider" u="thumb" >
                        <?php the_post_thumbnail(array(100, 100));?>
                        </div>

                    </div>

        <?php endwhile; ?>
        <?php } ?>

  
                </div>


                <!-- ThumbnailNavigator Skin Begin -->
                <div u="thumbnavigator" class="jssort04" style="position: absolute; width: 600px;
                    height: 150px; right: 0px; bottom: 0px;">  
                    <!-- Thumbnail Item Skin Begin --> 
                    <style>
                        /* jssor slider thumbnail navigator skin 04 css */
                        /*
                        .jssort04 .p            (normal)
                        .jssort04 .p:hover      (normal mouseover)
                        .jssort04 .pav          (active)
                        .jssort04 .pav:hover    (active mouseover)
                        .jssort04 .pdn          (mousedown)
                        */
 
                        .jssort04 .w, .jssort04 .pav:hover .w {
                            position: absolute;
                            width: 100px;
                            height: 100px;
                        }

                        * html .jssort04 .w {
                            width: /**/ 100px;
                            height: /**/ 100px;
                        }

                        .jssort04 .pdn .w, .jssort04 .pav .w {
                            border-style: solid;
                        }

                        .jssort04 .c {
                            width: 100px;
                            height: 100px;
                            filter: alpha(opacity=45);
                            opacity: .45;
                            transition: opacity .6s !important;
                            -moz-transition: opacity .6s !important;
                            -webkit-transition: opacity .6s !important;
                            -o-transition: opacity .6s !important;
                        }

                        .jssort04 .p:hover .c, .jssort04 .pav .c {
                            filter: alpha(opacity=0);
                            opacity: 0;
                        }

                        .jssort04 .p:hover .c {
                            transition: none;
                            -moz-transition: none;
                            -webkit-transition: none;
                            -o-transition: none;
                        }

                    </style>
                    <div u="slides" style="bottom: 25px; right: 30px;">
                        <div u="prototype" class="p" style="position: absolute; width: 100px; height: 100px; top: 0; left: 0;">
                            <div class="w">
                                <div u="thumbnailtemplate" style="width: 100%; height: 100%; border: none; position: absolute; top: 0; left: 0;"></div>
                            </div>
                            <div class="c" style="position: absolute; background-color: #000; top: 0; left: 0">
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Item Skin End -->
                </div>
                <!-- ThumbnailNavigator Skin End -->
            </div>
            <!-- Trigger -->
            <script>
                jssor_slider1_starter('slider1_container');
            </script>
            <!-- Jssor Slider End -->
        </div>
    </div>



        <?php } ?>


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
if ( isset( $instance[ 'cat1' ] ) ) {
$cat1 = $instance[ 'cat1' ];
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
<label for="<?php echo $this->get_field_id( 'cat1' ); ?>"><?php _e( 'Elija una categoría:' ); ?></label> 
    <?php wp_dropdown_categories( array(
    'name' => $this->get_field_name( 'cat1' ),
    'selected' => $instance["cat1"]
        ) );
    ?>
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




<?php 
}


public function update( $new_instance, $old_instance ) {
$instance = array();

$instance['slide'] = ( ! empty( $new_instance['slide'] ) ) ? strip_tags( $new_instance['slide'] ) : '';
$instance['cat1'] = ( ! empty( $new_instance['cat1'] ) ) ? strip_tags( $new_instance['cat1'] ) : '';

$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';

$instance['sel1'] = ( ! empty( $new_instance['sel1'] ) ) ? strip_tags( $new_instance['sel1'] ) : '';
$instance['repeat'] = ( ! empty( $new_instance['repeat'] ) ) ? strip_tags( $new_instance['repeat'] ) : '';
$instance['ofst'] = ( ! empty( $new_instance['ofst'] ) ) ? strip_tags( $new_instance['ofst'] ) : '';

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