<?php
//  TABLE OF CONTENTS
//  Localization
//  Add Thickbox
//  Add Masonry
//  Enqueue JS & CSS
//  Page Excerpts
//  Custom Excerpts
//  The 'More' link
//  Custom Menus Call
//  Automatic Feed Links
//  Post Thumbs
//  Remove Nav Title Attributes
//  Custom Menu
//  Search Highlighting
//  Widgets
//  Numeric Pagination


/* Localization ********************************************/
// This sets the basename of the theme for localization. 

load_theme_textdomain('gravy');


/* Add Thickbox ********************************************/
add_thickbox();



/* Add Masonry ********************************************/
function mason_script() {
    wp_enqueue_script( 'jquery-masonry' );
}
add_action( 'wp_enqueue_scripts', 'mason_script' );



/* Enqueue JS & CSS ********************************************/
add_action('init', 'gravy_load_scripts');
add_action('init', 'gravy_styles_init');
add_action('init', 'theme_enqueue_styles');


function gravy_load_scripts() {
       if (!is_admin()) {
               add_action('wp_enqueue_scripts', 'gravy_scripts_init');
               add_action('wp_enqueue_styles', 'gravy_styles_init');
       }
}


function theme_enqueue_styles() {
	wp_enqueue_style('screen', get_stylesheet_directory_uri().'/css/screen.less');
	wp_enqueue_style('classes', get_stylesheet_directory_uri().'/css/classes.less');
}


function gravy_styles_init() {
       if (!is_admin()) {
               wp_enqueue_style('style', get_template_directory_uri().'/style.css', null, '1.0', 'all');
               wp_enqueue_style('ie', get_template_directory_uri().'/ie.css', null, '1.0', 'all');
               wp_enqueue_style('print', get_template_directory_uri().'/css/print.css', null, '1.0', 'print');
}

function gravy_scripts_init() {
	  wp_deregister_script( 'jquery' );
      wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js', null, '1.7.2', false);
      
      wp_enqueue_script('jquery');
      
      	if ( is_singular() ) wp_enqueue_script('comment-reply');
	  	}
	  
	  wp_enqueue_script('modernizer', get_template_directory_uri().'/js/modernizr.min.js', array('jquery'), '1.0', false);
}




/* Page Excerpts ********************************************/

add_post_type_support( 'page', 'excerpt' );



/* Custom Excerpts ********************************************/

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'… <a class="read-more" href="'. esc_url( get_permalink() ) . '">'.__('Read More','gravy').'</a>';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }


/* The 'More' Link ********************************************/
// This is a filter for styling the "Read More" link that appears when creating excerpts

add_filter( 'the_content_more_link', 'my_more_link', 10, 2 );

function my_more_link( $more_link, $more_link_text ) {
	return str_replace( $more_link_text, __('Continue reading&rarr;','gravy'), $more_link );
}


/* Custom Menus Call ********************************************/
add_action('init', 'register_custom_menu');
 
function register_custom_menu() {
register_nav_menu('top_menu', __('Top Menu'));
}


/* Automatic Feed Links ********************************************/
if(function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
}


/* Post Thumbs ********************************************/
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}


/* Remove Nav Title Attributes ********************************************/
function my_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );

}
add_filter( 'wp_nav_menu', 'my_menu_notitle' );
add_filter( 'wp_page_menu', 'my_menu_notitle' );
add_filter( 'wp_list_categories', 'my_menu_notitle' );


/* Search Highlighting ********************************************/
// This highlights search terms in both titles, excerpts and content

function search_excerpt_highlight() {
	$excerpt = get_the_excerpt();
	$keys = implode('|', explode(' ', get_search_query()));
	$excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);
	
	echo '<p>' . $excerpt . '</p>';
}
function search_title_highlight() {
	$title = get_the_title();
	$keys = implode('|', explode(' ', get_search_query()));
	$title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);
	
	echo $title;
}



/* Widgets ********************************************/
// This establishes the elements that wrap your widgets

register_sidebar(
		array(
			'name'=>'Sidebar Widgets',
			'description' => __('', 'gravy'),
			'before_widget' => '<section class="widget"><div class="widget-wrap clearfix">',
			'after_widget' => '</div></section>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>', 
		)
	);

register_sidebar(
		array(
			'name'=>'Footer Widgets',
			'description' => __('', 'gravy'),
			'before_widget' => '<section class="widget"><div class="widget-wrap clearfix">',
			'after_widget' => '</div></section>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>', 
		)
	);






/* Numeric Pagination ********************************************/

function numeric_pagination ($pageCount = 9, $query = null) {

	if ($query == null) {
		global $wp_query;
		$query = $wp_query;
	}
	
	if ($query->max_num_pages <= 1) {
		return;
	}

	$pageStart = 1;
	$paged = $query->query_vars['paged'];
	
	// set current page if on the first page
	if ($paged == null) {
		$paged = 1;
	}
	
	// work out if page start is halfway through the current visible pages and if so move it accordingly
	if ($paged > floor($pageCount / 2)) {
		$pageStart = $paged	- floor($pageCount / 2);
	}

	if ($pageStart < 1) {
		$pageStart = 1;
	}

	// make sure page start is 
	if ($pageStart + $pageCount > $query->max_num_pages) {
		$pageCount = $query->max_num_pages - $pageStart;
	}
	
?>
	<div class="archive-pagination">
<?php
	if ($paged != 1) {
?>
	<a href="<?php echo get_pagenum_link(1); ?>" class="numbered page-number-first"><span>&lsaquo; <?php _e('Newest', 'gravy'); ?></span></a>
<?php
	}
	// first page is not visible...
	if ($pageStart > 1) {
		//echo 'previous';
	}
	for ($p = $pageStart; $p <= $pageStart + $pageCount; $p ++) {
		if ($p == $paged) {
?>
		<span class="numbered page-number-<?php echo $p; ?> current-numeric-page"><?php echo $p; ?></span>
<?php } else { ?>
		<a href="<?php echo get_pagenum_link($p); ?>" class="numbered page-number-<?php echo $p; ?>"><span><?php echo $p; ?></span></a>

<?php
		}
	}
	// last page is not visible
	if ($pageStart + $pageCount < $query->max_num_pages) {
		//echo "last";
	}
	if ($paged != $query->max_num_pages) {
?>
		<a href="<?php echo get_pagenum_link($query->max_num_pages); ?>" class="numbered page-number-last"><span><?php _e('Oldest', 'gravy'); ?> &rsaquo;</span></a>
<?php } ?>
	
	</div>

<?php } ?>
