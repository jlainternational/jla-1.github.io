<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Clients Black','tatee'),
        'base' => 'clients_black',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title','tatee'),
                'param_name' => 'title_cb',
                'value' => '',
                'description' => esc_html__('Ex: Our Clients, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle','tatee'),
                'param_name' => 'subtitle_cb',
                'value' => '',
                'description' => esc_html__('Ex: awesome partner, ...',"tatee")
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image Background','tatee'),
                'param_name' => 'imageb_cb',
                'value' => '',
                'description' => esc_html__('Ex: ../images/bg-pattern-01.jpg, ...',"tatee")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('All Clients','tatee'),
                'param_name' => 'details_cb',
                'value' => '',
                'params' => array(

                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link Client','tatee'),
                        'param_name' => 'link_cb',
                        'value' => '',
                        'description' => esc_html__('Ex: #, ...',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image Client','tatee'),
                        'param_name' => 'image_cb',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Clients',"tatee")
            ),          
        )
    ));
}
add_shortcode('clients_black','clients_black_func');
function clients_black_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title_cb' => '',
        'subtitle_cb' => '',
        'details_cb' => '',
        'imageb_cb' =>'',
    ),$atts));
    ob_start();
    ?> 
    <?php if(isset($imageb_cb)&&$imageb_cb!=''){ $imageb_cb_src = wp_get_attachment_image_src($imageb_cb,''); } ?>
    <section class="section  p-t-100 p-b-25" style="background-image:url('<?php echo esc_url($imageb_cb_src[0]); ?>'); " >
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-3">
                    <div class="section-title section-title--light text-left p-t-15">
                        <?php if(isset($subtitle_cb)&&$subtitle_cb!=''){ ?>
                            <h5 class="title-sub"><?php echo esc_html($subtitle_cb); ?></h5>
                        <?php } ?>
                        <?php if(isset($title_cb)&&$title_cb!=''){ ?>
                            <h2 class="title-1"><?php echo wp_specialchars_decode($title_cb); ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9">
                    <div class="row">
                        <?php if(isset($details_cb)&&$details_cb!=''){ 
                            $details_cb = vc_param_group_parse_atts($details_cb,'');
                            foreach ($details_cb as $dc) {
                                ?>
                                <div class="col-lg-3 col-md-6">
                                    <?php if(isset($dc['image_cb'])&&$dc['image_cb']!=''){ 
                                        $dc['image_cb'] = wp_get_attachment_image_src($dc['image_cb'],'');
                                        ?>
                                        <a class="img-client m-b-60" href="<?php echo esc_url($dc['link_cb']); ?>">
                                            <img src="<?php echo esc_url($dc['image_cb'][0]); ?>" >
                                        </a>
                                    <?php } ?>
                                </div>
                            <?php } } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php return ob_get_clean(); 
    }