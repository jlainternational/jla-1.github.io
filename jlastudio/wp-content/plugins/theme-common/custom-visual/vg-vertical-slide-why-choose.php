<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Vertical Slide Why Choose Us','tatee'),
        'base' => 'vertical_slide_choose',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title For Content','tatee'),
                'param_name' => 'title2_cu',
                'value' => '',
                'description' => esc_html__('Ex: We are specialists in the field of architecture, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle','tatee'),
                'param_name' => 'subtitle_cu',
                'value' => '',
                'description' => esc_html__('Ex: Why work with us, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Content','tatee'),
                'param_name' => 'content_cu',
                'value' => '',
                'description' => esc_html__('',"tatee")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail Advantages','tatee'),
                'param_name' => 'detail_cu',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Advantage','tatee'),
                        'param_name' => 'advan_cu',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link Advantage','tatee'),
                        'param_name' => 'link_cu',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),
            

            
        )
    ));
}
add_shortcode('vertical_slide_choose','vertical_slide_choose_func');
function vertical_slide_choose_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title2_cu' => '',
        'subtitle_cu' => '',
        'content_cu' => '',
        'detail_cu' => '',
    ),$atts));
    ob_start();
    ?>
    <?php if(isset($subtitle_cu)&&$subtitle_cu!=''){ ?>
        <h4 class="title-sub m-b-15"><?php echo esc_html($subtitle_cu); ?></h4>
    <?php } ?>
    <?php if(isset($title2_cu)&&$title2_cu!=''){ ?>
        <h2 class="title-1 m-b-40"><?php echo wp_specialchars_decode($title2_cu); ?></h2>
    <?php } ?>
    <?php if(isset($content_cu)&&$content_cu!=''){ ?>
        <p class="m-b-65">
            <?php echo esc_html($content_cu); ?>
        </p>
    <?php } ?>
    <div class="row no-gutters">
        <?php if(isset($detail_cu)&&$detail_cu!=''){ 
            $detail_cu = vc_param_group_parse_atts($detail_cu,'');
            $i=1;
            foreach ($detail_cu as $dc) {
                ?>
                <div class="media-about-3">
                    <div class="media__number-wrap">
                        <span class="media__number">0<?php echo esc_html($i); ?></span>
                        <span class="line"></span>
                        <span class="line line--bottom"></span>
                    </div>
                    <?php if(isset($dc['advan_cu'])&&$dc['advan_cu']!=''){ ?>
                        <div class="media__body">
                            <h4 class="media__title title--sm">
                                <a href="<?php echo esc_url($dc['link_cu']); ?>"><?php echo esc_html($dc['advan_cu']); ?></a>
                            </h4>
                        </div>
                    <?php } ?>
                </div>
                <?php $i++; } } ?>
            </div>

            <?php
            return ob_get_clean();
        }