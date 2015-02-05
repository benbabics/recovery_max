<?php
/**
 * Header Template
 *
 * This template calls a series of functions that output the head tag of the document.
 * The body and div #main elements are opened at the end of this file.
 *
 * @package Thematic
 * @subpackage Templates
 */

	// Create doctype
	thematic_create_doctype();
	echo " ";
	language_attributes();
	echo ">\n";

	// Opens the head tag
	thematic_head_profile();

	// Create the meta content type
	thematic_create_contenttype();

	// Create the title tag
	thematic_doctitle();

	// Create the meta description
	thematic_show_description();

	// Create the tag <meta name="robots"
	thematic_show_robots();

	// Legacy feedlink handling
	if ( current_theme_supports( 'thematic_legacy_feedlinks' ) ) {
		// Creating the internal RSS links
		thematic_show_rss();

		// Create comments RSS links
		thematic_show_commentsrss();
	}

	// Create pingback adress
	thematic_show_pingback();

	/* The function wp_head() loads Thematic's stylesheet and scripts.
	 * Calling wp_head() is required to provide plugins and child themes
	 * the ability to insert markup within the <head> tag.
	 */
	wp_head();
?>
</head>

<?php
	// Create the body element and dynamic body classes
	thematic_body();

	// Action hook to place content before opening #wrapper
	thematic_before();
?>
	<?php
		// Filter provided for removing output of wrapping element follows the body tag
		if ( apply_filters( 'thematic_open_wrapper', true ) )
  		  echo ( '<div id="wrapper" class="hfeed">' );

		// Action hook for placing content above the theme header
		thematic_aboveheader();
	?>


		<?php
			// Filter provided for altering output of the header opening element
			echo ( apply_filters( 'thematic_open_header',  '<div id="header">' ) );
    	?>


        <div class="container">
            <div class="brand">
                <a href="/home"><?php echo add_brand_logo(); ?></a>
            </div>

            <nav class="navigation">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-collapsible">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="hidden-xs">
                    <?php echo  wp_nav_menu( thematic_nav_menu_args() ); ?>
                </div>
            </nav>
        </div>
        <div class="hidden-sm hidden-md hidden-lg">
            <menu id="menu-collapsible" class="collapse">
                <?php echo  wp_nav_menu( thematic_nav_menu_args() ); ?>
            </menu>
        </div>


    	<?php
    		// Filter provided for altering output of the header closing element
			echo ( apply_filters( 'thematic_close_header', '</div><!-- #header-->' ) );
		?>

    	<?php
			// Action hook for placing content below the theme header
			thematic_belowheader();
    	?>

	<div id="main">
