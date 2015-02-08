<?php
/**
 * Single Post Template
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
				echo apply_filters( 'thematic_open_id_content', '<div id="content">' . "\n\n" );

	            // start the loop
	            while ( have_posts() ) : the_post();
                ?>

                <!--
                    product_image
                    product_name
                    product_description
                    product_price
                    product_subtitle
                    product_content
                    tab_content_uses
                    tab_content_ingredients
                    tab_content_faq
                -->


                <!-- template -->
                <div class="page-product">

                    <section class="section hero">
                        <article>

                            <header>
                                <h2><?php the_field( 'product_name' ); ?></h2>
                                <p><?php the_field( 'product_description' ); ?></p>
                            </header>

                            <div class="product">
                                <div class="product-image">
                                    <img src="<?php the_field( 'product_image' ); ?>">
                                </div>

                                <div class="product-content">
                                    <h3><?php the_field( 'product_subtitle' ); ?></h3>
                                    <?php the_field( 'product_content' ); ?>

                                    <!-- add to CMS -->
                                    <table class="reasons">
                                        <tr>
                                            <td>Lorem ipsum dolor sit amet</td>
                                            <td>Nunc pulvinar odio vel tortor auctor</td>
                                        </tr>
                                        <tr>
                                            <td>Morbi maximus magna </td>
                                            <td>Etiam blandit urna ac erat cursus</td>
                                        </tr>
                                    </table>

                                    <div class="buttons">
                                        <a href="#" class="btn btn-outline">Order $<?php the_field( 'product_price' ); ?></a>
                                        <p><a href="/products" class="btn btn-link">View All Products</a></p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>


                    <section class="section faq">
                        <div class="clip"><div class="bg bg-bg-chrome"></div></div>

                        <article>
                            <div class="tabs">
                                <ul>
                                    <li class="active"><a href="#uses" class="btn btn-outline" data-toggle="tab">Uses</a></li>
                                    <li><a href="#ingredients" class="btn btn-outline" data-toggle="tab">Ingredients</a></li>
                                    <li><a href="#faq" class="btn btn-outline" data-toggle="tab">FAQ</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="uses" class="tab-pane active">
                                        <?php the_field( 'tab_content_uses' ); ?>
                                    </div>

                                    <div id="ingredients" class="tab-pane">
                                        <?php the_field( 'tab_content_ingredients' ); ?>
                                    </div>

                                    <div id="faq" class="tab-pane">
                                        <?php the_field( 'tab_content_faq' ); ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>

                </div>
                <!-- /template -->


                <?php

    	        // end the loop
        		endwhile;

    	        // calling the widget area 'single-bottom'
    	        get_sidebar('single-bottom');
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

    // calling the standard sidebar
    // thematic_sidebar();

    // calling footer.php
    get_footer();
?>
