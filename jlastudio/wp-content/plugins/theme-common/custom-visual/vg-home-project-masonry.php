<?php 
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Home Project Masonry','tatee'),
		'base' => 'home_project_masonry',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Text Button','tatee'),
				'param_name' => 'button_hp',
				'value' => '',
				'description' => esc_html__('EX: See all project, ...',"tatee")
			),		
		)
	));
}
add_shortcode('home_project_masonry','home_project_masonry_func');
function home_project_masonry_func($atts,$content = null){
	extract(shortcode_atts(array(
		'button_hp' =>'',
	),$atts));
	ob_start();
	?>
	
	<?php 
	$tatee_option = get_option('tatee_option');
	$pro_grid_mason = new WP_Query(
		array(
			'posts_per_page' => 10,
			'post_status' => 'publish',
			'post_type' => 'projects',
		));
		?>

		<!-- PROJECT-->
		<section class="section p-b-120">
			<div class="container">
				<div class="masonry-row js-isotope-wrapper">
					<div class="row isotope-content">
						<?php $i=0; ?>
						<?php if($pro_grid_mason->have_posts()) : while($pro_grid_mason->have_posts()) : $pro_grid_mason->the_post(); 
							$thumbnail_img_640x467 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_640x467',true);
							$thumbnail_img_640x986 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_640x986',true);
							$thumbnail_img_960x711 = get_post_meta(get_the_ID(),'_cmb_thumbnail_img_960x711',true);
							$pro_location = get_post_meta(get_the_ID(),'_cmb_pro_location',true);									
							?>
							<div class="<?php if($i != 5){echo 'col-md-6 col-lg-4' ;}else{echo 'col-lg-8' ;} ?> isotope-item <?php if($i==0){echo 'isotope-item-sizer' ;} ?>">
								<article class="media-project-2 m-b-30">
									<figure class="media__img">
										<img src="<?php if($i==1||$i==4){echo esc_url($thumbnail_img_640x986); }elseif($i==5){echo esc_url($thumbnail_img_960x711);}else{echo esc_url($thumbnail_img_640x467);} ?>" />
									</figure>
									<div class="media__body">
										<h3 class="media__title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<?php if(isset($pro_location)&&$pro_location != ''){ ?>
											<span class="address"><?php echo esc_html($pro_location); ?></span>
										<?php } ?>
									</div>
								</article>
							</div>
							<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
						</div>
					</div>
					<?php if(isset($button_hp)&&$button_hp!=''){ ?>
						<div class="text-center p-t-30">
							<a class="au-btn au-btn--c6" href="<?php if(isset($tatee_option['option_project'])){ echo get_page_link($tatee_option['option_project']); } ?>"><?php echo esc_html($button_hp); ?></a>
						</div>
					<?php } ?>
				</div>
			</section>
			<!-- END PROJECT-->
			<?php return ob_get_clean(); 
		}		