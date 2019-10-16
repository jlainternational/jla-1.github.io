<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Clients','tatee'),
        'base' => 'clients',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('All Clients','tatee'),
                'param_name' => 'details_cli',
                'value' => '',
                'params' => array(

                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link Client','tatee'),
                        'param_name' => 'link_cli',
                        'value' => '',
                        'description' => esc_html__('Ex: #, ...',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image Client','tatee'),
                        'param_name' => 'image_cli',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Clients',"tatee")
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Margin Bottom','tatee'),
                'param_name' => 'margin_cli',
                'value' => array(
                    esc_html__( '0px', 'tatee' ) => 1,
                    esc_html__( '10px', 'tatee' ) => 2,
                ),
                'description' => esc_html__('',"tatee")
            ),
            
        )
    ));
}
add_shortcode('clients','clients_func');
function clients_func($atts,$content = null){
    extract(shortcode_atts(array(
        'details_cli' => '',
        'margin_cli' => '',
    ),$atts));
    ob_start();
    ?>


    <div class="row <?php if(isset($margin_cli)&&$margin_cli==2){echo 'm-b-10' ; } ?>">
        <?php if(isset($details_cli)&&$details_cli!=''){ 
            $details_cli = vc_param_group_parse_atts($details_cli,'');
            foreach ($details_cli as $dc) {

                ?>
                <div class="col-lg-3 col-md-6">
                    <?php if(isset($dc['image_cli'])&&$dc['image_cli']!=''){ 
                        $dc['image_cli'] = wp_get_attachment_image_src($dc['image_cli'],'');
                        ?>
                        <a class="img-client" href="<?php echo esc_url($dc['link_cli']); ?>">
                            <img src="<?php echo esc_url($dc['image_cli'][0]); ?>" >
                        </a>
                    <?php } ?>
                </div>
            <?php } } ?>

        </div>

        <?php return ob_get_clean(); 
    }