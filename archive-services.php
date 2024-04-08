<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Picante
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div role="main">
            <header class="header-services">
                        <?php 
                            $post = get_post(416);
                            the_content(); 
                        ?>
            </header>
            <div id="content" class="container container-services">
                    <?php if ( have_posts() ) : ?>

                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();

                        /*
                        * Include the Post-Type-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                        */
                        get_template_part( 'template-parts/content-services' );

                    endwhile; 
                    ?>
                <?php the_posts_navigation();

                else :

                get_template_part( 'template-parts/content', 'none' );

                endif;
                ?>
            </div>
		
		</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
