<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<h1 class="pagetitle">
		<?php the_title(); ?>
	</h1>
	<section class="entry">
		<?php the_content(); ?>
		<?php edit_post_link(__('Edit this entry','gravy'), '<p class="wp-edit">', '&rarr;</p>'); ?>
	</section>
</article>
