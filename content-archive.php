<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<div class="entry">
		<?php if(has_post_thumbnail()) { ?>
		<div class="thumb-wrap">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail('medium'); } ?>				 			
			</a>
		</div>
		<?php } ?>
		
		<div class="excerpt-wrap">
			<h2 class="posttitle">
				<a href="<?php the_permalink() ?>" rel="bookmark">
					<?php the_title(); ?>
				</a>
			</h2>
			<?php get_template_part('content','postmetadata'); ?>
			<section class="entry archive-excerpt">
				<p class="excerpt"><?php echo excerpt('10'); ?></p>
			</section>
		</div>
	</div>	
</article>
