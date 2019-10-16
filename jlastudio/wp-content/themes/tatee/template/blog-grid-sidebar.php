<?php 
/* 
*Template Name: Blog Grid with Sidebar
*
*/ 
$type_header = get_post_meta(get_the_ID(),'_cmb_type_head',true);
if(isset($type_header)&&$type_header==8){
	get_header('container-3');
}elseif(isset($type_header)&&$type_header==7){
	get_header('container-2');
}elseif(isset($type_header)&&$type_header==6){
	get_header('container');
}elseif(isset($type_header)&&$type_header==5){
	get_header('opacity-3');
}elseif(isset($type_header)&&$type_header==4){
	get_header('opacity-2');
}elseif (isset($type_header)&&$type_header==3) {
	get_header('opacity-1');
}elseif(isset($type_header)&&$type_header==2){
	get_header('opacity');
}else{
	get_header();
} ?>
<main id="main">
	<!-- BLOG-->
	<section class="p-t-100">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9">
					<?php 
					$wp_query = new WP_Query(
						array(
							'post_type' => 'post',
							'status'      => 'approve',
							'post_status' => 'publish',
							'paged' => $paged,
						));
						?>
						<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post() ; 

							?>
							<article class="blog">
								<figure class="entry-image">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>" />
									</a>
								</figure>
								<div class="entry-summary">
									<h4 class="entry-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h4>
									<span class="entry-meta"><?php the_date(); ?></span>
									<p class="entry-excerpt"><?php echo tatee_excerpt(32); ?></p>
								</div>
							</article>
						<?php endwhile; endif; ?>
					</div>
					<?php if( is_active_sidebar('main-sidebar')){ ?>
						<div class="col-md-4 col-lg-3">
							<aside class="widget-area widget-sidebar">

								<?php dynamic_sidebar('main-sidebar'); ?>

							</aside>
						</div>
					<?php }else{
						echo esc_html__("This is sidebar. You have to add some widget",'tatee');
					}
					?>	
				</div>
			</div>
		</section>
		<!-- END BLOG-->
		<nav class="navigation blog-navigation">
			<div class="container">
				<div class="nav-links">
					<ul class="page-numbers page-numbers-2">
						<?php tatee_pagination(); ?>
					</ul>
				</div>
			</div>
		</nav>
	</main>	
	<?php get_footer(); ?>