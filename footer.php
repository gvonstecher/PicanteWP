<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Picante
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-col"><?php dynamic_sidebar( 'footer-sidebar-1' ); ?></div>
		<div class="footer-col"><?php dynamic_sidebar( 'footer-sidebar-2' ); ?></div>			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
