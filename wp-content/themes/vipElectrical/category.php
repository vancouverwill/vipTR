<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<section id="primary">
			<div id="content" role="main">
				<div id="blog_header">
					<h1 class="entry-title" id="blogTitle">News/Media</h1>

					<div class="categoriesHolder">
						<ul class="blog_categories">
							<?php wp_list_categories('orderby=name&current_category=0&title_li=' ); ?> 
						</ul>
					</div>
					<div style="clear:both">&nbsp;</div>
				</div>

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<!--<h1 class="page-title"><?php
						printf( __( 'Category Archives: %s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>-->
				</header>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

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
		</section><!-- #primary -->

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

