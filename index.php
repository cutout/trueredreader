<?php get_header(); ?>

<section class="row">
	<div class="open-latest">
		<?php
		$query = 'posts_per_page=1&cat=3';
		$queryObject = new WP_Query($query);
		// The Loop...
		if ($queryObject->have_posts()) {
			while ($queryObject->have_posts()) {
				$queryObject->the_post(); ?> 
					<strong>Open Chat:</strong> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="comments-number">(<?php comments_number('0', '1', '%'); ?> <i class="fa fa-comment"></i>)</span>
					
					<time><?php the_time('F d, Y'); ?></time>
				<?php } } ?>
	</div>
</section>

<section class="row clearfix">
	<div class="col-content">
	<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			
		var $container = $('#feed-wall');
		
		$container.imagesLoaded( function() {
		  $container.masonry({ 
		    gutterWidth:30, 
		    itemSelector:'.feed-item',
		    });
		});
		})
	</script>
		<div id="feed-wall">
			<?php wprss_display_feed_items(); ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
</section>


	<script type="text/javascript">

// Find all YouTube videos
var $allVideos = $("iframe[src^='http://www.youtube.com']"),

    // The element that is fluid width
    $fluidEl = $("body");

// Figure out and save aspect ratio for each video
$allVideos.each(function() {

  $(this)
    .data('aspectRatio', this.height / this.width)

    // and remove the hard coded width/height
    .removeAttr('height')
    .removeAttr('width');

});

// When the window is resized
$(window).resize(function() {

  var newWidth = $fluidEl.width();

  // Resize all videos according to their own aspect ratio
  $allVideos.each(function() {

    var $el = $(this);
    $el
      .width(newWidth)
      .height(newWidth * $el.data('aspectRatio'));

  });

// Kick off one resize to fix all videos on page load
}).resize();

</script>

<section class="audio-video">
	<h2>Latest Video &amp; Podcasts</h2>
	<div class="row">
		<ul class="vids">
		<li><?php echo do_shortcode('[ix_show_latest_yt ytid="UC8ToRX9bNJx_QfTj6-4GIvA" width="400" height="300" autoplay="off" count_of_videos="1" no_live_message="some text" related="on"]'); ?>
		<p>via <a href="https://www.youtube.com/channel/UC8ToRX9bNJx_QfTj6-4GIvA" target="_blank">LFC Entertainment</a></p>
		</li>
		
		<li><?php echo do_shortcode('[ix_show_latest_yt ytid="liverpoolfc" width="400" height="300" autoplay="off" count_of_videos="1" no_live_message="some text" related="on"]'); ?>
		<p>via <a href="https://www.youtube.com/channel/UC9LQwHZoucFT94I2h6JOcjw" target="_blank">Liverpool FC</a></p>
		</li>
		
		<li><?php echo do_shortcode('[ix_show_latest_yt ytid="Lobsto" width="400" height="300" autoplay="off" count_of_videos="1" no_live_message="some text" related="on"]'); ?>
		<p>via <a href="https://www.youtube.com/channel/UCL0iSns5GIwEhIUI_5a7dsw" target="_blank">LFC Media</a></p>
		</li>
		</ul>
		
	</div>
	
	<div class="row podcasts">
		<?php if (function_exists('dynamic_sidebar')) { ?>
    	<section class="row clearfix">
    		<?php dynamic_sidebar('Footer Widgets'); ?>
    	</section>
    <?php } ?>
	
	
	
	</div>
</section>


<?php get_footer(); ?>