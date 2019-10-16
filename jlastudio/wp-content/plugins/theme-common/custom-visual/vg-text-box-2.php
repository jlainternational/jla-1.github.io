<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Text Box 2','tatee'),
        'base' => 'contact_info_showcase',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title Contact','tatee'),
                'param_name' => 'title_is',
                'value' => '',
                'description' => esc_html__('Ex: + Meet us, + Call us, + Text us, ...',"tatee")
            ),
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail Info','tatee'),
                'param_name' => 'detail_is',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title','tatee'),
                        'param_name' => 'title_is2',
                        'value' => '',
                        'description' => esc_html__('Ex: Address, Phone Number, Email, ...','tatee')
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Value ','tatee'),
                        'param_name' => 'value_is',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Info Contact','tatee')
            ),        

        )
    ));
}
add_shortcode('contact_info_showcase','contact_info_showcase_func');
function contact_info_showcase_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title_is' => '',
        'detail_is' => '',
    ),$atts));
    ob_start();
    ?>      
    <?php if(isset($title_is)&&$title_is!=''){ ?>
        <h2 class="title-1 text-uppercase m-b-30"><?php echo esc_html($title_is); ?></h2>
    <?php } ?>
    <?php if(isset($detail_is)&&$detail_is!=''){ 
        $detail_is = vc_param_group_parse_atts($detail_is,'');
        foreach ($detail_is as $dci) {
            ?>
            <?php if(isset($dci['value_is'])&&$dci['value_is']!=''&&isset($dci['title_is2'])&&$dci['title_is2']!=''){ ?>
                <p class="text--s18 m-b-50"><?php echo esc_html($dci['title_is2']); ?> : <?php echo esc_html($dci['value_is']); ?></p>
            <?php } ?>
        <?php } } ?>
        <?php
        return ob_get_clean();
    }