<?php
add_action('widgets_init','creat_widgets');

function creat_widgets(){
    register_widget('Tatee_Popular_Posts');
    
}
class Tatee_Popular_Posts extends WP_Widget{
    function __construct() {

        $tpwidget_options = array(

            'classname' => 'widget_recent_entries', // widget class

            'description' => 'Tatee Popular Posts'

        );

        parent::__construct('Tatee_Popular_Posts_widget_id', 'Tatee Popular Posts', $tpwidget_options);// ID, Name, .

    }



    /**

     * creat form option for widget

     */

    function form( $instance ) {



        //  Default Variables

        $default = array(

            'title' => '',

            'number' =>'',

        );



        $instance = wp_parse_args( (array) $instance, $default);



        $title = $instance['title'];

        $number =  $instance['number'];



        //Show form option in widget

        echo "<p>Enter Title <input type='text' class='widefat' name='".$this->get_field_name('title')."' value='".$title."' /></p>";

        echo "<p>Enter ID post you want Display. Ex: 12,13,... <input type='text' class='widefat' name='".$this->get_field_name('number')."' value='".$number."' /></p>";

    }

    

    /**

     * save widget form

     */

    

    function update( $new_instance, $old_instance ) {



        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['number'] = esc_attr( $new_instance['number'] );

        return $instance;

    }

    

    /**

     * Show widget

     */

    

    function widget( $args, $instance ) {



        extract( $args );

        $title = apply_filters( 'widget_title', $instance['title'] );

        echo wp_specialchars_decode($before_widget);



        // widget title



        // widget contact   

        ?> 

        <?php 
         if (isset($instance['number']) && $instance['number'] !='' ) {
           $num_cs_post = explode(',',$instance['number']);

         }else{ $num_rs_post = ''; }  
         $args = array(
          'post__in' => $num_cs_post,
          'posts_per_page' => -1,
        );
         $wp_query = new WP_Query($args);

        ?>

            <?php echo wp_specialchars_decode($before_title.$title.$after_title); ?>
            <ul>
                <?php if($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endwhile; endif; ?>
            </ul>
        
        <?php wp_reset_postdata(); ?>   

 <?php  // End of widget contact        

 echo wp_specialchars_decode($after_widget); 

}
}