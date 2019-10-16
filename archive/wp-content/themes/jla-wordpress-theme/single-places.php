<?php
get_header();
?>

          <!-- Lead Text (Intro Text)
          ================================================== -->
          <section id="pageIntroHead" class="sectionSpace">
            <h1 class="row column lightFont sectionLeadTitle">Places <span class="currentColor">| <?php echo get_the_title(); ?></span></h1>
            <article class="row column">
			<?php if(check_acf_field('place_short_description')) : ?>
              <p class="leadText lightFont">
              <?php echo get_field('place_short_description'); ?>
              </p>
			 <?php endif; ?>
            </article>
          </section>
		  <?php
				$slider = get_field("smart_slider_3");
				if($slider){
					echo do_shortcode($slider);
				}
				?>
          <!-- Facts and Slider
          ================================================== -->
          <section id="factsSliderSection" class="sectionSpace">
            <div class="row">
              <div class="medium-5 columns projectFacts">
                <ul class="menu vertical">
				<?php
				$sec='';
				if(check_acf_field('place_sector')) :
				foreach (get_field('place_sector') as $s) {
					$sec.=$s.",";
				}?>
                  <li><strong>Category </strong><span><?php echo rtrim($sec, ','); ?></span></li>
				<?php endif; ?>
				<?php
				$loc='';
				if(check_acf_field('place_location')) :
				foreach (get_field('place_location') as $l) {
					$loc.=get_the_title($l).",";
				}?>
                  <li><strong>Location </strong><span><?php echo rtrim($loc, ','); ?></span></li>
				<?php endif; ?>
                <?php if(check_acf_field('place_year')) : ?>
                  <li><strong>Year </strong><span><?php echo get_field('place_year'); ?></span></li>
				<?php endif; ?>
                <?php if(check_acf_field('place_company')) : ?>
                  <li><strong>Company </strong><span><?php echo get_field('place_company'); ?></span></li>
				<?php endif; ?>

				<?php if(check_acf_field('place_site_area')) : ?>
                  <li><strong>Total Site Area </strong><span><?php echo get_field('place_site_area'); ?></span></li>
				<?php endif; ?>


                </ul>
              </div>
              <div class="medium-7 columns theSliderHolder">
			  <?php if(have_rows('place_slider')) : ?>
                <div class="projectImagesSlider">
				
				
                </div><!--/.projectImagesSlider-->
			<?php endif; ?>
              </div>
            </div>
          </section>
          <!-- Project Information
          ================================================== -->
          <section id="projectInformation" class="sectionSpace last">
            <div class="row">
              <article class="medium-12 columns info">
			  <?php if(check_acf_field('place_project_information')) : ?>
                <h3 class="title fsBig lightFont">Project Information</h3>
                    <p class="fsMed lightFont">
                   <?php echo get_field('place_project_information'); ?>
                    </p>
				<?php endif; ?>
                <a class="readMoreTxt showCrdts fsSmall hide" href="#projectCreadits">Read More</a>
              </article><!--./item-->
            </div>
          </section>

          <section id="projectCreadits" class="sectionSpace last">
            <div class="row">
              <div class="medium-5 columns">
			  <?php if(have_rows('places_credits_list')) : ?>
               <h3 class="title fsBig lightFont">Credits</h3>
                <ul class="creditList menu vertical">
				<?php while(have_rows('places_credits_list')) : the_row(); ?>
                  <li><span class="title"><strong><?php echo get_sub_field('credit_title'); ?></strong></span>
                    <p><?php echo get_sub_field('credit_description'); ?></p>
                  </li>
				 <?php endwhile; ?>

                </ul>
				<?php endif; ?>
              </div>
              <div class="medium-7 columns">
			  <?php if(check_acf_field('place_right_side_image')) : ?>

                <img src="<?php echo get_field('place_right_side_image'); ?>" alt="ALT" />

			<?php endif; ?>
              </div>
            </div>
          </section>
          <div id="haveProject" class="hide">
            <div class="row">
              <div class="medium-5 columns haveText">Have a project you would like to discuss?</div>
              <div class="medium-7 columns text-right">
                <a href="<?php echo get_site_url(); ?>/contact-us/" class="button">CONTACT US</a>
              </div>
            </div>
          </div>
<?php get_footer(); ?>
