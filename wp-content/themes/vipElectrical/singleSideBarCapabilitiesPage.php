<?php
/**
 * Template Name: Singe Sidebar Capabilities Template
 *	Description: A Page Template that adds a sidebar to pages
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
<?php
// $my_id = WHAT_WE_DO_ID;
$my_id = 395;

$my_post = get_post($my_id);
// $children = wp_list_pages('title_li&child_of='.$my_post->ID.'&echo=0');
$children = wp_list_pages('title_li&child_of=65&echo=0');

$sel = '';


if($post->ID == $my_post->ID) {
	$sel = 'current_page_item';
}
else {
	$sel = 'notSelected';
}
//var_dump($children);

if ($children) {
	?>
		<ul class="subMenucomittmentMenu">
<!--			<li class="<? echo $sel; ?>">
				<a class="<? echo $sel; ?>" href="<?php echo WP_HOME . '?page_id='.$my_post->ID; ?>"> 

					<?php echo $my_post->post_title; ?>
				</a>
			</li> -->
			<?php echo $children; ?>
		</ul>
<?php }   
?>
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>  

