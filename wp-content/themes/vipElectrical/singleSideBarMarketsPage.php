<?php
/**
<<<<<<< HEAD
 * Template Name: Singe Sidebar Comittment Template
=======
 * Template Name: Singe Sidebar Markets Template
>>>>>>> 04700ac6cbcea27ec5d87e7ad96f3e36c39e23d3
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



		<div id="primary" class="singleSideBarComittmentPage">
<<<<<<< HEAD
			<?php
$submenu = hierarchical_submenu($post, 'comittmentMenu');
if ($submenu) {
    echo $submenu;
} else {
	echo '<p>nothing to display</p>';
    // Do something else
}
?>
=======
			
<?php
$my_id = MARKETS_ID;
$my_post = get_post($my_id);
$children = wp_list_pages('title_li&child_of='.$my_post->ID.'&echo=0');

$sel = '';


if($post->ID == $my_post->ID) {
	$sel = 'current_page_item';
}
else {
	$sel = 'notSelected';
}

if ($children) {
	?>
		<ul class="subMenucomittmentMenu">
			<li class="<? echo $sel; ?>">
				<a class="<? echo $sel; ?>" href="<?php echo $my_post->guid; ?>"> 
					<!-- <pre><?php //print_r($my_post);?></pre> -->
					<?php echo $my_post->post_title; ?>
				</a>
			</li>
			<?php echo $children; ?>
		</ul>
<?php } 
?>

>>>>>>> 04700ac6cbcea27ec5d87e7ad96f3e36c39e23d3
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>  