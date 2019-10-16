<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Coming Soon','tatee'),
        'base' => 'coming_soon',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title ','tatee'),
                'param_name' => 'title_cs',
                'value' => '',
                'description' => esc_html__('Ex: Coming Soon, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle ','tatee'),
                'param_name' => 'subtitle_cs',
                'value' => '',
                'description' => esc_html__('Ex: wait for it, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Text Button ','tatee'),
                'param_name' => 'button_cs',
                'value' => '',
                'description' => esc_html__('Ex: Back to homepage, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link Button','tatee'),
                'param_name' => 'link_cs',
                'value' => '',
                'description' => esc_html__('',"tatee")
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image Background','tatee'),
                'param_name' => 'image_cs',
                'value' => '',
                'description' => esc_html__('',"tatee")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail About Us','tatee'),
                'param_name' => 'detail_cs',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Time','tatee'),
                        'param_name' => 'time_cs',
                        'value' => '',
                        'description' => esc_html__('Ex: days, hours, mins, secs, ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Number','tatee'),
                        'param_name' => 'number_cs',
                        'value' => '',
                        'description' => esc_html__('Ex: 18, 20, ..',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),

            
        )
    ));
}
add_shortcode('coming_soon','coming_soon_func');
function coming_soon_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title_cs' => '',
        'subtitle_cs' => '',
        'button_cs' => '',
        'link_cs' => '',
        'image_cs' => '',
        'detail_cs' => '',
    ),$atts));
    ob_start();
    ?> 
    <?php if(isset($image_cs)&&$image_cs!=''){ 
        $image_cs_src = wp_get_attachment_image_src($image_cs,'');
        ?>
        <main class="bg-image-3 page-coming" id="main" style="background: url('<?php echo esc_url($image_cs_src[0]); ?>') center center/cover no-repeat;" >
            <div class="section-content">
                <div class="container">
                    <?php if(isset($subtitle_cs)&&$subtitle_cs!=''){ ?>
                        <h4 class="title-sub title-sub--ceb m-b-20"><?php echo esc_html($subtitle_cs); ?></h4>
                    <?php } ?>
                    <?php if(isset($title_cs)&&$title_cs!=''){ ?>
                        <h2 class="title-2 title--light"><?php echo esc_html($title_cs); ?></h2>
                    <?php } ?>
                    <?php if(isset($detail_cs)&&$detail_cs!=''){ 
                        $detail_cs = vc_param_group_parse_atts($detail_cs,'');
                        ?>
                        <div class="countdown cd100">
                            <div class="row">
                                <?php $i=0; $value=array('days','hours','minutes','seconds'); foreach ($detail_cs as $dcs) { ?>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="countdown__item">
                                            <div class="countdown__item-inner">
                                                <?php if(isset($dcs['number_cs'])&&$dcs['number_cs']!=''){ ?>
                                                    <span class="value <?php echo esc_attr($value[$i]); ?>" data-<?php echo esc_attr($value[$i]); ?>="<?php echo esc_attr($dcs['number_cs']); ?>"><?php echo esc_html($dcs['number_cs']); ?></span>
                                                <?php } ?>
                                                <?php if(isset($dcs['time_cs'])&&$dcs['time_cs']!=''){ ?>
                                                    <span class="desc"><?php echo esc_html($dcs['time_cs']); ?></span>
                                                <?php } ?>
                                            </div>
                                            <span class="line"></span>
                                            <span class="line line--bottom"></span>
                                        </div>
                                    </div>
                                <?php $i++; } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="text-center">
                        <?php if(isset($button_cs)&&$button_cs!=''){ ?>
                            <a class="au-btn au-btn--solid au-btn--light-2 au-btn--arrow" href="<?php echo esc_url($link_cs) ?>"><?php echo esc_html($button_cs); ?>
                            <i class="zmdi zmdi-arrow-right ic-arrow"></i>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
<?php } ?>
<?php
return ob_get_clean();
}