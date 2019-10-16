<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'About Us Counter','tatee'),
        'base' => 'about_acunter',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail Counter','tatee'),
                'param_name' => 'detail_ac',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title Counter','tatee'),
                        'param_name' => 'titlec_ac',
                        'value' => '',
                        'description' => esc_html__('Ex: Years of exxperience, Happy cilents, Design arwards, Completed projects, ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Number','tatee'),
                        'param_name' => 'number_ac',
                        'value' => '',
                        'description' => esc_html__('Ex: 18, 222, ..',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),

            array(
                'type' => 'param_group',
                'heading' => esc_html__('Content','tatee'),
                'param_name' => 'content_ac',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title ','tatee'),
                        'param_name' => 'title_ac',
                        'value' => '',
                        'description' => esc_html__('Ex: Sed ut, Nemo, ...This text will bold',"tatee")
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Subtitle','tatee'),
                        'param_name' => 'subtitle_ac',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Content',"tatee")
            ),

            
        )
    ));
}
add_shortcode('about_acunter','about_acunter_func');
function about_acunter_func($atts,$content = null){
    extract(shortcode_atts(array(
        'detail_ac' => '',
        'content_ac' => '',
    ),$atts));
    ob_start();
    ?> 
    <section class="section p-t-80">
        <div class="container">
            <div class="row no-gutters">
                <?php if(isset($detail_ac)&&$detail_ac!=''){ 
                    $detail_ac = vc_param_group_parse_atts($detail_ac,'');
                    ?>
                    <div class="col-lg-6">
                        <div class="row no-gutters">
                            <?php foreach ($detail_ac as $dac) { ?>
                                <div class="col-md-6">
                                    <div class="media-statistic-2">
                                        <div class="media__body">
                                            <?php if(isset($dac['number_ac'])&&$dac['number_ac']!=''){ ?>
                                                <span class="media__number js-counterup"><?php echo esc_html($dac['number_ac']); ?></span>
                                            <?php } ?>
                                            <?php if(isset($dac['titlec_ac'])&&$dac['titlec_ac']!=''){ ?>
                                                <h5 class="media__title title-sub"><?php echo esc_html($dac['titlec_ac']); ?></h5>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($content_ac)&&$content_ac!=''){ 
                    $i = 0;
                    $content_ac = vc_param_group_parse_atts($content_ac,'');
                    ?>
                    <div class="col-lg-6">
                        <?php foreach ($content_ac as $ca) { ?>
                            <p class="text--s18-40 <?php if($i==0){echo 'm-b-15' ; } ?>">
                                <?php if(isset($ca['title_ac'])&&$ca['title_ac']!=''){ ?>
                                    <strong class="text--c2"><?php echo esc_html($ca['title_ac']); ?></strong><?php } ?> <?php if(isset($ca['subtitle_ac'])&&$ca['subtitle_ac']!=''){ echo esc_html($ca['subtitle_ac']); } ?>
                                </p>
                            <?php $i++; } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }