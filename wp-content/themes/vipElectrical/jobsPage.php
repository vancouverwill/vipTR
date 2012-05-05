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


<div id="primary" class="singleSideBarPage">
			<div id="content" role="main">

				<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
<?php
	$args = array( 'post_type' => 'jobs', 'posts_per_page' => 10 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();

		echo '<h3>' . the_title() . '</h3>';
		echo '<div class="entry-content">';
		?>
			<span class="sectionOne">
				<? //echo strlen(the_content_as_string()); ?>
				<? echo substr(the_content_as_string(), 0, 200); ?>
			</span>
			<a href="#">Read More</a>
			<span class="sectionTwo">
			<?php
				echo substr(the_content_as_string(), 31, strlen(the_content_as_string()));
			?>
			</span>
		<?php
		echo '</div>';
	endwhile;
?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?> 

<script type="text/javascript">
	//alert('wake up');
	jQuery('.entry-content').css('margin-bottom', '100px');
	jQuery('.entry-content .sectionTwo').hide();

	jQuery('.entry-content a').click(function (e){
		e.preventDefault();
		 jQuery(this).css('color', 'red');
	});
</script>