<?php /* Template Name: People Page Template */ ?>
<?php get_header(); ?>
      <section id="pageIntroHead" class="sectionSpace" data-magellan-target="pageIntroHead">
        <h1 class="row column lightFont sectionLeadTitle currentColor"><?php echo get_the_title(); ?></h1>
        <article class="row column">
            <p class="leadText lightFont">
                <?php  
				echo $post->post_content;
				?>
            </p>
        </article>
    </section>

    <section class="row" id="stickyMenu" data-sticky-container>
        <nav class="filterationMenu medium-11 columns end sticky" data-sticky data-anchor="people" data-margin-top="0"
           data-btm-anchor="stickyMenu:bottom">
            <?php if(have_rows('people_categories')) : 
			
			?>
			<ul class="menu fsMed lightFont horizontal" data-magellan>
			
                <li><a class="currentColor" href="#pageIntroHead">All</a></li>
            <?php while(have_rows('people_categories')) : the_row(); ?>
				<li><a class="currentColor" href="#<?php echo strtolower(str_replace(' ','_',get_sub_field('department_title'))); ?>"><?php echo get_sub_field('department_title'); ?></a></li>
            <?php endwhile; ?>
			</ul>
        </nav>
    </section>

    <main id="people">
	<?php while(have_rows('people_categories')) : the_row(); ?>
	 <section id="<?php echo strtolower(str_replace(' ','_',get_sub_field('department_title'))); ?>" class="pplSection" data-magellan-target="<?php echo strtolower(str_replace(' ','_',get_sub_field('department_title'))); ?>">
        <div class="row">
		<div class="keyTitle lightFont row medium-12 columns"><?php echo get_sub_field('department_title'); ?></div>
		<div class="row small-up-1 medium-up-4">
				<?php while(have_rows('people')) : the_row(); 
				
				?>
                <div class="column <?php if(get_sub_field('person_image')=='' or !get_sub_field('person_image')) : echo 'noImage'; endif; ?> personBlk">
                    <figure>
					<?php if(get_sub_field('person_image')) : ?>
                        <div class="pImage">
						
                             <img src="<?php echo get_sub_field('person_image'); ?>" alt="<?php echo get_sub_field('person_name'); ?>">
                        </div>
					<?php endif; ?>	
                        <figcaption>
                            <h4 class="name lightFont fsMed"><?php echo get_sub_field('person_name'); ?></h4>
                            <h5 class="department boldFont fsSmall currentColor"><?php echo get_sub_field('qualification'); ?></h5>
                            <!-- We have a many-to-one relationship with the roles and places -->
                            <ul class="roles menu vertical">
                                <li class="fsSmall lightFont">
								<?php while(have_rows('roles')) : the_row(); ?>
                                    <span class="roleName boldFont currentColor"><?php echo get_sub_field('position'); ?></span> <?php echo get_sub_field('location'); ?>
								<?php endwhile; ?>
                                </li>
                            </ul>
                        </figcaption>
                    </figure>
                </div>
			<?php endwhile; ?>	
		</div>
		</div>
	</section>	
	<?php endwhile; ?>
        
</main>
<?php endif; ?>

<?php get_footer(); ?>