<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="blog_header index.php">
					<h1 class="entry-title" id="blogTitle">News/Media</h1>
					
					<div class="categoriesHolder">
						<ul class="blog_categories">
							<?php wp_list_categories('orderby=name&current_category=1&title_li=' ); ?> 
						</ul>
					</div>
					<div style="clear:both">&nbsp;</div>
				</div>
			<?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<script type="text/javascript">
	//alert('wake up');
	
	jQuery('.entry-content .sectionTwo').hide();
	// jQuery('.entry-content .sectionTwo').show();

	jQuery('.theContent').css('height','185px');
	jQuery('.theContent').css('overflow','hidden');

	// jQuery('.blogContentBox').each(function(index, value){
	// 	// jQuery(this).css('background', 'red');
	// 	jQuery(this).append('<a href="" class="readMore">Read more' + index + '</p>');

	// });
	var originalBoxHeight = '200px';

	jQuery('.blogExpandable').css({height : originalBoxHeight, overflow : 'hidden'});

	jQuery('a.dynamic').click(function (e){
		e.preventDefault();
		 //jQuery(this).css('color', 'red');
		 //e.css('font-size', '25px');
		 //jQuery('.theContent').css('height','100%');
		 //jQuery(this).css('color', 'red');
		 
		 // var sectionTwo = jQuery(this).next();

		 // if ( sectionTwo.data("hidden") === true ){
		 // 	sectionTwo.show();
		 // 	sectionTwo.data("hidden", false);
		 // }
		 // else {
		 // 	sectionTwo.hide();
		 // 	sectionTwo.data("hidden", true);
		 // }

		 var sectionOne = jQuery(this).prev();

		 if ( sectionOne.data("hidden") === true ){
		 	// sectionOne.show();
		 	jQuery(this).html("Hide");
		 	sectionOne.css({ height : '100%'});
		 	sectionOne.data("hidden", false);
		 }
		 else {
		 	jQuery(this).html("Read More");
		 	sectionOne.css({height : originalBoxHeight});
		 	sectionOne.data("hidden", true);
		 }

	});
</script>
