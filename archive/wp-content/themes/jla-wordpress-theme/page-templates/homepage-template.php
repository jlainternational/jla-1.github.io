<?php /* Template Name: Homepage Template */ ?>
<?php get_header(); ?>
  <!-- HERO SECTION
          ================================================== -->
          <section id="hero">
            <div id="heroSection" <?php if(check_acf_field('main_hero_image')): $u=get_field('main_hero_image'); echo "style='background: url($u) no-repeat center top;'"; endif; ?>>
              <div class="row">
                <div class="medium-10 large-7 columns heroDetails">
				<?php if(check_acf_field('bold_text')): ?>
                  <h1 class="lightFont" style="color:white;"><?php echo get_field('bold_text'); ?></h1>
				  <?php endif; ?>
                  <div class="description lightFont">
				  <?php if(check_acf_field('intro_text')): ?>
				 <h1  class="small" style="color:white;font-size:22pt;"><?php echo get_field('intro_text'); ?></h1>
                <?php endif; ?>

                   
                  </div>
                  <div class="heroActions">
				  <?php if(check_acf_field('hero_first_button_text')) : ?>
                    <a class="button small boldFont greenBtn" href="<?php echo get_field('hero_first_button_link'); ?>"><?php echo get_field('hero_first_button_text'); ?></a>
					<?php endif; ?>
					<?php if(check_acf_field('hero_second_button_text')) : ?>
                    <a class="button small boldFont greenBtn" href="<?php echo get_field('hero_second_button_link'); ?>"><?php echo get_field('hero_second_button_text'); ?></a>
					<?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
		
		<section>
						
            <div id="factsNumbers" class="row">
			<?php if(have_rows('home_facts')) : ?>
              <div class="medium-5 columns numbersBoxes">
                <div class="row small-up-2">
				<?php while(have_rows('home_facts')) : the_row(); ?>
                  <div class="column numberBox">
                    <?php echo get_sub_field('fact_number'); ?>
                    <span class="lightFont"><?php echo get_sub_field('fact_text'); ?></span>
                  </div>
				<?php endwhile; ?>
                  <?php endif; ?>
                </div>
              </div>
			  
			  
			  
              <div class="medium-7 columns fact">
                <div class="factImg">
				<?php if(have_rows('facts_images')) : 
				$images=array();
				while(have_rows('facts_images')) : the_row();
				array_push($images,get_sub_field('image'));
                endwhile; 
				
				$rand_images=array_rand($images,1); 
			
				?>
				   <img src="<?php echo $images[$rand_images]; ?>" style="height:420px; width:380px;" alt="Fact ALT">
				  <?php endif; ?>
                
				<div class="factText lightFont style=text-align:right;text-align:top">
					<div style="font-size:0.65em;color:#0e3c68;text-align:right"> <span class="lightFont"> . </span> </div>
					<div style="font-size:0.65em;color:#0e3c68;text-align:right"> <span class="lightFont"> . </span> </div>
					<div style="font-size:0.65em;color:#0e3c68;text-align:right"> <span class="lightFont"> . </span> </div>
					<div style="font-size:0.65em;color:#0e3c68;text-align:right"> <span class="lightFont"> . </span> </div>
					<div style="font-size:0.65em;color:#0e3c68;text-align:right"> <span class="lightFont"> . </span> </div>
					<div style="font-size:0.65em;text-align:left"> <span class="boldFont"> <em { text-decoration:underline }> <u>       Current  running  and  upcoming  projects      </u> </em> </span> </div>
					<div style="font-size:0.60em;text-align:left"> <span class="lightFont"> West YAS Residential Villas.. </span> </div>	
					<div style="font-size:0.60em;text-align:left"> <span class="lightFont"> Shams S6C9 Residential Tower </span> </div>
					<div style="font-size:0.60em;text-align:left"> <span class="lightFont">    Shams S3C29 Office Tower </span> </di					
				</div>
				
				</div>
                
				
				
					
				
				
              </div>
            </div>
          </section>
		
          <!-- More About JLA
          ================================================== -->
          <section>
            <div id="jlaMore" class="row">
              <div class="medium-10 columns jlaSectors">
                <ul class="menu vertical sectorsMnu">
				<?php if(check_acf_field('sectors_first_heading')) : ?>
                  <li class="sctorsLstItm active" data-target="first"><a href="#"><?php echo get_field('sectors_first_heading'); ?></a></li>
				  <?php endif; ?>
				  <?php if(check_acf_field('sectors_second_heading')) : ?>
                  <li class="sctorsLstItm" data-target="second"><a href="#"><?php echo get_field('sectors_second_heading'); ?></a></li>
				  <?php endif; ?>
				  <?php if(check_acf_field('sectors_third_heading')) : ?>
                  <li class="sctorsLstItm" data-target="third"><a href="#"><?php echo get_field('sectors_third_heading'); ?></a></li>
				  <?php endif; ?>
                </ul>
                <div class="sectorContents">
				<?php if(check_acf_field('sectors_first_content')) : ?>
                  <article class="sectorArtcle lightFont showIt" data-id="first">
                    <?php echo get_field('sectors_first_content'); ?>
                  </article>
				 <?php endif; ?>
				<?php if(check_acf_field('sectors_second_content')) : ?>				 
                  <article class="sectorArtcle lightFont" data-id="second">
                    <?php echo get_field('sectors_second_content'); ?>
                  </article>
				 <?php endif; ?> 
				 <?php if(check_acf_field('sectors_third_content')) : ?>
                  <article class="sectorArtcle lightFont" data-id="third">
                    <?php echo get_field('sectors_third_content'); ?>
                  </article>
				 <?php endif; ?> 
                </div>
              </div>
              <div class="medium-2 columns actionBlk text-right">
			  <?php if(check_acf_field('sectors_right_side_link_text')) : ?>
                <a class="upperCase currentColor boldFont" href="<?php echo get_field('sectors_right_side_link'); ?>"><?php echo get_field('sectors_right_side_link_text'); ?></a>
				<?php endif; ?>
              </div>
            </div>
          </section>
         
         <!--OUR PLACES
          ================================================== -->
		  <?php if(get_field('places_show_section')=='yes'): ?>
          <section id="ourPlacesSection">
            <div id="ourPlaces" class="row">
              <div class="medium-10 columns sectionIntro">
                <h2 class="title currentColor  lightFont"><?php echo get_field('places_section_heading') ; ?></h2>
                <div class="description lightFont">
                  <?php echo get_field('places_section_content'); ?>
                </div>
              </div>
              <div class="medium-2 columns actionBlk text-right">
			  <?php if(check_acf_field('places_link_text')) : ?>
                <a class="upperCase currentColor boldFont" href="<?php echo get_field('places_link_url'); ?>"><?php echo get_field('places_link_text'); ?></a>
			<?php endif; ?>	
              </div>
            </div>
			<?php 
			$loop = new WP_Query( 
								array( 
									  'post_type' => 'places', 
									  'posts_per_page' => (int)get_field('places_number'),
										'orderby' => 'title',
										'order' => 'ASC' ,
									  )); 
			?>
            <div class="ourPlacesSlider">
			<?php
			if(!empty($loop)) :  ?>
									   <?php while ( $loop->have_posts() ) : 
															$loop->the_post();
															$place_id=get_the_ID(); 
															 
										?>
										
              <div class="place">
                <a href="<?php echo get_the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="<?php echo get_the_title(); ?>"></a>
                <div class="placeDetails">
                  <h6 class="title currentColor boldFont"><?php 
				  $loc='';
				  foreach (get_field('place_location') as $l) {
					$loc.=get_the_title($l).",";
				}
				  echo rtrim($loc,','); ?></h6>
                  <div class="tag lightFont">
				  <?php echo get_the_title(); ?>
				  
				  </div>
                </div>
              </div>
			 <?php endwhile;
					endif; 
				wp_reset_postdata(); 	?>
             
            </div>
          </section>
		  <?php endif; ?>


<?php get_footer(); ?>