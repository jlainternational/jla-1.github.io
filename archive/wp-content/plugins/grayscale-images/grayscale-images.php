<?php

/*
 * Plugin Name: Grayscale Images
 * Plugin URI: http://fontethemes.com/plugins/grayscale-images/
 * Description: This plugin converts all images to grayscale and show the colored image on hover
 * Version: 1.0.0
 * Author: Fonte Themes
 * Author URI: http://fontethemes.com/
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: grayscale-images
 * Domain Path: /languages/
 */

/*
 * This plugin is based on the work show at
 * http://www.majas-lapu-izstrade.lv/cross-browser-grayscale-image-example-using-css3-js-v2-0-with-browser-feature-detection-using-modernizr/ 
 */


function grayscale_images_enqueue_scripts() {
    wp_enqueue_style('normalize', plugins_url('/css/normalize.css', __FILE__));
    wp_enqueue_style('grayscale', plugins_url('/css/grayscale.css', __FILE__));    
    wp_enqueue_script('modernizr', plugins_url('/js/modernizr.custom.js', __FILE__), array( 'jquery' ) , 20150911, true);
    wp_enqueue_script('imagesloaded', plugins_url('/js/imagesloaded.pkgd.min.js', __FILE__), array( 'jquery' ) , 20150911, true);
    wp_enqueue_script('grayscale', plugins_url('/js/grayscale.js', __FILE__), array( 'jquery' ) , 20150911, true);
    wp_enqueue_script('functions', plugins_url('/js/functions.js', __FILE__), array( 'jquery' ) , 20150911, true);
}

add_action( 'wp_enqueue_scripts', 'grayscale_images_enqueue_scripts' );



