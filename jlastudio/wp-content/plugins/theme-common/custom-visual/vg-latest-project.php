<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
    vc_map(array(
        'name' => esc_html__($pre_text.'Latest Projects','tatee'),
        'base' => 'latest_projects',
        'class' => '',
        'icon' => 'icon-st',
        'category' => 'Content',
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Type Display','tatee'),
                'param_name' => 'display_lp',
                'value' => array(
                    esc_html__( 'Type 1: Slide', 'tatee' ) => 1,
                    esc_html__( 'Type 2: Full Width', 'tatee' ) => 2,
                ),
                'description' => esc_html__('',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Button','tatee'),
                'param_name' => 'button_lp',
                'value' => '',
                'description' => esc_html__('If You choice type 2, you need insert Button. Ex: See All Project',"tatee")
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__('Link Button','tatee'),
                'param_name' => 'link_lp',
                'value' => '',
                'description' => esc_html__('Ex: #, ...',"tatee")
            ),
        )
    ));
}
add_shortcode('latest_projects','latest_projects_func');
function latest_projects_func($atts,$content = null){
    extract(shortcode_atts(array(
        'display_lp' => '',
        'button_lp' => '',
        'link_lp' => '',
    ),$atts));
    ob_start();
    $tatee_option = get_option('tatee_option');
    ?>
    <?php if(isset($display_lp)&&$display_lp==2){ ?>
        <?php $pro_latest = new WP_query(array(
            'post_type' => 'projects',
            'posts_per_page' => 8,
        )); 
        $i=0;
        ?>
        <div class="section-row section-row--p-sm">
            <?php if($pro_latest->have_posts()) : while($pro_latest->have_posts()) : $pro_latest->the_post(); 
                $thumbnail_img_680 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_680',true);
                $pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);
                ?>
                <?php if($i==4){echo '</div> <div class="section-row section-row--p-sm">'; } ?>
                <div class="section-col-3">
                    <article class="media-project-2">
                        <figure class="media__img">
                            <img src="<?php echo esc_url($thumbnail_img_680); ?>" />
                        </figure>
                        <div class="media__body">
                            <h3 class="media__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <?php if(isset($pro_location)&&$pro_location!=''){ ?>
                                <span class="address"><?php echo esc_html($pro_location); ?></span>
                            <?php } ?>
                        </div>
                    </article>
                </div>
                <?php $i++; endwhile; endif; wp_reset_postdata(); ?>
            </div>
            <div class="text-center p-t-40">
                <?php if(isset($button_lp)&&$button_lp!=''){ ?>
                    <a class="au-btn" href="<?php if(isset($tatee_option['option_project'])){ echo get_page_link($tatee_option['option_project']); } ?>"><?php echo esc_html($button_lp) ?></a>
                <?php } ?>
            </div>
        <?php }else{ ?>
            <?php $pro_latest = new WP_query(array(
                'post_type' => 'projects',
                'posts_per_page' => -1,
            )); ?>
            <div class="container-fluid">
                <div class="slick-wrap slick-project js-slick-wrapper" data-slick-xs="1" data-slick-sm="1" data-slick-md="3" data-slick-lg="4" data-slick-xl="4" data-slick-dots="false" data-slick-customnav="true" data-slick-autoplay="true">
                    <div class="slick-wrap-content">
                        <div class="slick-content js-slick-content">
                            <?php if($pro_latest->have_posts()) : while($pro_latest->have_posts()) : $pro_latest->the_post(); 
                                $thumbnail_img_960=get_post_meta(get_the_ID(),'_cmb_thumbnail_img_960',true);
                                $pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);
                                ?>
                                <div class="slick-item">
                                    <article class="media media-project">
                                        <figure class="media__img">
                                            <img src="<?php echo esc_url($thumbnail_img_960) ?>" />
                                        </figure>
                                        <div class="bg-overlay"></div>
                                        <span class="line"></span>
                                        <span class="line line--bottom"></span>
                                        <div class="media__body">
                                            <h3 class="title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <?php if(isset($pro_location)&&$pro_location!=''){ ?>
                                                <div class="address"><?php echo esc_html($pro_location); ?></div>
                                            <?php } ?>
                                        </div>
                                    </article>
                                </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>
                        </div>
                    </div>
                    <div class="slick__nav arrows-1">
                        <i class="slick-prev slick-arrow js-slick-prev ti-angle-left"></i>
                        <i class="slick-next slick-arrow js-slick-next ti-angle-right"></i>
                    </div>
                </div>
            </div>
            
        <?php } ?>
        <?php return ob_get_clean(); 
    }