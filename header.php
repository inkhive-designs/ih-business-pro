<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 
 */
 
get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<?php get_template_part('modules/header/jumbosearch'); ?>
	<?php get_template_part('modules/header/top-bar'); ?>		
	<?php get_template_part('modules/header/masthead'); ?>	
	<?php get_template_part('modules/hero/hero-front'); ?>	
	
	<?php if (class_exists( 'IHSS')) : //Load these files only if the Required Plugin is Installed. ?>
	<?php get_template_part('framework/featured-components/b-showcase' ); ?>
	<?php get_template_part('framework/featured-components/testimonials' ); ?>
	<?php get_template_part('framework/featured-components/parallax' ); ?>
	<?php get_template_part('framework/featured-components/counters' ); ?>
	<?php endif; ?>

    <?php if( class_exists('rt_slider') ) {
        rt_slider::render('framework/featured-components/slider', 'nivo' );
    } ?>

	<?php do_action('ihbp-after-header'); ?>
	
	<div class="mega-container">
	
		<div id="content" class="site-content container">