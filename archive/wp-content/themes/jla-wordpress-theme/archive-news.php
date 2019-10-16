<?php get_header(); ?>
 <!-- Lead Text (Intro Text)
          ================================================== -->
        <!-- Lead Text (Intro Text)
          ================================================== -->
          <section id="newsItems" class="row itemsList">
		  <?php 
				$counter=0;
				$loop = new WP_Query( 
	array( 
		  'post_type' => 'news', 
		  'posts_per_page' => 5   )); 
		   
		   if(!empty($loop)) :  ?>
           <?php while ( $loop->have_posts() ) : $loop->the_post(); 
								$data=get_post_meta($post->ID);  
								$news_id=get_the_ID(); 
			?>					
            <article class="medium-12 columns item">
              <span class="pubDate"><?php echo get_field('news_date',$news_id); ?></span>
              <h3 class="title"><?php echo get_the_title($news_id); ?></h3>
			 
			  <?php if(get_field('news_image',$news_id)) : ?>
			   <div class="row">
              <div class="medium-8 columns leadText">
			  <?php else: ?>
			   <div class="smallDescription">
			  <?php endif; ?>
                <?php echo get_field('short_paragraph',$news_id); ?>
              </div>
			  <?php if(get_field('news_image',$news_id)) : ?>
			  <div class="medium-4 columns">
			  <img src="<?php echo get_field('news_image',$news_id); ?>" alt="ALT IMAGE">
			  </div>
			   </div>
			  <?php endif; ?>
             
              <a class="readMoreTxt" href="<?php echo get_the_permalink(); ?>">Read More</a>
            </article><!--./item-->
			<?php endwhile; ?>
			<?php else: ?>
			No news found
			<?php endif; ?>
            
          </section>
<?php get_footer(); ?>