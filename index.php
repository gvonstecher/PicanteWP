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
$uploads  = wp_upload_dir();
?>

	<main id="primary" class="site-main">
		<div id="content" role="main">

			<section id="home-hero" class="bg-orange home-hero">
				<div class="container">
				<picture>
					<source srcset="<?php echo $uploads['baseurl'];?>/2023/05/banner-largo-scaled.webp 1080w" media="(min-width: 960px)" />
					<img src="<?php echo $uploads['baseurl'];?>/2023/05/banner-corto.webp" />
				</picture>
					<?php 
						$post = get_post(155);
					?>
						<div class="home-hero">
							<?php the_content(); ?>
						</div>
				</div>
			</section>
			<section id="home-catalogue"  class="bg-black">	
				<div class="container">
				<?php
					$args = array(
						'post_type' => 'project',
						'posts_per_page' => -1,
						'category_name' => 'destacado'
					);
					
					$the_query = new WP_Query( $args ); 
					
					if ( $the_query->have_posts() ) :
				?>
						<header>
							<h2>our catalogue</h2>
						</header>
						<div class="home-catalogue-list">
							<?php	
								/* Start the Loop */
								while ( $the_query->have_posts() ) :
									$the_query->the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', 'home'  );

								endwhile;
							?> 
							<a href="/project/" class="home-catalogue-btn">show all catalogue</a>
						</div>
				<?php 
					else :
						get_template_part( 'template-parts/content', 'none' );

					endif;
				?>
				</div>
			</section>
			<section id="home-tourdates"  class="bg-black">
				<div class="container">
					<header>
						<h2>Tour dates</h2>
						<?php 
							$post = get_post(157);
							echo $post->post_content;
						?>
					</header>

					<?php 
						$args = array(
							'post_type' => 'tourdates',
							'posts_per_page' => -1
						);
						
						$the_query = new WP_Query( $args ); 
						if ( $the_query->have_posts() ){
					?>
						<div class="home-tourdates-list">
							<?php	
								/* Start the Loop */
								while ( $the_query->have_posts() ) :
									$the_query->the_post();
							?>
									<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
										<p class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>
										<div>
											<?php the_content(); ?>
										</div>
									</article>
							<?php
								endwhile;
							?> 
						</div>
					<?php 
						}else{
							echo "<p>We don't have any schedule dates at the moment</p>";

						};
					?>
				</div>
			</section>
			<section id="home-aboutus"  class="bg-black">
				<div class="container">
						<?php 
							$post = get_post(341);
							echo $post->post_content;
						?>
				</div>
			</section>
		</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
