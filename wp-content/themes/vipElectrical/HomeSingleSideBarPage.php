<?php
/**
 * Template Name: Home Singe Sidebar Template
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

		<div id="primary">
			<div id="content" class="homeContent" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
                        <div class="homeSidebar">
                            <div class="pagedivider">&nbsp;</div>
                            <a href="<?php echo WP_HOME . '?page_id='.EMPLOYMENT_ID; ?>"><img src="/wp-content/uploads/EMPLOYMENT_button.png"></a>
                            <a href="<?php echo WP_HOME . 'VIPElectricalCapabilityStatement2012.pdf'; ?>">
                            	<img src="/wp-content/uploads/TEXT_AREA_CAPABILITY_BOX.jpg">
                            </a>
                        </div>
		</div><!-- #primary -->

<?php get_footer(); ?>
