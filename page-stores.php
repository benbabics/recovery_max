<?php
/**
 * Page Template
 *
 * …
 *
 * @package Thematic
 * @subpackage Templates
 */

    // calling the header.php
    get_header();

    // action hook for placing content above #container
    thematic_abovecontainer();
?>

		<div id="container">

			<?php
				// action hook for placing content above #content
				thematic_abovecontent();

				// filter for manipulating the element that wraps the content
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n" );

				// calling the widget area 'page-top'
	            get_sidebar('page-top');

	            // start the loop
	            while ( have_posts() ) : the_post();

				// action hook for placing content above #post
	            thematic_abovepost();
	        ?>


                <!--
                    hero_title
                    hero_subtitle
                    state_retailers_list
                -->

                <!-- template -->
                <div class="page-stores">

                    <section class="section hero">
                        <div class="clip"><div class="bg bg-bg-chrome"></div></div>

                        <article>
                            <header>
                                <h2><?php the_field( 'hero_title' ); ?></h2>
                                <p><?php the_field( 'hero_subtitle' ); ?></p>
                            </header>

                            <?php add_northamerica_map(); ?>
                        </article>
                    </section>


                    <section class="section retailers">
                        <article class="retailers-national-content">
                            <h3>National Retailers</h3>

                            <?php
                            $post_objects = get_field( 'national_retailers_list' );

                            if( $post_objects ): ?>
                                <table class="retailers-content">
                                    <tbody>
                                        <tr>
                                            <?php foreach( $post_objects as $post_object): ?>
                                                <td><img src="<?php echo the_field( 'retailer_image', $post_object->ID ); ?>" alt="<?php the_field( 'retailer_name', $post_object->ID ); ?>"></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tbody>
                                </table>
                                </ul>
                            <?php endif; ?>
                        </article>

                        <article class="retailers-regional-content">
                            <h3>Retailers In Your Region</h3>

                            <?php
                            $post_objects = get_field( 'state_retailers_list' );

                            if( $post_objects ): ?>
                                <?php foreach( $post_objects as $post_object): ?>

                                    <div class="state">
                                        <h4 class="ui-underline"><?php the_field( 'state_name', $post_object->ID ); ?></h4>
                                        <?php the_field( 'retailers_list', $post_object->ID ); ?>
                                    </div>

                                <?php endforeach; ?>
                            <?php endif; ?>
                        </article>
                    </section>

                </div>
                <!-- /template -->


				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

				<?php

	                // creating the post header
	                // thematic_postheader();
				?>

					<div class="entry-content">

						<?php
	                    	the_content();

	                    	wp_link_pages( "\t\t\t\t\t<div class='page-link'>" . __( 'Pages: ', 'thematic' ), "</div>\n", 'number' );

	                    	edit_post_link( __( 'Edit', 'thematic' ), "\n\t\t\t\t\t\t" . '<span class="edit-link">' , '</span>' . "\n" );
	                    ?>

					</div><!-- .entry-content -->

				</div><!-- #post -->

			<?php
				// action hook for inserting content below #post
	        	thematic_belowpost();

       			// action hook for calling the comments_template
       			thematic_comments_template();

	        	// end loop
        		endwhile;

	        	// calling the widget area 'page-bottom'
	        	get_sidebar( 'page-bottom' );
	        ?>

			</div><!-- #content -->

			<?php
				// action hook for placing content below #content
				thematic_belowcontent();
			?>

		</div><!-- #container -->

<?php
    // action hook for placing content below #container
    thematic_belowcontainer();

    // calling footer.php
    get_footer();
?>
