<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package VW Logistics Shipping 
 */
?>

<h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'vw-logistics-shipping' ); ?></h2>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.', 'vw-logistics-shipping' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-logistics-shipping' ); ?></p><br />
		<?php get_search_form(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'Dont worry&hellip it happens to the best of us.', 'vw-logistics-shipping' ); ?></p><br />
	<div class="more-btn mt-4 mb-4">
		<a class="p-3" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_button_text',__('Go Back','vw-logistics-shipping')));?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_button_text',__('Go Back','vw-logistics-shipping')));?></span></a>
	</div>
<?php endif; ?>