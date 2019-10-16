<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Vertical Slide Latest Work','tatee'),
        'base' => 'vertical_slide_latest_work',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Text Button','tatee'),
                'param_name' => 'button_lw',
                'value' => '',
                'description' => esc_html__('Ex: See All Project, ...',"tatee")
            ),
            
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail Latest Work','tatee'),
                'param_name' => 'detail_lw',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title For Content','tatee'),
                        'param_name' => 'title_lw',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Location','tatee'),
                        'param_name' => 'location_lw',
                        'value' => '',
                        'description' => esc_html__('Ex: Perth - Australia, ...',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image For Slide','tatee'),
                        'param_name' => 'image_lw',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),

            
        )
    ));
}
add_shortcode('vertical_slide_latest_work','vertical_slide_latest_work_func');
function vertical_slide_latest_work_func($atts,$content = null){
    extract(shortcode_atts(array(
        'button_lw' => '',
        'detail_lw' => '',
    ),$atts));
    ob_start();
    $tatee_option = get_option('tatee_option');
    ?>
    <div class="rev_slider_wrapper vertical-latest">
        <div class="rev_slider fullwidthabanner js-rev" data-version="5.4.4" style="display:none" data-rev-height="650" data-rev-layout="auto" data-rev-bullets="false" data-rev-arrows="true" data-rev-stylearrow="au-rev-arrow-3" data-rev-parallaxon="true">
            <ul class="list-rev-item--ov">
                <?php if(isset($detail_lw)&&$detail_lw!=''){ 
                    $detail_lw = vc_param_group_parse_atts($detail_lw,'');
                    foreach ($detail_lw as $dlw) {
                        ?>
                        <li class="rev-item rev-item-1 rev-item--ov" data-transition="crossfade">
                            <?php if(isset($dlw['image_lw'])&&$dlw['image_lw']!=''){ 
                                $dlw['image_lw'] = wp_get_attachment_image_src($dlw['image_lw'],'');
                                ?>
                                <img class="rev-slidebg" src="<?php echo esc_url($dlw['image_lw'][0]); ?>"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" />
                            <?php } ?>
                            <?php if(isset($dlw['location_lw'])&&$dlw['location_lw']!=''){ ?>
                                <h4 class="tp-caption tp-resizeme rev-text-4 rs-parallaxlevel-1" data-frames="[{&quot;delay&quot;:300,&quot;speed&quot;:1200,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                data-x="['right']" data-y="['bottom']" data-hoffset="[-8, 120, 120, 0, 0]" data-voffset="[-40, 40, 40, 30, 30]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto']" data-height="[&quot;auto&quot;]"
                                data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]" data-color="#ececec" data-fontweight="400" data-lineheight="[30, 30, 26, 30, 30]" data-fontsize="[18, 18, 14, 16, 16]" data-textalign="[left, left, left, center, center]"><?php echo esc_html($dlw['location_lw']); ?></h4>
                            <?php } ?>
                            <?php if(isset($dlw['title_lw'])&&$dlw['title_lw']!=''){ ?>
                                <h2 class="tp-caption tp-resizeme rev-text-3 rs-parallaxlevel-2" data-frames="[{&quot;delay&quot;:200,&quot;speed&quot;:1100,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                                data-x="[left]" data-y="[bottom]" data-hoffset="[0, 75, 70, 65, 65]" data-voffset="[-28, 50, 70, 65, 65]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="[370, 370, 690, 510, 576]"
                                data-height="[&quot;auto&quot;]" data-lineheight="[60, 58, 54, 38, 36]" data-whitespace="normal" data-color="#fff" data-fontweight="700" data-fontsize="[48, 42, 46, 32, 32]" data-textalign="[left, left, left, left, left]"><?php echo esc_html($dlw['title_lw']); ?></h2>
                            <?php } ?>
                        </li>
                    <?php } } ?>
                </ul>
            </div>
        </div>
        <?php if(isset($button_lw)&&$button_lw!=''){ ?>
            <div class="text-center p-t-80">
                <a class="au-btn au-btn--light" href="<?php if(isset($tatee_option['option_project'])){ echo get_page_link($tatee_option['option_project']); } ?>"><?php echo esc_html($button_lw); ?></a>
            </div>
        <?php } ?>

        <?php
        return ob_get_clean();
    }