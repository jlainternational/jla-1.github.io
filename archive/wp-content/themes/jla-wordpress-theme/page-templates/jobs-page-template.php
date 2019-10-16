<?php /* Template Name: Careers Page Template */ ?>
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

          <!-- ITEMS LIST
          ================================================== -->
          <section id="careerItems" class="row itemsList">
		  <?php
		  	$loop = new WP_Query( 
	array( 
		  'post_type' => 'jobs', 
		 
		  'posts_per_page' => -1  )); 
		  
		   if(!empty($loop)) :  
		  while ( $loop->have_posts() ) : $loop->the_post(); 
								
								$job_id=get_the_ID(); 
			?>					
		  
		   
            <article class="medium-12 columns item">
              <span class="where"><?php echo get_field('job_location',$job_id); ?></span>
              <h3 class="title normalFont"><?php echo get_the_title(); ?></h3>
              <div class="smallDescription fsMed lightFont">
               <?php echo get_field('short_description',$job_id); ?>
              </div>
              <div class="jobDetails fsMed lightFont">
                <?php echo get_field('long_description',$job_id); ?>
              </div>
              <div class="controllers">
                <a class="readMoreTxt showMoreDetails" href="#" data-more-text="More Details" data-less-text="Less Details">More Details</a>
                <a class="applyNow" data-job-title="<?php echo get_the_title(); ?>" href="#">Apply Now</a>
              </div>
            </article><!--./item-->
           <?php endwhile; 
		   endif;
		   ?>

          </section>
<?php get_footer(); ?>