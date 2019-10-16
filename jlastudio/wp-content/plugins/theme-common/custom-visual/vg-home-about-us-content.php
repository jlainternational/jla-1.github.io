<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Main Home About Us Content','tatee'),
		'base' => 'main_home_about',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Subtitle','tatee'),
				'param_name' => 'subtitle_ab',
				'value' => '',
				'description' => esc_html__('Ex: About Us, ...',"tatee")
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Title','tatee'),
				'param_name' => 'title_ab',
				'value' => '',
				'description' => esc_html__('Ex: We are specialists in the field of architecture, ...',"tatee")
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Content Excerpt','tatee'),
				'param_name' => 'content_ab',
				'value' => '',
				'description' => esc_html__('',"tatee")
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__('Link Button','tatee'),
				'param_name' => 'link_ab',
				'value' => '',
				'description' => esc_html__('',"tatee")
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Text Button','tatee'),
				'param_name' => 'button_ab',
				'value' => '',
				'description' => esc_html__('Ex: ReadMore, ...',"tatee")
			),		
		)
	));
}
add_shortcode('main_home_about','main_home_about_func');
function main_home_about_func($atts,$content = null){
	extract(shortcode_atts(array(
		'title_ab' => '',
		'subtitle_ab' => '',
		'content_ab' => '',
		'link_ab' => '',
		'button_ab' => '',
	),$atts));
	ob_start();
	?>

	<div class="media__body">
		<?php if(isset($subtitle_ab)&&$subtitle_ab!=''){ ?>
			<h5 class="title-sub"><?php echo esc_html($subtitle_ab); ?></h5>
		<?php } ?>
		<?php if(isset($title_ab)&&$title_ab!=''){ ?>
			<h2 class="title-1"><?php echo esc_html($title_ab); ?></h2>
		<?php } ?>
		<?php if(isset($content_ab)&&$content_ab!=''){ ?>
			<p class="media__text"><?php echo wp_specialchars_decode($content_ab); ?></p>
		<?php } ?>
		<?php if(isset($button_ab)&&$button_ab!=''){ ?>
			<a class="au-btn au-btn--arrow" href="<?php echo esc_url($link_ab) ?>"><?php echo esc_html($button_ab); ?>
			<i class="zmdi zmdi-arrow-right ic-arrow"></i>
		</a>
	<?php } ?>
</div>

<?php return ob_get_clean(); 
}