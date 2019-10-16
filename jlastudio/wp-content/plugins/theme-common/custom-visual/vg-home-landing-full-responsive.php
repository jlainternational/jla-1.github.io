<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Home Landing Full Responsive','tatee'),
        'base' => 'landing_full_responsive',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title','tatee'),
                'param_name' => 'title_fr',
                'value' => '',
                'description' => esc_html__('Ex: Fully responsive, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle','tatee'),
                'param_name' => 'subtitle_fr',
                'value' => '',
                'description' => esc_html__('Ex: Tatee with flexible layout is availble for every device. Your clients can easy visit your website anytime they want, ...',"tatee")
            ), 
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image','tatee'),
                'param_name' => 'image_fr',
                'value' => '',
                'description' => esc_html__('',"tatee")
            ),   
        )
    ));
}
add_shortcode('landing_full_responsive','landing_full_responsive_func');
function landing_full_responsive_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title_fr' => '',
        'subtitle_fr' => '',
        'image_fr' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section landing-page--dark p-t-85 p-b-145">
        <div class="wrap wrap--w1790">
            <div class="container-fluid">
                <article class="landing">
                    <header class="entry-header">
                        <?php if(isset($title_fr)&&$title_fr!=''){ ?>
                            <h2 class="entry-title"><?php echo esc_html($title_fr); ?></h2>
                        <?php } ?>
                        <?php if(isset($subtitle_fr)&&$subtitle_fr!=''){ ?>
                            <p><?php echo wp_specialchars_decode($subtitle_fr); ?></p>
                        <?php } ?>
                    </header>
                    <?php if(isset($image_fr)&&$image_fr!=''){ 
                        $image_fr_src = wp_get_attachment_image_src($image_fr,'');
                        ?>
                        <div class="entry-content">
                            <img src="<?php echo esc_attr( $image_fr_src[0]); ?>" >
                        </div>
                    <?php } ?>
                </article>
            </div>
        </div>
    </section>
    <?php return ob_get_clean(); 
}