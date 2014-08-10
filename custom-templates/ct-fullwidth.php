<?php
/*
Template Name: Full Width
*/

get_header(); ?>

<section class="row clearfix">
	<div class="full-width clearfix">
	
		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php get_template_part('content','page'); ?>

		<?php endwhile; ?>

	</div>
</section>	        

<?php get_footer(); ?>