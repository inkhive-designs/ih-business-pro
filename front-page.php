<?php
/**
 * The main template file.
 *
 * This is the Default Front Page of the Theme
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package hanne
 */

get_header(); ?>

	<div id="primary" class="content-areas featured-section-area col-sm-12">
		<?php if ( is_home() ) : ?>
			<div class="section-title"><span><?php _e("From the Blog", 'ih-business-pro'); ?></span></div> <?php
		endif; ?>
		
		<main id="main" class="site-main <?php do_action('ihbp_masonry_class') ?>" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 */
					do_action('ihbp_blog_layout'); 
					
				?>

			<?php endwhile; ?>

			<?php //the_posts_pagination( array( 'mid_size' => 2 ));; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		
		<?php if ( have_posts() ) { the_posts_pagination(array( 'mid_size' => 2 )); } ?>
		
	</div><!-- #primary -->

<?php get_footer(); ?>
