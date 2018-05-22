<div id="blog-hero" class="featured-image cf">

	<?php if ( is_active_sidebar( 'sidebar2' ) ) : ?>

		<?php
			dynamic_sidebar( 'sidebar2' );
	
			if( is_archive() ) {
				echo '<div class="page-title">';
				the_archive_title( '<h1>', '</h1>' );
				the_archive_description();
				echo '</div>';
			}
		?>

	<?php endif; ?>

</div>