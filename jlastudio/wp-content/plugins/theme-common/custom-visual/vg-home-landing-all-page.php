<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Home Landing All Page','tatee'),
		'base' => 'landing_all_page',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title','tatee'),
				'param_name' => 'title_la',
				'value' => '',
				'description' => esc_html__('Ex: Tatee is all you need !, ...',"tatee")
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Subtitle 1','tatee'),
				'param_name' => 'subtitle1_la',
				'value' => '',
				'description' => esc_html__('Ex: Tatee is evaluated an gorgeous HTML template for architecture & interior company., ...',"tatee")
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Subtitle 2','tatee'),
				'param_name' => 'subtitle2_la',
				'value' => '',
				'description' => esc_html__('Ex: With design minimal and focus on show projects, Tatee will make your work look more impressive and attractive to viewers., ...',"tatee")
			),
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Detail About Us','tatee'),
				'param_name' => 'detail_la',
				'value' => '',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title Of Page','tatee'),
						'param_name' => 'title2_la',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Link Title','tatee'),
						'param_name' => 'link_la',
						'value' => '',
						'description' => esc_html__('Ex: See Project, ...',"tatee")
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image','tatee'),
						'param_name' => 'image_la',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
				),
				'description' => esc_html__('Insert Detail Content',"tatee")
			),


		)
	));
}
add_shortcode('landing_all_page','landing_all_page_func');
function landing_all_page_func($atts,$content = null){
	extract(shortcode_atts(array(
		'title_la' => '',
		'subtitle1_la' => '',
		'subtitle2_la' => '',
		'detail_la' => '',
	),$atts));
	ob_start();
	?> 
	<section class="section landing-page">
		<div class="wrap wrap--w1790">
			<div class="container-fluid">
				<article class="landing">
					<header class="entry-header">
						<?php if(isset($title_la)&&$title_la!=''){ ?>
							<h2 class="entry-title"><?php echo esc_html($title_la); ?></h2>
						<?php } ?>
						<?php if(isset($subtitle1_la)&&$subtitle1_la!=''){ ?>
							<p><?php echo wp_specialchars_decode($subtitle1_la); ?></p>
						<?php } ?>
						<?php if(isset($subtitle2_la)&&$subtitle2_la!=''){ ?>
							<p><?php echo wp_specialchars_decode($subtitle2_la); ?></p>
						<?php } ?>
					</header>
					<div class="entry-content">
						<div class="row gutter-xxl">
							<?php if(isset($detail_la)&&$detail_la!=''){ 
								$detail_la = vc_param_group_parse_atts($detail_la,'');
								foreach ($detail_la as $dla) {
									?>
									<div class="col-md-6">
										<div class="media-landing">
											<?php if(isset($dla['image_la'])&&$dla['image_la']!=''){ 
												$dla['image_la'] = wp_get_attachment_image_src($dla['image_la'],'');
												?>
												<div class="media__img">
													<a href="<?php echo esc_url($dla['link_la']); ?>">
														<img src="<?php echo esc_url($dla['image_la'][0]); ?>">
													</a>
												</div>
											<?php } ?>
											<?php if(isset($dla['title2_la'])&&$dla['title2_la']!=''){ ?>
												<h4 class="media__title">
													<a href="<?php echo esc_url($dla['link_la']); ?>"><?php echo esc_html($dla['title2_la']); ?></a>
												</h4>
											<?php } ?>
										</div>
									</div>
								<?php } } ?>
							</div>
						</div>
					</article>
				</div>
			</div>
		</section>
		<?php return ob_get_clean(); 
	}