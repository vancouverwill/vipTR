<?php
/**
 * Template Name: Jobs Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
get_header(); ?>
<h2>jobs page</h2>

<div id="primary" class="singleSideBarPage">
			<div id="content" role="main">
<?php
	$args = array( 'post_type' => 'jobs', 'posts_per_page' => 10 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		the_title();
		echo '<div class="entry-content">';
		the_content();
		echo '</div>';
	endwhile;
?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?> 