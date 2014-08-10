<?php $attachment_link = wp_get_attachment_link($post->ID, true, array(300, 300)); ?>
<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; ?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<h1 class="pagetitle">
		&#8216;<?php the_title(); ?>&#8217;
	</h1>
	<section class="entry">
		<?php echo $attachment_link; ?>
        <p><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment">&laquo;<?php _e('Back','gravy'); ?></a></p>
	</section>
</article>

