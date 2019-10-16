<?php /* Template Name: News Page Template */ ?>
<?php get_header(); ?>
 
		  <!-- Lead Text (Intro Text)
          ================================================== -->
          <section id="pageIntroHead" class="sectionSpace">
            <h1 class="row column lightFont sectionLeadTitle currentColor">News</h1>
          </section>

          <!-- ITEMS LIST
          ================================================== -->
		   <?php 
			
				$counter=0;
				
				$loop = new WP_Query( 
	array( 
		  'post_type' => 'news', 
		  'paged' => $paged,
		  'posts_per_page' => 3   )); 
		  
		   if(!empty($loop)) :  ?>
          
		
          <section id="newsItems" class="row itemsList">
		 
           <?php while ( $loop->have_posts() ) : $loop->the_post(); 
								$data=get_post_meta($post->ID);  
								$news_id=get_the_ID(); 
			?>					
            <article class="medium-12 columns item">
              <span class="pubDate"><?php echo get_field('news_date',$news_id); ?></span>
              <h3 class="title"><?php echo get_the_title($news_id); ?></h3>
			 
			  <?php if(get_field('news_image',$news_id)) : ?>
			   <div class="row noHPadding">
              <div class="medium-8 columns smallDescription lightFont">
			  <?php else: ?>
			   <div class="smallDescription lightFont">
			  <?php endif; ?>
                <?php echo get_field('short_paragraph',$news_id); ?>
              </div>
			  <?php if(get_field('news_image',$news_id)) : ?>
			  <div class="medium-4 columns">
			  <img src="<?php echo get_field('news_image',$news_id); ?>" alt="ALT IMAGE">
			  </div>
			   </div>
			  <?php endif; ?>
             <a class="readMoreTxt currentColor boldFont" href="<?php echo get_the_permalink(); ?>">Read More</a>
              
            </article><!--./item-->
			<?php endwhile; ?>
			
			<?php else: ?>
			<h2 style="text-align:center;">No News Items found</h2>
			<?php endif; ?>
            
          </section>
		  <div class="row paginationHolder">
            <div class="medium-12 columns">
		  <?php if(!empty($loop)) : 
			kriesi_pagination($loop->max_num_pages); 
		  endif;?>
		  </div>
		  </div>
<?php get_footer(); ?>