<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Home Creative Showcase Item 1','tatee'),
		'base' => 'home_creative_item_1',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Detail Content','tatee'),
				'param_name' => 'detail_hc',
				'value' => '',
				'params' => array(
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Type','tatee'),
						'param_name' => 'type_hc',
						'value' => array(
							esc_html__( 'Type 1: Panel Heading', 'tatee' ) => 1,
							esc_html__( 'Type 2: Represent Project', 'tatee' ) => 2,
							esc_html__( 'Type 3: Contact Us', 'tatee' ) => 3,
							esc_html__( 'Type 4: Qoute', 'tatee' ) => 4,
							esc_html__( 'Type 5: Clients', 'tatee' ) => 5,
						),
						'description' => esc_html__('',"tatee")
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title','tatee'),
						'param_name' => 'title_hc',
						'value' => '',
						'description' => esc_html__('Ex: We are architectecture & interior design studio from NewYork, ...Note: If you choice Type 1 or Type 2, you need fill it',"tatee"),
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image','tatee'),
						'param_name' => 'image_hc',
						'value' => '',
						'description' => esc_html__('Note: If you choice Type 1 or Type 2, you need fill it',"tatee"),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Location','tatee'),
						'param_name' => 'location_hc',
						'value' => '',
						'description' => esc_html__('Ex: Michigan, USA, ...Note: If you choice Type 2, you need fill it',"tatee"),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Link','tatee'),
						'param_name' => 'link_hc',
						'value' => '',
						'description' => esc_html__('Note: If you choice Type 2, you need fill it',"tatee"),
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Detail Contact','tatee'),
						'param_name' => 'contact_hc',
						'value' => '',
						'params' => array(
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Type Info','tatee'),
								'param_name' => 'info_hc',
								'value' => '',
								'description' => esc_html__('Ex: Address, Phone Number, Email ...Note: If you choice Type 3, you need fill it',"tatee"),
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Value','tatee'),
								'param_name' => 'value_hc',
								'value' => '',
								'description' => esc_html__('Note: If you choice Type 3, you need fill it',"tatee"),
							),
						),
						'description' => esc_html__('Note: If you choice Type 3, you need fill it',"tatee"),
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Detail Qoute','tatee'),
						'param_name' => 'qoute_hc',
						'value' => '',
						'params' => array(
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Name Author','tatee'),
								'param_name' => 'name_hc',
								'value' => '',
								'description' => esc_html__('Note: If you choice Type 4, you need fill it',"tatee"),
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Link Author','tatee'),
								'param_name' => 'linka_hc',
								'value' => '',
								'description' => esc_html__('Note: If you choice Type 4, you need fill it',"tatee"),
							),
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Job','tatee'),
								'param_name' => 'job_hc',
								'value' => '',
								'description' => esc_html__('Note: If you choice Type 4, you need fill it',"tatee"),
							),
							array(
								'type' => 'textarea',
								'heading' => esc_html__('Content Qoute','tatee'),
								'param_name' => 'content_hc',
								'value' => '',
								'description' => esc_html__('Note: If you choice Type 4, you need fill it',"tatee"),
							),
						),
						'description' => esc_html__('Note: If you choice Type 4, you need fill it',"tatee"),
					),
					array(
						'type' => 'param_group',
						'heading' => esc_html__('Detail Clients','tatee'),
						'param_name' => 'client_hc',
						'value' => '',
						'params' => array(
							array(
								'type' => 'textfield',
								'heading' => esc_html__('Link CLient','tatee'),
								'param_name' => 'linkc_hc',
								'value' => '',
								'description' => esc_html__('Note: If you choice Type 5, you need fill it',"tatee")
							),
							array(
								'type' => 'attach_image',
								'heading' => esc_html__('Image','tatee'),
								'param_name' => 'imagec_hc',
								'value' => '',
								'description' => esc_html__('Note: If you choice Type 5, you need fill it',"tatee"),
							),
						),
						'description' => esc_html__('Note: If you choice Type 5, you need fill it',"tatee"),
					),

				),
				'description' => esc_html__('',"tatee")
			),	
		)
	));
}
add_shortcode('home_creative_item_1','home_creative_item_1_func');
function home_creative_item_1_func($atts,$content = null){
	extract(shortcode_atts(array(
		'detail_hc' => '',
	),$atts));
	ob_start();
	?>
	<section class="p-t-40 p-b-45">
		<div class="container">
			<div class="masonry-row js-isotope-wrapper" data-isotope-hori="true">
				<div class="row isotope-content">
					<?php if(isset($detail_hc)&&$detail_hc!=''){ 
						$detail_hc = vc_param_group_parse_atts($detail_hc,'');
						$i=0;
						foreach ($detail_hc as $dhc) {
							?>
							<div class="<?php if($i==0||$i==9){echo 'col-lg-8' ;}else{echo 'col-md-6 col-lg-4' ;} ?> <?php if($i==1){echo 'isotope-item-sizer';} ?> isotope-item">
								<?php if(isset($dhc['type_hc'])&&$dhc['type_hc']==5){ ?>
									<?php if(isset($dhc['client_hc'])&&$dhc['client_hc']!=''){ 
										$dhc['client_hc'] = vc_param_group_parse_atts($dhc['client_hc'],'');
										?>
										<div class="client-section bg-image-2 m-b-30">
											<div class="row no-gutters">
												<?php foreach ($dhc['client_hc'] as $dhc3) { ?>
													<?php if(isset($dhc3['imagec_hc'])&&$dhc3['imagec_hc']!=''){ 
														$dhc3['imagec_hc'] = wp_get_attachment_image_src($dhc3['imagec_hc'],'');
														?>
														<div class="col-lg-4 col-md-6">
															<a class="img-client" href="<?php echo esc_url($dhc3['linkc_hc']); ?>">
																<img src="<?php echo esc_url($dhc3['imagec_hc'][0]); ?>">
															</a>
														</div>
													<?php } ?>
												<?php } ?>	
											</div>
										</div>
									<?php } ?>
								<?php }elseif(isset($dhc['type_hc'])&&$dhc['type_hc']==4){ ?>
									<?php if(isset($dhc['qoute_hc'])&&$dhc['qoute_hc']!=''){ 
										$dhc['qoute_hc'] = vc_param_group_parse_atts($dhc['qoute_hc'],'');
										?>
										<div class="slick-wrap slick-testi-2 bg-pattern-2 m-b-30 js-slick-wrapper" data-slick-xs="1" data-slick-sm="1" data-slick-md="1" data-slick-lg="1" data-slick-xl="1" data-slick-customnav="true" data-slick-autoplay="true" data-slick-dots="true">
											<div class="slick-wrap-content">
												<div class="slick-content js-slick-content">
													<?php foreach ($dhc['qoute_hc'] as $dhc2) { ?>
														<div class="slick-item">
															<div class="media-testi-2">
																<?php if(isset($dhc2['content_hc'])&&$dhc2['content_hc']!=''){ ?>
																	<p class="media__text"><?php echo wp_specialchars_decode($dhc2['content_hc']); ?></p>
																<?php } ?>
																<div class="media__title">
																	<?php if(isset($dhc2['name_hc'])&&$dhc2['name_hc']!=''){ ?>
																		<h4 class="name title--sm3">
																			<a href="<?php echo esc_url($dhc2['linka_hc']); ?>"><?php echo esc_html($dhc2['name_hc']); ?></a>
																		</h4>
																	<?php } ?>
																	<?php if(isset($dhc2['job_hc'])&&$dhc2['job_hc']!=''){ ?>
																		<span class="job title-sub--sm"><?php echo esc_html($dhc2['job_hc']); ?></span>
																	<?php } ?>
																</div>
															</div>
														</div>
													<?php } ?>
												</div>
											</div>
											<div class="slick__dots dots-style1"></div>
										</div>
									<?php } ?>
								<?php }elseif(isset($dhc['type_hc'])&&$dhc['type_hc']==3){ ?>
									<?php if(isset($dhc['contact_hc'])&&$dhc['contact_hc']!=''){ 
										$dhc['contact_hc'] = vc_param_group_parse_atts($dhc['contact_hc'],''); ?>
										<div class="contact-info contact-info--light bg-pattern-2 m-b-30">
											<?php foreach ($dhc['contact_hc'] as $dhc1) { ?>
												<div class="contact-info__item">
													<?php if(isset($dhc1['info_hc'])&&$dhc1['info_hc']!=''){ ?>
														<h5 class="title title--sm2 title--light"><?php echo esc_html($dhc1['info_hc']); ?> :</h5>
													<?php } ?>
													<?php if(isset($dhc1['value_hc'])&&$dhc1['value_hc']!=''){ ?>
														<p class="value"><?php echo esc_html($dhc1['value_hc']); ?></p>
													<?php } ?>
												</div>
											<?php } ?>
										</div>
									<?php } ?>
								<?php }elseif(isset($dhc['type_hc'])&&$dhc['type_hc']==2){ ?>
									<article class="media media-project-4 m-b-30">
										<?php if(isset($dhc['image_hc'])&&$dhc['image_hc']!=''){ 
											$dhc['image_hc'] = wp_get_attachment_image_src($dhc['image_hc'],'');
											?>
											<figure class="media__img">
												<img src="<?php echo esc_url($dhc['image_hc'][0]); ?>" />
											</figure>
										<?php } ?>
										<div class="media__body">
											<?php if(isset($dhc['title_hc'])&&$dhc['title_hc']!=''){ ?>
												<h3 class="media__title title--sm">
													<a href="<?php echo esc_url($dhc['link_hc']); ?>"><?php echo esc_html($dhc['title_hc']); ?></a>
												</h3>
											<?php } ?>
											<?php if(isset($dhc['location_hc'])&&$dhc['location_hc']!=''){ ?>
												<span class="address title-sub--sm"><?php echo esc_html($dhc['location_hc']); ?></span>
											<?php } ?>
										</div>
									</article>
								<?php }else{ ?>
									<div class="page-heading m-b-30">
										<?php if(isset($dhc['image_hc'])&&$dhc['image_hc']!=''){ 
											$dhc['image_hc'] = wp_get_attachment_image_src($dhc['image_hc'],'');
											?>
											<img src="<?php echo esc_url($dhc['image_hc'][0]); ?>" >
										<?php } ?>
										<?php if(isset($dhc['title_hc'])&&$dhc['title_hc']!=''){ ?>
											<div class="page-heading__inner">
												<h3 class="title-4"><?php echo esc_html($dhc['title_hc']) ?></h3>
											</div>
										<?php } ?>
									</div>

								<?php } ?>
							</div>
							<?php $i++; } } ?>
						</div>
					</div>
				</div>
			</section>
			<?php return ob_get_clean(); 
		}