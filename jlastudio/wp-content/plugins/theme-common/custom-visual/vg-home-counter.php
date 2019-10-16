<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Home Counter','tatee'),
        'base' => 'home_counter',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail About Us','tatee'),
                'param_name' => 'detail_co',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title ','tatee'),
                        'param_name' => 'title_co',
                        'value' => '',
                        'description' => esc_html__('Ex: Years of exxperience, Happy cilents, ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Number','tatee'),
                        'param_name' => 'number_co',
                        'value' => '',
                        'description' => esc_html__('Ex: 18, 222, ..',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Icon','tatee'),
                        'param_name' => 'icon_co',
                        'value' => '',
                        'description' => esc_html__('Ex: ti-user, ti-home, ...Note: You can find them in themify.me/themify-icons. If you choice type 2, you don`t need fill it',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),

            
        )
    ));
}
add_shortcode('home_counter','home_counter_func');
function home_counter_func($atts,$content = null){
    extract(shortcode_atts(array(
        'detail_co' => '',
    ),$atts));
    ob_start();
    ?> 
    <div class="section-row section-row--fit">
        <?php if(isset($detail_co)&&$detail_co!=''){ 
            $detail_co = vc_param_group_parse_atts($detail_co,'');
            foreach ($detail_co as $dco) {
                ?>
                <div class="media-statistic">
                    <?php if(isset($dco['icon_co'])&&$dco['icon_co']!=''){ ?>
                        <span class="<?php echo esc_attr($dco['icon_co']); ?> media__icon wow fadeInLeft" data-wow-delay="0.2s"></span>
                    <?php } ?>
                    <div class="media__body">
                        <?php if(isset($dco['number_co'])&&$dco['number_co']!=''){ ?>
                            <span class="number js-counterup"><?php echo esc_html($dco['number_co']); ?></span>
                        <?php } ?>
                        <?php if(isset($dco['title_co'])&&$dco['title_co']!=''){ ?>
                            <h4 class="name"><?php echo esc_html($dco['title_co']); ?></h4>
                        <?php } ?>
                    </div>
                </div>
            <?php } } ?>
        </div>
        <?php
        return ob_get_clean();
    }