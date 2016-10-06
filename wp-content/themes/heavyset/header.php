<?php
/**
 * The Header template for our theme
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
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<?php get_template_part('styles'); ?>

<?php if (is_ios()) : ?>
	<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ios.css" rel="stylesheet" media="screen">
<?php endif; ?>
<?php if (is_mobile()) : ?>
	<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/mobile.css" rel="stylesheet" media="screen">
<?php endif; ?>

</head>

<body <?php body_class(); ?>>

	
<div id="main-container">
<div id="page" class="hfeed site">
	
<!-- NAVBAR
================================================== -->
  <div class="navbar-wrapper">
	  
	<nav class="navbar navbar-fixed-top">
		<div class="container">
            <div class="navbar-header">
	          <button type="button" class="nav-toggle collapsed navbar-btn btn-default btn-lg visible-xs" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
              </button>
              
	              <div class="col-sm-3">
					  <!-- Desktop logo -->
		              <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="hidden-xs"></a>
					  <?php else : ?>
							<a href="<?php bloginfo('url'); ?>" id="logo" class="brand hidden-xs"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
					  <?php endif; ?>
					  
					  <!-- Mobile logo -->
					  <?php if ( get_theme_mod( 'themeslug_mobile_logo' ) ) : ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="visible-xs"></a>
					  <?php else : ?>
							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo get_theme_mod( 'themeslug_logo' ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' id="logo" class="visible-xs"></a>
					  <?php endif; ?>
	              </div><!-- /.col3 -->
	              <div class="col-sm-9 text-right">
		                <!-- empty column, extra links above the nav can go here -->
	              </div><!-- /.col9 -->
            </div><!-- /.navbar-header -->
              
            <div id="navbar" class="navbar-collapse collapse">
              <?php /* wp_nav_menu( array('menu' => 'Main', 'container' => '', 'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>' )); */ ?>
              <?php get_template_part('mega-menu'); ?>
            </div>
		</div><!-- /.container -->
    </nav>
	
  </div><!-- /.navbar-wrapper -->

<div class="main-content">
<?php if (is_front_page()) : ?>
	<?php /* get_template_part('carousel'); */ ?>
	<?php get_template_part('video'); ?>
<?php endif; ?>
	    
	<div id="main" class="wrapper">