<?php

//if ( function_exists('register_sidebars') )
//register_sidebars(3);

function vipelectrical_body_classes(  ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) )
		$classes[] = 'singular';

	return $classes;
}

function vipelectrical_body_class( $class = '' ) {
	// Separates classes with a single space, collates classes for body element
	echo 'class="' . join( ' ', get_body_class( $class ) ) . '"';
}


/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own twentyeleven_posted_on to override in a child theme
 *
 * @since Twenty Eleven 1.0
 */
function twentyeleven_posted_on() {
	printf( __( '<span class="sep"></span>
		<a href="%1$s" title="%2$s" rel="bookmark">
		-<time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'twentyeleven' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentyeleven' ), get_the_author() ) ),
		get_the_author()
	);
}

/**
 * Retrieve path of page template in current or parent template.
 *
 * Will first look for the specifically assigned page template
 * The will search for 'page-{slug}.php' followed by 'page-id.php'
 * and finally 'page.php'
 *
 * @since 1.5.0
 *
 * @return string
 */
function will_get_page_template() {
	$id = get_queried_object_id();
	$template = get_post_meta($id, '_wp_page_template', true);
	$pagename = get_query_var('pagename');

	if ( !$pagename && $id > 0 ) {
		// If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object
		$post = get_queried_object();
		$pagename = $post->post_name;
	}

	if ( 'default' == $template )
		$template = '';

	$templates = array();
	if ( !empty($template) && !validate_file($template) )
		$templates[] = $template;
	if ( $pagename )
		$templates[] = "page-$pagename.php";
	if ( $id )
		$templates[] = "page-$id.php";
	$templates[] = 'page.php';

	return get_query_template( 'page', $templates );
}

function enable_more_buttons($buttons) {
  $buttons[] = 'hr';
 
  /* 
  Repeat with any other buttons you want to add, e.g.
	  $buttons[] = 'fontselect';
	  $buttons[] = 'sup';
  */
 
  return $buttons;
}
add_filter("mce_buttons", "enable_more_buttons");