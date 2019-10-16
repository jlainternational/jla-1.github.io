<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post() ;
	$video_single_post = get_post_meta(get_the_ID(),'_cmb_video_single_post',true);
	$the_tag = get_the_tags(get_the_ID(),'the_tags',true);
	$post_format = get_post_format(get_the_ID(),'post_formats',true);
	$images_slide_blog = get_post_meta(get_the_ID(),'_cmb_images_slide_blog',true);
	$show_sidebar = get_post_meta(get_the_ID(),'_cmb_show_sb',true);
	$thumbnail_img_1200 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_1200',true);
	$tatee_option = get_option('tatee_option'); 
	global $tatee_option;
	?>
	<main id="main">
		<!-- BLOG DETAIL-->
		<section class="p-t-100 p-b-80">
			<div class="container">
				<?php if(isset($show_sidebar)&&$show_sidebar == 1){ ?>
					<article <?php post_class(); ?>>
						<header class="entry-header">
							<h2 class="entry-title"><?php the_title(); ?></h2>
							<span class="entry-date"><?php the_date();?></span>
						</header>
						<div class="entry-content">
							<?php if(isset($video_single_post) && $video_single_post != ''&& $post_format =='video'){ ?>
								<div class="video js-video-player m-b-30">
									<?php if(isset($tatee_option['play_button'])&&$tatee_option['play_button']!=''){ ?>
										<div class="video__overlay">
											<div class="video__icon-play">
												<img src="<?php echo esc_url($tatee_option['play_button']['url']); ?>" >
											</div>
										</div>
									<?php } ?>
									<img class="video__cover" src="<?php echo wp_get_attachment_url(get_post_thumbnail_ID(get_the_ID())); ?>" />
									<div class="video__content embed-responsive embed-responsive-16by9">
										<?php echo wp_specialchars_decode('<iframe width="1200px" height="675px" src="'.$video_single_post.'" frameborder="0" allowfullscreen ></iframe>'); ?>
									</div>
								</div>
							<?php }elseif (isset($images_slide_blog) && $images_slide_blog !='' && $post_format =='gallery' ) { ?>
								<div class="slick-wrap slick-gallery js-slick-wrapper" data-slick-xs="1" data-slick-sm="1" data-slick-md="1" data-slick-lg="1" data-slick-xl="1" data-slick-customnav="true" data-slick-autoplay="true">
									<div class="slick-wrap-content">
										<div class="slick-content js-slick-content">
											<?php foreach ($images_slide_blog as $isb) { 
												?>
												<div class="slick-item">
													<img src="<?php echo esc_url($isb); ?>" >
												</div>
											<?php } ?>
										</div>
									</div>
									<div class="slick__nav arrows-2 light">
										<i class="slick-prev slick-arrow js-slick-prev ti-angle-left"></i>
										<i class="slick-next slick-arrow js-slick-next ti-angle-right"></i>
									</div>
								</div>
							<?php }else{ ?>
								<?php if(isset($thumbnail_img_1200)&&$thumbnail_img_1200!=''){ ?>
									<a href="<?php the_permalink(); ?>"><img class="wp-post-image" src="<?php echo esc_url($thumbnail_img_1200); ?>" class= "img-responsive"></a>
								<?php } ?>
							<?php }?>
							<div class="row justify-content-center">
								<div class="col-md-10">
									<?php the_content(); ?>
									<footer class="entry-footer">
										<div class="entry-tags">
											<?php if(isset($the_tag)&&$the_tag != ''){ ?>
												<span class="title-6">Tags:</span>
												<ul class="wp-tag-cloud">
													<?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
												</ul>
											<?php } ?>
										</div>
										<?php if(isset($tatee_option['share_blog'])&&$tatee_option['share_blog'] == 2){ ?>
											<div class="entry-share">
												<span class="title-6">share:</span>
												<ul class="list-social list-social--light2">
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
									</footer>
									<?php if ( comments_open() || get_comments_number() ){?>
										<div class="comments-area">
											<?php comments_template(); ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						
					</article>
				<?php }else{ ?>
					
					
					<div class="row">
						<div class="col-md-8 col-lg-<?php if( is_active_sidebar('main-sidebar')){ echo "9"; }else{ echo "12";} ?>">
							<article  <?php post_class(); ?>>
								<header class="entry-header">
									<h2 class="entry-title"><?php the_title(); ?></h2>
									<span class="entry-date"><?php the_date(); ?></span>
								</header>
								<div class="entry-content">
									<?php if(isset($video_single_post) && $video_single_post != ''&& $post_format =='video'){ ?>
										<div class="video js-video-player m-b-30">
											<?php if(isset($tatee_option['play_button'])&&$tatee_option['play_button']!=''){ ?>
												<div class="video__overlay">
													<div class="video__icon-play">
														<img src="<?php echo esc_url($tatee_option['play_button']['url']); ?>">
													</div>
												</div>
											<?php } ?>
											<img class="video__cover" src="<?php echo wp_get_attachment_url(get_post_thumbnail_ID(get_the_ID())); ?>" >
											<div class="video__content embed-responsive embed-responsive-16by9">
												<?php echo wp_specialchars_decode('<iframe width="870px" height="490px" src="'.$video_single_post.'" frameborder="0" allowfullscreen ></iframe>'); ?>
											</div>
										</div>
									<?php }elseif (isset($images_slide_blog) && $images_slide_blog !='' && $post_format =='gallery' ) { ?>
										<div class="slick-wrap slick-gallery js-slick-wrapper" data-slick-xs="1" data-slick-sm="1" data-slick-md="1" data-slick-lg="1" data-slick-xl="1" data-slick-customnav="true" data-slick-autoplay="true">
											<div class="slick-wrap-content">
												<div class="slick-content js-slick-content">
													<?php foreach ($images_slide_blog as $isb) { 
														?>
														<div class="slick-item">
															<img src="<?php echo esc_attr($isb); ?>" >
														</div>
													<?php } ?>
												</div>
											</div>
											<div class="slick__nav arrows-2 light">
												<i class="slick-prev slick-arrow js-slick-prev ti-angle-left"></i>
												<i class="slick-next slick-arrow js-slick-next ti-angle-right"></i>
											</div>
										</div>
									<?php }else{
										if (has_post_thumbnail()) { ?>
											<a href="<?php the_permalink(); ?>"><img class="wp-post-image" src="<?php echo wp_get_attachment_url(get_post_thumbnail_ID(get_the_ID())); ?>" class= "img-responsive"></a>
										<?php } } ?>
										<?php the_content();
										wp_link_pages( array(
											'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tatee' ) . '</span>',
											'after'       => '</div>',
											'link_before' => '<span>',
											'link_after'  => '</span>',
											'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tatee' ) . ' </span>%',
											'separator'   => '<span class="screen-reader-text">, </span>',
										) ); ?>
									</div>
									<?php if ($the_tag !='' || isset($tatee_option['share_blog'])) { ?>
										<footer class="entry-footer custom-tags">
											<div class="entry-tags">
												<?php if(isset($the_tag)&&$the_tag != ''){ ?>
													<span class="title-6">Tags:</span>
													<ul class="wp-tag-cloud">
														<?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
													</ul>
												<?php } ?>
											</div>
											<?php if(isset($tatee_option['share_blog'])&&$tatee_option['share_blog'] == 2){ ?>
												<div class="entry-share">
													<span class="title-6">share:</span>
													<ul class="list-social list-social--light2">
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
										</footer>
									<?php } ?>

								</article>
								<?php if(comments_open() || get_comments_number() ){?>
									<div class="comments-area">
										<?php comments_template(); ?>
									</div>
								<?php } ?>
							</div>
							<?php if( is_active_sidebar('main-sidebar')){ ?>
								<div class="col-md-4 col-lg-3">
									<aside class="widget-area widget-sidebar">
										<?php dynamic_sidebar('main-sidebar'); ?>
									</aside>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</section>
			<!-- END BLOG DETAIL-->
		</main>
		<?php 
	endwhile;
endif;
get_footer(); ?>