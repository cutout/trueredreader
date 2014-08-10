<?php
/*
Template Name: Blog
*/

get_header(); ?>

<section class="row clearfix">
	<div class="col-content">
		
		<h1 class="pagetitle">
			<?php the_title(); ?>
		</h1>
	
		<?php
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts("showposts=6&paged=$page");
		?>

		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php get_template_part('content','archive'); ?>

		<?php endwhile; ?> 
		
		<?php numeric_pagination(); ?>

	</div>
	
	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
