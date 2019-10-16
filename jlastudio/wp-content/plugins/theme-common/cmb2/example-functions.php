<?php

/**

 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)

 *

 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.

 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/

 *

 * @category YourThemeOrPlugin

 * @package  Demo_CMB2

 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)

 * @link     https://github.com/WebDevStudios/CMB2

 */



/**

 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!

 */



if ( file_exists( get_template_directory() . '/framework/cmb2/init.php' ) ) {

	require_once  get_template_directory() . '/framework/cmb2/init.php';

} elseif ( file_exists(  get_template_directory() . '/framework/includes/CMB2/init.php' ) ) {

	require_once  get_template_directory() . '/framework/includes/CMB2/init.php';

}



/**

 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' cmb2_box parameter

 *

 * @param  CMB2 object $cmb CMB2 object

 *

 * @return bool             True if metabox should show

 */

function yourprefix_show_if_front_page( $cmb ) {

	// Don't show this metabox if it's not the front page template

	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {

		return false;

	}

	return true;

}



/**

 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter

 *

 * @param  CMB2_Field object $field Field object

 *

 * @return bool                     True if metabox should show

 */

function yourprefix_hide_if_no_cats( $field ) {

	// Don't show this field if not in the cats category

	if ( ! has_tag( 'cats', $field->object_id ) ) {

		return false;

	}

	return true;

}



/**

 * Conditionally displays a message if the $post_id is 2

 *

 * @param  array             $field_args Array of field parameters

 * @param  CMB2_Field object $field      Field object

 */

function yourprefix_before_row_if_2( $field_args, $field ) {

	if ( 2 == $field->object_id ) {

		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';

	} else {

		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';

	}

}



add_action( 'cmb2_admin_init', 'tatee_post_blog_metabox' );

function tatee_post_blog_metabox() {

	$prefix = '_cmb_';



	$cmb_tatee = new_cmb2_box( array(

		'id'            => $prefix . 'post_blog',

		'title'         => __( 'Information Metabox', 'cmb2' ),

		'object_types'  => array( 'post'), // Post type

		'fields' => array(					            



			array(

				'name' => esc_html__( 'Video of Post for Single Blog', 'cmb2' ),

				'desc' => sprintf(

					esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at %s.', 'cmb2' ),

					'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'

				),

				'id'   => $prefix . 'video_single_post',

				'type' => 'oembed',

			),
			array(

				'name' => __( 'Option Display', 'cmb' ),

				'desc' => __( 'Display Sidebar Or Display Full Width.', 'cmb2' ),

				'id'   => $prefix . 'show_sb',

				'type' => 'radio',

				'options' => array(

					'1' => esc_html__( 'Full Width', 'cmb2' ),

					'2' => esc_html__( 'Display Sidebar', 'cmb2' ),

				),

			),
			array(

				'name' => __( 'Thumbnail Image 1200x675 ', 'cmb2' ),

				'desc' => __( 'Ex: If You choice Full Width, You need choice images size 1200x675', 'cmb2' ),

				'id'   => $prefix . 'thumbnail_img_1200',

				'type' => 'file',

			),

		),



	)

);
	$cmb_tatee->add_field( array(

		'name'         => esc_html__( 'Images Slide for Single Post', 'cmb2' ),

		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'cmb2' ),

		'id'           => $prefix . 'images_slide_blog',

		'type'         => 'file_list',

		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )

	) );

}
add_action( 'cmb2_admin_init', 'tatee_post_project_metabox' );

