<?php //This file ensures each section gets a consistent Section Title
	function ihbp_section_title( $title ) { 
		if ($title != 'ih-business-pro') : ?>
			<div class="section-title">
		    	<span><?php echo $title ?></span>
		    </div>
	<?php endif; 
	} ?>