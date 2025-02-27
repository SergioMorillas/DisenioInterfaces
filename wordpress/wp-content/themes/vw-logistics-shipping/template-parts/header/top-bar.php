<?php
/**
 * The template part for Top Header
 *
 * @package VW Logistics Shipping 
 * @subpackage vw-logistics-shipping
 * @since vw-logistics-shipping 1.0
 */
?>
<!-- Top Header -->
<?php if( get_theme_mod( 'vw_logistics_shipping_header_topbar',true) == 1 || get_theme_mod('vw_logistics_shipping_responsive_topbar_hide',false)) { ?>
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-2 align-self-center text-lg-start text-md-start text-center" >
          <?php if(get_theme_mod('vw_logistics_shipping_location') != ''){ ?>
            <p class="topbar-text mb-lg-0 mb-md-0 mb-3"><i class="<?php echo esc_attr(get_theme_mod('vw_logistics_shipping_location_icon','fas fa-map-marker-alt')); ?> mx-2"></i><?php echo esc_html(get_theme_mod('vw_logistics_shipping_location')); ?></p>
          <?php }?>
        </div>
        <div class="col-lg-2 col-md-3 align-self-center text-lg-start text-md-start text-center">
          <?php if( get_theme_mod( 'vw_logistics_shipping_lite_email','' ) != '') { ?>
            <span class="email mb-lg-0 mb-md-0 mb-3"><i class="<?php echo esc_attr(get_theme_mod('vw_logistics_shipping_mail_icon','fas fa-envelope')); ?> mx-2"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_logistics_shipping_lite_email',''));?>"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_lite_email',''));?></a></span>
          <?php } ?>
        </div>
        <div class="col-lg-3 col-md-4 align-self-center text-lg-start text-md-start text-center">
          <?php if( get_theme_mod('vw_logistics_shipping_topbar_timing') != '' ){ ?>
            <p class="time-text mb-lg-0 mb-md-0 mb-3"><i class="<?php echo esc_attr(get_theme_mod('vw_logistics_shipping_time_icon','fas fa-clock')); ?> mx-2"></i><?php echo esc_html(get_theme_mod('vw_logistics_shipping_topbar_timing',''));?></p>
          <?php }?>
        </div>
        <div class="col-lg-5 col-md-3 align-self-center text-lg-end text-md-end text-center">
          <div class="topbar-social-icon"><?php dynamic_sidebar('social-widget'); ?></div>
        </div>
      </div>
    </div>
  </div>
<?php }?>