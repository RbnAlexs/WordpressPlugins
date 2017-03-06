<?php

/*
Plugin Name: Post_Elements_Widget
Plugin URI: No public
Description: Muestra la composición de las entradas. 
Author: M2i Techteam
Author URI: http://metrics2index.com/
Version: 1.0
Text Domain: Post_Elements_Widget
*/

// Creating the widget 
class post_elements_widget extends WP_Widget {

function __construct() {
parent::__construct(
// IB base del widget
'post_elements_widget', 
// Nombre público del widget en UI
__('Post Elements Widget', 'post_elements_widget_domain'), 
// Descricpción de Widget
array( 'description' => __( 'Muestra la composición de las entradas. ' ), ) 
);
}

public function widget( $args, $instance ) { 

$img = apply_filters( 'widget_img', $instance['img'] );
$cat = apply_filters( 'widget_cat', $instance['cat'] );
$tit = apply_filters( 'widget_tit', $instance['tit'] );
$descprod = apply_filters( 'widget_descprod', $instance['descprod'] );
$contprod = apply_filters( 'widget_contprod', $instance['contprod'] );
$tags = apply_filters( 'widget_tags', $instance['tags'] );
$date = apply_filters( 'widget_date', $instance['date(format)'] );
$share = apply_filters( 'widget_share', $instance['share'] );
$author = apply_filters( 'widget_author', $instance['author'] );
$author = apply_filters( 'widget_comentarios', $instance['comentarios'] );
$extra_small = apply_filters( 'widget_extra_small', $instance['extra_small'] );
$small = apply_filters( 'widget_small', $instance['small'] );
$medium = apply_filters( 'widget_medium', $instance['medium'] );


echo $args['before_widget']; ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="contenido">
 
    <?php if('on' == $instance['tit']) { ?>
        <!--Titulo-->
        
        <div class="titulo_post">
        <?php the_title(); ?>
        </div>
        
    <?php } else { } ?> 
       
   

    <?php if('on' == $instance['cat']) { ?>
        <!--Categoría-->
        <?php
        $the_cat = get_the_category();
        $category_name = $the_cat[0]->cat_name;
        $category_description = $the_cat[0]->category_description;
        $category_link = get_category_link( $the_cat[0]->cat_ID );
        ?>
        <a href="<?php echo esc_url( $category_link );?>"><span class="categoria_post"><?php echo $category_name ?></span></a>
    <?php } else {} ?>

    <?php if('on' == $instance['author'] ) { ?>
    <span class="author">| <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?> </a></span>
    <?php } else { } ?>  
    
    <?php if('on' == $instance['share']) { ?>

    <?php   
    global $post;
    $permalink = get_permalink($post->ID);
    $title = get_the_title();
     ?>  
    
   
<div class="share_buttons">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-4">  
            <div class="share">
                <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" 
                href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>">
                    <img src="<?php echo get_bloginfo('template_directory');?>/css/images/cm-FB.png?>"> 
                </a>
            </div>            
        </div>
        
        <div class="col-xs-6 col-sm-6 col-md-4">
            <div class="share">
                <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" 
                href="http://twitter.com/share?url=<?php the_permalink() ?>&text='<?php the_title(); ?>'&via=appleseedmexico">
                    <img src="<?php echo get_bloginfo('template_directory');?>/css/images/cm-TW.png?>">         
                </a>    
            </div>      
        </div>


        <div class="col-xs-6 col-sm-6 col-md-4" >
            <div class="share">
                <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" 
                href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php the_permalink(); ?>">
                    <img src="<?php echo get_bloginfo('template_directory');?>/css/images/cm-IN.png?>"> 
                </a>
            </div>            
        </div>


        <div class="col-xs-6 col-sm-6">
            <div class="whatsapp">
                <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;"  
                href="whatsapp://send?text=<?php the_permalink();?>" data-action="share/whatsapp/share">
                    <img src="<?php echo get_bloginfo('template_directory');?>/css/images/cm-WA.png?>"> 
                </a> 
            </div>             
        </div>  
    </div>
</div>
      
    <?php } else { }?>

    <?php if('on' == $instance['img']) { ?>
        <!--Imagen-->
        <div style="width:100%">
            <div class="imagen center-block">
                <?php echo the_post_thumbnail('full'); ?> 
            </div>
        </div>
    <?php } else { } ?> 

    <?php if('on' == $instance['descprod']) { ?>
        <!--Descripción-->
        <div class="extracto_post">
            <?php echo get_the_excerpt(); ?>
        </div>
        
    <?php } else { }?> 
     
    <?php if('on' == $instance['date'] ) { ?>
    <!--Fecha-->
    <div class="fecha"><?php echo '<i class="fa fa-clock-o"></i> Publicado hace '. human_time_diff(get_the_time('U'), current_time('timestamp')); ?></div>

     
     
     
    <?php } else { }?>

    <?php if('on' == $instance['contprod']) { ?>
        <!--Contenido Principal--> 
        <div class="contenido_post">
            <?php the_content(); ?>
        </div>

    <?php } else { }?>
      <?php if('on' == $instance['tags']) { ?>
        <span class="tag"><?php the_tags('TAGS: ', ', ', ''); ?></span>
      <?php } else { }?>
        
    <?php if('on' == $instance['comentarios']) { ?>
        <?php comments_template(); ?> 
    <?php } else { }?>    


</div>

<?php endwhile; ?>
<?php endif; ?>

<?php

echo $args['after_widget'];

}

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

if ( isset( $instance[ 'date' ] ) ) {
$author = $instance[ 'date' ];
}
else {
}
if ( isset( $instance[ 'author' ] ) ) {
$author = $instance[ 'author' ]; 
}
else {
}

if ( isset( $instance[ 'img' ] ) ) {
$img = $instance[ 'img' ];
}
else {
}
if ( isset( $instance[ 'cat' ] ) ) {
$cat = $instance[ 'cat' ];
}
else {
}
if ( isset( $instance[ 'tit' ] ) ) {
$tit = $instance[ 'tit' ];
}
else {
}
if ( isset( $instance[ 'descprod' ] ) ) {
$descprod = $instance[ 'descprod' ];
}
else {
}
if ( isset( $instance[ 'contprod' ] ) ) {
$contprod = $instance[ 'contprod' ];
}
else {
}
if ( isset( $instance[ 'tags' ] ) ) {
$tags = $instance[ 'tags' ];
}
else {
}
if ( isset( $instance[ 'share' ] ) ) {
$share = $instance[ 'share' ];
}
else {
}
if ( isset( $instance[ 'comentarios' ] ) ) {
$comentarios = $instance[ 'comentarios' ];
}
else {
}


?>

<!--Categoría-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['cat'], 'on'); ?> 
id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" />
<label for="<?php echo $this->get_field_id( 'cat' ); ?>"><?php _e( 'Mostrar Categoría' ); ?></label> 
</p>
<!--Parte del Author-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['author'], 'on'); ?> id="<?php echo $this->get_field_id('author'); ?>" name="<?php echo $this->get_field_name('author'); ?>" />     
<label for="<?php echo $this->get_field_id( 'author' ); ?>"><?php _e( 'Mostrar el autor de la entrada' ); ?></label> 
</p>

