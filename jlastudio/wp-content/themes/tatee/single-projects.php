<?php get_header(); ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); 
	$type_dis = get_post_meta(get_the_ID(),'_cmb_type_dis',true);
	$pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);
	$images_content_project = get_post_meta(get_the_ID(),'_cmb_images_content_project',true);
	$link_button = get_post_meta(get_the_ID(),'_cmb_link_button',true);
	?>
	<main id="main">
		<?php if(isset($type_dis)&&$type_dis == 4){ ?>
			<div class="container">
				<article class="project-style-4">
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					<div class="masonry-row js-isotope-wrapper">
						<?php if(isset($images_content_project)&&$images_content_project!=''){ ?>
							<div class="row isotope-content">                        	
								<?php $i=0;	foreach ($images_content_project as $icp) { ?>
									<div class="<?php if($i==3){echo 'col-lg-8';}else{echo 'col-md-6 col-lg-4'; } ?> isotope-item <?php if($i==0){echo 'isotope-item-sizer';} ?>">
										<img class="wp-post-image" src="<?php echo esc_attr($icp); ?>" />
									</div>
								<?php $i++; } ?>
							</div>
						<?php } ?>
					</div>
					<div class="row m-t-20">
						<div class="col-lg-5">
							<div class="entry-meta">
								<div class="row">
									<div class="col-sm-6">
										<div class="entry-meta__item">
											<h4 class="key"><?php echo esc_html__('DATE','tatee'); ?>:</h4>
											<span class="value"><?php the_date(); ?></span>
										</div>
										<div class="entry-meta__item">
											<h4 class="key"><?php echo esc_html__('status','tatee'); ?>:</h4>
											<span class="value"><?php echo esc_html__('Completed','tatee'); ?></span>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="entry-meta__item">
											<h4 class="key"><?php echo esc_html__('client','tatee'); ?>:</h4>
											<span class="value"><?php the_author_posts_link(); ?></span>
										</div>
										<?php if(isset($pro_location)&&$pro_location!=''){ ?>
											<div class="entry-meta__item">
												<h4 class="key"><?php echo esc_html__('location','tatee'); ?>:</h4>
												<span class="value"><?php echo esc_html($pro_location); ?></span>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
							<?php if(isset($tatee_option['share_blog'])&&$tatee_option['share_blog'] == 2){ ?>
								<div class="entry-share">
									<span class="key"><?php echo esc_html__('Share','tatee'); ?> :</span>
									<ul class="list-social list-social--md">
										<li class="list-social__item">
											<a class="ic-fb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>">
												<i class="zmdi zmdi-facebook"></i>
											</a>
										</li>
										<li class="list-social__item">
											<a class="ic-insta" href="#">
												<i class="zmdi zmdi-instagram"></i>
											</a>
										</li>
										<li class="list-social__item">
											<a class="ic-twi" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink();?>">
												<i class="zmdi zmdi-twitter"></i>
											</a>
										</li>
										<li class="list-social__item">
											<a class="ic-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&description=<?php the_title(); ?>">
												<i class="zmdi zmdi-pinterest"></i>
											</a>
										</li>
										<li class="list-social__item">
											<a class="ic-google" href="https://plus.google.com/share?url=<?php the_permalink();?>">
												<i class="zmdi zmdi-google"></i>
											</a>
										</li>
									</ul>
								</div>
							<?php } ?>
						</div>
					</div>
				</article>
			</div>
			<nav class="navigation project-navigation">
				<div class="container">
					<div class="nav-links">
						<div class="nav-previous">								
							<?php $previous_post = get_previous_post (); ?>
							<?php if(isset($previous_post)&&$previous_post!=''){ ?>
								<a href="<?php echo esc_url( get_permalink( $previous_post->ID));?> "><span class="ti-arrow-left"></span></a>
							<?php } ?>
						</div>
						<div class="all-link-wrap">
							<a class="all-link" href="<?php if(isset($link_button)&&$link_button!=''){echo esc_url($link_button); }?>">
								<span class="ti-menu"></span>
							</a>
						</div>
						<div class="nav-next">
							<?php $next_post = get_next_post (); ?>
							<?php if(isset($next_post)&&$next_post!=''){ ?>
								<a href="<?php echo esc_url( get_permalink( $next_post->ID));?> "><span class="ti-arrow-right"></span></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</nav>
		<?php }elseif ($type_dis == 3) { ?>
			<div class="wrap wrap--w1790">
				<div class="container-fluid">
					<article class="project-style-3">
						<div class="rev_slider_wrapper rev_slider_wrapper--p80">
							<div class="rev_slider fullwidthabanner js-rev" data-version="5.4.4" style="display:none" data-rev-layout="fullscreen" data-rev-arrows="false" data-rev-bullets="true" data-rev-stylebullet="au-rev-bullet-2" data-rev-voffbullet="40" data-rev-spacebullet="20">
								<?php if(isset($images_content_project)&&$images_content_project!=''){ ?>
									<ul>
										<?php foreach ($images_content_project as $icp) { ?>
											<li class="rev-item rev-item-1" data-transition="crossfade" style="background-color:#000;">
												<img class="rev-slidebg" src="<?php echo esc_attr($icp); ?>"  data-bgposition="center center" data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120"
												data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" />
											</li>
										<?php } ?>
									</ul>
								<?php } ?>
							</div>
						</div>
						<div class="entry-summary">
							<div class="entry-summary__inner">
								<h2 class="entry-title"><?php the_title(); ?></h2>
								<p class="entry-content"><?php the_content(); ?></p>
								<div class="entry-meta">
									<div class="entry-meta__item">
										<h4 class="key"><?php echo esc_html__('DATE','tatee'); ?>:</h4>
										<span class="value"><?php the_date(); ?></span>
									</div>
									<div class="entry-meta__item">
										<h4 class="key"><?php echo esc_html__('status','tatee'); ?>:</h4>
										<span class="value"><?php echo esc_html__('Completed','tatee'); ?></span>
									</div>
									<div class="entry-meta__item">
										<h4 class="key"><?php echo esc_html__('client','tatee'); ?>:</h4>
										<span class="value"><?php the_author_posts_link(); ?></span>
									</div>
									<?php if(isset($pro_location)&&$pro_location != ''){ ?>
										<div class="entry-meta__item">
											<h4 class="key"><?php echo esc_html__('location','tatee'); ?>:</h4>
											<span class="value"><?php echo esc_html($pro_location); ?></span>
										</div>
									<?php } ?>
								</div>
								<?php if(isset($tatee_option['share_blog'])&&$tatee_option['share_blog'] == 2){ ?>
									<div class="entry-share">
										<span class="key"><?php echo esc_html__('Share','tatee'); ?> :</span>
										<ul class="list-social list-social--md">
											<li class="list-social__item">
												<a class="ic-fb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>">
													<i class="zmdi zmdi-facebook"></i>
												</a>
											</li>
											<li class="list-social__item">
												<a class="ic-insta" href="#">
													<i class="zmdi zmdi-instagram"></i>
												</a>
											</li>
											<li class="list-social__item">
												<a class="ic-twi" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink();?>">
													<i class="zmdi zmdi-twitter"></i>
												</a>
											</li>
											<li class="list-social__item">
												<a class="ic-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&description=<?php the_title(); ?>">
													<i class="zmdi zmdi-pinterest"></i>
												</a>
											</li>
											<li class="list-social__item">
												<a class="ic-google" href="https://plus.google.com/share?url=<?php the_permalink();?>">
													<i class="zmdi zmdi-google"></i>
												</a>
											</li>
										</ul>
									</div>
								<?php } ?>
							</div>
							<nav class="navigation project-navigation">
								<div class="container">
									<div class="nav-links">
										<div class="nav-previous">								
											<?php $previous_post = get_previous_post (); ?>
											<?php if(isset($previous_post)&&$previous_post!=''){ ?>
												<a href="<?php echo esc_url( get_permalink( $previous_post->ID));?> "><span class="ti-arrow-left"></span></a>
											<?php } ?>
										</div>
										<div class="all-link-wrap">
											<a class="all-link" href="<?php if(isset($link_button)&&$link_button!=''){echo esc_url($link_button); }else{echo '#' ; } ?>">
												<span class="ti-menu"></span>
											</a>
										</div>
										<div class="nav-next">
											<?php $next_post = get_next_post (); ?>
											<?php if(isset($next_post)&&$next_post!=''){ ?>
												<a href="<?php echo esc_url( get_permalink( $next_post->ID));?> "><span class="ti-arrow-right"></span></a>
											<?php } ?>
										</div>
									</div>
								</div>
							</nav>
						</div>
					</article>
				</div>
			</div>
			
		<?php }elseif($type_dis == 2){ ?>
			<div class="wrap wrap--w1790">
				<div class="container-fluid">
					<article class="project-style-2">
						<div class="project-images">
							<?php if(isset($images_content_project)&&$images_content_project !=''){ 
								foreach ($images_content_project as $icp ) {
									?>		
									<img class="wp-post-image" src="<?php echo esc_attr($icp); ?>" >
								<?php } } ?>
							</div>
							<aside class="entry-summary-wrap">
								<div class="entry-summary-content" id="js-sticky-content">
									<div class="entry-summary js-sticky">
										<div class="entry-summary__inner">
											<h2 class="entry-title"><?php the_title(); ?></h2>
											<p class="entry-content"><?php the_content(); ?></p>
											<div class="entry-meta">
												<div class="entry-meta__item">
													<h4 class="key"><?php echo esc_html__('DATE','tatee'); ?>:</h4>
													<span class="value"><?php the_date(); ?></span>
												</div>
												<div class="entry-meta__item">
													<h4 class="key"><?php echo esc_html__('status','tatee'); ?>:</h4>
													<span class="value"><?php echo esc_html__('Completed','tatee'); ?></span>
												</div>
												<div class="entry-meta__item">
													<h4 class="key"><?php echo esc_html__('client','tatee'); ?>:</h4>
													<span class="value"><?php the_author_posts_link(); ?></span>
												</div>
												<?php if(isset($pro_location)&&$pro_location != ''){ ?>
													<div class="entry-meta__item">
														<h4 class="key"><?php echo esc_html__('location','tatee'); ?>:</h4>
														<span class="value"><?php echo esc_html($pro_location); ?></span>
													</div>
												<?php } ?>
											</div>
											<?php if(isset($tatee_option['share_blog'])&&$tatee_option['share_blog'] == 2){ ?>
												<div class="entry-share">
													<span class="key"><?php echo esc_html__('Share','tatee'); ?> :</span>
													<ul class="list-social list-social--md">
														<li class="list-social__item">
															<a class="ic-fb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>">
																<i class="zmdi zmdi-facebook"></i>
															</a>
														</li>
														<li class="list-social__item">
															<a class="ic-insta" href="#">
																<i class="zmdi zmdi-instagram"></i>
															</a>
														</li>
														<li class="list-social__item">
															<a class="ic-twi" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink();?>">
																<i class="zmdi zmdi-twitter"></i>
															</a>
														</li>
														<li class="list-social__item">
															<a class="ic-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&description=<?php the_title(); ?>">
																<i class="zmdi zmdi-pinterest"></i>
															</a>
														</li>
														<li class="list-social__item">
															<a class="ic-google" href="https://plus.google.com/share?url=<?php the_permalink();?>">
																<i class="zmdi zmdi-google"></i>
															</a>
														</li>
													</ul>
												</div>
											<?php } ?>
										</div>
										<nav class="navigation project-navigation">
											<div class="container">
												<div class="nav-links">
													<div class="nav-previous">								
														<?php $previous_post = get_previous_post (); ?>
														<?php if(isset($previous_post)&&$previous_post!=''){ ?>
															<a href="<?php echo esc_url( get_permalink( $previous_post->ID));?> "><span class="ti-arrow-left"></span></a>
														<?php } ?>
													</div>
													<div class="all-link-wrap">
														<a class="all-link" href="<?php if(isset($link_button)&&$link_button!=''){echo esc_url($link_button); } ?>">
															<span class="ti-menu"></span>
														</a>
													</div>
													<div class="nav-next">
														<?php $next_post = get_next_post (); ?>
														<?php if(isset($next_post)&&$next_post!=''){ ?>
															<a href="<?php echo esc_url( get_permalink( $next_post->ID));?> "><span class="ti-arrow-right"></span></a>
														<?php } ?>
													</div>
												</div>
											</div>
										</nav>
									</div>
								</div>
							</aside>
						</article>
					</div>
				</div>
			<?php }else{ ?>
				<div class="container">
					<article class="project-style-1">
						<header class="entry-header">
							<h2 class="entry-title"><?php the_title(); ?></h2>
						</header>
						<div class="row">
							<div class="col-lg-5">
								<div class="entry-meta">
									<div class="row">
										<div class="col-sm-6">
											<div class="entry-meta__item">
												<h4 class="key"><?php echo esc_html__('DATE:','tatee'); ?></h4>
												<span class="value"><?php the_date(); ?></span>
											</div>
											<div class="entry-meta__item">
												<h4 class="key"><?php echo esc_html__('status:','tatee'); ?></h4>
												<span class="value"><?php echo esc_html__('Completed','tatee'); ?></span>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="entry-meta__item">
												<h4 class="key"><?php echo esc_html__('client','tatee'); ?>:</h4>
												<span class="value"><?php the_author_posts_link(); ?></span>
											</div>
											<?php if(isset($pro_location)&&$pro_location != ''){ ?>
												<div class="entry-meta__item">
													<h4 class="key"><?php echo esc_html__('location','tatee'); ?>:</h4>
													<span class="value"><?php echo esc_attr($pro_location,'tatee'); ?></span>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
								<?php if(isset($tatee_option['share_blog'])&&$tatee_option['share_blog'] == 2){ ?>
									<div class="entry-share">
										<span class="key"><?php echo esc_html__('Share','tatee'); ?> :</span>
										<ul class="list-social list-social--md">
											<li class="list-social__item">
												<a class="ic-fb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>">
													<i class="zmdi zmdi-facebook"></i>
												</a>
											</li>
											<li class="list-social__item">
												<a class="ic-insta" href="#">
													<i class="zmdi zmdi-instagram"></i>
												</a>
											</li>
											<li class="list-social__item">
												<a class="ic-twi" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink();?>">
													<i class="zmdi zmdi-twitter"></i>
												</a>
											</li>
											<li class="list-social__item">
												<a class="ic-pinterest" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&description=<?php the_title(); ?>">
													<i class="zmdi zmdi-pinterest"></i>
												</a>
											</li>
											<li class="list-social__item">
												<a class="ic-google" href="https://plus.google.com/share?url=<?php the_permalink();?>">
													<i class="zmdi zmdi-google"></i>
												</a>
											</li>
										</ul>
									</div>
								<?php } ?>
							</div>
						</div>
						<?php if(isset($images_content_project)&&$images_content_project !=''){ 
							foreach ($images_content_project as $icp ) {
								?>		
								<img class="wp-post-image" src="<?php echo esc_attr($icp); ?>" >
							<?php } } ?>

						</article>

					</div>
					<nav class="navigation project-navigation">
						<div class="container">
							<div class="nav-links">
								<div class="nav-previous">								
									<?php $previous_post = get_previous_post (); ?>
									<?php if(isset($previous_post)&&$previous_post!=''){ ?>
										<a href="<?php echo esc_url( get_permalink( $previous_post->ID));?> "><span class="ti-arrow-left"></span></a>
									<?php } ?>
								</div>
								<div class="all-link-wrap">
									<a class="all-link" href="<?php if(isset($link_button)&&$link_button!=''){echo esc_url($link_button); } ?>">
										<span class="ti-menu"></span>
									</a>
								</div>
								<div class="nav-next">
									<?php $next_post = get_next_post (); ?>
									<?php if(isset($next_post)&&$next_post!=''){ ?>
										<a href="<?php echo esc_url( get_permalink( $next_post->ID));?> "><span class="ti-arrow-right"></span></a>
									<?php } ?>
								</div>
							</div>
						</div>
					</nav>

				<?php } ?>
			</main>

			<?php 
		endwhile;
	endif;
	get_footer(); 
	?>