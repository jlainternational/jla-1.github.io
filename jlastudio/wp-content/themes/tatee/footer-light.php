<?php
$tatee_option = get_option('tatee_option');
global $tatee_option; 
?>
<footer class="footer-2 p-b-5 p-t-20">
	<div class="container">
		<div class="row">
			<?php if(isset($tatee_option['footer_logo'])&&$tatee_option['footer_logo']!=''){ ?>
				<div class="col-md-4">
					<div class="footer-col">
						<div class="widget">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url($tatee_option['footer_logo']['url']); ?>" />
							</a>
						</div>
					</div>
				</div>
			<?php }else{} ?>
			<?php if(isset($tatee_option['footer_content_1'])&&$tatee_option['footer_content_1']){ ?>
				<div class="col-md-4">
					<div class="footer-col">
						<div class="widget">
							<p class="text-center"><?php echo esc_html($tatee_option['footer_content_1']); ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if(isset($tatee_option['footer_content_2'])&&$tatee_option['footer_content_2']){ ?>
				<div class="col-md-4">
					<div class="footer-col">
						<div class="widget">
							<p class="text-center text-md-right"><?php echo esc_html($tatee_option['footer_content_2']); ?></p>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</footer>
</main>
<?php wp_footer(); ?>
</body>
</html>