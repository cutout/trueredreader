<?php get_header(); ?>

<section class="row clearfix">
	<div class="col-content">
		<h1 class="pagetitle">
			<?php _e('Author Archives','gravy'); ?>
		</h1>
		<div class="writer clearfix">
        	<?php
            global $wp_query;
            $curauth = $wp_query->get_queried_object();
            echo get_avatar( $curauth->user_email, '80' );
        	?>
			<p><?php echo $curauth->user_description; ?></p>
		</div>
					
		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php get_template_part( 'content', 'archive' ); ?>

		<?php endwhile; ?>
		
		<?php numeric_pagination(); ?>
	</div>
	<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>