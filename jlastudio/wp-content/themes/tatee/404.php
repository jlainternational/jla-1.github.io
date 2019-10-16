<?php 
get_header('');
$theme_option = get_option('theme_option');
?>
<main id="main">
	<!-- BLOG-->
	<section class="p-t-100">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-6">
					<div class="error-page padd-top-30 padd-bot-30">
						<h1 class="mrg-top-15 mrg-bot-0 cl-danger font-250 font-bold"><?php echo esc_html__('Oops! That page can’t be found.','tatee'); ?></h1>
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'tatee' ); ?></p>
						<aside class="side-bar">
							<div class="widget widget_search">
								<?php get_search_form();  ?>
							</div>
						</aside>
					</div>
				</div>	
				<div class="col-md-4 col-lg-3">
					<aside class="widget-area widget-sidebar">

						<?php dynamic_sidebar('main-sidebar'); ?>

					</aside>
				</div>
		</div>
	</div>
</section>
<!-- END BLOG-->
</main>	


<?php 
get_footer();
?>