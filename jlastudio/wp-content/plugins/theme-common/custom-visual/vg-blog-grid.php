<?php
$pre_text = 'VG ';
if(function_exists('vc_map')){
	vc_map(array(
		'name' => esc_html__($pre_text.'Blog Grid','tatee'),
		'base' => 'blog_grid',
		'class' => '',
		'icon' => 'icon-st',
		'category' => 'Content',
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('ID Posts','tatee'),
				'param_name' => 'id_grid',
				'value' => '',
				'description' => esc_html__('Ex: 16, 13, 12, ...',"tatee")

			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Posts per Page','tatee'),
				'param_name' => 'num_grid',
				'value' => '',
				'description' => esc_html__('',"tatee")
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Pagination','tatee'),
				'param_name' => 'show',
				'value' => array(
					esc_html__( 'Yes', 'tatee' ) => 1,
					esc_html__( 'No', 'tatee' ) => 2,
				),
				'description' => esc_html__('',"tatee")
			),
		)
	));
} 
add_shortcode('blog_grid','blog_grid_func');
function blog_grid_func($atts,$content = null){
	extract(shortcode_atts(array(
		'id_grid' => '',
		'num_grid' => '',
		'show' => '',
	),$atts));
	ob_start();
	?>
	<?php if(isset($id_grid)&&$id_grid!=''){ 
		$num_cs = explode(',',$id_grid);
		?>
		<?php 
		
		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1; ;

		$wp_query = new WP_Query(
			array(
				'post__in' => $num_cs,
				'paged' => $paged,
				'posts_per_page' => $num_grid,
			));
			?>

			<section class="section">
				<div class="container">
					<div class="row gutter-xl">
						<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
							<div class="col-md-6">
								<article class="blog">
									<figure class="entry-image">
										<a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_ID(get_the_ID())); ?>" class= "img-responsive"></a>
									</figure>

									<div class="entry-summary">
										<h4 class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h4>
										<span class="entry-meta"><?php the_time('d - F - Y'); ?></span>
										<p class="entry-excerpt"><?php echo tatee_excerpt(32); ?></p>
									</div>
								</article>
							</div>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</section>
			<?php if (isset($show) && $show != 2 ) { ?>
				<nav class="navigation blog-navigation">
					<div class="container">
						<div class="nav-link-2">
							<?php if($wp_query->max_num_pages < 10){ ?>
								<?php echo paginate_links(array(
									'total' => $wp_query->max_num_pages,
									'prev_next'          => true,
									'prev_text'          => __('<span class="ti-arrow-left"></span>'),
									'next_text'          => __('<span class="ti-arrow-right"></span>'),
									'type'               => 'list',
									'add_args'           => false,
									'add_fragment'       => '',
									'before_page_number' => '<span class="number-page">0',
									'after_page_number'  => '</span>'
								)); ?>
							<?php }else{ ?>
								<?php echo paginate_links(array(
									'total' => $wp_query->max_num_pages,
									'prev_next'          => true,
									'prev_text'          => __('<span class="ti-arrow-left"></span>'),
									'next_text'          => __('<span class="ti-arrow-right"></span>'),
									'type'               => 'plain',
									'add_args'           => false,
									'add_fragment'       => '',
									'before_page_number' => '<span class="number-page">',
									'after_page_number'  => '</span>'
								)); ?>
							<?php } ?>

						</div>
					</div>
				</nav>
			<?php } ?>
			
			

		<?php } ?>
		<?php return ob_get_clean(); 
	}