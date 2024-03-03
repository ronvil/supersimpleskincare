<?php

add_theme_support( 'title-tag' );

add_theme_support(
	'html5',
	array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	)
);

add_theme_support( 'post-thumbnails' );

add_theme_support( 'align-wide' );


// Body class
function custom_body_classes( $classes ) {

	// Helps detect if JS is enabled or not.
	$classes[] = 'no-js';

	// Adds `singular` to singular pages, and `hfeed` to all other pages.
	$classes[] = is_singular() ? 'singular' : 'hfeed';

	// Add a body class if main navigation is active.
	if ( has_nav_menu( 'primary' ) ) {
		$classes[] = 'has-main-navigation';
	}

	// Add a body class if there are no footer widgets.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-widgets';
	}

	return $classes;
}
add_filter( 'body_class', 'custom_body_classes' );


// Remove width and height attributes to images
function remove_image_size_attributes( $html ) {
	return preg_replace( '/(width|height)="\d*"/', '', $html );
	}
	
	// Remove image size attributes from post thumbnails
	add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );
	
	// Remove image size attributes from images added to a WordPress post
	add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );

	
// Add image size
add_image_size( 'article-thumb', 568, 320 );


// nav menus
register_nav_menus( array(
	'mainmenu'   => __( 'Main menu for top and footer' ),
) );


// Posts Navigation
function numeric_posts_nav() {
 
	if( is_singular() )
			return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
			return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 )
			$links[] = $paged;

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
	}

	echo '<div class="navigation-container"><ul>' . "\n";

	/** Previous Post Link */
	if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( ! in_array( 2, $links ) )
					echo '<li>…</li>';
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
					echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

//Add excerpts to pages
function add_excerpt_to_pages() 
{
     add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'add_excerpt_to_pages');


//Remove prefix for archive pages
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});


//Lets add Open Graph Meta Info
function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
		echo '<meta property="og:title" content="' . get_the_title() . '"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . get_permalink() . '"/>';
		echo '<meta property="og:site_name" content="Oxfam Pilipinas"/>';
	if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
		$default_image="https://oxfam.org.ph/wp-content/uploads/2022/09/oxfampilipinas-opengraph-default.jpg"; //replace this with a default image on your server or an image in your media library
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
	echo "
	";
	}
	add_action( 'wp_head', 'insert_fb_in_head', 5 );


//Enqueue Scripts
function add_theme_scripts() {
 
	// Sidr
	wp_enqueue_script( 'sidr-script', get_template_directory_uri() . '/js/vendor/sidr.min.js', array(), '3.0.0', true );
	wp_enqueue_style( 'sidr-style', get_template_directory_uri() . '/css/sidr.bare.min.css' );
	
	// Scripts
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array(), '1.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
	
	// Main CSS
	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/style.min.css', array(),'0.1' );
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


?>