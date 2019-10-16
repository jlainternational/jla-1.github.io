<?php
/* 
*Template Name: Home Vertical Slide
*
*/ 



$type_header = get_post_meta(get_the_ID(),'_cmb_type_head',true);
if(isset($type_header)&&$type_header==8){
	get_header('container-3');
}elseif(isset($type_header)&&$type_header==7){
	get_header('container-2');
}elseif(isset($type_header)&&$type_header==6){
	get_header('container');
}elseif(isset($type_header)&&$type_header==5){
	get_header('opacity-3');
}elseif(isset($type_header)&&$type_header==4){
	get_header('opacity-2');
}elseif (isset($type_header)&&$type_header==3) {
	get_header('opacity-1');
}elseif(isset($type_header)&&$type_header==2){
	get_header('opacity');
}else{
	get_header();
}
?>


<?php if(have_posts()) : while(have_posts()) : the_post(); 
	?>	
	<?php
	$tatee_option = get_option('tatee_option');
	global $tatee_option;
	?>
	<main id="main">
		<header id="header">
			<div class="header header-2 header-page-pilling d-none d-lg-block">
				<div class="header__bar">
					<div class="wrap wrap--w1790">
						<div class="container-fluid">
							<div class="header__content">
								<div class="logo">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<img src="<?php if(isset($tatee_option['media_logo_2'])&&$tatee_option['media_logo_2']!=''){ echo esc_url($tatee_option['media_logo_2']['url']);}?>" />
									</a>
								</div>
								<div class="header__content-right">
									<button class="hamburger hamburger--slider float-right hamburger--sm js-menusb-btn" type="button">
										<span class="hamburger-box">
											<span class="hamburger-inner"></span>
										</span>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<aside class="menu-sidebar js-menusb" id="sidebar">
				<a class="btn-close" href="#" id="js-close-btn">
					<span class="ti-close"></span>
				</a>
				<div class="menu-sidebar__content">
					<nav class="menu-sidebar-nav-menu">
						<?php

						$secondmenu = array(

							'theme_location'  => 'second',

							'menu'            => '',

							'container'       => '',

							'container_class' => '',

							'container_id'    => '',

							'menu_class'      => '',

							'menu_id'         => '',

							'echo'            => true,

							'fallback_cb'       => 'tatee_wp_bootstrap_navwalker::fallback',

							'walker'            => new tatee_wp_bootstrap_navwalker(),

							'before'          => '',

							'after'           => '',

							'link_before'     => '',

							'link_after'      => '',

							'items_wrap'      => '<ul data-breakpoint="800" id="%1$s nav-menu-sidebar" class="menu nav-menu menu-one-slide">%3$s</ul>',

							'depth'           => 0,

						); 

						if ( has_nav_menu( 'second' ) ) {

							wp_nav_menu( $secondmenu );

						}

						?>
					</nav>
					<?php if(isset($tatee_option['contact'])&&$tatee_option['contact']!=''){ ?>
						<ul class="list-social list-social--big">
							<?php foreach ($tatee_option['contact'] as $contact) { 
								$value = explode(',', $contact);
								?>
								<li class="list-social__item">
									<a class="<?php echo esc_attr($value[2]); ?>" href="<?php echo esc_url($value[0]); ?>">
										<i class="<?php echo esc_attr($value[1]); ?>"></i>
									</a>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
				</div>
				<?php if(isset($tatee_option['footer_copyright'])&&$tatee_option['footer_copyright']!=''){ ?>
					<div class="menu-sidebar__footer">
						<div class="copyright">
							<p><?php echo esc_attr($tatee_option['footer_copyright']); ?></p>
						</div>
					</div>
				<?php } ?>
			</aside>
			<div id="menu-sidebar-overlay"></div>
			<div class="header-mobile d-block d-lg-none">
				<div class="header-mobile__bar">
					<div class="container-fluid">
						<div class="header-mobile__bar-inner">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php if(isset($tatee_option['media_logo'])&&$tatee_option['media_logo']!=''){ echo esc_url($tatee_option['media_logo']['url']);}else{}?>" />
							</a>
							<button class="hamburger hamburger--slider float-right" type="button">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
				</div>
				<nav class="header-nav-menu-mobile">
					<div class="container-fluid">
						<?php

						$primarymenu = array(

							'theme_location'  => 'primary',

							'menu'            => '',

							'container'       => '',

							'container_class' => '',

							'container_id'    => '',

							'menu_class'      => '',

							'menu_id'         => '',

							'echo'            => true,

							'fallback_cb'       => 'tatee_wp_bootstrap_navwalker::fallback',

							'walker'            => new tatee_wp_bootstrap_navwalker(),

							'before'          => '',

							'after'           => '',

							'link_before'     => '',

							'link_after'      => '',

							'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="menu nav-menu menu-mobile">%3$s</ul>',

							'depth'           => 0,

						); 

						if ( has_nav_menu( 'primary' ) ) {

							wp_nav_menu( $primarymenu );

						}

						?>
					</div>
				</nav>
			</div>
		</header>   
		<div class="page-info" id="js-pageinfo">
			<ul class="list-social-3">
				<li class="list-social__item">
					<a  href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><?php echo esc_html__('facebook','tatee'); ?>
						<i class="fab fa-facebook-f icon"></i>
					</a>
				</li>
				<li class="list-social__item">
					<a  href="#"><?php echo esc_html__('instagram','tatee'); ?>
						<i class="fab fa-instagram icon"></i>
					</a>
				</li>
				<li class="list-social__item">
					<a  href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink();?>"><?php echo esc_html__('twitter','tatee'); ?>
						<i class="fab fa-twitter icon"></i>
					</a>
				</li>
				<li class="list-social__item">
					<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&description=<?php the_title(); ?>"><?php echo esc_html__('printerest','tatee'); ?>
						<i class="fab fa-pinterest-p icon"></i>
					</a>
				</li>
				<li class="list-social__item">
					<a  href="https://plus.google.com/share?url=<?php the_permalink();?>"><?php echo esc_html__('google','tatee'); ?>
						<i class="fab fa-google-plus-g icon"></i>
					</a>
				</li>
			</ul>
			<div class="copyright"><?php echo esc_html__('© 2018 TATEE','tatee'); ?></div>
			<h3 class="page-info__title"><?php echo esc_html__('About us','tatee'); ?></h3>
		</div>
		<div class="page-pagepiling-wrap js-pagepilling">
			<?php the_content(); ?>	
		</div>	
	</main>	
	<?php
endwhile;
endif;
wp_footer(); 
?>
