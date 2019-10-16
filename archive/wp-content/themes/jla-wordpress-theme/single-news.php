<?php get_header(); ?>
 <!-- Lead Text (Intro Text) ---->
 <main class="row">
        <div class="medium-8 columns small-centered">
            <!-- Lead Text (Intro Text)
          ================================================== -->
            <section id="pageIntroHead" class="sectionSpace">
                <h1 class="lightFont sectionLeadTitle">News <span class="currentColor">| <?php echo get_the_title(); ?> </span></h1>
                <div class="pubDate"><?php echo get_field('news_date'); ?></div>
            </section>



            <!-- Content, I treated this as WYSIWYG content generator.
          ================================================== -->
            <section class="pageContent sectionSpace">
                <div class="fsMed lightFont">
				  <?php echo get_field('news_details'); ?>
                   


                </div>
            </section>
            <!-- SHARING
          ================================================== -->
            <div class="row">
                <div class="medium-12 columns">
				
				<br/>
                   <?php echo do_shortcode('[supsystic-social-sharing id="1"]') ?>
				<br/>
                </div>
            </div>

        </div>
    </main>
         

<?php get_footer(); ?>