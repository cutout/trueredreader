<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<h2 class="posttitle">
		<?php the_title(); ?>
	</h2>
	<?php get_template_part('content','postmetadata'); ?>
	<section class="entry">
		<?php the_content(); ?>
		<?php if (get_the_tags()) {
			the_tags('<p><span class="tags"><strong>'.__('Tagged as:','gravy').'</strong> ', '', '</span></p>');
			}
		?>
		<?php edit_post_link(__('Edit this entry','gravy'), '<p id="wp-edit">', '&rarr;</p>'); ?>
		<div class="postnav clearfix">
			<div class="left"><h5><?php _e('&lsaquo; Previous','gravy'); ?></h5><?php previous_post_link('%link') ?></div>
			<div class="right"><h5><?php _e('Next &rsaquo;','gravy'); ?></h5><?php next_post_link('%link') ?></div>
		</div>
	</section>
</article>