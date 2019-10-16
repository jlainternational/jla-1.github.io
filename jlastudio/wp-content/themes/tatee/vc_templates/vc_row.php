<?php

if ( ! defined( 'ABSPATH' ) ) {

	die( '-1' );

}



/**

 * Shortcode attributes

 * @var $atts

 * @var $el_class

 * @var $full_width

 * @var $full_height

 * @var $equal_height

 * @var $columns_placement

 * @var $content_placement

 * @var $parallax

 * @var $parallax_image

 * @var $css

 * @var $el_id

 * @var $video_bg

 * @var $video_bg_url

 * @var $video_bg_parallax

 * @var $parallax_speed_bg

 * @var $parallax_speed_video

 * @var $content - shortcode content

 * @var $css_animation

 * Shortcode class

 * @var $this WPBakeryShortCode_VC_Row

 */

$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';

$disable_element = '';

$output = $after_output = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );

extract( $atts );



wp_enqueue_script( 'wpb_composer_front_js' );



$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );



$css_classes = array(

	'vc_row customize-mind',

	'wpb_row',

	//deprecated

	'vc_row-fluid',

	$el_class,

	vc_shortcode_custom_css_class( $css ),

);



if ( 'yes' === $disable_element ) {

	if ( vc_is_page_editable() ) {

		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';

	} else {

		return '';

	}

}



if ( vc_shortcode_custom_css_has_property( $css, array(

	'border',

	'background',

) ) || $video_bg || $parallax

) {

	$css_classes[] = 'vc_row-has-fill';

}



if ( ! empty( $atts['gap'] ) ) {

	$css_classes[] = 'vc_column-gap-' . $atts['gap'];

}



$wrapper_attributes = array();

// build attributes for wrapper

if ( ! empty( $el_id ) ) {

	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';

}

if ( ! empty( $full_width ) ) {

	$wrapper_attributes[] = 'data-vc-full-width="true"';

	$wrapper_attributes[] = 'data-vc-full-width-init="false"';

	if ( 'stretch_row_content' === $full_width ) {

		$wrapper_attributes[] = 'data-vc-stretch-content="true"';

	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {

		$wrapper_attributes[] = 'data-vc-stretch-content="true"';

		$css_classes[] = 'vc_row-no-padding';

	}

	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';

}



if ( ! empty( $full_height ) ) {

	$css_classes[] = 'vc_row-o-full-height';

	if ( ! empty( $columns_placement ) ) {

		$flex_row = true;

		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;

		if ( 'stretch' === $columns_placement ) {

			$css_classes[] = 'vc_row-o-equal-height';

		}

	}

}



if ( ! empty( $equal_height ) ) {

	$flex_row = true;

	$css_classes[] = 'vc_row-o-equal-height';

}



if ( ! empty( $content_placement ) ) {

	$flex_row = true;

	$css_classes[] = 'vc_row-o-content-' . $content_placement;

}



if ( ! empty( $flex_row ) ) {

	$css_classes[] = 'vc_row-flex';

}



$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );



$parallax_speed = $parallax_speed_bg;

if ( $has_video_bg ) {

	$parallax = $video_bg_parallax;

	$parallax_speed = $parallax_speed_video;

	$parallax_image = $video_bg_url;

	$css_classes[] = 'vc_video-bg-container';

	wp_enqueue_script( 'vc_youtube_iframe_api_js' );

}



if ( ! empty( $parallax ) ) {

	wp_enqueue_script( 'vc_jquery_skrollr_js' );

	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed

	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;

	if ( false !== strpos( $parallax, 'fade' ) ) {

		$css_classes[] = 'js-vc_parallax-o-fade';

		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';

	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {

		$css_classes[] = 'js-vc_parallax-o-fixed';

	}

}



if ( ! empty( $parallax_image ) ) {

	if ( $has_video_bg ) {

		$parallax_image_src = $parallax_image;

	} else {

		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );

		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );

		if ( ! empty( $parallax_image_src[0] ) ) {

			$parallax_image_src = $parallax_image_src[0];

		}

	}

	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';

}

