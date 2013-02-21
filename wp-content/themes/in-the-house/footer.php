<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package In The House
 * @since In The House 1.0
 */
?>

	<?php if (! is_home()) { ?>
	</div><!-- #main .site-main -->
	<?php } ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
<!-- 		<div class="site-info">
			<?php do_action( 'in_the_house_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'in_the_house' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'in_the_house' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'in_the_house' ), 'in_the_house', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
		</div> --><!-- .site-info -->
 	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>