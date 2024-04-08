<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Picante
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => 1
        );
        $the_query = new WP_Query( $args ); 
        
        if ( $the_query->have_posts() ) : 

			/* Start the Loop */
			while ( $the_query->have_posts() ) : 
                $the_query->the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
