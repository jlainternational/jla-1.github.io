<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'What we do 1','tatee'),
        'base' => 'main_home_specilization',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail Content','tatee'),
                'param_name' => 'detail_spec',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title','tatee'),
                        'param_name' => 'title_spec',
                        'value' => '',
                        'description' => esc_html__('Ex: Architecture, Interior, ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link For Title','tatee'),
                        'param_name' => 'link_spec',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Subtitle','tatee'),
                        'param_name' => 'subtitle_spec',
                        'value' => '',
                        'description' => esc_html__('Ex: Out Project, Out Work , ...',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image','tatee'),
                        'param_name' => 'image_spec',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),
            
        )
    ));
}
add_shortcode('main_home_specilization','main_home_specilization_func');
function main_home_specilization_func($atts,$content = null){
    extract(shortcode_atts(array(
        'detail_spec' => '',
    ),$atts));
    ob_start();
    ?>
    <?php if(isset($detail_spec)&&$detail_spec){ 
        $detail_spec = vc_param_group_parse_atts($detail_spec,'');
        $i =1;
        ?>
        <div class="row no-gutters">
            <?php foreach ($detail_spec as $ds) { ?>
                <div class="col-md-6 col-lg-4">
                    <article class="media media-service">
                        <?php if(isset($ds['image_spec'])&&$ds['image_spec']!=''){ 
                            $ds['image_spec'] = wp_get_attachment_image_src($ds['image_spec'],'');
                            ?>
                            <figure class="media__img">
                                <img src="<?php echo esc_url($ds['image_spec'][0]); ?>" />
                            </figure>
                        <?php } ?>
                        <div class="media__title">
                            <?php if(isset($ds['title_spec'])&&$ds['title_spec']!=''){ ?>
                                <h3 class="title">
                                    <a href="<?php echo esc_url($ds['link_spec']); ?>"><?php echo esc_html($ds['title_spec']); ?></a>
                                </h3>
                            <?php } ?>
                            
                            <span class="number">0<?php echo esc_html($i); ?></span>
                        </div>
                        <?php if(isset($ds['subtitle_spec'])&&$ds['subtitle_spec']!=''){ ?>
                            <p class="media__text"><?php echo esc_html($ds['subtitle_spec']); ?></p>
                        <?php } ?>
                    </article>
                </div>
                <?php $i++; } ?>
            </div>
        <?php } ?>

        <?php return ob_get_clean(); 
    }