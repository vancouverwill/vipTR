<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link media="only screen and (max-device-width: 640px)" href="/iphone.css" type="text/css" rel="stylesheet" />
<link media="only screen and (max-device-width: 490px)" href="/android.css" type="text/css" rel="stylesheet" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,600,600italic,700,400italic,300' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php // body_class(); ?> <?php vipelectrical_body_class(); ?> >
<h2><?php will_get_page_template(); ?></h2>    <div id="topPage">
			<hgroup>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				    <h1 id="site-title"><span>
                    
                        <?php bloginfo( 'name' ); ?></span></h1>
                </a>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
                 
<?php  
    $my_id = CONTACT_ID;
    $contact_post = get_post( $my_id );
    ?>
                                <a href="http://www.linkedin.com/company/vip-electrical" target="_blank" ><h3 id="phone">8424 3777</h3></a>
			</hgroup>
      </div>
    <div id="navContainer">
                        <nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
           
       </div>
    <div id ="pageBackground">
        <div id="pageBackgroundImage">
           <div id="page" class="hfeed">
            <header id="branding" role="banner">                 
                            <?php
                                    // Check to see if the header image has been removed
                                    $header_image = get_header_image();
                                    if ( ! empty( $header_image ) ) :
                            ?>
                            <!--<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <?php
                                            // The header image
                                            // Check if this is a post or page, if it has a thumbnail, and if it's a big one
                                            if ( is_singular() &&
                                                            has_post_thumbnail( $post->ID ) &&
                                                            ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
                                                            $image[1] >= HEADER_IMAGE_WIDTH ) :
                                                    // Houston, we have a new header image!
                                                    echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
                                            else : ?>
                                            <img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
                                    <?php endif; // end check for featured image or standard header ?>
                            </a>-->
                            <?php endif; // end check for removed header image ?>

                            <?php
                                    // Has the text been hidden?
                                    if ( 'blank' == get_header_textcolor() ) :
                            ?>
                                    <div class="only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">
                                    <?php //get_search_form(); ?>
                                    </div>
                            <?php
                                    else :
                            ?>
                                    <?php //get_search_form(); ?>
                            <?php endif; ?>

                
            </header><!-- #branding -->

            <?php

            $image_id=get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'large');
            $image_url=$image_url[0];

            ?>
            <?php $post = $wp_query->get_queried_object();
                    $pagename = $post->post_name; 
            if ($pagename != 'home') { ?>

            <div id="main">
                <div id="mainFold">&nbsp;</div>
               <!-- <div class="mainContentImage" style="background:url(<? echo $image_url; ?>);">&nbsp;</div> -->
               <img class="mainContentImage" src="<?php echo $image_url; ?>" />
            <? } else { ?>
                
               <script type="text/javascript">

                    //rotation speed and timer
                    var speed = 6000;
                    var run = setInterval('rotate()', speed);


                  jQuery(document).ready(function() {
                        //move he last list item before the first item. The purpose of this is if the user clicks to slide left he will be able to see the last item.
                        jQuery('#carousel_ul li:first').before(jQuery('#carousel_ul li:last')); 
                        
                        
                        //when user clicks the right image for background sliding left        
                        jQuery('#right_scroll img').click(function(){
                        
                            //get the width of the items ( i like making the jquery part dynamic, so if you change the width in the css you won't have o change it here too ) '
                            var item_width = jQuery('#carousel_ul li').outerWidth();

                            console.log(jQuery('#carousel_ul').css('left'));
                            console.log(item_width);
                            
                            //calculae the new left indent of the unordered list
                            var left_indent = parseInt(jQuery('#carousel_ul').css('left')) - item_width;

                            console.log(left_indent);
                            
                            //make the sliding effect using jquery's anumate function '
                            jQuery('#carousel_ul:not(:animated)').animate({'left' : left_indent},1000,function(){    
                                
                                //get the first list item and put it after the last list item (that's how the infinite effects is made) '
                                jQuery('#carousel_ul li:last').after(jQuery('#carousel_ul li:first')); 
                                
                                //and get the left indent to the default -210px
                                jQuery('#carousel_ul').css({'left' : '-' + item_width + 'px'});
                            }); 
                        });
                        
                        //when user clicks the left image for background sliding left
                        jQuery('#left_scroll img').click(function(){
                            
                            var item_width = jQuery('#carousel_ul li').outerWidth() + 10;
                            
                            /* same as for sliding right except that it's current left indent + the item width (for the sliding right it's - item_width) */
                            var left_indent = parseInt(jQuery('#carousel_ul').css('left')) + item_width;
                            
                            jQuery('#carousel_ul:not(:animated)').animate({'left' : left_indent},1000,function(){    
                            
                            /* when sliding to left we are moving the last item before the first list item */            
                            jQuery('#carousel_ul li:first').before(jQuery('#carousel_ul li:last')); 
                            
                            /* and again, when we make that change we are setting the left indent of our unordered list to the default -210px */
                            jQuery('#carousel_ul').css({'left' : '-' + item_width + 'px'});
                            });
                            
                            
                        });
                  });

                    //a simple function to click next link
                    //a timer will call this function, and the rotation will begin :)  
                    function rotate() {
                        jQuery('#right_scroll img').click();
                    }
                </script>
<style type="text/css">
#carousel_container {
    position:relative;
}

