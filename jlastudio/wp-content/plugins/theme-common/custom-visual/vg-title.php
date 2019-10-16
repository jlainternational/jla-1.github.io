<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Title','tatee'),
		'base' => 'title',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Type Display', 'tatee' ),
				'param_name' => 'display_t',
				'value' => array(
					esc_html__( 'Center', 'tatee' ) => 1,
					esc_html__( 'Left', 'tatee' ) => 2,
				),
				'description' => '',
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Title','tatee'),
				'param_name' => 'title',
				'value' => '',
				'description' => esc_html__('Ex: Our specilization, Lastest Project, ... Note: If you want down the line. You use example: We shape our buildings
					<br>thereafter they shape us',"tatee")
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Subtitle','tatee'),
				'param_name' => 'subtitle',
				'value' => '',
				'description' => esc_html__('Ex: Out Project, Out Work , ...',"tatee")
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Margin Bottom :', 'tatee' ),
				'param_name' => 'margin_bot',
				'value' => array(
					esc_html__( '50px', 'tatee' ) => 1,
					esc_html__( '70px', 'tatee' ) => 2,
					esc_html__( '80px', 'tatee' ) => 3,
					esc_html__( '100px', 'tatee' ) => 4,
				),
				'description' => esc_html__('Ex: If You choice Center You need choice Margin Bottom','tatee'),
			),
		)
	));
}
add_shortcode('title','title_func');
function title_func($atts,$content = null){
	extract(shortcode_atts(array(
		'display_t' => '',
		'title' => '',
		'subtitle' => '',
		'margin_bot' => '',
	),$atts));
	ob_start();
	?>
	<?php if(isset($display_t)&&$display_t==2){ ?>
		<section class="section p-t-100 p-b-65">
			<div class="container">
				<div class="page-heading">
					<?php if(isset($subtitle)&&$subtitle!=''){ ?>
						<h4 class="title-sub title-sub--c8 m-b-15"><?php echo esc_html($subtitle); ?></h4>
					<?php } ?>
					<?php if(isset($title)&&$title!=''){ ?>
						<h2 class="title-2"><?php echo wp_specialchars_decode($title); ?></h2>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php }else{ ?>
		<div class="section-title <?php if($margin_bot==2){echo 'm-b-70' ;}elseif($margin_bot==3){echo 'm-b-80' ;}elseif($margin_bot==4){echo 'm-b-100' ;} ?>">
			<?php if(isset($subtitle)&&$subtitle!=''){ ?>
				<h5 class="title-sub"><?php echo esc_html($subtitle); ?></h5>
			<?php } ?>
			<?php if(isset($title)&&$title!=''){ ?>
				<h2 class="title-1"><?php echo htmlspecialchars_decode($title); ?></h2>
			<?php } ?>
		</div>
		
	<?php } ?>
	<?php return ob_get_clean(); 
}