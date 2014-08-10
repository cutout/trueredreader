	</section><!--/main-->
	<div class="push"></div>
</section><!--/container-->


	<ul class="social">			
		<li><a href="http://www.twitter.com/" class="symbol" title="twitterbird" target="_blank"></a></li>
      	<li><a href="https://www.facebook.com/" class="symbol" title="facebook" target="_blank"></a></li>
	</ul>
	

<footer role="contentinfo">
	
	<?php if (function_exists('dynamic_sidebar')) { ?>
    	<section class="row clearfix">
    		<?php dynamic_sidebar('Footer Widgets'); ?>
    	</section>
    <?php } ?>
	
	
	<section class="footer-wrap">
		<section class="row clearfix">
  			<div class="left"> &#169; <?php echo date('Y'); ?> 
  				<span class="url fn org">
    				<?php bloginfo('name'); ?>
    			</span> 
    			</div>
			<div class="right"> 
				More text here
			</div>
		</section>	
	</section>
</footer>

<?php wp_footer(); ?>


<script src="<?php bloginfo('template_url'); ?>/js/responsive.js"></script> 

</body>
</html>