<?php
/*
Template Name: Neighborhood People
*/

get_header(); ?>

<section class="page-hdr">
	<div class="row">
		<h1 class="pagetitle"><?php the_title(); ?></h1>
	</div>	
</section>


	<div class="full-width">
	
		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php the_content(); ?>

		<?php endwhile; ?>


	</div>

<?php get_footer(); ?>