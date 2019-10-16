<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Home Landing Purchase','tatee'),
        'base' => 'landing_purchase',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title','tatee'),
                'param_name' => 'title_pc',
                'value' => '',
                'description' => esc_html__('Ex: Purchase TATEE now, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Subtitle','tatee'),
                'param_name' => 'subtitle_pc',
                'value' => '',
                'description' => esc_html__('Ex: Let’s Impress your client with beautiful website and show your best work to them, ...',"tatee")
            ), 
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Text Button','tatee'),
                'param_name' => 'button_pc',
                'value' => '',
                'description' => esc_html__('EX: Purchase now, ...',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link Button','tatee'),
                'param_name' => 'link_pc',
                'value' => '',
                'description' => esc_html__('EX: #,...',"tatee")
            ),   
        )
    ));
}
add_shortcode('landing_purchase','landing_purchase_func');
function landing_purchase_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title_pc' => '',
        'subtitle_pc' => '',
        'link_pc' =>'',
        'button_pc' => '',
    ),$atts));
    ob_start();
    ?>
    <section class="section landing-page p-t-85 p-b-180">
        <div class="container">
            <article class="landing landing--sm">
                <header class="entry-header">
                    <?php if(isset($title_pc)&&$title_pc!=''){ ?>
                        <h2 class="entry-title"><?php echo esc_html($title_pc); ?></h2>
                    <?php } ?>
                    <?php if(isset($subtitle_pc)&&$subtitle_pc!=''){ ?>
                        <p><?php echo esc_html($subtitle_pc); ?></p>
                    <?php } ?>
                </header>
                <?php if(isset($title_pc)&&$title_pc!=''){ ?>
                    <div class="entry-content">
                        <div class="text-center">
                            <a class="au-btn au-btn--solid" href="<?php echo esc_url($link_pc); ?>"><?php echo esc_html($button_pc); ?></a>
                        </div>
                    </div>
                <?php } ?>
            </article>
        </div>
    </section>
    <?php return ob_get_clean(); 
}