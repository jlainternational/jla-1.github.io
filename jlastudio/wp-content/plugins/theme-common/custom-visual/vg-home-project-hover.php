<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Project Hover','tatee'),
		'base' => 'project_hover',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Details Content','tatee'),
				'param_name' => 'detail_ph',
				'value' => '',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title For Content','tatee'),
						'param_name' => 'title_ph',
						'value' => '',
						'description' => esc_html__('',"tatee")

					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Category Of Content','tatee'),
						'param_name' => 'category_ph',
						'value' => '',
						'description' => esc_html__('Ex: See Project, ...',"tatee")
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image For Background','tatee'),
						'param_name' => 'image_ph',
						'value' => '',
						'description' => esc_html__('',"tatee")

					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Link Button','tatee'),
						'param_name' => 'link_ph',
						'value' => '',
						'description' => esc_html__('Ex: #, ...',"tatee")

					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text Button','tatee'),
						'param_name' => 'button_ph',
						'value' => '',
						'description' => esc_html__('Ex: See Project, ...',"tatee")
					),
				),
				'description' => esc_html__('Insert Content Slide',"tatee")

			),
		)
	));
}
add_shortcode('project_hover','project_hover_func');
function project_hover_func($atts,$content = null){
	extract(shortcode_atts(array(
		'detail_ph' => '',
	),$atts));
	ob_start();
	?>
	<section id="fs-container">
		<?php if(isset($detail_ph)&&$detail_ph!=''){ 
			$i=1;
			$detail_ph = vc_param_group_parse_atts($detail_ph,'');
			foreach ($detail_ph as $dph) {
				?>
				<?php if(isset($dph['image_ph'])&&$dph['image_ph']!=''){ 
					$dph['image_ph'] = wp_get_attachment_image_src($dph['image_ph'],'');
					?>
					<div class="media-project-hover" data-background="<?php echo esc_url($dph['image_ph'][0]); ?>">
						<div class="bg-overlay"></div>
						<div class="media__body">
							<?php if(isset($dph['category_ph'])&&$dph['category_ph']!=''){ ?>
								<h5 class="media__phub-title title-sub"><?php echo esc_html($dph['category_ph']); ?></h5>
							<?php } ?>
							<?php if(isset($dph['title_ph'])&&$dph['title_ph']!=''){ ?>
								<h3 class="media__title">
									<a href="<?php echo esc_url($dph['link_ph']); ?>"><?php echo esc_html($dph['title_ph']); ?></a>
								</h3>
							<?php } ?>
							<?php if(isset($dph['category_ph'])&&$dph['category_ph']!=''){ ?>
								<a class="link" href="<?php echo esc_url($dph['link_ph']); ?>"><?php echo esc_html($dph['button_ph']); ?>
								<i class="zmdi zmdi-arrow-right"></i>
							</a>
						<?php } ?>
					</div>
					<span class="media__number">0<?php echo esc_attr($i); ?></span>
				</div>
			<?php } $i++; } } ?>
		</section>
		<?php return ob_get_clean(); 
	}