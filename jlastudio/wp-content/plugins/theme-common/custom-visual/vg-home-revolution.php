<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Home Revolution Slide','tatee'),
		'base' => 'home_revolution_slide',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Detail About Us','tatee'),
				'param_name' => 'detail_hr',
				'value' => '',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title For Content','tatee'),
						'param_name' => 'title_hr',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
					array(
						'type' => 'textarea',
						'heading' => esc_html__('Location','tatee'),
						'param_name' => 'location_hr',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Link Button','tatee'),
						'param_name' => 'link_hr',
						'value' => '',
						'description' => esc_html__('Ex: #, ...',"tatee")
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Text Button','tatee'),
						'param_name' => 'button_hr',
						'value' => '',
						'description' => esc_html__('Ex: See project, ...',"tatee")
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image Background','tatee'),
						'param_name' => 'image_hr',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
				),
				'description' => esc_html__('Insert Detail Content',"tatee")
			),


		)
	));
}
add_shortcode('home_revolution_slide','home_revolution_slide_func');
function home_revolution_slide_func($atts,$content = null){
	extract(shortcode_atts(array(
		'detail_hr' => '',
	),$atts));
	ob_start();
	?> 
	<section class="section">
		<div class="page-info-2">
			<div class="wrap wrap--w1790">
				<div class="container-fluid">
					<div class="page-info__inner">
						<ul class="list-social list-social-2 list-social--ver">
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
						<div class="copyright">© 2018 TATEE</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="section revo-slide ">
				<!-- PAGE LINE-->
				<div class="page-line__item page-line__item-1"></div>
				<div class="page-line__item page-line__item-2"></div>
				<div class="page-line__item page-line__item-3"></div>
				<div class="page-line__item page-line__item-4"></div>
				<!-- END PAGE LINE-->
				<div class="rev_slider_wrapper">
					<div class="rev_slider fullwidthabanner js-rev" data-version="5.4.4" style="display:none" data-rev-layout="fullscreen" data-rev-arrows="false" data-rev-bullets="true" data-rev-stylebullet="au-rev-bullet-3" data-rev-variable="true" data-rev-voffbullet="62"
					data-rev-spacebullet="365">
					<ul>
						<?php if(isset($detail_hr)&&$detail_hr!=''){ 
							$detail_hr = vc_param_group_parse_atts($detail_hr,'');
							$i=1;
							foreach ($detail_hr as $hr) {
								?>
								<li class="rev-item rev-item-1" data-transition="crossfade" data-param1="0<?php echo esc_attr($i) ; ?>">
									<?php if(isset($hr['image_hr'])&&$hr['image_hr']!=''){ 
										$hr['image_hr'] = wp_get_attachment_image_src($hr['image_hr'],'');
										?>
										<img class="rev-slidebg" src="<?php echo esc_url($hr['image_hr'][0]); ?>"  data-bgposition="center center" data-kenburns="on" data-duration="9000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120"
										data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" />
									<?php } ?>
									<?php if(isset($hr['location_hr'])&&$hr['location_hr']!=''){ ?>
										<h4 class="tp-caption tp-resizeme rev-text-1" data-frames="[{&quot;delay&quot;:100,&quot;speed&quot;:900,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
										data-x="['left']" data-y="['middle']" data-hoffset="[0, 0, 0, 0, 0]" data-voffset="[62, 62, 60, 60, -80]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto']" data-height="[&quot;auto&quot;]"
										data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]" data-color="#fff" data-fontweight="400" data-fontsize="[13, 13, 16, 16, 16]" data-textalign="[center]"><?php echo esc_html($hr['location_hr']); ?></h4>
									<?php } ?>
									<?php if(isset($hr['title_hr'])&&$hr['title_hr']!=''){ ?>
										<h2 class="tp-caption tp-resizeme rev-text-2" data-frames="[{&quot;delay&quot;:100,&quot;speed&quot;:1000,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:-50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
										data-x="[left]" data-y="[center]" data-hoffset="[80, 80, 0, 1, 1]" data-voffset="[10, 10, 0, 0, -130]" data-paddingleft="[0, 0, 0, 0, 15]" data-paddingright="[0, 0, 0, 0, 15]" data-width="['auto','auto','auto','576','500']"
										data-height="[&quot;auto&quot;]" data-lineheight="[54, 54, 48, 50, 50]" data-whitespace="[nowrap, nowrap, nowrap, normal, normal]" data-color="#fff" data-fontweight="700" data-fontsize="[48, 48, 40, 40, 40]" data-textalign="[center, center, center, left, left]"
										data-basealign="slide"><?php echo esc_html($hr['title_hr']); ?></h2>
									<?php } ?>
									<?php if(isset($hr['button_hr'])&&$hr['button_hr']!=''){ ?>
										<a class="tp-caption tp-resizeme" href="<?php echo esc_url($hr['link_hr']); ?>" target="_self" data-frames="[{&quot;delay&quot;:500,&quot;speed&quot;:900,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:800,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
										data-x="['left']" data-y="['center']" data-hoffset="[0, 0, 0, 0, 15]" data-voffset="[140, 140, 140, 140, -1]" data-width="['auto']" data-height="[&quot;auto&quot;]" data-responsive_offset="on" data-responsive="off"
										data-textalign="[center]" data-whitespace="[nowrap, nowrap, nowrap, nowrap, nowrap]">
										<span class="rev-btn-1"><?php echo esc_html($hr['button_hr']); ?>
											<span class="arrow" data-paddingleft="5">
												<i class="zmdi zmdi-arrow-right"></i>
											</span>
										</span>
									</a>
								<?php } ?>
							</li>
						<?php $i++; } } ?>			
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
return ob_get_clean();
}