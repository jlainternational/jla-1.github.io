<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'In Team','tatee'),
		'base' => 'home_team',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'param_group',
				'heading' => esc_html__('Detail Content','tatee'),
				'param_name' => 'detail_ht',
				'value' => '',
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Name','tatee'),
						'param_name' => 'name_ht',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Job People','tatee'),
						'param_name' => 'job_ht',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Link People','tatee'),
						'param_name' => 'link_ht',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
					array(
						'type' => 'attach_image',
						'heading' => esc_html__('Image','tatee'),
						'param_name' => 'image_ht',
						'value' => '',
						'description' => esc_html__('',"tatee")
					),
				),
				'description' => esc_html__('Insert Detail Content',"tatee")
			),



		)
	));
}
add_shortcode('home_team','home_team_func');
function home_team_func($atts,$content = null){
	extract(shortcode_atts(array(
		'detail_ht' => '',
	),$atts));
	ob_start();
	?>
	<div class="row">
		<?php if(isset($detail_ht)&&$detail_ht!=''){ 
			$detail_ht = vc_param_group_parse_atts($detail_ht,'');
			foreach ($detail_ht as $dt) {
				?>
				<div class="col-md-6 col-lg-4">
					<article class="media-team">
						<figure class="media__img-wrap">
							<ul class="list-social list-social--light">
								<li class="list-social__item">
									<a class="ic-fb" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>">
										<i class="zmdi zmdi-facebook"></i>
									</a>
								</li>
								<li class="list-social__item">
									<a class="ic-insta" href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink();?>">
										<i class="zmdi zmdi-twitter"></i>
									</a>
								</li>
								<li class="list-social__item">
									<a class="ic-twi" href="#">
										<i class="zmdi zmdi-instagram"></i>
									</a>
								</li>
								<li class="list-social__item">
									<a class="ic-pinterest" href="https://plus.google.com/share?url=<?php the_permalink();?>">
										<i class="zmdi zmdi-google"></i>
									</a>
								</li>
							</ul>
							<span class="overlay"></span>
							<?php if(isset($dt['image_ht'])&&$dt['image_ht']!=''){ 
								$dt['image_ht'] = wp_get_attachment_image_src($dt['image_ht'],'');
								?>
								<img class="media__img img--rounded" src="<?php echo esc_url($dt['image_ht'][0]); ?>" />
							<?php } ?>
						</figure>
						<div class="media__body">
							<?php if(isset($dt['name_ht'])&&$dt['name_ht']!=''){ ?>
								<h4 class="title--sm">
									<a href="<?php echo esc_url($dt['link_ht']) ?>"><?php echo esc_html($dt['name_ht']); ?></a>
								</h4>
							<?php } ?>
							<?php if(isset($dt['job_ht'])&&$dt['job_ht']!=''){ ?>
								<span class="title-sub--sm"><?php echo esc_html($dt['job_ht']); ?></span>
							<?php } ?>
						</div>
					</article>
				</div>
			<?php } } ?>
		</div>
		<?php return ob_get_clean(); 
	}