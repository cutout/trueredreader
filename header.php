<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'gravy' ), max( $paged, $page ) );
	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon.png" rel="apple-touch-icon" />
<link href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
<link href="<?php bloginfo('template_directory'); ?>/images/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
<link href="<?php bloginfo('template_directory'); ?>/images//apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />



<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>


<script type="text/javascript" src="//use.typekit.net/jiy1xka.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


</head>
<body <?php body_class('loading'); ?>>

<section class="container">

	<header class="masthead clearfix" role="banner">
		<section class="clearfix row">
			<div class="branding">
	     		<h1 class="logo">
	    		    <a href="<?php echo home_url(); ?>/" title="<?php _e('Home','gravy'); ?>">
	     		    	<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" /> <em>the</em> True Red Reader
	      		    </a>
	      		</h1>
	      		
			</div>
			
			<button id="nav-toggle" aria-hidden="true">Navigation</button>

		<div class="nav-bg">
		    <nav class="menu clearfix">
				<?php wp_nav_menu( array('menu' => 'top_menu', 'menu_class' => 'nav clearfix row' )); ?>
			</nav>
			</div>
			<div class="overlay" aria-hidden="true"></div>
		</section>
	</header>


	<section class="main clearfix">