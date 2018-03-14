<?php if (is_front_page() ) : ?>
<div id="hero" data-parallax="scroll" data-speed="0.15" data-image-src="<?php echo get_header_image(); ?>">
	<div class="layer"></div>
	<div class="hero-content">
		<div class="container">
			<?php if (get_theme_mod('ihbp_heading')) : ?>
			<h2 class="hero-title"><?php echo get_theme_mod('ihbp_heading') ?></h2>
			<?php endif; ?>
			<?php if (get_theme_mod('ihbp_btn')) : ?>
			<div class="hero-button-wrapper">
				<a class="hero-button hvr-icon-wobble-horizontal" href="<?php echo get_theme_mod('ihbp_h_url') ?>"><?php echo get_theme_mod('ihbp_btn') ?></a>
			</div>
			<?php endif; ?>
			
		</div>
	</div>	
</div>
<?php endif; ?>