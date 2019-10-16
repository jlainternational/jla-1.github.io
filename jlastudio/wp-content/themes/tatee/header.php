<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<?php
	$tatee_option = get_option('tatee_option');
	global $tatee_option;
	?>
	<div class="page-wrapper">
		<!-- HEADER-->
		<header id="header">
			<div class="header header-1 d-none d-lg-block js-header-1">
				<div class="header__bar">
					<div class="wrap wrap--w1790">
						<div class="container-fluid">
							<div class="header__content">
								<?php if(isset($tatee_option['media_logo'])&&$tatee_option['media_logo']['url']!=''){ ?>
									<div class="logo">
										<!--<a href="<?php //echo esc_url( home_url( '/' ) ); ?>">-->
											<img src="<?php  echo esc_url($tatee_option['media_logo']['url']); ?>" />
										<!--</a>-->
									</div>
								<?php  }else{ ?>
									<a href="<?php echo esc_url(home_url( '/' )); ?>">
										<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
									</a>
								<?php	}  ?>
								<div class="header__content-right">
									<nav class="header-nav-menu">
										
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
											'items_wrap'      => '<ul data-breakpoint="800" id="%1$s" class="menu nav-menu menu-pc">%3$s</ul>',
											'depth'           => 0,
										); 
										if ( has_nav_menu( 'primary' ) ) {
											wp_nav_menu( $primarymenu );
										}
										?>
									</nav>
									<?php if(isset($tatee_option['contact'])&&$tatee_option['contact']!=''){  ?>
										<div class="header-social">
											<ul class="list-social">
												<?php foreach ($tatee_option['contact'] as $contact) { 
													$value = explode(',', $contact);
													if (isset($value[0]) && isset($value[1])  && isset($value[2]) ) {  ?>
														<li class="list-social__item">
															<a class="<?php echo esc_attr($value[2]); ?>" href="<?php echo esc_url($value[0]); ?>">
																<i class="<?php echo esc_attr($value[1]); ?>"></i>
															</a>
														</li>
													<?php }
												} ?>
											</ul>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
			<div class="header-mobile d-block d-lg-none">
				<div class="header-mobile__bar">
					<div class="container-fluid">
						<div class="header-mobile__bar-inner">
							<?php if(isset($tatee_option['media_logo'])&&$tatee_option['media_logo']!=''){ ?>
								<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url($tatee_option['media_logo']['url']); ?>"/>
								</a>
							<?php }else{ ?>
								<a href="<?php echo esc_url(home_url( '/' )); ?>">
									<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
								</a>
							<?php } ?>
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
		