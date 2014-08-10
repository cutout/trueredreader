<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<h2 class="posttitle">
		<a href="<?php the_permalink() ?>" rel="bookmark">
			<?php the_title(); ?>
		</a>
	</h2>
	<?php get_template_part('content','postmetadata'); ?>
	<section class="entry">
		<?php the_content(); ?>
	</section>	
</article>