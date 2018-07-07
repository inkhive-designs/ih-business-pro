/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
    wp.customize( 'display_header_text', function( value ) {
        value.bind( function( to ) {
            $( '#text-title-desc' ).toggle();
        });
    } );

    // Header text color.
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            if ( 'blank' === to ) {
                $( '#text-title-desc' ).css({
                    clip: 'rect(1px, 1px, 1px, 1px)',
                    position: 'absolute'
                });
                // Add class for different logo styles if title and description are hidden.
                $( 'body' ).addClass( 'title-tagline-hidden' );
            } else {

                $( '#text-title-desc' ).css({
                    clip: 'auto',
                    position: 'relative'
                });
                $( '.site-branding a' ).css({
                    color: to
                });
                // Add class for different logo styles if title and description are visible.
                $( 'body' ).removeClass( 'title-tagline-hidden' );
            }
        });
    });

    wp.customize( 'ihbp_header_desccolor', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).css( 'color', to );
        } );
    } );

    //Header Text
	wp.customize('ihbp_hero_text_enable', function(value) {
		value.bind(function(headerTextEnable) {
			$('.hero-content').toggle();
		});
	});
	wp.customize('ihbp_heading', function(value) {
	    value.bind(function(headerText) {
	        $('.hero-title').text(headerText);
        });
    });
	wp.customize('ihbp_btn', function(value) {
	    value.bind(function(headertTextButton) {
	        $('.hero-button').text(headertTextButton);
        });
    });

	//Email & Phone
	wp.customize('ihbp_mail_id', function(value) {
		value.bind(function(email) {
			$('.email').text(email);
		});
	});
	wp.customize('ihbp_phone', function(value) {
		value.bind(function(phone) {
            $('.phone').text(phone);
        });
	});

	//Basic Settings
	wp.customize('ihbp_fp_basic_settings_blog_set', function(value) {
		value.bind(function(disableBlogTitle) {
			$('#latest-blog').toggle();
		});
	});
	wp.customize('ihbp_fp_content_set', function(value) {
		value.bind(function(disbaleFrontpageTitle) {
			$('#frontpage-content').toggle();
		});
	});

	//About Us Hero
	wp.customize('ihbp_aboutus_hero_enable', function(value) {
		value.bind(function(aboutusHeroEnable) {
			$('#aboutus-hero').toggle();
		});
	});
	wp.customize('ihbp_aboutus_hero_button', function(value) {
		value.bind(function(aboutusButton) {
			$('.more-button').text(aboutusButton);
		});
	});

	/****Design & Layout ****/

	//Footer
	wp.customize('ihbp_disbale_fcredit_line', function(value) {
		value.bind(function(disableFcLine) {
			$('.credit').toggle();
		});
	});
	wp.customize('ihbp_footer_text', function(value) {
		value.bind(function(footerText) {
			$('.sep').text(footerText);
		});
	});

} )( jQuery );
