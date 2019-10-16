<?php


//Add thumbnail, automatic feed links and title tag support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );

//Add content width (desktop default)
if ( ! isset( $content_width ) ) {
	$content_width = 768;
}

//Add menu support and register main menu
if ( function_exists( 'register_nav_menus' ) ) {
  	register_nav_menus(
  		array(
  		  'main_menu' => 'Main Menu',
  		  'secondary_menu' => 'Secondary Menu',
  		  'footer_left_menu' => 'Footer Left Menu',
  		  'footer_right_menu' => 'Footer Right Menu'
  		)
  	);
}




// filter the Gravity Forms button type
add_filter('gform_submit_button', 'form_submit_button', 10, 2);
function form_submit_button($button, $form){
    return "<button class='button btn' id='gform_submit_button_{$form["id"]}'><span>{$form['button']['text']}</span></button>";
}

// Register sidebar
add_action('widgets_init', 'theme_register_sidebar');
function theme_register_sidebar() {
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'id' => 'sidebar-1',
		    'before_widget' => '<div id="%1$s" class="widget %2$s">',
		    'after_widget' => '</div>',
		    'before_title' => '<h4>',
		    'after_title' => '</h4>',
		 ));
	}
}

// Bootstrap_Walker_Nav_Menu setup

add_action( 'after_setup_theme', 'bootstrap_setup' );

if ( ! function_exists( 'bootstrap_setup' ) ):

	function bootstrap_setup(){


		class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {


			function start_lvl( &$output, $depth = 0, $args = array() ) {

				$indent = str_repeat( "\t", $depth );
				$output	   .= "\n$indent<ul class=\"subMenu\">\n";

			}

			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

				if (!is_object($args)) {
					return; // menu has not been configured
				}

				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

				$li_attributes = '';
				$class_names = $value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
				$classes[] = ($args->has_children) ? 'hasSubMenu' : '';
				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
				$classes[] = 'menu-item-' . $item->ID;


				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = ' class="' . esc_attr( $class_names ) . '"';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


				$item_output = $args->before;
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
			}

			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

				if ( !$element )
					return;

				$id_field = $this->db_fields['id'];

				//display this element
				if ( is_array( $args[0] ) )
					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
				else if ( is_object( $args[0] ) )
					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'start_el'), $cb_args);

				$id = $element->$id_field;

				// descend only when the depth is right and there are childrens for this element
				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

					foreach( $children_elements[ $id ] as $child ){

						if ( !isset($newlevel) ) {
							$newlevel = true;
							//start the child delimiter
							$cb_args = array_merge( array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
						}
						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
						unset( $children_elements[ $id ] );
				}

				if ( isset($newlevel) && $newlevel ){
					//end the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
				}

				//end this element
				$cb_args = array_merge( array(&$output, $element, $depth), $args);
				call_user_func_array(array(&$this, 'end_el'), $cb_args);
			}
		}
 	}
endif;


// START THEME OPTIONS
// custom theme options for user in admin area - Appearance > Theme Options
function pu_theme_menu()
{
  add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'pu_theme_options.php', 'pu_theme_page');
}
add_action('admin_menu', 'pu_theme_menu');

function pu_theme_page()
{
?>
    <div class="section panel">
      <h1>Custom Theme Options</h1>
      <form method="post" enctype="multipart/form-data" action="options.php">
      <hr>
        <?php

          settings_fields('pu_theme_options');

          do_settings_sections('pu_theme_options.php');
          echo '<hr>';
        ?>
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
      </form>
    </div>
    <?php
}



/**
 * Load site scripts.
 */