<!--Imagen-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['img'], 'on'); ?> 
id="<?php echo $this->get_field_id('img'); ?>" name="<?php echo $this->get_field_name('img'); ?>" />
<label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e( 'Mostrar Imagen' ); ?></label> 
</p>

<!--Titulo-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['tit'], 'on'); ?> 
id="<?php echo $this->get_field_id('tit'); ?>" name="<?php echo $this->get_field_name('tit'); ?>" />
<label for="<?php echo $this->get_field_id( 'tit' ); ?>"><?php _e( 'Mostrar Titulo' ); ?></label> 
</p>

<!--Fecha-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['date'], 'on'); ?> id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" />   
<label for="<?php echo $this->get_field_id( 'date' ); ?>"><?php _e( ' Mostrar la fecha de la entrada' ); ?></label> 
</p>

<!--Descripción-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['descprod'], 'on'); ?> 
id="<?php echo $this->get_field_id('descprod'); ?>" name="<?php echo $this->get_field_name('descprod'); ?>" />
<label for="<?php echo $this->get_field_id( 'descprod' ); ?>"><?php _e( 'Mostrar Descripción' ); ?></label> 
</p>

<!--Contenido-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['contprod'], 'on'); ?> 
id="<?php echo $this->get_field_id('contprod'); ?>" name="<?php echo $this->get_field_name('contprod'); ?>" />
<label for="<?php echo $this->get_field_id( 'contprod' ); ?>"><?php _e( 'Mostrar Contenido' ); ?></label> 
</p>  