#carousel_inner {
float:left; /* important for inline positioning */
width:901px; /* important (this width = width of list item(including margin) * items shown */ 
overflow: hidden;  /* important (hide the items outside the div) */
/* non-important styling bellow */
background: #F0F0F0;
}

#carousel_ul {
position:relative;
left:-901px; /* important (this should be negative number of list items width(including margin) */
list-style-type: none; /* removing the default styling for unordered list items */
margin: 0px;
padding: 0px;
width:9999px; /* important */
/* non-important styling bellow */
padding-bottom:10px;
}

#carousel_ul li{
float: left; /* important for inline positioning of the list items */                                    
width: 901px;  /* fixed width, important */
/* just styling bellow*/
padding:0px;
height:338px;
background: #000000;
margin-top:0px;
margin-bottom:0px; 
margin-left:0px; 
margin-right:0px; 
}

#carousel_ul li img {
.margin-bottom:-4px; /* IE is making a 4px gap bellow an image inside of an anchor (<a href...>) so this is to fix that*/
/* styling */
cursor:pointer;
cursor: hand; 
border:0px; 
}

#left_scroll, #right_scroll{
float:left; 
height:32px; 
width:32px; 
background: #C0C0C0; 
position:absolute;
top: 150px;
z-index:20;
}

#left_scroll img, #right_scroll img{
/*styling*/
cursor: pointer;
cursor: hand;
}

#left_scroll {
    left: -15px;
}

#right_scroll {
     right: -16px;
}
</style>
            <div id="main">
                <div id='carousel_container'>
                  <div id='left_scroll'><img src='/wp-content/themes/vipElectrical/images/home_image_button_left.png' /></div>
                    <div id='carousel_inner'>
                        <ul id='carousel_ul'>
                            <li><a href='#'><img src="/wp-content/themes/vipElectrical/images/vip_home_1_image.jpg" width="901px" height="338px" /></a></li>
                            <li><a href='#'><img src="/wp-content/themes/vipElectrical/images/vip_home_2_image.jpg" width="901px" height="338px" /></a></li>
                            <li><a href='#'><img src="/wp-content/themes/vipElectrical/images/vip_home_3_image.jpg" width="901px" height="338px" /></a></li>
                        </ul>
                    </div>
                  <div id='right_scroll'><img src='/wp-content/themes/vipElectrical/images/home_image_button_right.png' /></div>
                </div>
            <?php } ?>

                

