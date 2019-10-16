<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Home Project Showcase','tatee'),
        'base' => 'home_project_showcase',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Title','tatee'),
                'param_name' => 'title_hs',
                'value' => '',
                'description' => esc_html__('Ex: Space Speaker Studio, Lunisolar Homestay, ...','tatee')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Category','tatee'),
                'param_name' => 'category_hs',
                'value' => '',
                'description' => esc_html__('Ex: Achitechture, Interior, ...','tatee')
            ),
            array(
                'type' => 'textarea',
                'heading' => esc_html__('Content','tatee'),
                'param_name' => 'content_hs',
                'value' => '',
                'description' => esc_html__('','tatee')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button','tatee'),
                'param_name' => 'button_hs',
                'value' => '',
                'description' => esc_html__('Ex: See project,...','tatee')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link Button','tatee'),
                'param_name' => 'link_hs',
                'value' => '',
                'description' => esc_html__('Ex: #,...','tatee')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Location','tatee'),
                'param_name' => 'location_hs',
                'value' => '',
                'description' => esc_html__('Ex: Perth , Australia,...','tatee')
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Year','tatee'),
                'param_name' => 'year_hs',
                'value' => '',
                'description' => esc_html__('Ex: 2017, 2018, ...','tatee')
            ),          
            array(
                'type' => 'attach_image',
                'heading' => esc_html__('Image','tatee'),
                'param_name' => 'image_hs',
                'value' => '',
                'description' => esc_html__('Ex: Address, Phone Number, Email,...','tatee')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Image Show In','tatee'),
                'param_name' => 'show_hs',
                'value' => array(
                    esc_html__( 'Right', 'tatee' ) => 1,
                    esc_html__( 'Left', 'tatee' ) => 2,
                ),
                'description' => esc_html__('','tatee')
            ),

        ),
        'description' => esc_html__('Ex: If This is First Element, You need insert class &quot p-t-110 &quot ','tatee'),
    ));
}
add_shortcode('home_project_showcase','home_project_showcase_func');
function home_project_showcase_func($atts,$content = null){
    extract(shortcode_atts(array(
        'title_hs' => '',
        'category_hs' => '',
        'content_hs' => '',
        'button_hs' => '',
        'link_hs' => '',
        'location_hs' => '',
        'year_hs' => '',
        'image_hs' => '',
        'show_hs' => '',
    ),$atts));
    ob_start(); 
    ?>
    <section>
        <div class="wrap wrap--w1790">
            <div class="container-fluid">
                <article class="media-project-3 <?php if(isset($show_hs)&&$show_hs==1){echo 'right' ; } ?>">
                    <div class="media__body">
                        <?php if(isset($image_hs)&&$image_hs!=''){ 
                            $image_hs_src = wp_get_attachment_image_src($image_hs,'');
                            ?>
                            <figure class="media__img">
                                <a href="<?php echo esc_url($link_hs); ?>">
                                    <img src="<?php echo esc_url($image_hs_src[0]); ?>" />
                                </a>
                            </figure>
                        <?php } ?>
                        <?php if(isset($location_hs)&&$location_hs!=''){ ?>
                            <span class="add"><?php echo esc_html($location_hs); ?></span>
                        <?php } ?>
                        <?php if(isset($year_hs)&&$year_hs!=''){ ?>
                            <span class="year"><?php echo esc_html($year_hs); ?></span>
                        <?php } ?>
                        <div class="media__content">
                            <div class="pointer"></div>
                            <?php if(isset($category_hs)&&$category_hs!=''){ ?>
                                <h4 class="title-sub title-sub--c8"><?php echo esc_html($category_hs); ?></h4>
                            <?php } ?>
                            <?php if(isset($title_hs)&&$title_hs!=''){ ?>
                                <h2 class="title-3"><?php echo esc_html($title_hs); ?></h2>
                            <?php } ?>
                            <?php if(isset($content_hs)&&$content_hs!=''){ ?>
                                <p class="media__text"><?php echo wp_specialchars_decode($content_hs); ?></p>
                            <?php } ?>
                            <?php if(isset($button_hs)&&$button_hs!=''){ ?>
                                <a class="au-btn au-btn--arrow" href="<?php echo esc_url($link_hs); ?>"><?php echo esc_html($button_hs); ?>
                                    <i class="zmdi zmdi-arrow-right ic-arrow"></i>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}