<?php
/*
Template Name: Archives
*/
get_header(); ?>

<section class="row clearfix">
	<div class="col-content">

		<h1 class="pagetitle">
			<?php the_title(); ?>
		</h1>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><article <div class="col-content">"post-<?php the_ID(); ?>" <?php post_class(); ?>>

    
			<div class="post">
    			<div class="entry">
	
					<?php
    				    add_filter('post_limits', 'my_post_limit');
    				    global $myOffset;
    				    $myOffset = 0;
    				    global $postsperpage;
    				    $postsperpage = 20; //Number of posts per page
    				    $temp = $wp_query;
    				    $wp_query= null;
    				    $wp_query = new WP_Query();
    				    $wp_query->query('caller_get_posts=1&orderby=post_date&order=DESC&offset='.$myOffset.'&showposts='.$postsperpage.'&paged='.$paged);
    				?>
    				
    				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    				 
    				<?php
    				    setup_postdata($post);
    				    $year = mysql2date('Y', $post->post_date);
    				    $month = mysql2date('n', $post->post_date);
    				    $day = mysql2date('j', $post->post_date);
    				?>
    				 
    				<?php if($year != $previous_year || $month != $previous_month) : ?>
    				<?php if($ul_open == true) : ?>
    				
    				        </ul>
    				<?php endif; ?>
    				        
    				       <h3><?php echo get_the_date('F Y') ?></h3>
    				        <ul class="archive-list">
    				
    				<?php $ul_open = true; ?>
    				<?php endif; ?>
    				    
    				<?php $previous_year = $year; $previous_month = $month; ?>
    				 
    				            <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
    				<?php endwhile; ?>
    				        </ul>
						<?php numeric_pagination(); ?>
					
    				
    				<?php $wp_query = null; $wp_query = $temp;?>
    				<?php remove_filter('post_limits', 'my_post_limit'); ?>
        
				</div>
   			</div>
   		</article>
	</div>
	<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>