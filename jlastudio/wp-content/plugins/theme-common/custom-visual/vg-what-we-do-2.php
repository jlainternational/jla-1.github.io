<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'What we do 2','tatee'),
        'base' => 'vertical_we_do',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'param_group',
                'heading' => esc_html__('Detail Content','tatee'),
                'param_name' => 'detail_vd',
                'value' => '',
                'params' => array(
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Title','tatee'),
                        'param_name' => 'title_vd',
                        'value' => '',
                        'description' => esc_html__('Ex: Architecture, Interior, ...',"tatee")
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__('Link For Title','tatee'),
                        'param_name' => 'link_vd',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'textarea',
                        'heading' => esc_html__('Subtitle','tatee'),
                        'param_name' => 'subtitle_vd',
                        'value' => '',
                        'description' => esc_html__('Ex: Out Project, Out Work , ...',"tatee")
                    ),
                    array(
                        'type' => 'attach_image',
                        'heading' => esc_html__('Image','tatee'),
                        'param_name' => 'image_vd',
                        'value' => '',
                        'description' => esc_html__('',"tatee")
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Type Line','tatee'),
                        'param_name' => 'type_vd',
                        'value' => array(
                            esc_html__( 'Type 1: Normal Line', 'tatee' ) => 1,
                            esc_html__( 'Type 2: Line Rolate Right', 'tatee' ) => 2,
                            esc_html__( 'Type 3: Line Rolate Left', 'tatee' ) => 3,
                        ),
                        'description' => esc_html__('',"tatee")
                    ),
                ),
                'description' => esc_html__('Insert Detail Content',"tatee")
            ),
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image Line Around Main Image','tatee'),
                'param_name' => 'image_vd2',
                'value' => '',
                'description' => esc_html__('EX: images/icon/line.png',"tatee")
            ),            
        )
    ));
}
add_shortcode('vertical_we_do','vertical_we_do_func');
function vertical_we_do_func($atts,$content = null){
    extract(shortcode_atts(array(
        'detail_vd' => '',
        'image_vd2' => '',
    ),$atts));
    ob_start();
    ?>
    <div class="row no-gutters">
        <?php if(isset($detail_vd)&&$detail_vd!=''){ 
            $detail_vd = vc_param_group_parse_atts($detail_vd,'');
            $i =1;
            foreach ($detail_vd as $dvd) {
                ?>
                <div class="col-md-4">
                    <article class="media media-service-1">
                        <figure class="media__img">
                            <?php if(isset($dvd['image_vd'])&&$dvd['image_vd']!=''){ 
                                $dvd['image_vd'] = wp_get_attachment_image_src($dvd['image_vd'],'');
                                ?>
                                <div class="media__img-inner">
                                    <img src="<?php echo esc_url($dvd['image_vd'][0]); ?>" />
                                </div>
                            <?php } ?>
                            <?php if(isset($image_vd2)&&$image_vd2!=''){ 
                                $image_vd2_src = wp_get_attachment_image_src($image_vd2,'');
                                ?>
                                <img class="<?php if(isset($dvd['type_vd'])&&$dvd['type_vd']==3){echo 'img-rotate-2' ; }elseif(isset($dvd['type_vd'])&&$dvd['type_vd']==2){echo 'img-rotate-1' ;}else{echo '';} ?> img-line" src="<?php echo esc_url($image_vd2_src[0]); ?>"  />
                            <?php } ?>
                        </figure>
                        <div class="media__title title-number">
                            <?php if(isset($dvd['title_vd'])&&$dvd['title_vd']){ ?>
                                <h3 class="title title--sm">
                                    <a href="<?php echo esc_url($dvd['link_vd']); ?>"><?php echo esc_html($dvd['title_vd']); ?></a>
                                </h3>
                            <?php } ?>
                            <span class="number">0<?php echo esc_html($i); ?></span>
                        </div>
                        <?php if(isset($dvd['subtitle_vd'])&&$dvd['subtitle_vd']){ ?>
                            <p class="media__text"><?php echo esc_html($dvd['subtitle_vd']); ?></p>
                        <?php } ?>
                    </article>
                </div>
                <?php $i++; } } ?>
            </div>

            <?php return ob_get_clean(); 
        }