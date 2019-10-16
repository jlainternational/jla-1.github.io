<?php
get_header();
?>

         <section id="pageIntroHead" class="sectionSpace">
            <h1 class="row column lightFont sectionLeadTitle">Sectors <span class="currentColor">| <?php echo get_the_title(); ?> </span></h1>
            <article class="row column">
              <p class="leadText lightFont">
			  <?php if(check_acf_field('short_description')) : ?>
                <?php echo get_field('short_description'); ?>
             
			<?php endif; ?>
			  </p>
            </article>
          </section>
          <!-- Sector Details
          ================================================== -->
          <section id="sectorDetails" class="row sectionSpace last">
            <div class="large-8 medium-7 columns">
			<?php if(check_acf_field('heading_below_description')) : ?>
             <h2 class="fsBig lightFont"><?php echo get_field('heading_below_description'); ?></h2>
			<?php endif; ?> 
              <div class="sectorDetailsText fsMed lightFont">
                 <?php while(have_posts()) : 
				 the_post(); ?>
			
		 		<?php the_content(); ?>
				
				<?php endwhile; ?>
              </div>
              <div class="viewOtherSectors">
			  <?php 
			  $id=$post->ID;
			  
			$loop = new WP_Query( 
								array( 
									  'post_type' => 'sectors', 
									  'posts_per_page' => -1,
										'orderby' => 'title',
										'order' => 'DESC' ,
										'post__not_in' =>array($id)
									  ));	
			
			?>
			<?php
			if(!empty($loop)) :  ?>
									  
                <div class="fsBig lightFont">More Sectors</div>
                <ul class="listHolder menu vertical">
				 <?php while ( $loop->have_posts() ) : 
						$loop->the_post();
														
															 
										?>
                    <li class="listItem"><a class="black fsSmall upperCase boldFont" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                <?php endwhile; ?>
                </ul>
				<?php endif; 
				wp_reset_postdata();
				?>
				
              </div>
            </div>
			
            <div class="relatedProject large-4 medium-5 columns">
			<?php if(check_acf_field('related_projects')) :  ?>
              <h6 class="title fsBig lightFont">Related Project</h6>
              <div class="relatedPrjctsSlider">
			  <?php foreach(get_field('related_projects') as $project) { 
			  $p=get_post($project);?>
			  
                <div class="projectItem">
                  <a href="<?php echo get_the_permalink($project); ?>">
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($project)); ?> ?>" alt="<?php echo $p->post_title; ?>" class="thumbnail">
                    <div class="projectInfo">
                        <p class="location currentColor fsSmall boldFont noPM"><?php echo $p->post_title; ?></p>
                        <p class="title fsMed black lightFont"><?php
						
						$loc='';
				  foreach (get_field('place_location',$project) as $l) {
					$loc.=get_the_title($l).",";
				}
				  echo rtrim($loc,','); ?></p>
                    </div>
                     <i>
                       <svg viewBox="0 0 227.096 227.096" style="display: block;" aria-disabled="false"><polygon style="fill:currentColor;" points="152.835,39.285 146.933,45.183 211.113,109.373 0,109.373 0,117.723 211.124,117.723 146.933,181.902 152.835,187.811 227.096,113.55"></polygon></svg>
                     </i>
                  </a>
                </div><!--./projectItem-->
				<?php 
			  } 
			  ?>
               
              </div>
			 <?php endif; ?> 
            </div>
          </section>
<?php get_footer(); ?>
