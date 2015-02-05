<?php
/**
 * Footer Template
 *
 * This template closes #main div and displays the #footer div.
 *
 * Thematic Action Hooks: thematic_abovefooter thematic_belowfooter thematic_after
 * Thematic Filters: thematic_close_wrapper can be used to remove the closing of the #wrapper div
 *
 * @package Thematic
 * @subpackage Templates
 */
?>
		<?php // action hook for placing content above the closing of the #main div
			thematic_abovemainclose();
		?>

		</div><!-- #main -->

    	<?php
			// action hook for placing content above the footer
			thematic_abovefooter();

			// Filter provided for altering output of the footer opening element
    		echo ( apply_filters( 'thematic_open_footer', '<div id="footer">' ) );
    	?>

        <div class="container">
            <a href="#header" class="btn-top-page">&nbsp;</a>

            <div class="nav-links">
                <?php echo  wp_nav_menu( thematic_nav_menu_args() ); ?>
            </div>

            <div class="social-links">
                <a href="#"><i class="icon-gplus"></i></a>
                <a href="#"><i class="icon-twitter"></i></a>
                <a href="#"><i class="icon-facebook"></i></a>
                <p class="copyright">Copyright 2015 Company Name, All Rights Reserved</p>
            </div>
        </div>

		<?php
			// Filter provided for altering output of the footer closing element
    		echo ( apply_filters( 'thematic_close_footer', '</div><!-- #footer -->' . "\n" ) );

   			// action hook for placing content below the footer
			thematic_belowfooter();
    	?>

	<?php
		// Filter provided for altering output of wrapping element follows the body tag
    	if ( apply_filters( 'thematic_close_wrapper', true ) )
    		echo ( '</div><!-- #wrapper .hfeed -->' . "\n" );


		// action hook for placing content before closing the BODY tag
		thematic_after();

		// calling WordPress' footer action hook
		wp_footer();
	?>

</body>
</html>
