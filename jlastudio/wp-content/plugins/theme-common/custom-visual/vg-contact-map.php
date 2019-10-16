<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Contact Map','tatee'),
        'base' => 'contact_map',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Latitude','tatee'),
                'param_name' => 'latitude_cm',
                'value' => '',
                'description' => esc_html__('Enter Latitude for Map - ex: 51.51599299999999. Get in http://www.latlong.net/','tatee')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Longitude','tatee'),
                'param_name' => 'longtitude_cm',
                'value' => '',
                'description' => esc_html__('Enter Longitude for Map - ex: -0.1392256000000316. Get in http://www.latlong.net/','tatee')
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Upload Image For Marker ','tatee'),
                'param_name' => 'image_cm',
                'value' => '',
                'description' => esc_html__('',"tatee")
            ),

        )
    ));
}
add_shortcode('contact_map','contact_map_func');
function contact_map_func($atts,$content = null){
    extract(shortcode_atts(array(
        'latitude_cm' => '',
        'longtitude_cm' => '',
        'image_cm' => '',
    ),$atts));
    ob_start();
    ?>
    <?php if(isset($latitude_cm)&&$latitude_cm!=''&&isset($longtitude_cm)&&$longtitude_cm!=''){ ?>
        <?php if(isset($image_cm)&&$image_cm!=''){ $image_cm_src = wp_get_attachment_image_src($image_cm,''); ?>
        <div class="map-wrapper js-google-map m-b-60" data-makericon="<?php echo esc_url($image_cm_src[0]); ?>" data-makers="[[&quot;TATEE&quot;, &quot;Now that you visited our website,&lt;br&gt; how about checking out our office too?&quot;, <?php echo esc_attr($latitude_cm); ?>, <?php echo esc_attr($longtitude_cm); ?>]]">
            <div class="map__holder js-map-holder" id="map1"></div>
        </div>
    <?php } } ?>
    <?php
    return ob_get_clean();
}