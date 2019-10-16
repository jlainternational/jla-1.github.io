<?php

/**

* Plugin Name: theme-common

* Plugin URI: vergatheme.com

* Description: A plugin to create custom post type, metabox,...

* Version:  1.0

* Author: Vergatheme

* Author URI: vergatheme.com

* License:  GPL2

*/




 




include dirname( __FILE__ ) . '/cmb2/init.php';

include dirname( __FILE__ ) . '/redux/ReduxCore/framework.php';
include dirname( __FILE__ ) . '/redux/sample/sample-config.php';

include dirname( __FILE__ ) . '/cmb2/example-functions.php';
include dirname( __FILE__ ) . '/custom-post-type/tatee_post_type.php';

include dirname( __FILE__ ) . '/custom-widget/widget-sidebar.php';
include dirname( __FILE__ ) . '/custom-visual/vg-title.php';
include dirname( __FILE__ ) . '/custom-visual/vg-blog-grid.php';
include dirname( __FILE__ ) . '/custom-visual/vg-project-grid-full.php';
include dirname( __FILE__ ) . '/custom-visual/vg-main-home-slide.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-about-us-content.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-image-box.php';
include dirname( __FILE__ ) . '/custom-visual/vg-what-we-do.php';
include dirname( __FILE__ ) . '/custom-visual/vg-what-we-do-2.php';
include dirname( __FILE__ ) . '/custom-visual/vg-latest-project.php';
include dirname( __FILE__ ) . '/custom-visual/vg-people-say.php';
include dirname( __FILE__ ) . '/custom-visual/vg-clients.php';
include dirname( __FILE__ ) . '/custom-visual/vg-clients-black.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-project-hover.php';
include dirname( __FILE__ ) . '/custom-visual/vg-vertical-slide-about-us.php';
include dirname( __FILE__ ) . '/custom-visual/vg-vertical-slide-latest-work.php';
include dirname( __FILE__ ) . '/custom-visual/vg-vertical-slide-why-choose.php';
include dirname( __FILE__ ) . '/custom-visual/vg-contact-map.php';
include dirname( __FILE__ ) . '/custom-visual/vg-text-box-1.php';
include dirname( __FILE__ ) . '/custom-visual/vg-text-box-2.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-project-showcase.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-project-masonry.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-creative-showcase.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-onepage-slide.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-onepage-description.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-counter.php';
include dirname( __FILE__ ) . '/custom-visual/vg-about-counter.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-onepage-specilization.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-people-team.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-revolution.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-landing-all-page.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-landing-full-responsive.php';
include dirname( __FILE__ ) . '/custom-visual/vg-home-landing-purchase.php';
include dirname( __FILE__ ) . '/custom-visual/vg-coming-soon.php';


return true;