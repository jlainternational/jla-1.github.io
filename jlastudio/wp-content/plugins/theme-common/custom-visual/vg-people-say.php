<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'People Say','tatee'),
        'base' => 'people_say',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('All People Say','tatee'),
                'param_name' => 'details_peo',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Name People','tatee'),
                        'param_name' => 'name_peo',
                        'value' => '',
                        'description' => esc_html__('Ex: David, Nani , ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Jop People','tatee'),
                        'param_name' => 'job_peo',
                        'value' => '',
                        'description' => esc_html__('Ex: CEO, IT , ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link People','tatee'),
                        'param_name' => 'link_peo',
                        'value' => '',
                        'description' => esc_html__('Ex: #, ...',"tatee")
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Content','tatee'),
                        'param_name' => 'content_peo',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image People','tatee'),
                        'param_name' => 'image_peo',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert People Say',"tatee")
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Color Arrow','tatee'),
                'param_name' => 'color_arraw',
                'value' => array(
                    esc_html__( 'Dark', 'tatee' ) => 1,
                    esc_html__( 'Light', 'tatee' ) => 2,
                ),
                'description' => esc_html__('',"tatee")
            ),
            
        )
    ));
}
add_shortcode('people_say','people_say_func');
function people_say_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_peo' => '',
        'color_arraw' => '',
    ),$atts));
    ob_start();
    ?>
    <div class="slick-wrap slick-testi js-slick-wrapper" data-slick-xs="1" data-slick-sm="1" data-slick-md="1" data-slick-lg="2" data-slick-xl="2" data-slick-customnav="true" data-slick-autoplay="true">
        <div class="slick-wrap-content">
            <div class="slick-content js-slick-content">
                <?php if(isset($details_peo)&&$details_peo!=''){ 
                    $details_peo = vc_param_group_parse_atts($details_peo,'');
                    foreach ($details_peo as $dp ) {
                        ?>
                        <div class="slick-item">
                            <div class="media-testi">
                                <?php if(isset($dp['content_peo'])&&$dp['content_peo']!=''){ ?>
                                    <p class="media__text"><?php echo wp_specialchars_decode($dp['content_peo']) ; ?></p>
                                <?php } ?>
                                <div class="media__title">
                                    <span class="ti-quote-left quote"></span>
                                    <?php if(isset($dp['name_peo'])&&$dp['name_peo']!=''){ ?>
                                        <h4 class="name">
                                            <a href="<?php echo esc_attr($dp['link_peo']); ?>"><?php echo esc_html($dp['name_peo']); ?></a>
                                        </h4>
                                    <?php } ?>
                                    <?php if(isset($dp['job_peo'])&&$dp['job_peo']!=''){ ?>
                                        <span class="job"><?php echo esc_html($dp['job_peo']); ?></span>
                                    <?php } ?>
                                </div>
                                <?php if(isset($dp['image_peo'])&&$dp['image_peo']!=''){ 
                                    $dp['image_peo'] = wp_get_attachment_image_src($dp['image_peo'],'');
                                    ?>
                                    <figure class="media__img img--rounded">
                                        <img src="<?php echo esc_url($dp['image_peo'][0]); ?>" />
                                    </figure>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } } ?>
                </div>
            </div>
            <div class="slick__nav arrows-1 <?php if(isset($color_arraw)&&$color_arraw==2){echo 'light' ;} ?>">
                <i class="slick-prev slick-arrow js-slick-prev ti-angle-left"></i>
                <i class="slick-next slick-arrow js-slick-next ti-angle-right"></i>
            </div>
        </div>
        <?php return ob_get_clean(); 
    }