function bootstrap_theme_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// jQuery.
	if( !is_admin()){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ("http://code.jquery.com/jquery-1.12.2.min.js"), false, '1.12.2');
	wp_enqueue_script('jquery');
		}

	// Bootstrap
	wp_enqueue_script( 'input-script', $template_url . '/js/what-input.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'foundation-script', $template_url . '/js/foundation.min.js', array( 'jquery' ), null, true );
	if(is_home() or is_front_page()) :
	endif;
	if(is_page_template('page-templates/places-page-template.php')) :
		wp_enqueue_script( 'Imageloaded-script', 'https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'Isotope-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js', array( 'jquery' ), null, true );


	endif;
	 if(is_page_template('page-templates/jobs-page-template.php')) :
	 wp_enqueue_script( 'Modal-script', $template_url . '/js/jquery.modal.js', array( 'jquery' ), null, true );
	 wp_enqueue_style( 'Modal-style', $template_url.'/css/jquery.modal.css' );
	 endif;
wp_enqueue_script( 'custom-scroll', $template_url . '/js/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'slick-script', $template_url . '/js/slick.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'app-script', $template_url . '/js/app.js', array( 'jquery' ), null, true );
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' );
	wp_enqueue_style( 'slick-style', $template_url.'/css/slick.css' );
		wp_enqueue_style( 'slick-style', $template_url.'/css/jquery.mCustomScrollbar.min.css' );
	wp_enqueue_style( 'app-style', $template_url.'/css/app.css' );



	//Main Style
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );



}

add_action( 'wp_enqueue_scripts', 'bootstrap_theme_enqueue_scripts', 1 );
//////////// Check ACF Field if exists or not
function check_acf_field($field_name) {
	if(function_exists('get_field')) :
	if(get_field($field_name) and get_field($field_name)!='') :
	return true;
	else :
	return false;
	endif;
	else : return false;
	endif;
}

