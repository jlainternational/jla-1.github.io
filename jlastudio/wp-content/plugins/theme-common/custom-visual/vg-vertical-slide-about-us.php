<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Vertical Slide About Us','tatee'),
        'base' => 'vertical_slide_about_us',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail About Us','tatee'),
                'param_name' => 'detail_au',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title For Content','tatee'),
                        'param_name' => 'title_au',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Subtitle','tatee'),
                        'param_name' => 'subtitle_au',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Content','tatee'),
                        'param_name' => 'content_au',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link Button','tatee'),
                        'param_name' => 'link_au',
                        'value' => '',
                        'description' => esc_html__('Ex: #, ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Text Button','tatee'),
                        'param_name' => 'button_au',
                        'value' => '',
                        'description' => esc_html__('Ex: Contact Now, ...',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image Background','tatee'),
                        'param_name' => 'image_au',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),

            
        )
    ));
}
add_shortcode('vertical_slide_about_us','vertical_slide_about_us_func');
function vertical_slide_about_us_func($atts,$content = null){
    extract(shortcode_atts(array(
        'detail_au' => '',
    ),$atts));
    ob_start();
    ?> 
        <div class="rev_slider_wrapper">
            <div class="rev_slider fullwidthabanner js-rev" data-version="5.4.4" style="display:none" data-rev-layout="fullscreen" data-rev-bullets="false" data-rev-arrows="false">
                <ul>
                    <?php if(isset($detail_au)&&$detail_au!=''){ 
                        $detail_au = vc_param_group_parse_atts($detail_au,'');
                        foreach ($detail_au as $dau) {
                            ?>
                            <li class="rev-item rev-item-1" data-transition="crossfade">
                                <?php if(isset($dau['image_au'])&&$dau['image_au']!=''){ 
                                    $dau['image_au'] = wp_get_attachment_image_src($dau['image_au'],'');
                                    ?>
                                    <img class="rev-slidebg" src="<?php echo esc_url($dau['image_au'][0]); ?>" />
                                <?php } ?>
                                <?php if(isset($dau['subtitle_au'])&&$dau['subtitle_au']!=''){ ?>
                                    <h4 class="tp-caption tp-resizeme rev-text-1" data-frames="[{&quot;delay&quot;:400,&quot;speed&quot;:1200,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                    data-x="['left']" data-y="['middle']" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[-128, -118, -150, -130, -130]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto']" data-height="[&quot;auto&quot;]"
                                    data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]" data-color="#fff" data-fontweight="400" data-fontsize="[11, 11, 14, 16, 16]" data-textalign="[left, left, left, center, center]"><?php echo esc_html($dau['subtitle_au']); ?></h4>
                                <?php } ?>
                                <?php if(isset($dau['title_au'])&&$dau['title_au']!=''){ ?>
                                    <h2 class="tp-caption tp-resizeme rev-text-2" data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:1200,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                    data-x="[left]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[-45, -40, 0, 0, 0]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="[1170, 930, 690, 510, 576]" data-height="[&quot;auto&quot;]"
                                    data-lineheight="[60, 58, 54, 38, 36]" data-whitespace="normal" data-color="#ebebeb" data-fontweight="700" data-fontsize="[48, 42, 46, 32, 32]" data-textalign="[left, left, left, left, left]"><?php echo esc_html($dau['title_au']); ?></h2>
                                <?php } ?>
                                <?php if(isset($dau['content_au'])&&$dau['content_au']!=''){ ?>
                                    <p class="tp-caption tp-resizeme" data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:1200,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                    data-x="[left]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[70, 70, 100, 80, 70]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="[800,800,690,510,576]" data-height="[&quot;auto&quot;]"
                                    data-lineheight="[30, 30, 26, 20, 20]" data-whitespace="normal" data-color="#ebebeb" data-fontweight="400" data-fontsize="[13, 13, 14, 15, 15]" data-textalign="[left, left, left, left, left]"><?php echo esc_html($dau['content_au']); ?>...</p>
                                <?php } ?>
                                <?php if(isset($dau['button_au'])&&$dau['button_au']!=''){ ?>
                                    <a class="tp-caption tp-resizeme"
                                    href="<?php echo esc_url($dau['link_au']); ?>" target="_self" data-frames="[{&quot;delay&quot;:400,&quot;speed&quot;:1200,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                    data-x="[left]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 15]" data-voffset="[185, 185, 210, 180, 170]" data-width="['auto']" data-height="[&quot;auto&quot;]" data-responsive_offset="on" data-responsive="off" data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]">
                                    <span class="rev-btn-2"><?php echo esc_html($dau['button_au']); ?></span>
                                </a>
                            <?php } ?>
                        </li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
    
    <?php
    return ob_get_clean();
}