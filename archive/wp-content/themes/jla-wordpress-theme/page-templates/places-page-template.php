<?php /* Template Name: Places Page Template */ ?>
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

          <!-- Filters Section
          ================================================== -->
          <div class="row sectionSpace" id="filters">
            <div class="filtersContainer columns medium-7 end clearfix">
              <h4 class="float-left lightFont fsBig">Filter by</h4>
              <ul class="menu dropdown fsSmall upperCase boldFont currentColor filtersMenu filters-button-group" data-dropdown-menu>
                <?php
				  $loop = new WP_Query(
								array(
									  'post_type' => 'places',
									  'posts_per_page' => -1,
										'orderby' => 'title',
										'order' => 'ASC' ,
									  ));
					if(!empty($loop)) :
				$sectors=array();
				$locations=array();

			while ( $loop->have_posts() ) :
			$loop->the_post();
			$place_id=get_the_ID();
			$current_location=get_field('place_location',$place_id);
			$current_sector=get_field('place_sector',$place_id);
			foreach($current_location as $lo) {

				$location=trim(get_the_title($lo));
				if(!in_array($location,$locations))
				array_push($locations,$location);
			}

			foreach($current_sector as $se) {


				if(!in_array($se,$sectors))
				array_push($sectors,$se);
			}





			endwhile;
			endif;
			?>

				
                <li>Category
                    <ul class="menu subMenu">
                      <li><button data-filter='.all-sectors'> All Categories</button></li>
                      <?php foreach($sectors as $s) {
					  $new_s=str_replace(' ','-',$s);
					  ?>
					  <li><button data-filter='.<?php echo $new_s; ?>'><?php echo $s; ?></button></li>
					 <?php
					  }
					  ?>
                    </ul>
                </li>
                <li>Location
                  <ul class="menu subMenu">
                    <li><button data-filter='.all-locations'>All Locations</button></li>
                      <?php foreach($locations as $l) {
					  $new_l=str_replace(' ','-',$l);?>
					  <li><button data-filter='.<?php echo $new_l; ?>'><?php echo $l; ?></button></li>

					  <?php

					  }
					  ?>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- Projects list
          ================================================== -->

			<br style="clear:both; " />

          <section id="projectsList" class="row small-up-1 medium-up-4">
		  <?php

			if(!empty($loop)) :
			while ( $loop->have_posts() ) :
			$loop->the_post();
			$place_id=get_the_ID();
			$featured=get_field('is_featured',$place_id);
			$f='';
			if($featured=='yes') :
			$f="featured";
			else :
			$f="not-featured";
			endif;
			$current_location=get_field('place_location',$place_id);
			$loc='';
			foreach($current_location as $l) {
				$lo=trim(get_the_title($l));
				$loc.=str_replace(' ','-',$lo).' ';


			}

			$current_sector=get_field('place_sector',$place_id);
			$sec='';
			foreach($current_sector as $s) {

				$sec.=$s.' ';

			}


			?>
            <div class="columns projectItem all-locations all-sectors <?php echo $loc; ?> <?php echo $sec; ?> <?php echo $f; ?>">

			  <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="<?php echo get_the_title(); ?>" class="thumbnail">
                <div class="placeDetails">
                  <h6 class="title currentColor boldFont"><?php echo get_the_title(); ?></h6>
                  <div class="tag lightFont"><?php $temp=''; foreach(get_field('place_location',$place_id) as $t) { $temp.=get_the_title($t)."|";  } echo rtrim($temp,'|'); ?></div>
                </div>
              </a>


            </div><!--./projectItem-->

			<?php endwhile;
			endif;

			?>

          </section>


<?php get_footer(); ?>
