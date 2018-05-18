<?php $options = get_option('rh_settings'); ?>
			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<?php wp_nav_menu(array(
    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
    					'after' => '',                                  // after the menu
    					'link_before' => '',                            // before each link
    					'link_after' => '',                             // after each link
    					'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
					)); ?>
					
					<?php
					if( $options['twitter_url'] || $options['facebook_url'] || $options['instagram_url'] || $options['youtube_url'] || $options['linkedin_url']) {
						echo '<div class="social">';
						
						echo ($options['twitter_url'] != '' ? '<a href="'.$options['twitter_url'].'" target="_blank"><i class="fab fa-twitter"></i></a>' : '');
						
						echo ($options['facebook_url'] != '' ? '<a href="'.$options['facebook_url'].'" target="_blank"><i class="fab fa-facebook"></i></a>' : '');
						
						echo ($options['instagram_url'] != '' ? '<a href="'.$options['instagram_url'].'" target="_blank"><i class="fab fa-instagram"></i></a>' : '');
						
						echo ($options['youtube_url'] != '' ? '<a href="'.$options['youtube_url'].'" target="_blank"><i class="fab fa-youtube"></i></a>' : '');
						
						echo ($options['linkedin_url'] != '' ? '<a href="'.$options['linkedin_url'].'" target="_blank"><i class="fab fa-linkedin-in"></i></a>' : '');
						
						echo '</div>';
					}
					?>
					
					<?php
					if($options['copyright_txt']){
						echo '<p class="copyright">'. $options['copyright_txt'] .'</p>';
					} else {
						echo '<p class="copyright">&copy;' . date('Y') . bloginfo( 'name' ) . '</p>';
					}
					?>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/rarehoney.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site-->