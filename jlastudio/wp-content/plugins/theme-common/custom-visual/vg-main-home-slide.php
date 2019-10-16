<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Main Home Slide','tatee'),
		'base' => 'main_home_slide',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Details Slide','tatee'),
				'param_name' => 'detail_s',
				'value' => '',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title For Slide','tatee'),
						'param_name' => 'title_s',
						'value' => '',
						'description' => esc_html__('',"tatee")

					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Category Of Slide','tatee'),
						'param_name' => 'category_s',
						'value' => '',
						'description' => esc_html__('Ex: See Project, ...',"tatee")
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image For Slide','tatee'),
						'param_name' => 'image_s',
						'value' => '',
						'description' => esc_html__('',"tatee")

					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Link Button','tatee'),
						'param_name' => 'link_s',
						'value' => '',
						'description' => esc_html__('Ex: #, ...',"tatee")

					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text Button','tatee'),
						'param_name' => 'button_s',
						'value' => '',
						'description' => esc_html__('Ex: See Project, ...',"tatee")
					),
				),
				'description' => esc_html__('Insert Content Slide',"tatee")

			),
		)
	));
}
add_shortcode('main_home_slide','main_home_slide_func');
function main_home_slide_func($atts,$content = null){
	extract(shortcode_atts(array(
		'detail_s' => '',
	),$atts));
	ob_start();
	?>
	<section class="mainhome-slide">
		<div class="rev_slider_wrapper rev_slider_wrapper--p80 tp-overflow-hidden">
			<div class="rev_slider fullwidthabanner js-rev" data-version="5.4.4" style="display:none" data-rev-layout="fullscreen" data-rev-stylearrow="au-rev-arrow-1" data-rev-bullets="true" data-rev-stylebullet="au-rev-bullet-1" data-rev-voffbullet="55">
				<ul>
					<?php if(isset($detail_s)&&$detail_s!=''){ 
						$detail_s = vc_param_group_parse_atts($detail_s,'');
						foreach ($detail_s as $ds) {
							?>
							<li class="rev-item rev-item-1" data-transition="crossfade">
								<?php if(isset($ds['image_s'])&&$ds['image_s']!=''){ 
									$ds['image_s'] = wp_get_attachment_image_src($ds['image_s'],'');
									?>
									<img class="rev-slidebg" src="<?php echo esc_url($ds['image_s'][0]); ?>"  />
								<?php } ?>
								<?php if(isset($ds['category_s'])&&$ds['category_s']!=''){ ?>
									<h4 class="tp-caption tp-resizeme rev-text-1" data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:1800,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
									data-x="['left']" data-y="['middle']" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[-118, -118, -70, -80, -80]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto']" data-height="[&quot;auto&quot;]"
									data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]" data-color="#fff" data-fontweight="400" data-fontsize="[11, 11, 18, 20, 20]" data-textalign="[left, left, left, center, center]"><?php echo esc_html($ds['category_s']); ?></h4>
								<?php } ?>
								<?php if(isset($ds['title_s'])&&$ds['title_s']!=''){ ?>
									<h2 class="tp-caption tp-resizeme rev-text-2" data-frames="[{&quot;delay&quot;:800,&quot;speed&quot;:2100,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
									data-x="[left]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[-35, -30, 15, 10, 10]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="[600,600,500,576,500]" data-height="[&quot;auto&quot;]"
									data-lineheight="[60, 60, 45, 50, 45]" data-whitespace="normal" data-color="#fff" data-fontweight="700" data-fontsize="[48, 48, 46, 42, 46]" data-textalign="[left, left, left, left, left]"><?php echo esc_html($ds['title_s']); ?></h2>
								<?php } ?>
								<?php if(isset($ds['button_s'])&&$ds['button_s']!=''){ ?>
									<a class="tp-caption tp-resizeme" href="<?php echo esc_url($ds['link_s']); ?>" target="_self" data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:1800,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
										data-x="[left]" data-y="[center]" data-hoffset="[0, 0, 0, 0, 15]" data-voffset="[87, 87, 130, 130, 130]" data-width="['auto']" data-height="[&quot;auto&quot;]" data-responsive_offset="on" data-responsive="off" data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]">
										<span class="rev-btn-1"><?php echo esc_html($ds['button_s']); ?>
										<span class="arrow" data-paddingleft="5">
											<i class="zmdi zmdi-arrow-right"></i>
										</span>
									</span>
								</a>
							<?php } ?>
						</li>
					<?php } } ?>
				</ul>
			</div>
		</div>
		<div class="rev-spacer"></div>
	</section>
	<?php return ob_get_clean(); 
}