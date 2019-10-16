<?php
get_header();
global $wp_query;
?>
 <section id="pageIntroHead" class="sectionSpace">
            <h1 class="row column lightFont sectionLeadTitle currentColor">Search Results</h1>
			
          </section>


        <?php if ( have_posts() ) { ?>
		

           <section id="newsItems" class="row itemsList">
		    <div class="leadText lightFont">
            <?php echo $wp_query->found_posts; ?>
			<?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"
			
              </div>
			<br style="clear:both;"/>	
            <?php while ( have_posts() ) { the_post(); ?>

                 <article class="medium-12 columns item" >
                
                    <h3 class="title"><?php echo get_the_title($news_id); ?></h3>
                 
                 <div class="smallDescription lightFont">
                 <?php echo substr(get_the_excerpt(), 0,200); ?>
				 </div>
                  <a class="readMoreTxt currentColor boldFont" href="<?php echo get_the_permalink(); ?>">Read More</a>
               </article>

            <?php } ?>

            </section>

           <div class="row paginationHolder">
            <div class="medium-12 columns">
		  <?php
			kriesi_pagination(); 
		  ?>
		  </div>
		  </div>

        <?php }
				else { ?>
				<section id="newsItems" class="row itemsList">
				No Results Found For "<?php the_search_query();  ?>"
			
					</section>
				<?php 
				}
		?>
		

    
<?php get_footer(); ?>