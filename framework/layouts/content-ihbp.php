<?php
/**
 * @package Hanne
 */
$perma_cat = get_post_meta($post->ID , '_category_permalink', true);
if ( $perma_cat != null ) {
$cat_id = $perma_cat['category'];
$category = get_category($cat_id);
} else {
$categories = get_the_category();
$category = $categories[0];
}
$category_link = get_category_link($category);
$category_name = $category->name; 
?>

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