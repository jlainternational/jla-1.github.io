<?php get_header(); ?>

<!-- Lead Text (Intro Text)
          ================================================== -->
          <section id="pageIntroHead" class="sectionSpace">
            <h1 class="row column lightFont sectionLeadTitle currentColor"><?php echo get_the_title(); ?></h1>
            <article class="row column">
              <div class="leadText lightFont">
                 <?php while(have_posts()) : the_post(); ?>
			
		 		<?php the_content(); ?>
				
				<?php endwhile; ?>
				<br/>
				<br/>
              </div>
            </article>
          </section>
		  
<?php get_footer(); ?>		  