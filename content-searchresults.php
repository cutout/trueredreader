<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<div class="thumb-wrap">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(array(120,120)); } ?>				 			
		</a>
	</div>
	<div class="excerpt-wrap">
		<h2 class="posttitle">
			<a href="<?php the_permalink() ?>" rel="bookmark">
				<?php search_title_highlight(); ?>
			</a>
		</h2>
		<?php get_template_part('content','postmetadata'); ?>
		<section class="entry">
   			<?php search_excerpt_highlight(); ?>
		</section>
	</div>
</article>

