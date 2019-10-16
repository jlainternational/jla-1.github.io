<?php /* Template Name: Contact Us Template */ ?>
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
          <section id="contactSection" class="sectionSpace last">
            <div class="row">
              <div class="medium-6 columns contactForm">
                 <?php if(check_acf_field('contact_form_shortcode')) : ?>
			  <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
			  <?php endif; ?>
              </div>
              <div class="medium-6 columns contactMaps">
			  <?php if(have_rows('locations')):  ?>
			  <?php while(have_rows('locations')):
			  the_row(); ?>
                <div class="locationItem row">
                  <div class="medium-5 columns locationDetails">
                        <h3 class="boldFont fsMed"><?php echo get_sub_field('location_title'); ?></h3>
                    <div class="addressDetails fsMed lightFont">
                      <?php echo get_sub_field('address'); ?>
                    </div>
                    <p class="tel">
					<?php if(get_sub_field('phone')) :  ?>
                      <span class="currentColor">T</span> <a href="tel:<?php echo str_replace(' ','',get_sub_field('phone')); ?>"><?php echo get_sub_field('phone'); ?></a>
					  <?php endif; ?>

					  <?php if(get_sub_field('fax')) :  ?>
                      <br/><span class="currentColor">F</span> <a><?php echo get_sub_field('fax'); ?></a>
					  <?php endif; ?>
                    </p>
                  </div>
                  <div class="medium-7 columns">
				  <?php if(get_sub_field('map')) :  ?>
                    <?php echo get_sub_field('map'); ?>
					<?php endif; ?>
                  </div>
                </div><!--/.locationItem-->
				<?php endwhile; ?>
				<?php endif; ?>



              </div>
            </div>
          </section>

<?php get_footer(); ?>
