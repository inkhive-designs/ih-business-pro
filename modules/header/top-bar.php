<div id="top-bar">
	<div class="container top-bar-inner">
		<div id="contact-icons">
			<?php if (get_theme_mod('ihbp_mail_id')) : ?>
			<div class="icon">
				<span class="fa fa-envelope"></span>
				<span class="value"><?php echo esc_html( get_theme_mod('ihbp_mail_id') ); ?></span>
			</div>
			<?php endif; ?>
			<?php if (get_theme_mod('ihbp_phone')) : ?>
			<div class="icon">
				<span class="fa fa-phone"></span>
				<span class="value"><?php echo esc_html( get_theme_mod('ihbp_phone') ); ?></span>
			</div>
			<?php endif; ?>
		</div>
		
		<div id="social-icons">
			<?php get_template_part('modules/social/social', 'fa'); ?>
		</div>
	</div>
</div>