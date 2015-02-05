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
                    products_title
                    products_list
                    the_what_content
                    testimonial_title
                    testimonial_list
                -->


                <!-- template -->
                <div class="page-products">

                    <section class="section hero">
                        <div class="clip"><div class="bg bg-bg-chrome"></div></div>

                        <article>
                            <h3><?php the_field( 'products_title' ); ?></h3>

                            <div class="products">

                                <?php
                                $post_objects = get_field( 'products_list' );

                                if( $post_objects ): ?>
                                    <ul>
                                    <?php foreach( $post_objects as $post_object): ?>

                                        <div class="product">
                                            <img src="<?php echo the_field( 'product_thumbnail', $post_object->ID ); ?>">
                                            <div class="product-content">
                                                <h4><?php the_field( 'product_name', $post_object->ID ); ?></h4>
                                                <p><?php the_field( 'product_description', $post_object->ID ); ?></p>
                                                <a href="<?php echo get_permalink( $post_object->ID ); ?>">View</a>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                            </div>
                        </article>
                    </section>


                    <section class="section why">
                        <article>
                            <div class="content-why"><?php the_field( 'the_what_content' ); ?></div>
                        </article>
                    </section>


                    <section class="section customers">
                        <h2><?php the_field( 'testimonial_title' ); ?></h2>

                        <div class="testimonials">

                            <?php
                                $post_objects = get_field( 'testimonial_list' );

                                if( $post_objects ): ?>
                                    <ul>
                                    <?php foreach( $post_objects as $post_object): ?>

                                        <div class="testimonial">
                                            <div class="avatar">
                                                <div class="avatar-content">
                                                    <img src="<?php echo the_field( 'person_image', $post_object->ID ); ?>">
                                                </div>
                                            </div>
                                            <div class="testimonial-content">
                                                <blockquote><?php the_field( 'testimonial_text', $post_object->ID ); ?></blockquote>
                                                <p class="author"><?php the_field( 'person_name', $post_object->ID ); ?></p>
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                        </div>
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
