<?php
/**
 * The template part for header
 *
 * @package VW Logistics Shipping 
 * @subpackage vw-logistics-shipping
 * @since vw-logistics-shipping 1.0
 */
?>

<div id="middle-header"class="<?php if( get_theme_mod( 'vw_logistics_shipping_sticky_header', false) == 1 || get_theme_mod( 'vw_logistics_shipping_stickyheader_hide_show', false) == 1) { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
	<div class="container">
		<div class="row middle-header-section ">
			<div class="col-lg-2 col-md-4 col-8 align-self-center py-3 py-lg-0 py-md-0">
				<div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_logistics_shipping_logo_title_hide_show',true) == 1){ ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_logistics_shipping_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_logistics_shipping_tagline_hide_show',false) == 1){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
    		</div>
			</div>
			<div class="col-lg-8 col-md-3 col-4 align-self-center menu-section-sec">
				<div class="menu-section">
		      <?php get_template_part('template-parts/header/navigation'); ?>
		     </div>
			</div>
			<div class="col-lg-2 col-md-5 col-12 py-3 py-lg-0 py-md-0 align-self-center text-lg-end text-md-end text-center">
				<?php if ( get_theme_mod('vw_logistics_shipping_topbar_button_label','Get A Quote') != '' ) {?>
          <div class ="topbar-button">
	          <a href="<?php echo esc_url(get_theme_mod('vw_logistics_shipping_topbar_button_url',false));?>"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_topbar_button_label','Get A Quote'));?><span class="screen-reader-text"><?php esc_html_e( 'Get A Quote','vw-logistics-shipping');?></span></a>
	        </div>
	      <?php }?>
			</div>
		</div>
	</div>
</div>

