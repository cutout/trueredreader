<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<section class="entry">
		<?php the_content(); ?>
		<?php edit_post_link(__('Edit this entry','gravy'), '<p class="wp-edit">', '&rarr;</p>'); ?>
	</section>
</article>
