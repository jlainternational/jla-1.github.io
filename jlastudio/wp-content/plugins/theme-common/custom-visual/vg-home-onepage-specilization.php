<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Home One Page Specilization','tatee'),
        'base' => 'one_page_specilization',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle','tatee'),
                'param_name' => 'subtitle_osp',
                'value' => '',
                'description' => esc_html__('Ex: What we do, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title','tatee'),
                'param_name' => 'title_osp',
                'value' => '',
                'description' => esc_html__('Ex: Our Specilization, ...',"tatee")
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image Background','tatee'),
                'param_name' => 'imageb_osp',
                'value' => '',
                'description' => esc_html__('Ex: ../images/bg-pattern-01.jpg, ...',"tatee")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail Content','tatee'),
                'param_name' => 'detail_osp',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Content','tatee'),
                        'param_name' => 'content_osp',
                        'value' => '',
                        'description' => esc_html__('Ex: Architecture, Interior, ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link Content','tatee'),
                        'param_name' => 'link_osp',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image','tatee'),
                        'param_name' => 'image_osp',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),

            

        )
    ));
}
add_shortcode('one_page_specilization','one_page_specilization_func');
function one_page_specilization_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title_osp' => '',
        'subtitle_osp' => '',
        'detail_osp' => '',
        'imageb_osp' => '',
    ),$atts));
    ob_start();
    ?>
    <?php if(isset($imageb_osp)&&$imageb_osp){ $imageb_osp_src = wp_get_attachment_image_src($imageb_osp,''); } ?>
    <section class="section p-t-60 p-b-20" style="background-image:url('<?php echo esc_url($imageb_osp_src[0]); ?>'); " >
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-3">
                    <div class="section-title section-title--light text-left p-t-55">
                        <?php if(isset($subtitle_osp)&&$subtitle_osp!=''){ ?>
                            <h5 class="title-sub"><?php echo esc_html($subtitle_osp); ?></h5>
                        <?php } ?>
                        <?php if(isset($title_osp)&&$title_osp!=''){ ?>
                            <h2 class="title-1"><?php echo esc_html($title_osp); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9">
                    <div class="service-wrap">
                        <?php if(isset($detail_osp)&&$detail_osp!=''){ 
                            $detail_osp = vc_param_group_parse_atts($detail_osp,'');
                            foreach ($detail_osp as $dosp) {
                                ?>
                                <div class="media-service-2">
                                    <span class="line"></span>
                                    <span class="line line--bottom"></span>
                                    <div class="media__body">
                                        <?php if(isset($dosp['image_osp'])&&$dosp['image_osp']!=''){ 
                                            $dosp['image_osp'] = wp_get_attachment_image_src($dosp['image_osp'],'');
                                            ?>
                                            <div class="media__icon">
                                                <img src="<?php echo esc_url($dosp['image_osp'][0]); ?>" alt="service 1">
                                            </div>
                                        <?php } ?>
                                        <?php if(isset($dosp['content_osp'])&&$dosp['content_osp']!='') ?>
                                        <h4 class="media__title">
                                            <a href="<?php echo esc_url($dosp['link_osp']) ?>"><?php echo esc_html($dosp['content_osp']) ?></a>
                                        </h4>
                                    </div>
                                </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php return ob_get_clean(); 
    }