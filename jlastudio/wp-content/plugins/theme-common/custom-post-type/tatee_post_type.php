<?php
function project_post_type() {


    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'tatee' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'tatee' ),
        'menu_name'             => __( 'Projects', 'tatee' ),
        'name_admin_bar'        => __( 'Project', 'tatee' ),
        'archives'              => __( 'Item Archives', 'tatee' ),
        'attributes'            => __( 'Item Attributes', 'tatee' ),
        'parent_item_colon'     => __( 'Parent Item:', 'tatee' ),
        'all_items'             => __( 'All Projects', 'tatee' ),
        'add_new_item'          => __( 'Add New Project', 'tatee' ),
        'add_new'               => __( 'Add New', 'tatee' ),
        'new_item'              => __( 'New Project', 'tatee' ),
        'edit_item'             => __( 'Edit Project', 'tatee' ),
        'update_item'           => __( 'Update Project', 'tatee' ),
        'view_item'             => __( 'View Project', 'tatee' ),
        'view_items'            => __( 'View Projects', 'tatee' ),
        'search_items'          => __( 'Search Project', 'tatee' ),
        'not_found'             => __( 'Not found', 'tatee' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'tatee' ),
        'featured_image'        => __( 'Featured Image', 'tatee' ),
        'set_featured_image'    => __( 'Set featured image', 'tatee' ),
        'remove_featured_image' => __( 'Remove featured image', 'tatee' ),
        'use_featured_image'    => __( 'Use as featured image', 'tatee' ),
        'insert_into_item'      => __( 'Insert into item', 'tatee' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'tatee' ),
        'items_list_navigation' => __( 'Items list navigation', 'tatee' ),
        'filter_items_list'     => __( 'Filter items list', 'tatee' ),
    );
    $args = array(
        'label'                 => __( 'Post Type', 'tatee' ),
        'description'           => __( 'Post Type Description', 'tatee' ),
        'labels'                => $labels,
        'supports'              => array('title','editor','thumbnail','revisions','post-formats','comments'),
        'taxonomies'            => array( '' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-admin-customizer',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'projects', $args );

}
add_action( 'init', 'project_post_type', 0 );

function categories_for_Project() {

    $labels = array(
        'name' => 'Categories for Projects',
        'singular' => 'Category',
        'menu_name' => 'Categories for Projects'
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,  /*true:quan he cha con, false: quan he nhu tag*/
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );

        /* Hàm register_taxonomy để khởi tạo taxonomy
         */
        register_taxonomy('categories_projects', 'projects', $args);

    }
    add_action( 'init', 'categories_for_Project', 0 );
