<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website# article: http://ogp.me/ns/article#">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta property="fb:app_id" content="284871435031619" />
<?php 
	if(is_page()){
		echo "<meta property='og:type'   content='website' /> 
  			<meta property='og:url'    content='http://ryan.fish/blog/' /> 
  			<meta property='og:title'  content='The Caffeinated Fish' /> 
  			<meta property='og:image'  content='http://ryan.fish/blog/wp-content/uploads/2013/09/blicycle-outside.jpg' />
                        <meta property='og:image:width' content='1600' />
                        <meta property='og:image:height' content='1200' />
			<meta property='og:description' content='Tech, DIY, and if I have time, Photography' />";
	}else{
		$thisposthopefully = get_post(get_the_ID());


                //intended to get the page image for use with Facebook previews
                $imageSrc="";
		$args = array(
                        'numberposts' => 1,
                        'order'=> 'ASC',
                        'post_mime_type' => 'image',
                        'post_parent' => get_the_ID(),
                        'post_status' => null,
                        'post_type' => 'attachment'
                        );
                //get the first image and resize it 
                $attachments = get_children( $args );

                if ($attachments) {
                        foreach($attachments as $attachment) {
                                $imageSrc=wp_get_attachment_image_src( $attachment->ID, 'full' );
                        }
                }
//end image get

		$metaoutput = "<meta property='og:type'   content='article' /> 
  			<meta property='og:url'    content=".esc_url(get_permalink(get_the_ID()))." /> 
  			<meta property='og:title'  content=".str_replace(" ", "&#x0020;", $thisposthopefully->post_title)." />";
		if ($imageSrc[1]) {
			$metaoutput .=  "<meta property='og:image'  content=".esc_url($imageSrc[0])." />
                        	<meta property='og:image:width' content="."'$imageSrc[1]'"." />
	                        <meta property='og:image:height' content="."'$imageSrc[2]'"." />
				<meta property='og:description' content='Tech, DIY, and if I have time, Photography' />";
		}
		echo $metaoutput;
	}
	/*$extrameta = get_post_meta(get_the_ID(), 'extra_meta', true); 
	echo "$extrameta";*/
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" type="image/x-icon" href="http://ryan.fish/blog/wp-content/uploads/2014/08/favicon.ico"/>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<div style="float: left">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
			<div id = "header-schema-root" itemscope itemtype="http://schema.org/Person">
				<div id = "header-schema-meta">
					<p><span itemprop="name">Ryan Fish</span></p>
					<p><a href="mailto:fishr@mit.edu"><span itemprop="email">fishr@mit.edu</span></a></p>
					<p><span itemprop="jobTitle">Master's Candidate, MechE</span>, <span itemprop="affiliation">MIT</span></p>
					<p><a href="https://www.linkedin.com/pub/ryan-fish/71/5a6/45b">
					<img src="https://static.licdn.com/scds/common/u/img/webpromo/btn_profile_greytxt_80x15.png" width="80" height="15" border="0" alt="View Ryan Fish's profile on LinkedIn"></a></p>
				</div>
				<div  id = "header-schema-meta-image" style = "float: right">
					<img src="<?php echo home_url('/'); ?>wp-content/uploads/2014/06/ryan-fish-avatar.jpg" itemprop="image" />
				</div>
			</div>
			<div style="clear: both;"></div>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
