<?php get_header(); ?>

<section class="row clearfix">
	<div class="col-content">
		<script type="text/javascript">
jQuery( document ).ready( function( $ ) {
	
var $container = $('#photowall');

$container.imagesLoaded( function() {
  $container.masonry({ 
    gutterWidth:30, 
    itemSelector:'.brick',
    });
});
})
</script>





<div id="photowall">
		<?php
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		query_posts("showposts=10&paged=$page");
		?>

		<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="brick">
			<div class="brick-content">
				<div class="img-wrap">
					<a href="<?php the_permalink(); ?>"><img title="<?php the_title(); ?>" alt="<?php the_title(); ?>" class="wp-post-image" src="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large', false, '' ); echo $src[0]; ?>" /></a>
				</div>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<time>3 minutes ago</time>
				<p><?php the_excerpt(); ?></p>
				<cite><em>via</em> <a href="#">The Guardian<a/></cite>
			</div>
		</div>
		
		<?php endwhile; ?> 
		
	</div>	
	</div>
	<?php get_sidebar(); ?>
        
</section>

<?php get_footer(); ?>