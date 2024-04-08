<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Picante
 */

get_header();
?>

	<main id="primary" class="site-main single-project">
		<div id="content" role="main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content-project-single', );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( '<', 'picante' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-title">%title</span> <span class="nav-subtitle">' . esc_html__( '>', 'picante' ) . '</span> ',
					)
				);

			endwhile; // End of the loop.
			?>
		</div>
		

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
