<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package 
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses ihbp_header_style()
 * @uses ihbp_admin_header_style()
 * @uses ihbp_admin_header_image()
 */
function ihbp_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ihbp_custom_header_args', array(
		'default-text-color'     => '#000',
		'default-image'			 => get_template_directory_uri()."/assets/images/header.jpg",
		'width'  				 => 1920,
		'height'				 => 667,
		'flex-height'            => true,
		'wp-head-callback'       => 'ihbp_header_style',
	) ) );
    register_default_headers( array(
            'default-image'    => array(
                'url'            => '%s/assets/images/header.jpg',
                'thumbnail_url'    => '%s/assets/images/header.jpg',
                'description'    => __('Default Header Image', 'ih-business-pro')
            )
        )
    );
}
add_action( 'after_setup_theme', 'ihbp_custom_header_setup' );

if ( ! function_exists( 'ihbp_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see ihbp_custom_header_setup().
 */
function ihbp_header_style() {
	?>

	<?php
    $header_text_color = get_header_textcolor();

    /*
     * If no custom options for text are set, let's bail.
     * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
     */
    if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
        return;
    }

    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style type="text/css">
        #hero {
            background-size: <?php echo esc_html(get_theme_mod('ihbp_himg_style','cover')); ?>;
            background-position-x: <?php echo esc_html(get_theme_mod('ihbp_himg_align','center')); ?>;
            background-repeat: <?php echo  esc_html(get_theme_mod('ihbp_himg_repeat')) ? "repeat" : "no-repeat" ?>;
        }
        <?php
        // Has the text been hidden?
        if ( ! display_header_text() ) :
            ?>
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }
        <?php
        // If the user has set a custom color for the text use that.
        else :
            ?>
        .site-title a,
        .site-description {
            color: #<?php echo esc_attr( $header_text_color ); ?>;
        }
        <?php endif; ?>
    </style>
    <?php
}
endif; // ihbp_header_style