<?php get_header(); ?>

<section class="page-hdr">
 <div class="row">
	<h1 class="pagetitle">
		<?php the_title(); ?>
	</h1>
 </div>	
</section>

<section class="row clearfix">
	<div class="col-content">

		<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; ?>

	</div>
	<?php get_sidebar(); ?>
        
</section>

<?php get_footer(); ?>