<p>
<input class="checkbox" type="checkbox" <?php checked($instance['tags'], 'on'); ?> 
id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" />
<label for="<?php echo $this->get_field_id( 'tags' ); ?>"><?php _e( 'Mostrar Tags' ); ?></label> 
</p>  

<!--Parte del Share Buttons-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['share'], 'on'); ?> id="<?php echo $this->get_field_id('share'); ?>" name="<?php echo $this->get_field_name('share'); ?>" />   
<label for="<?php echo $this->get_field_id( 'share' ); ?>"><?php _e( 'Mostrar botones de compartir contenido' ); ?></label> 
</p>

<!--Parte de comentarios-->
<p>
<input class="checkbox" type="checkbox" <?php checked($instance['comentarios'], 'on'); ?> id="<?php echo $this->get_field_id('comentarios'); ?>" name="<?php echo $this->get_field_name('comentarios'); ?>" />   
<label for="<?php echo $this->get_field_id( 'comentarios' ); ?>"><?php _e( 'Mostrar box de comentarios' ); ?></label> 
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

public function update( $new_instance, $old_instance ) { 
$instance = array();
$instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
$instance['cat'] = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';
$instance['tit'] = ( ! empty( $new_instance['tit'] ) ) ? strip_tags( $new_instance['tit'] ) : '';
$instance['descprod'] = ( ! empty( $new_instance['descprod'] ) ) ? strip_tags( $new_instance['descprod'] ) : '';
$instance['contprod'] = ( ! empty( $new_instance['contprod'] ) ) ? strip_tags( $new_instance['contprod'] ) : '';
$instance['tags'] = ( ! empty( $new_instance['tags'] ) ) ? strip_tags( $new_instance['tags'] ) : '';
$instance['date'] = ( ! empty( $new_instance['date'] ) ) ? strip_tags( $new_instance['date'] ) : '';
$instance['share'] = ( ! empty( $new_instance['share'] ) ) ? strip_tags( $new_instance['share'] ) : '';
$instance['author'] = ( ! empty( $new_instance['author'] ) ) ? strip_tags( $new_instance['author'] ) : '';
$instance['comentarios'] = ( ! empty( $new_instance['comentarios'] ) ) ? strip_tags( $new_instance['comentarios'] ) : '';
$instance['extra_small'] = ( ! empty( $new_instance['extra_small'] ) ) ? strip_tags( $new_instance['extra_small'] ) : '';
$instance['small'] = ( ! empty( $new_instance['small'] ) ) ? strip_tags( $new_instance['small'] ) : '';
$instance['medium'] = ( ! empty( $new_instance['medium'] ) ) ? strip_tags( $new_instance['medium'] ) : '';

    return $instance;
    }
} 

function pew_load_widget() {
    register_widget( 'post_elements_widget' );
}
add_action( 'widgets_init', 'pew_load_widget' );

?>