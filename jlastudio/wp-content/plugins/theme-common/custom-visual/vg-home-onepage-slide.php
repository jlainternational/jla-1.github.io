<?php 
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'One Page Slide','tatee'),
        'base' => 'one_page_slide',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail About Us','tatee'),
                'param_name' => 'detail_os',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title For Content','tatee'),
                        'param_name' => 'title_os',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Category','tatee'),
                        'param_name' => 'category_os',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ), 
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link Button','tatee'),
                        'param_name' => 'link_os',
                        'value' => '',
                        'description' => esc_html__('Ex: #, ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Text Button','tatee'),
                        'param_name' => 'button_os',
                        'value' => '',
                        'description' => esc_html__('Ex: See Project, ...',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image Background','tatee'),
                        'param_name' => 'image_os',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),

            
        )
    ));
}
add_shortcode('one_page_slide','one_page_slide_func');
function one_page_slide_func($atts,$content = null){
    extract(shortcode_atts(array(
        'detail_os' => '',
    ),$atts));
    ob_start();
    ?> 
    <section>
        <div class="rev_slider_wrapper">
            <div class="rev_slider fullwidthabanner js-rev" data-version="5.4.4" style="display:none" data-rev-layout="fullscreen" data-rev-stylearrow="au-rev-arrow-2" data-rev-bullets="true" data-rev-stylebullet="au-rev-bullet-2" data-rev-voffbullet="40" data-rev-spacebullet="20">
                <ul>
                    <?php if(isset($detail_os)&&$detail_os!=''){ 
                        $detail_os = vc_param_group_parse_atts($detail_os,'');
                        foreach ($detail_os as $dos) {
                            ?>
                            <li class="rev-item rev-item-1" data-transition="crossfade">
                                <?php if(isset($dos['image_os'])&&$dos['image_os']!=''){ 
                                    $dos['image_os'] = wp_get_attachment_image_src($dos['image_os'],'');
                                    ?>
                                    <img class="rev-slidebg" src="<?php echo esc_url($dos['image_os'][0]); ?>" />
                                <?php } ?>
                                <?php if(isset($dos['category_os'])&&$dos['category_os']!=''){ ?>
                                    <h4 class="tp-caption tp-resizeme rev-text-1" data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:1800,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                    data-x="['center']" data-y="['middle']" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[-76, -76, -80, -120, -120]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto']" data-height="[&quot;auto&quot;]"
                                    data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]" data-color="#ebebeb" data-fontweight="400" data-fontsize="[13, 13, 18, 18, 18]" data-textalign="[center]"><?php echo esc_html($dos['category_os']) ; ?></h4>
                                <?php } ?>
                                <?php if(isset($dos['title_os'])&&$dos['title_os']!=''){ ?>
                                    <h2 class="tp-caption tp-resizeme rev-text-2" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                    data-x="[center]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[-20, -20, 0, 0, 0]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto','auto','auto','576','500']"
                                    data-height="[&quot;auto&quot;]" data-lineheight="[70, 70, 54, 50, 52]" data-whitespace="[nowrap, nowrap, nowrap, normal, normal]" data-color="#fff" data-fontweight="700" data-fontsize="[60, 60, 48, 42, 46]" data-textalign="[center]"><?php echo esc_html($dos['title_os']); ?></h2>
                                <?php } ?>
                                <?php if(isset($dos['button_os'])&&$dos['button_os']!=''){ ?>
                                    <a class="tp-caption tp-resizeme" href="<?php echo esc_url($dos['link_os']); ?>" target="_self" data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:1800,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                    data-x="[center]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 15]" data-voffset="[77, 77, 70, 120, 120]" data-width="['auto']" data-height="[&quot;auto&quot;]" data-responsive_offset="on" data-responsive="off" data-textalign="[center]"
                                    data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]">
                                    <span class="rev-btn-1"><?php echo esc_html($dos['button_os']); ?>
                                        <span class="arrow" data-paddingleft="5">
                                            <i class="zmdi zmdi-arrow-right"></i>
                                        </span>
                                    </span>
                                </a>
                            <?php } ?>
                        </li>
                    <?php } } ?>

                </ul>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}