<?php /* Template Name: About Us Template */ ?>
<?php get_header(); ?>
 <!-- Lead Text (Intro Text)
          ================================================== -->
          <article class="leadText row">
            <p class="medium-12 columns">
               <?php while(have_posts()) : the_post(); ?>
			
		 		<?php the_content(); ?>
				
				<?php endwhile; ?>
				
            </p>
          </article>
		  <?php if(get_field('show_hide_section')=='yes') : ?>
          <!-- Philosophy and Awards
          ================================================== -->
          <section id="philisophyAwardsSection">
            <div class="row">
              <!-- Philosophy -->
              <div class="medium-6 columns block">
			  
                <h3 class="title"><?php echo get_field('section_1_heading') ; ?></h3>
				<?php if(check_acf_field('section_1_image')): ?>
                <img src="<?php echo get_field('section_1_image'); ?>" alt="alt" />
				<?php endif; ?>
                <div class="description">
                  <p>
                    <?php echo get_field('section_1_text'); ?>
                  </p>
                </div>
              </div>
               <!-- Awards -->
              <div class="medium-6 columns block">
                 <h3 class="title"><?php echo get_field('section_2_heading') ; ?></h3>
                 <?php if(check_acf_field('section_2_image')): ?>
                <img src="<?php echo get_field('section_2_image'); ?>" alt="alt" />
				<?php endif; ?>
                 <div class="description">
                   <p>
                    <?php echo get_field('section_1_text'); ?>
                   </p>
                  </div>
				  <?php if(check_acf_field('button_text')): ?>
                 <p><a class="jlaBtn button" href="<?php echo get_field('button_link'); ?>"><?php echo get_field('button_text'); ?></a></p>
				 <?php endif; ?>
              </div>
            </div>
          </section>
		  <?php endif; ?>

<?php get_footer(); ?>