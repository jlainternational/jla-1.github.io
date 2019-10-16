<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Home Image Box','tatee'),
		'base' => 'about_choose_us',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type Display','tatee'),
				'param_name' => 'display_ac',
				'value' => array(
					esc_html__( 'Type 1: About Us', 'tatee' ) => 1,
					esc_html__( 'Type 2: Choose Us', 'tatee' ) => 2,
					esc_html__( 'Type 3: Full Width: Only Image', 'tatee' ) => 3,
				),
				'description' => esc_html__('',"tatee")
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Number Years','tatee'),
				'param_name' => 'number_ac',
				'value' => '',
				'description' => esc_html__('Ex: 1,2,3, ...Note: If you choice type 3, you don`t need fill it',"tatee")
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Content','tatee'),
				'param_name' => 'content_ac',
				'value' => '',
				'description' => esc_html__('Ex: years of experience, ...Note: If you choice type 3, you don`t need fill it',"tatee")
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','tatee'),
				'param_name' => 'image_ac',
				'value' => '',
				'description' => esc_html__('',"tatee")
			),			
		)
	));
}
add_shortcode('about_choose_us','about_choose_us_func');
function about_choose_us_func($atts,$content = null){
	extract(shortcode_atts(array(
		'display_ac' => '',
		'number_ac' => '',
		'content_ac' => '',
		'image_ac' => '',
	),$atts));
	ob_start();
	?>
	<?php if(isset($display_ac)&&$display_ac==3){ ?>
		<section class="section">
			<div class="wrap wrap--w1790">
				<div class="container-fluid">
					<?php if(isset($image_ac)&&$image_ac!=''){ 
						$image_ac_src = wp_get_attachment_image_src($image_ac,'');
						?>
						<img src="<?php echo esc_url($image_ac_src[0]); ?>">
					<?php } ?>
				</div>
			</div>
		</section>
	<?php }elseif(isset($display_ac)&&$display_ac==2){ ?>
		<div class="media-about">
			<div class="media__img media__img--rect js-line">
				<?php if(isset($image_ac)&&$image_ac!=''){ 
					$image_ac_src = wp_get_attachment_image_src($image_ac,'');
					?>
					<img src="<?php echo esc_url($image_ac_src[0]); ?>">
				<?php } ?>
				<span class="line"></span>
				<span class="line line-bottom"></span>
				<div class="media__img-inner">
					<?php if(isset($number_ac)&&$number_ac!=''){ ?>
						<span class="number"><?php echo esc_html($number_ac); ?></span>
					<?php } ?>
					<?php if(isset($content_ac)&&$content_ac!=''){ ?>
						<span class="desc"><?php echo esc_html($content_ac); ?></span>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php }else{ ?>
		<div class="media__img js-line">
			<?php if(isset($image_ac)&&$image_ac!=''){ 
				$image_ac_src = wp_get_attachment_image_src($image_ac,'');
				?>
				<img src="<?php echo esc_url($image_ac_src[0]); ?>">
			<?php } ?>
			<span class="line"></span>
			<span class="line line-bottom"></span>
			<div class="media__img-inner wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.2s">
				<?php if(isset($number_ac)&&$number_ac!=''){ ?>
					<span class="number"><?php echo esc_html($number_ac); ?></span>
				<?php } ?>
				<?php if(isset($content_ac)&&$content_ac!=''){ ?>
					<span class="desc"><?php echo esc_html($content_ac); ?></span>
				<?php } ?>
			</div>
		</div>
		
	<?php } ?>
	
	<?php return ob_get_clean(); 
}