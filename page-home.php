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
                    hero_image
                    hero_title
                    hero_content
                    why_title_top
                    why_reason_1
                    why_reason_2
                    why_reason_3
                    why_title_bottom
                    products_title
                    products_list
                -->


                <!-- template -->
                <div class="page-home">

                    <section class="section hero">
                        <div class="clip"><div class="bg bg-bg-chrome"></div></div>

                        <article>
                            <div class="image-product">
                                <img src="<?php the_field( 'hero_image' ); ?>">
                            </div>

                            <div class="content-hero">
                                <h2><?php the_field( 'hero_title' ); ?></h2>
                                <?php the_field( 'hero_content' ); ?>

                                <div class="text-center">
                                    <a href="/products" class="btn btn-outline">Learn More</a>
                                </div>
                            </div>
                        </article>
                    </section>


                    <section class="section brands">
                        <article>
                            <img src="http://lorempixel.com/180/70/" class="invisible">
                            <img src="http://lorempixel.com/180/70/" class="invisible">
                            <img src="http://lorempixel.com/180/70/" class="invisible">
                            <img src="http://lorempixel.com/180/70/" class="invisible">
                            <img src="http://lorempixel.com/180/70/" class="invisible">
                        </article>
                    </section>


                    <section class="section why">
                        <article>
                            <h2><?php the_field( 'why_title_top' ); ?></h2>

                            <ul>
                                <li class="barbell">
                                    <p class="item-content"><?php the_field( 'why_reason_1' ); ?></p>
                                </li>

                                <li class="formula">
                                    <p class="item-content"><?php the_field( 'why_reason_2' ); ?></p>
                                </li>
                            </ul>

                            <h3><?php the_field( 'why_title_bottom' ); ?></h3>
                        </article>
                    </section>


                    <section class="section what">
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

                                        <div class="divider"></div>
                                    <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                            </div>
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
