<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Home One Page Description','tatee'),
		'base' => 'one_page_description',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Subtitle','tatee'),
				'param_name' => 'subtitle_op',
				'value' => '',
				'description' => esc_html__('Ex: We are Tatee, ...',"tatee")
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title','tatee'),
				'param_name' => 'title_op',
				'value' => '',
				'description' => esc_html__('Ex: Our bulding are inspired by the challenge of balancing function & beauty, ...',"tatee")
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Content Excerpt','tatee'),
				'param_name' => 'content_op',
				'value' => '',
				'description' => esc_html__('',"tatee")
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Link Button','tatee'),
				'param_name' => 'link_op',
				'value' => '',
				'description' => esc_html__('',"tatee")
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Text Button','tatee'),
				'param_name' => 'button_op',
				'value' => '',
				'description' => esc_html__('Ex: Contact us, ...',"tatee")
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','tatee'),
				'param_name' => 'image_op',
				'value' => '',
				'description' => esc_html__('',"tatee")
			),	
		)
	));
}
add_shortcode('one_page_description','one_page_description_func');
function one_page_description_func($atts,$content = null){
	extract(shortcode_atts(array(
		'title_op' => '',
		'subtitle_op' => '',
		'content_op' => '',
		'link_op' => '',
		'button_op' => '',
		'image_op' => '',
	),$atts));
	ob_start();
	?>
	<div class="media-about-2 p-b-80">
		<?php if(isset($image_op)&&$image_op!=''){ 
			$image_op_src = wp_get_attachment_image_src($image_op,'');
			?>
			<div class="media__img">
				<img src="<?php echo esc_url($image_op_src[0]); ?>">
			</div>
		<?php } ?>
		<div class="media__body">
			<?php if(isset($subtitle_op)&&$subtitle_op!=''){ ?>
				<h5 class="title-sub"><?php echo esc_html($subtitle_op); ?></h5>
			<?php } ?>
			<?php if(isset($title_op)&&$title_op!=''){ ?>
				<h2 class="title-1"><?php echo wp_specialchars_decode($title_op); ?></h2>
			<?php } ?>
			<?php if(isset($content_op)&&$content_op!=''){ ?>
				<p class="media__text"><?php echo wp_specialchars_decode($content_op); ?></p>
			<?php } ?>
			<?php if(isset($button_op)&&$button_op!=''){ ?>
				<a class="au-btn au-btn--arrow" href="<?php echo esc_url($link_op) ?>"><?php echo esc_html($button_op); ?>
				<i class="zmdi zmdi-arrow-right ic-arrow"></i>
			</a>
		<?php } ?>
	</div>
</div>

<?php return ob_get_clean(); 
}