function tatee_post_project_metabox() {

	$prefix = '_cmb_';



	$cmb_tatee = new_cmb2_box( array(

		'id'            => $prefix . 'post_project',

		'title'         => __( 'Information Metabox', 'cmb2' ),

		'object_types'  => array( 'projects'), // Post type

		'fields' => array(					            

			array(

				'name' => __( 'Select the display type', 'cmb' ),

				'desc' => __( 'You can choice 1 in 4 type', 'cmb2' ),

				'id'   => $prefix . 'type_dis',

				'type' => 'radio',

				'options' => array(

					'1' => esc_html__( 'Project Detail 1. Info and Content Display in Top', 'cmb2' ),
					'2' => esc_html__( 'Project Detail 2. Info and Content Display in Sidebar', 'cmb2' ),
					'3' => esc_html__( 'Project Detail 3. Image Display Type Slide', 'cmb2' ),
					'4' => esc_html__( 'Project Detail 4. Info and Content Display in bottom', 'cmb2' ),

				),

			),
			array(

				'name' => __( 'Location', 'cmb2' ),

				'desc' => __( 'EX: Perth, Australia', 'cmb2' ),

				'id'   => $prefix . 'pro_location',

				'type' => 'text',

			),
			array(

				'name' => __( 'Link For Button Bar', 'cmb2' ),

				'desc' => __( 'Enter Link', 'cmb2' ),

				'id'   => $prefix . 'link_button',

				'type' => 'text',

			),
			array(

				'name' => __( 'Thumbnail Image 1170x657 ', 'cmb2' ),

				'desc' => __( 'This Image use in Project Grid Carousel', 'cmb2' ),

				'id'   => $prefix . 'thumbnail_img_1170x657',

				'type' => 'file',

			),
			array(

				'name' => __( 'Thumbnail Image 960x1405 ', 'cmb2' ),

				'desc' => __( 'This Image use in Project Grid Full Width', 'cmb2' ),

				'id'   => $prefix . 'thumbnail_img_960',

				'type' => 'file',

			),
			array(

				'name' => __( 'Thumbnail Image 960x600 ', 'cmb2' ),

				'desc' => __( 'This Image use in Project Grid Standard', 'cmb2' ),

				'id'   => $prefix . 'thumbnail_img_960x600',

				'type' => 'file',

			),
			array(

				'name' => __( 'Thumbnail Image 960x711 ', 'cmb2' ),

				'desc' => __( 'This Image use in Project Grid Masonry', 'cmb2' ),

				'id'   => $prefix . 'thumbnail_img_960x711',

				'type' => 'file',

			),
			array(

				'name' => __( 'Thumbnail Image 680x480 ', 'cmb2' ),

				'desc' => __( 'This Image use in Home One Page', 'cmb2' ),

				'id'   => $prefix . 'thumbnail_img_680',

				'type' => 'file',

			),
			array(

				'name' => __( 'Thumbnail Image 640x986 ', 'cmb2' ),

				'desc' => __( 'This Image use in Project Grid Masonry', 'cmb2' ),

				'id'   => $prefix . 'thumbnail_img_640x986',

				'type' => 'file',

			),
			array(

				'name' => __( 'Thumbnail Image 640x467 ', 'cmb2' ),

				'desc' => __( 'This Image use in Project Grid Masonry', 'cmb2' ),

				'id'   => $prefix . 'thumbnail_img_640x467',

				'type' => 'file',

			),

			

		),



	)

);
	$cmb_tatee->add_field( array(

		'name'         => esc_html__( 'Images for Content Project Post', 'cmb2' ),

		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'cmb2' ),

		'id'           => $prefix . 'images_content_project',

		'type'         => 'file_list',

		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )

	) );

}
add_action( 'cmb2_admin_init', 'tatee_page_metabox' );

function tatee_page_metabox() {

	$prefix = '_cmb_';



	$cmb_tatee = new_cmb2_box( array(

		'id'            => $prefix . 'page',

		'title'         => __( 'Information Metabox', 'cmb2' ),

		'object_types'  => array( 'page'), // Post type

		'fields' => array(

			array(

				'name' => __( 'Select the type Header', 'cmb' ),

				'desc' => __( 'You can choice 1 in 7 type', 'cmb2' ),

				'id'   => $prefix . 'type_head',

				'type' => 'radio',

				'options' => array(

					'1' => esc_html__( 'Type Header 1. Basic Header', 'cmb2' ),
					'2' => esc_html__( 'Type Header 2. Opacity Header ', 'cmb2' ),
					'3' => esc_html__( 'Type Header 3. Opacity Header Type 1.Note: Only Use For Vertical Slider', 'cmb2' ),
					'4' => esc_html__( 'Type Header 4. Opacity Header Type 2', 'cmb2' ),
					'5' => esc_html__( 'Type Header 5. Opacity Header Type 3', 'cmb2' ),
					'6' => esc_html__( 'Type Header 6. Container Header', 'cmb2' ),
					'7' => esc_html__( 'Type Header 7. Container Header Type 2', 'cmb2' ),
					'8' => esc_html__( 'Type Header 8. Container Header type 3', 'cmb2' ),
				),


			),				            
			
		),



	)

);

}