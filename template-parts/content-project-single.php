<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Picante
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header bg-orange">
		<div class="container flex">
			<div class="thumb-container">
			<?php 
				$img_logo = get_field('img_logo');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( !empty( $img_logo ) ): ?>
					<img src="<?php echo esc_url($img_logo['url']); ?>" alt="<?php echo esc_attr($img_logo['alt']); ?>" />
				<?php endif; ?>
			</div>
			<div class="title-technical">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
				<div class="meta">
					<?php if(get_field('format')) { echo '<b>Format: </b>' . get_field('format') . '<br/>'; } ?>
					<?php if(get_field('genre')) { echo '<b>Genre: </b>' . get_field('genre') . '<br/>'; } ?>
					<?php if(get_field('target')) { echo '<b>Target: </b>' . get_field('target') . '<br/>'; } ?>
					<?php if(get_field('technique')) { echo '<b>Technique: </b>' . get_field('technique') . '<br/>'; } ?>
					<?php if(get_field('producer')) { echo '<b>Producer: </b>' . get_field('producer') . '<br/>'; } ?>
					<?php if(get_field('creators')) { echo '<b>Creators: </b>' . get_field('creators') . '<br/>'; } ?>
					<?php if(get_field('status')) { echo '<b>Status: </b>' . get_field('status') . '<br/>'; } ?>
				</div>
				<?php if(has_excerpt()){ ?>
					<div class="project-overview">
						<span>Project Overview</span>
						<?php the_excerpt(); ?>
					</div>
				<?php } ?>
			</div><!-- .entry-meta -->
		</div>
	</header><!-- .entry-header -->


	<div class="entry-content bg-black first">
		<div class="container">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'picante' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			?>
		</div>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'picante' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
