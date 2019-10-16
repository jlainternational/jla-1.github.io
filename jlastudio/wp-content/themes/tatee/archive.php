<?php get_header(); ?>
<div class="title-archive">
	<h3><?php
	if ( is_day() ) :
		printf( esc_html__( 'Daily Archives: %s', 'tatee' ), get_the_date() );
	elseif ( is_month() ) :
		printf( esc_html__( 'Monthly Archives: %s', 'tatee' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tatee' ) ) );
	elseif ( is_year() ) :
		printf( esc_html__( 'Yearly Archives: %s', 'tatee' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tatee' ) ) );
	else :
		esc_html_e( 'Archives', 'tatee' );
	endif;
	?>
	
</h3>
</div>
<main id="main">
	<section class="p-t-100">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-<?php if( is_active_sidebar('main-sidebar')){ echo "9"; }else{ echo "12";} ?>">
					<?php if(have_posts()) : while(have_posts()) : the_post() ; 
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if (has_post_thumbnail()) { ?>
								<figure class="entry-image">
									<a href="<?php the_permalink(); ?>">
										<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>"/>
									</a>
								</figure>
							<?php } ?>
							<div class="entry-summary">
								<h4 class="entry-title <?php if (!has_post_thumbnail()){ echo 'm-t-0'; } ?>">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h4>
								<?php
								if ( is_sticky() && is_home() && ! is_paged() ){ ?>
									<div class="featured-post">
										<?php echo esc_html__( 'Featured post', 'tatee' ); ?>
									</div>
								<?php } ?>
								<span class="entry-meta"><?php the_date(); ?></span>
								<p class="entry-excerpt"><?php echo tatee_excerpt(32); ?></p>
							</div>
						</article>
					<?php endwhile; endif; ?>
					<nav class="navigation blog-navigation">
						<div class="container">
							<div class="nav-links">
								<ul class="page-numbers page-numbers-2">
									<?php tatee_pagination(); ?>
								</ul>
							</div>
						</div>
					</nav>
				</div>
				<?php if( is_active_sidebar('main-sidebar')){ ?>
					<div class="col-md-4 col-lg-3">
						<aside class="widget-area widget-sidebar">
							<?php dynamic_sidebar('main-sidebar'); ?>
						</aside>
					</div>
				<?php } ?>	
			</div>
		</div>
	</section>
	
</main>	
<?php get_footer(); ?>