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
<?php if ( is_front_page() && is_home() ) : ?>
    <div id="latest-blog" class="featured-section-area">
        <div class="section-title"><span><?php _e("Latest Posts", 'ih-business-pro'); ?></span></div>
        <?php if ( have_posts() ) : ?>
            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <?php do_action('ihbp_blog_layout'); 	?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
        </main><!-- #main -->
        <?php if ( have_posts() ) { the_posts_pagination(array( 'mid_size' => 2 )); } ?>
    </div>
<?php endif; ?>

<?php if ( is_front_page() && !is_home() && !get_theme_mod('ihbp_fp_basic_settings_blog_set', true)) : ?>
    <div id="latest-blog" class="featured-section-area">
        <div class="section-title"><span><?php _e("From the Blog", 'ih-business-pro'); ?></span></div>
        <?php
        $args = array( 'posts_per_page' =>  3 );
        $lastposts = get_posts( $args );
        foreach ( $lastposts as $post ) : setup_postdata( $post ); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('grid ihbp grid_3_column col-md-4 col-sm-4 col-xs-12'); ?>>
                <div class="featured-thumb col-md-12 col-sm-12">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('ihbp-pop-thumb'); ?></a>
                    <?php else: ?>
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
                    <?php endif; ?>
                    <div class="postedon"><?php ihbp_posted_on_date(); ?></div>
                </div><!--.featured-thumb-->

                <div class="out-thumb col-md-12 col-sm-12">
                    <a class="cat-link" href="<?php echo $category_link ?>"><?php echo $category_name ?></a>
                    <header class="entry-header">
                        <h2 class="entry-title title-font"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    </header><!-- .entry-header -->
                </div>
            </article><!-- #post-## -->
        <?php endforeach; wp_reset_postdata(); ?>
    </div>
<?php endif; ?>

<?php if ( is_front_page() && !is_home() && !get_theme_mod('ihbp_fp_content_set', true)) : ?>
    <div id="latest-blog" class="featured-section-area">
        <div class="section-title"><span><?php the_title(); ?></span></div>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php
                while (have_posts()): the_post();

                    the_content();
                endwhile; ?>
                <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'ih-business-pro' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-## -->
    </div>
<?php endif; ?>

<?php get_footer(); ?>
