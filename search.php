<?php get_header(); ?>

<section class="row clearfix">
	<div class="col-content">
	
		<h1 class="pagetitle">
			<?php _e('Search results for','gravy'); ?> &#8216;<em><?php the_search_query() ?></em>&#8217;
		</h1>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<?php get_template_part( 'content', 'searchresults' ); ?>
		
			<?php endwhile; ?>
		
			<?php else : ?>
		
			<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'gravy' ); ?></p>
		
		<?php endif; ?>
		
		<?php numeric_pagination(); ?>

	</div>
	<?php get_sidebar(); ?>
        
</section>

<?php get_footer(); ?>
