<?php
$tatee_option = get_option('tatee_option');
global $tatee_option;
if (isset($tatee_option['footer_image_bg']) && $tatee_option['footer_image_bg']['url'] !='' ) { ?>
    <footer class="footer bg-parallax" style="background-image:url(<?php if(isset($tatee_option['footer_image_bg'])&&$tatee_option['footer_image_bg']!=''){ echo esc_url($tatee_option['footer_image_bg']['url']);} ?>);">
        <div class="bg-overlay bg-overlay--p85"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-col">
                        <?php if(isset($tatee_option['footer_logo_2'])&&$tatee_option['footer_logo_2']!=''){ ?>
                            <div class="widget m-b-25">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <img src="<?php echo esc_url($tatee_option['footer_logo_2']['url']); ?>" />
                                </a>
                            </div>
                        <?php }else{} ?>
                        <?php if(isset($tatee_option['footer_contact'])&&$tatee_option['footer_contact']!=''){ ?>
                            <div class="widget widget-address">
                                <ul>
                                    <?php foreach ($tatee_option['footer_contact'] as $fct ) { 
                                        $value = explode('|', $fct);
                                        if(isset($value[0]) && isset($value[1]) ){
                                            ?>
                                            <li><?php echo esc_html($value[0]); ?> : <?php echo esc_html($value[1]); ?></li>
                                        <?php }
                                    } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php if(isset($tatee_option['footer_link'])&&$tatee_option['footer_link']!=''){ ?>
                    <div class="col-lg-2 col-md-6">
                        <div class="footer-col p-l-70 p-md-l-0">
                            <div class="widget widget_pages">
                                <h4 class="widget-title">Link</h4>
                                <ul>
                                    <?php foreach ($tatee_option['footer_link'] as $fl) { 
                                        $value2 = explode(',', $fl);
                                        if (isset($value2[0]) && isset($value2[1]) ) {
                                            ?>
                                            <li>
                                                <a href="<?php echo esc_url($value2[1]); ?>"><?php echo esc_html($value2[0]); ?></a>
                                            </li>
                                        <?php } 
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($tatee_option['footer_social'])&&$tatee_option['footer_social']!=''){ ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-col p-l-70 p-md-l-0">
                            <h4 class="widget-title"><?php echo esc_html__('Social','tatee'); ?></h4>
                            <div class="widget widget_socials">
                                <ul class="list-social list-social-2">
                                    <?php foreach ($tatee_option['footer_social'] as $fso) { 
                                        $value3 = explode(',', $fso);
                                        if(isset($value3[0]) && isset($value3[1]) && isset($value3[2]) ) {
                                            ?>
                                            <li class="list-social__item">
                                                <a class="<?php echo esc_attr($value3[2]); ?>" href="<?php echo esc_url($value3[0]); ?>">
                                                    <i class="<?php echo esc_attr($value3[1]); ?>"></i>
                                                </a>
                                            </li>
                                        <?php } 
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if(isset($tatee_option['footer_copyright'])&&$tatee_option['footer_copyright']!=''){ ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-col">
                            <div class="widget widget_text">
                                <h4 class="widget-title"><?php echo esc_html__('copyright','tatee'); ?></h4>
                                <p><?php echo esc_html($tatee_option['footer_copyright']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </footer>
    <!-- END FOOTER-->
<?php } ?>

</div>
<?php wp_footer(); ?>
</body>
</html>