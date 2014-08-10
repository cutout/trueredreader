<?php
/*
Template Name: Portfolio
*/

get_header(); ?>

<section class="row clearfix">
	<div class="full-width">
	
		<?php query_posts( array ('post_type' => 'project') ); while ( have_posts() ) : the_post(); ?>
			<?php the_title(); ?>
		<?php endwhile; rewind_posts(); ?>

	</div>
</section>	        

<?php get_footer(); ?>