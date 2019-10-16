<?php /* Template Name: About Us Page Template */ ?>
<?php get_header(); ?>
        <!-- Lead Text (Intro Text)
          ================================================== -->
          <section id="pageIntroHead" class="sectionSpace">
            <h1 class="row column lightFont sectionLeadTitle currentColor"><?php echo get_the_title(); ?></h1>
            <article class="row column">
              <p class="leadText lightFont">
               <?php  
				echo $post->post_content;
				?>
              </p>
            </article>
          </section>
          <!-- Philosophy and Awards
          ================================================== -->
		  	  <?php  
			  if(get_field('show_hide_section')=='yes'): ?>
          <section id="philisophyAwardsSection" class="sectionSpace last">
            <div class="row">
              <!-- Philosophy -->
              <div class="medium-6 columns block">
                <h3 class="title sectionLeadTitle"><?php echo get_field('section_1_heading') ; ?></h3>
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
                 <h3 class="title sectionLeadTitle"><?php echo get_field('section_2_heading') ; ?></h3>
                 <?php if(check_acf_field('section_2_image')): ?>
				 <img src="<?php echo get_field('section_2_image'); ?>" alt="alt" />
				 <?php endif; ?>
                 <div class="description">
                   <p>
                     <?php echo get_field('section_2_text'); ?>
                   </p>
                  </div>
				   <?php if(check_acf_field('button_text')): ?>
                 <p><a class="jlaBtn button hollow small boldFont" href="<?php echo get_field('button_link'); ?>"><?php echo get_field('button_text'); ?></a></p>
				 <?php endif; ?>
                 
              </div>
            </div>
          </section>
		  <?php endif; ?>


<?php get_footer(); ?>