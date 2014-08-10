<?php get_header(); ?>

<section class="row clearfix">
	<div class="col-content">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>
		
			<?php comments_template('', true); ?>

		<?php endwhile; ?>
	
	</div>
	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>
