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

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>



				
<?php
	$args = array( 'post_type' => 'jobs', 'posts_per_page' => 10 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();

		
		echo '<div class="entry-content">';
		echo '<h2>' . the_title() . '</h2>';
		echo '<h4>' . the_date() . '</h4>';
		?>
			<span class="sectionOne">
				<? //echo strlen(the_content_as_string()); ?>
				<? echo substr(the_content_as_string(), 0, 200); ?>
			</span>
			<a href="#" >Read More</a>
			<span class="sectionTwo hidden" data-hidden="true" >
			<?php
				echo substr(the_content_as_string(), 200, strlen(the_content_as_string()));
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
	//jQuery('.entry-content').css('margin-bottom', '100px');
	jQuery('.entry-content .sectionTwo').hide();
	// jQuery('.entry-content .sectionTwo').show();

	jQuery('.entry-content a').click(function (e){
		e.preventDefault();
		 //jQuery(this).css('color', 'red');
		 //e.css('font-size', '25px');
		 var sectionTwo = jQuery(this).next();

		 if ( sectionTwo.data("hidden") === true ){
		 	sectionTwo.show();
		 	sectionTwo.data("hidden", false);
		 }
		 else {
		 	sectionTwo.hide();
		 	sectionTwo.data("hidden", true);
		 }

	});
</script>