function check_acf_sub_field($field_name) {
	if(function_exists('get_sub_field')) :
	if(get_sub_field($field_name) and get_sub_field($field_name)!='') :
	return true;
	else :
	return false;
	endif;
	else : return false;
	endif;
}
/////////////////////////////////////////////////////////////////////////////////////
add_filter('body_class','custom_body_class');
function custom_body_class($classes = '') {
	if(check_acf_field('page_color'))
$classes[]=get_field('page_color');
if('news'==get_post_type())
	$classes[]='green';
	return $classes;
}
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));




}
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
    function custom_post_type() {

// Set UI labels for Custom Post Type
        $labels = array(
            'name' => _x('News', 'Post Type General Name', 'bootstrapwp'),
            'singular_name' => _x('News Item', 'Post Type Singular Name', 'bootstrapwp'),
            'menu_name' => __('News', 'bootstrapwp'),
            'parent_item_colon' => __('Parent News', 'bootstrapwp'),
            'all_items' => __('All News', 'bootstrapwp'),
            'view_item' => __('View News', 'bootstrapwp'),
            'add_new_item' => __('Add New News', 'bootstrapwp'),
            'add_new' => __('Add New', 'bootstrapwp'),
            'edit_item' => __('Edit News', 'bootstrapwp'),
            'update_item' => __('Update News', 'bootstrapwp'),
            'search_items' => __('Search News', 'bootstrapwp'),
            'not_found' => __('Not Found', 'bootstrapwp'),
            'not_found_in_trash' => __('Not found in Trash', 'bootstrapwp'),
        );

		$labels2 = array(
            'name' => _x('Places', 'Post Type General Name', 'bootstrapwp'),
            'singular_name' => _x('Place', 'Post Type Singular Name', 'bootstrapwp'),
            'menu_name' => __('Places', 'bootstrapwp'),
            'parent_item_colon' => __('Parent Place', 'bootstrapwp'),
            'all_items' => __('All Places', 'bootstrapwp'),
            'view_item' => __('View Place', 'bootstrapwp'),
            'add_new_item' => __('Add New Place', 'bootstrapwp'),
            'add_new' => __('Add New', 'bootstrapwp'),
            'edit_item' => __('Edit Place', 'bootstrapwp'),
            'update_item' => __('Update Place', 'bootstrapwp'),
            'search_items' => __('Search Place', 'bootstrapwp'),
            'not_found' => __('Not Found', 'bootstrapwp'),
            'not_found_in_trash' => __('Not found in Trash', 'bootstrapwp'),
        );
		$labels3 = array(
            'name' => _x('Sectors', 'Post Type General Name', 'bootstrapwp'),
            'singular_name' => _x('Sector', 'Post Type Singular Name', 'bootstrapwp'),
            'menu_name' => __('Sectors', 'bootstrapwp'),
            'parent_item_colon' => __('Parent Sector', 'bootstrapwp'),
            'all_items' => __('All Sectors', 'bootstrapwp'),
            'view_item' => __('View Sector', 'bootstrapwp'),
            'add_new_item' => __('Add New Sector', 'bootstrapwp'),
            'add_new' => __('Add New', 'bootstrapwp'),
            'edit_item' => __('Edit Sector', 'bootstrapwp'),
            'update_item' => __('Update Sector', 'bootstrapwp'),
            'search_items' => __('Search Sectors', 'bootstrapwp'),
            'not_found' => __('Not Found', 'bootstrapwp'),
            'not_found_in_trash' => __('Not found in Trash', 'bootstrapwp'),
        );
		$labels4 = array(
            'name' => _x('Services', 'Post Type General Name', 'bootstrapwp'),
            'singular_name' => _x('Service', 'Post Type Singular Name', 'bootstrapwp'),
            'menu_name' => __('Services', 'bootstrapwp'),
            'parent_item_colon' => __('Parent Service', 'bootstrapwp'),
            'all_items' => __('All Services', 'bootstrapwp'),
            'view_item' => __('View Service', 'bootstrapwp'),
            'add_new_item' => __('Add New Service', 'bootstrapwp'),
            'add_new' => __('Add New', 'bootstrapwp'),
            'edit_item' => __('Edit Service', 'bootstrapwp'),
            'update_item' => __('Update Service', 'bootstrapwp'),
            'search_items' => __('Search Service', 'bootstrapwp'),
            'not_found' => __('Not Found', 'bootstrapwp'),
            'not_found_in_trash' => __('Not found in Trash', 'bootstrapwp'),
        );

		$labels5 = array(
            'name' => _x('Jobs', 'Post Type General Name', 'bootstrapwp'),
            'singular_name' => _x('Job', 'Post Type Singular Name', 'bootstrapwp'),
            'menu_name' => __('Jobs', 'bootstrapwp'),
            'parent_item_colon' => __('Parent Job', 'bootstrapwp'),
            'all_items' => __('All Jobs', 'bootstrapwp'),
            'view_item' => __('View Job', 'bootstrapwp'),
            'add_new_item' => __('Add New Job', 'bootstrapwp'),
            'add_new' => __('Add New', 'bootstrapwp'),
            'edit_item' => __('Edit Job', 'bootstrapwp'),
            'update_item' => __('Update Job', 'bootstrapwp'),
            'search_items' => __('Search Jobs', 'bootstrapwp'),
            'not_found' => __('Not Found', 'bootstrapwp'),
            'not_found_in_trash' => __('Not found in Trash', 'bootstrapwp'),
        );

		$labels6 = array(
            'name' => _x('Locations', 'Post Type General Name', 'bootstrapwp'),
            'singular_name' => _x('Location', 'Post Type Singular Name', 'bootstrapwp'),
            'menu_name' => __('Locations', 'bootstrapwp'),
            'parent_item_colon' => __('Parent Location', 'bootstrapwp'),
            'all_items' => __('All Locations', 'bootstrapwp'),
            'view_item' => __('View Location', 'bootstrapwp'),
            'add_new_item' => __('Add New Location', 'bootstrapwp'),
            'add_new' => __('Add New', 'bootstrapwp'),
            'edit_item' => __('Edit Location', 'bootstrapwp'),
            'update_item' => __('Update Location', 'bootstrapwp'),
            'search_items' => __('Search Locations', 'bootstrapwp'),
            'not_found' => __('Not Found', 'bootstrapwp'),
            'not_found_in_trash' => __('Not found in Trash', 'bootstrapwp'),
        );



// Set other options for Custom Post Type

        $args = array(
            'label' => __('News', 'bootstrapwp'),
            'description' => __('JLA News', 'bootstrapwp'),
            'labels' => $labels,
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'revisions'),
            // You can associate this CPT with a taxonomy or custom taxonomy.
            'taxonomies' => array('news'),
            /* A hierarchical CPT is like Pages and can have
             * Parent and child items. A non-hierarchical CPT
             * is like Posts.
             */
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );


		$args2 = array(
            'label' => __('Places', 'bootstrapwp'),
            'description' => __('JLA Places', 'bootstrapwp'),
            'labels' => $labels2,
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'revisions','thumbnail'),
            // You can associate this CPT with a taxonomy or custom taxonomy.
            'taxonomies' => array('places'),
            /* A hierarchical CPT is like Pages and can have
             * Parent and child items. A non-hierarchical CPT
             * is like Posts.
             */
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );

		$args3 = array(
            'label' => __('Sectors', 'bootstrapwp'),
            'description' => __('JLA Sectors', 'bootstrapwp'),
            'labels' => $labels3,
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'revisions','thumbnail','editor'),
            // You can associate this CPT with a taxonomy or custom taxonomy.
            'taxonomies' => array('sectors_cat'),
            /* A hierarchical CPT is like Pages and can have
             * Parent and child items. A non-hierarchical CPT
             * is like Posts.
             */
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );

		$args4 = array(
            'label' => __('Services', 'bootstrapwp'),
            'description' => __('JLA Services', 'bootstrapwp'),
            'labels' => $labels4,
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'revisions','thumbnail','editor'),
            // You can associate this CPT with a taxonomy or custom taxonomy.
            'taxonomies' => array('services_cat'),
            /* A hierarchical CPT is like Pages and can have
             * Parent and child items. A non-hierarchical CPT
             * is like Posts.
             */
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );

		$args5 = array(
            'label' => __('Jobs', 'bootstrapwp'),
            'description' => __('JLA Jobs', 'bootstrapwp'),
            'labels' => $labels5,
            // Features this CPT supports in Post Editor
            'supports' => array('title', 'revisions'),
            // You can associate this CPT with a taxonomy or custom taxonomy.
            'taxonomies' => array('jobs_cat'),
            /* A hierarchical CPT is like Pages and can have
             * Parent and child items. A non-hierarchical CPT
             * is like Posts.
             */
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );

		$args6 = array(
            'label' => __('Locations', 'bootstrapwp'),
            'description' => __('JLA Locations', 'bootstrapwp'),
            'labels' => $labels6,
            // Features this CPT supports in Post Editor
            'supports' => array('title'),
            // You can associate this CPT with a taxonomy or custom taxonomy.
            'taxonomies' => array('locations_cat'),
            /* A hierarchical CPT is like Pages and can have
             * Parent and child items. A non-hierarchical CPT
             * is like Posts.
             */
            'hierarchical' => false,
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );




        // Set UI labels for Custom Post Type
        register_post_type('news', $args);
        register_post_type('places', $args2);
        register_post_type('sectors', $args3);
        register_post_type('services', $args4);
        register_post_type('jobs', $args5);
        register_post_type('locations', $args6);



    }

    add_action('init', 'custom_post_type', 0);
	////////////////////////////////////////////
		function kriesi_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo '<ul class="pagination" role="navigation" aria-label="Pagination">';
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? '<li class="current"><span class="show-for-sr">Youre on page</span>'.$i."</li>":"<li><a aria-label='Page $i' href='".get_pagenum_link($i)."'>".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</ul>\n";
     }
}
add_action( 'pre_get_posts', function( $query ) {

    // Check that it is the query we want to change: front-end search query
    if( $query->is_main_query() && ! is_admin() && $query->is_search() ) {

        // Change the query parameters
        $query->set( 'posts_per_page', 5 );

    }

}
 );

 // Add Columns to Admin Screen of Places
add_filter('manage_places_posts_columns', 'ST4_columns_head_only_places', 10);
add_action('manage_places_posts_custom_column', 'ST4_columns_content_only_places', 10, 2);

// CREATE TWO FUNCTIONS TO HANDLE THE COLUMN
function ST4_columns_head_only_places($defaults) {
    $defaults['sector'] = 'Sector';
    $defaults['location'] = 'Location';
    return $defaults;
}
function ST4_columns_content_only_places($column_name, $post_ID) {
	    $custom = get_post_custom($post_ID);

    if ($column_name == 'sector') {

       $sec=get_field('place_sector',$post_ID);
	   foreach($sec as $s)
	   echo $s.",";
    }
	if ($column_name == 'location') {
       $loc=get_field('place_location',$post_ID);
	   foreach ($loc as $l)
	   echo get_the_title($l).",";
    }
}
?>
