<?php
/* 
*Template Name: Home Project Masonry
*
*/ 

$type_header = get_post_meta(get_the_ID(),'_cmb_type_head',true);
if(isset($type_header)&&$type_header==8){
	get_header('container-3');
}elseif(isset($type_header)&&$type_header==7){
	get_header('container-2');
}elseif(isset($type_header)&&$type_header==6){
	get_header('container');
}elseif(isset($type_header)&&$type_header==5){
	get_header('opacity-3');
}elseif(isset($type_header)&&$type_header==4){
	get_header('opacity-2');
}elseif (isset($type_header)&&$type_header==3) {
	get_header('opacity-1');
}elseif(isset($type_header)&&$type_header==2){
	get_header('opacity');
}else{
	get_header();
}
?>

<?php if(have_posts()) : while(have_posts()) : the_post(); 
	?>
	<main id="main">	
		<!-- BLOG-->
		<?php the_content(); ?>

		<!-- END BLOG-->
	</main>

	<?php
endwhile;
endif;
?>
<?php get_footer() ?>
