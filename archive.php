<?php get_header(); ?>

<section class="row clearfix">
	<div class="col-content">
		<?php if (have_posts()) : $post = $posts[0]; if (is_category()) { ?>
		
		<h1 class="pagetitle">
		<?php _e('Category Archive for','gravy'); ?> &#8216;<?php single_cat_title(); ?>&#8217;</h1>
 	  
		<?php } elseif( is_tag() ) { ?>
		<h1 class="pagetitle"><?php _e('Tag Archive for','gravy'); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h1>
 	  
		<?php } elseif (is_day()) { ?>
		<h1 class="pagetitle"><?php _e('Archive for','gravy'); ?> <?php echo get_the_date('F jS, Y'); ?></h1>
 	  
		<?php } elseif (is_month()) { ?>
		<h1 class="pagetitle"><?php _e('Archive for','gravy'); ?> <?php echo get_the_date('F Y'); ?></h1>
 	  
		<?php } elseif (is_year()) { ?>
		<h1 class="pagetitle"><?php _e('Archive for','gravy'); ?> <?php echo get_the_date('Y'); ?></h1>
	  
		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="pagetitle"><?php _e('Blog Archives','gravy'); ?></h1>
		<?php } ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
        <?php get_template_part('content', 'archive'); ?>

		<?php endwhile; numeric_pagination(); else : ?>

		<h2><?php _e('Not Found','gravy'); ?></h2>
		
	<?php endif; ?>
	</div>
	
	<?php get_sidebar(); ?>

</section>


<?php get_footer(); ?>