<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Text Box 1','tatee'),
        'base' => 'contact_info',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail Info','tatee'),
                'param_name' => 'detail_ci',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title','tatee'),
                        'param_name' => 'title_ci',
                        'value' => '',
                        'description' => esc_html__('Ex: Address, Phone Number, Email, ...','tatee')
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Value ','tatee'),
                        'param_name' => 'value_ci',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Info Contact','tatee')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Type ','tatee'),
                'param_name' => 'type_ci',
                'value' => array(
                    esc_html__( 'Light', 'tatee' ) => 1,
                    esc_html__( 'Dark', 'tatee' ) => 2,
                ),
                'description' => esc_html__('',"tatee")
            ),        
        )
    ));
}
add_shortcode('contact_info','contact_info_func');
function contact_info_func($atts,$content = null){
    extract(shortcode_atts(array(
        'detail_ci' => '',
        'type_ci' => '',
    ),$atts));
    ob_start();
    ?> 
    <?php if(isset($type_ci)&&$type_ci==2){echo '<div class="isotope-item">'; } ?>
        <div class="contact-info <?php if(isset($type_ci)&&$type_ci==2){echo 'contact-info--light bg-pattern-2 m-b-30' ; } ?>">
            <?php if(isset($detail_ci)&&$detail_ci!=''){ 
                $detail_ci = vc_param_group_parse_atts($detail_ci,'');
                foreach ($detail_ci as $dci) {
                    ?>
                    <div class="contact-info__item">
                        <?php if(isset($dci['title_ci'])&&$dci['title_ci']!=''){ ?>
                            <h5 class="title--sm2 <?php if(isset($type_ci)&&$type_ci==2){echo 'title title--light' ; } ?> "><?php echo esc_html($dci['title_ci']); ?>:</h5>
                        <?php } ?>
                        <?php if(isset($dci['value_ci'])&&$dci['value_ci']!=''){ ?>
                            <p class="value <?php if(isset($type_ci)&&$type_ci==2){echo '' ; }else{echo 'value--dark'; } ?>"><?php echo esc_html($dci['value_ci']); ?></p>
                        <?php } ?>
                    </div>
                <?php } } ?>
            </div>
            <?php if(isset($type_ci)&&$type_ci==2){echo '</div>' ; } ?>
        <?php
        return ob_get_clean();
    }