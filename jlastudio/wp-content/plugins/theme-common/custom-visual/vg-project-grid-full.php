<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Project Grid','tatee'),
		'base' => 'project_grid_full',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type Project Grid','tatee'),
				'param_name' => 'display_pg',
				'value' => array(
					esc_html__( 'Type 1: Project Grid Full Width', 'tatee' ) => 1,
					esc_html__( 'Type 2: Project Grid Standard', 'tatee' ) => 2,
					esc_html__( 'Type 3: Project Grid Masonry', 'tatee' ) => 3,
					esc_html__( 'Type 4: Project Grid Carousel', 'tatee' ) => 4,
				),
				'description' => esc_html__('',"tatee")
			),		
		)
	));
}
add_shortcode('project_grid_full','project_grid_full_func');
function project_grid_full_func($atts,$content = null){
	extract(shortcode_atts(array(
		'display_pg' => '',	
	),$atts));
	ob_start();
	?>
	<?php if(isset($display_pg)&&$display_pg==4){ ?>
		<?php 
		$pro_grid_carou = new WP_Query(
			array(
				'posts_per_page' => -1,
				'post_status' => 'publish',
				'post_type' => 'projects',
			));
			?>
			<!-- SLIDER-->
			<section class="p-b-120 project-carou">
				<div class="rev_slider_wrapper">
					<div class="rev-carousel rev_slider fullwidthabanner js-rev" data-version="5.4.4" style="display:none;" data-rev-layout="fullwidth" data-rev-height="657" data-rev-stylearrow="au-rev-arrow-4" data-rev-bullets="false" data-rev-delay="500000" data-rev-carouselon="true">
						<ul>
							<?php if($pro_grid_carou->have_posts()) : while($pro_grid_carou->have_posts()) : $pro_grid_carou->the_post(); 
								$thumbnail_img_1170x657 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_1170x657',true);
								$pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);
								?>
								<li class="rev-item rev-item-1" data-transition="crossfade" style="background-color:#000;">
									<img class="rev-slidebg" src="<?php echo esc_url($thumbnail_img_1170x657); ?>" alt="Master Slider 01" />
									<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rev-text-2" data-frames="[{&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;&quot;,&quot;speed&quot;:1000,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:200,&quot;ease&quot;:&quot;Power4.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1000,&quot;to&quot;:&quot;y:[100%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
									data-x="[left]" data-y="[bottom]" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[27, 27, 27, 27, 27]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="370" data-height="85" data-basealign="slide"
									style="background-color: rgb(255,255,255);"></div>
									<a class="tp-caption tp-resizeme rev-text-2" href="<?php the_permalink(); ?>" target="_self" data-frames="[{&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;&quot;,&quot;speed&quot;:1200,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:600,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1000,&quot;to&quot;:&quot;y:[100%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
									data-x="[left]" data-y="[bottom]" data-hoffset="[30, 30, 30, 30, 30]" data-voffset="[64, 64, 64, 64, 64]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="[325, 325, 325, 325, 325]" data-height="[&quot;auto&quot;]"
									data-lineheight="[32, 32, 32, 32, 33]" data-whitespace="normal" data-color="#222" data-fontweight="700" data-fontsize="[25, 25, 25, 25, 26]" data-textalign="[left, left, left, left, left]"><?php the_title(); ?></a>
									<h4 class="tp-caption tp-resizeme rev-text-1" data-frames="[{&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;speed&quot;:1200,&quot;to&quot;:&quot;o:1;&quot;,&quot;delay&quot;:600,&quot;ease&quot;:&quot;Power4.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1000,&quot;to&quot;:&quot;y:[100%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
									data-x="['left']" data-y="['bottom']" data-hoffset="[30, 30, 30, 30, 30]" data-voffset="[41, 41, 41, 41, 41]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto']" data-height="[&quot;auto&quot;]"
									data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]" data-color="#888" data-fontweight="400" data-fontsize="[11, 11, 12, 12, 14]" data-textalign="[left, left, left, center, center]"><?php echo esc_html($pro_location); ?></h4>
								</li>

							<?php endwhile; endif; wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>
			</section>
		<?php }elseif(isset($display_pg)&&$display_pg==3){ ?>
			<?php 
			$pro_grid_mason = new WP_Query(
				array(
					'posts_per_page' => 10,
					'post_status' => 'publish',
					'post_type' => 'projects',
				));
				?>

				<!-- PROJECT-->
				<section class="section p-b-120">
					<div class="container">
						<div class="masonry-row js-isotope-wrapper">
							<div class="row isotope-content">
								<?php $i=0;  ?>
								<?php if($pro_grid_mason->have_posts()) : while($pro_grid_mason->have_posts()) : $pro_grid_mason->the_post(); 
									$thumbnail_img_640x467 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_640x467',true);
									$thumbnail_img_640x986 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_640x986',true);
									$thumbnail_img_960x711 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_960x711',true);
									$pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);
									$a = (int)$i/10;
									$b = (int)$a*10;	
									?>
									<div class="<?php if($i !=$b + 5){echo 'col-md-6 col-lg-4' ;}else{echo 'col-lg-8' ;} ?> isotope-item <?php if($i==0){echo 'isotope-item-sizer' ;} ?>">
										<article class="media-project-2 m-b-30">
											<figure class="media__img">
												<img src="<?php if($i==$b+1||$i==$b+4){echo esc_url($thumbnail_img_640x986); }elseif($i==$b+5){echo esc_url($thumbnail_img_960x711);}else{echo esc_url($thumbnail_img_640x467);} ?>" />
											</figure>
											<div class="media__body">
												<h3 class="media__title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>
												<?php if(isset($pro_location)&&$pro_location != ''){ ?>
													<span class="address"><?php echo esc_html($pro_location); ?></span>
												<?php } ?>
											</div>
										</article>
									</div>
									<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
								</div>
							</div>
						</div>
					</section>
				<?php }elseif(isset($display_pg)&&$display_pg==2){ ?>
					<?php 
					$pro_grid_stan = new WP_Query(
						array(
							'posts_per_page' => 8,
							'post_status' => 'publish',
							'post_type' => 'projects',
						));
						?>
						<section class="section p-b-120">			
							<div class="container">
								<div class="row gutter-xl">
									<?php if($pro_grid_stan->have_posts()) : while($pro_grid_stan->have_posts()) : $pro_grid_stan->the_post(); 
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
														<div class="address"><?php echo esc_html($pro_location); ?></div>
													<?php } ?>
												</div>
											</article>
										</div>
									<?php endwhile; endif; wp_reset_postdata(); ?>
								</div>

								<div class="text-center p-t-20">
									<div class="au-btn au-btn--c6 au-btn-lg loadmore2" id="more_posts">Load more</div>
								</div>


							</div>

						</section>	
						<script type="text/javascript">
							var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
							var page2 = 2;
							jQuery(function($){
								$('body').on('click','.loadmore2', function(){
									var data = {
										'action': 'load_posts_by_ajax_2',
										'page2': page2,
										'security_2': '<?php echo wp_create_nonce("load_more_posts_2"); ?>',
										'max_page_2': '<?php echo $pro_grid_stan->max_num_pages + 1; ?>',
									};
									$.post(ajaxurl, data, function(response){
										if(response != '') {
											$('.gutter-xl').append(response);
											page2++;
										}
										if (page2 == data['max_page_2']) {
											$('.loadmore2').hide();
										}
									});
								});

							});
						</script>
					<?php }else{ ?>


						<?php
						$uri = $_SERVER['REQUEST_URI'];
						$tmp = array_slice(explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), 0, -1);
						$param = end($tmp);
						$pro_grid_full = new WP_Query(
							array(
								'posts_per_page' => 100,
								'post_status' => 'publish',
								'post_type' => 'projects',
								'categories_projects' => $param
							));
							?>

							<section class="section p-b-120">
								<div class="wrap wrap--w1790">
									<div class="container-fluid">
										<div class="row gutter-lg">
											<?php if($pro_grid_full->have_posts()) : while($pro_grid_full->have_posts()) : $pro_grid_full->the_post(); 
												$thumbnail_img_960 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_960',true);
												$pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);
												$category = reset(get_the_terms(get_the_ID(), 'categories_projects'));
												$category_id = $category->slug; 
												?>
												<div class="col-md-6 col-lg-3">
													<article class="media media-project media-project-1">
														<?php if(isset($thumbnail_img_960)&&$thumbnail_img_960!=''){ ?>
															<figure class="media__img">
																<img src="<?php echo esc_url($thumbnail_img_960); ?>"  />
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
																<div class="address"><?php echo esc_html($pro_location); ?></div>
															<?php } ?>
														</div>
													</article>
												</div>
											<?php endwhile; endif; wp_reset_postdata(); ?>
										</div>
									</div>
								</div>
							</section>

							<script type="text/javascript">
								var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
								var page = 2;
								jQuery(function($){
									$('body').on('click','.loadmore', function(){
										var data = {
											'action': 'load_posts_by_ajax',
											'page': page,
											'security': '<?php echo wp_create_nonce("load_more_posts"); ?>',
											'max_page': '<?php echo $pro_grid_full->max_num_pages + 1; ?>',
										};
										$.post(ajaxurl, data, function(response){
											console.log(response);

											if(response != '') {
												$('.gutter-lg').append(response);
												page++;
											}
											if (page == data['max_page']) {
												$('.loadmore').hide();
											}
										});
									});

								});
							</script>
						<?php } ?>
						<?php return ob_get_clean(); 
					}