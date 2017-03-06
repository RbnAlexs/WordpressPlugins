<?php

/*
Plugin Name: sliderHTML 
Plugin URI: No public
Description: Slider de post's
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: sliderHTML
*/

// Creating the widget 


class sliderHTML extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'sliderHTML', 
// Nombre público del widget en UI
__('SliderHTML', 'sliderHTML_widget_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra un slideshow' ), ) 
);
}


public function widget( $args, $instance ) {
   
    $slide = apply_filters( 'widget_slide', $instance['slide'] );
    $cat1 = apply_filters( 'widget_cat1', $instance['cat1'] );
    $cat2 = apply_filters( 'widget_cat2', $instance['cat2'] );
    $cat3 = apply_filters( 'widget_cat3', $instance['cat3'] );
    $cat4 = apply_filters( 'widget_cat4', $instance['cat4'] );

    $sel1 = apply_filters( 'widget_sel1', $instance['sel1'] );
       

echo $args['before_widget'];
?>

<div id="sliderFrame">
    <div id="slider">
        <?php $recent = new WP_Query("cat=" .$instance["cat1"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
            <div id="fragment-<?php the_ID(); ?>" class="ui-tabs-panel ui-tabs-hide">
                <a class="lazyImage" href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(600, 480));?></a>
                <div class="info" >
                    <a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
                </div>
            </div>
        <?php endwhile; ?>

        <?php $recent = new WP_Query("cat=" .$instance["cat2"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
            <div id="fragment-<?php the_ID(); ?>" class="ui-tabs-panel ui-tabs-hide">
                <a class="lazyImage" href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(600, 480));?></a>
                <div class="info" >
                    <a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
                </div>
            </div>
        <?php endwhile; ?>

        <?php $recent = new WP_Query("cat=" .$instance["cat3"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
            <div id="fragment-<?php the_ID(); ?>" class="ui-tabs-panel ui-tabs-hide">
                <a class="lazyImage" href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(600, 480));?></a>
                <div class="info" >
                    <a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
                </div>
            </div>
        <?php endwhile; ?>

        <?php $recent = new WP_Query("cat=" .$instance["cat4"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
            <div id="fragment-<?php the_ID(); ?>" class="ui-tabs-panel ui-tabs-hide">
                <a class="lazyImage" href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(600, 480));?></a>
                <div class="info" >
                   <a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
        
    <!--thumbnails-->
    <div id="lateral">
        <div class="small">
            <?php $recent = new WP_Query("cat=" .$instance["cat1"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
            <div class="frame"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(500, 480));?></a></div>
            <div class="small-content"><a href="#fragment-<?php the_ID(); ?>"><?php the_title(); ?></a></div>
            <?php endwhile; ?>
            <div style="clear:both;"></div>
        </div>

        <div class="small">
            <?php $recent = new WP_Query("cat=" .$instance["cat2"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
            <div class="frame"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(500, 480));?></a></div>
            <div class="small-content"><a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a></div>
            <?php endwhile; ?>
            <div style="clear:both;"></div>
        </div>
            
        <div class="small">
            <?php $recent = new WP_Query("cat=" .$instance["cat3"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
            <div class="frame"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(500, 480));?></a></div>
            <div class="small-content"><a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a></div>
            <?php endwhile; ?>
            <div style="clear:both;"></div>
        </div>
            
        <div class="small">
            <?php $recent = new WP_Query("cat=" .$instance["cat4"]. "&showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
            <div class="frame"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail(array(500, 480));?></a></div>
            <div class="small-content"><a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a></div>
            <?php endwhile; ?>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div style="clear:both;height:0;"></div>
</div>


<?php 

echo $args['after_widget'];

}

public function form( $instance ) {

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
if ( isset( $instance[ 'sel1' ] ) ) {
$sel1 = $instance[ 'sel1' ];
}
else {
}

?>

<p>
<label for="<?php echo $this->get_field_id( 'slide' ); ?>"><?php _e( 'Mostrar la imagen de la entrada' ); ?></label> 
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

<?php 
}


public function update( $new_instance, $old_instance ) {
$instance = array();

$instance['slide'] = ( ! empty( $new_instance['slide'] ) ) ? strip_tags( $new_instance['slide'] ) : '';
$instance['cat1'] = ( ! empty( $new_instance['cat1'] ) ) ? strip_tags( $new_instance['cat1'] ) : '';
$instance['cat2'] = ( ! empty( $new_instance['cat2'] ) ) ? strip_tags( $new_instance['cat2'] ) : '';
$instance['cat3'] = ( ! empty( $new_instance['cat3'] ) ) ? strip_tags( $new_instance['cat3'] ) : '';
$instance['cat4'] = ( ! empty( $new_instance['cat4'] ) ) ? strip_tags( $new_instance['cat4'] ) : '';
$instance['sel1'] = ( ! empty( $new_instance['sel1'] ) ) ? strip_tags( $new_instance['sel1'] ) : '';

return $instance;
}
} // Class postbox_widget ends here

// Register and load the widget
function wpsh_load_widget() {
    register_widget( 'sliderHTML' );
}
add_action( 'widgets_init', 'wpsh_load_widget' );

function on__widget_style(){
    $pluginDirComplete = plugin_basename(dirname(__FILE__));
    $pluginsWPDirComplete = basename(dirname(dirname(__FILE__)));
 
    $urlSite = get_settings('siteurl');
    $urlCSS = $urlSite . '/wp-content/'.$pluginsWPDirComplete.'/'.$pluginDirComplete.'/css/styles.css';
 
    wp_enqueue_style('on__traffsend', $urlCSS);
}
	add_action('wp_print_styles', 'on__widget_style');

?>