if ( ! $parallax && $has_video_bg ) {

	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';

}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

if (isset($bg_image_custom)) {

	$bg_image_customs = wp_get_attachment_image_src($bg_image_custom,'');

}

if ($style_element == '1') {

	$output .= '<section class="p-t-60 p-b-55">';
	$output .= '<div class="container">';
	//$output .= '<div class="row no-gutters">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;

	//$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';

}elseif ($style_element == '2') {
	$output .= '<section class="wrap wrap--w1790 p-b-75">';
	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	$output .= '</section>';
}elseif ($style_element == '3') {
	$output .= '<section class="p-t-40 p-b-55 p-md-t-70">';
	$output .= '<div class="container">';
	$output .= '<div class="media-about mh-about">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '4') {
	$output .= '<section class="p-t-43 p-b-85">';
	$output .= '<div class="container">';
	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;

	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '5') {
	$output .= '<section class="p-t-15">';
	$output .= '<div class="container">';
	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '6') {
	$output .= '<section class="p-t-50 p-b-60">';
	$output .= '<div class="container">';
	$output .= '<div class="row">';
	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '7') {
	$output .= '<section class="section-pp pp-easing section-pp--pad" data-background="light" data-title="What we do">';
	$output .= '<div class="section-content">';
	$output .= '<div class="container">';
	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '8') {
	$output .= '<section class="section-pp pp-easing  section-pp--pad" data-background="dark" data-title="testimonial" style="background-image:url('.esc_url($bg_image_customs[0]).') ;" >';
	$output .= '<div class="section-content">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '9') {
	$output .= '<section class="section-pp pp-easing section-pp--pad" data-background="light" data-title="Contact us">';
	$output .= '<div class="section-content ">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '10') {
	$output .= '<section class="section-pp pp-easing section-pp--pad" data-background="light" data-title="why choose us">';
	$output .= '<div class="section-content">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '11') {
	$output .= '<section class="section-pp pp-table pp-easing" data-background="dark" data-title="about us">';
	$output .= '<div class="mouse-wheel-wrap">
	<a class="mouse-wheel js-mouse-wheel" href="#">
	<span class="mouse-wheel__inner"></span>
	</a>
	<span class="ti-angle-double-down mouse-wheel__down"></span>
	</div>';
	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	$output .= '</section>';
}elseif ($style_element == '12') {
	$output .= '<section class="section-pp pp-easing section-pp--pad" data-background="dark" data-title="Latest Work" style="background-image:url('.esc_url($bg_image_customs[0]).') ;" >';
	$output .= '<div class="section-content">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '13') {
	$output .= '<section class="section p-b-80 contact-r">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '14') {
	$output .= '<section class="p-b-105 p-t-70">';
	$output .= '<div class="container">';
	$output .= '<div class="section-row section-row--fit">';
	$output .= '<div class="section-col-4 text-box-2">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '15') {
	$output .= '<section class="p-t-40 p-b-45">';
	$output .= '<div class="container">';
	$output .= '<div class="masonry-row js-isotope-wrapper" data-isotope-hori="true">';
	$output .= '<div class="row ">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '16') {
	$output .= '<section class="p-t-120">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '17') {
	$output .= '<section class="p-b-120 p-t-70">';
	$output .= '<div class="wrap wrap--w1790">';
	$output .= '<div class="container-fluid">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '18') {
	$output .= '<section class="p-t-120">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;

	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '19') {
	$output .= '<section class="p-t-25 p-b-100">';
	$output .= '<div class="container">';
	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;

	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '20') {
	$output .= '<section class="section p-t-115 p-b-135 contact-r">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;

	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '21') {
	$output .= '<section class="p-t-60 p-b-60">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;

	$output .= '</div>';
	$output .= '</section>';
}elseif ($style_element == '22') {
	$output .= '<section class="p-t-120 p-b-30">';
	$output .= '<div class="container">';

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;

	$output .= '</div>';
	$output .= '</section>';
}else{

	$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';

	$output .= wpb_js_remove_wpautop( $content );

	$output .= '</div>';

	$output .= $after_output;

}





echo wp_specialchars_decode($output);
