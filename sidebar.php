<aside class="col-sidebar">

	<!--Begin Related Posts-->		
	<?php
		if ( is_single() ) :
		global $post;
		$categories = get_the_category();
		foreach ($categories as $category) :
   		$posts = get_posts('numberposts=4&exclude=' . $GLOBALS['current_id'] . '&category='. $category->term_id);
		//To change the number of posts, edit the 'numberposts' parameter above
		if(count($posts) > 1) {
	?>
	
	<section class="widget more-in">
		<div class="widget-wrap">
			<h3 class="widgettitle"><?php _e('More in','gravy'); ?> &#8216;<?php echo $category->name; ?>&#8217;</h3>
				<ul>
				<?php foreach($posts as $post) : ?>
					<li>
						<?php the_post_thumbnail('medium'); ?>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<div class="postmetadata"><?php the_time('M d, Y'); ?></div>
					</li>
				<?php endforeach; ?>
				</ul>
		</div>	
	</section>
	
	<?php } endforeach; endif; ?>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widgets') ) : ?><?php endif; ?>

</aside>