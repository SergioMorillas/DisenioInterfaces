<?php
/**
 * The template part for displaying grid post
 *
 * @package VW Logistics Shipping 
 * @subpackage vw-logistics-shipping
 * @since vw-logistics-shipping 1.0
 */
?>

<?php  
  $vw_logistics_shipping_archive_year  = get_the_time('Y'); 
  $vw_logistics_shipping_archive_month = get_the_time('m'); 
  $vw_logistics_shipping_archive_day   = get_the_time('d'); 
?>
<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="grid-post-main-box mt-3 wow zoomInDown delay-1000" data-wow-duration="2s">
	    	<?php if( get_theme_mod( 'vw_logistics_shipping_grid_image_hide_show',true) == 1) { ?>
		      	<div class="box-image">
		          	<?php 
			            if(has_post_thumbnail()) { 
			              the_post_thumbnail(); 
			            }
		          	?>
		        </div>
		    <?php } ?>
	        <h2 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <?php if( get_theme_mod( 'vw_logistics_shipping_grid_postdate',true) == 1 || get_theme_mod( 'vw_logistics_shipping_grid_author',true) == 1 || get_theme_mod( 'vw_logistics_shipping_grid_comments',true) == 1) { ?>
	            <div class="post-info">
	                <?php if(get_theme_mod('vw_logistics_shipping_grid_postdate',true)==1){ ?>
	                    <span class="entry-date"><i class="<?php echo esc_attr(get_theme_mod('vw_logistics_shipping_grid_postdate_icon','me-2 fas fa-calendar-alt')); ?>"></i><a href="<?php echo esc_url( get_day_link( $vw_logistics_shipping_archive_year, $vw_logistics_shipping_archive_month, $vw_logistics_shipping_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('vw_logistics_shipping_grid_post_meta_field_separator','|'));?></span>
	                <?php } ?>

	                <?php if(get_theme_mod('vw_logistics_shipping_grid_author',true)==1){ ?>
	                    <span class="entry-author"> <i class="<?php echo esc_attr(get_theme_mod('vw_logistics_shipping_grid_author_icon','me-2 far fa-user')); ?>"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('vw_logistics_shipping_grid_post_meta_field_separator','|'));?></span>
	                <?php } ?>

	                <?php if(get_theme_mod('vw_logistics_shipping_grid_comments',true)==1){ ?>
	                    <span class="entry-comments"> <i class="<?php echo esc_attr(get_theme_mod('vw_logistics_shipping_grid_comments_icon','me-2 fas fa-comments')); ?>"></i><?php comments_number( __('0 Comment', 'vw-logistics-shipping'), __('0 Comments', 'vw-logistics-shipping'), __('% Comments', 'vw-logistics-shipping') ); ?> </span>
	                <?php } ?>
	                <?php vw_logistics_shipping_edit_link(); ?>
	            </div>
	        <?php } ?>
	        <div class="new-text">
	        	<div class="entry-content">
			       <p>
		          <?php $vw_logistics_shipping_theme_lay = get_theme_mod( 'vw_logistics_shipping_grid_excerpt_settings','Excerpt');
			          if($vw_logistics_shipping_theme_lay == 'Content'){ ?>
			            <?php the_content(); ?>
			          <?php }
			          if($vw_logistics_shipping_theme_lay == 'Excerpt'){ ?>
			            <?php if(get_the_excerpt()) { ?>
			              <?php $vw_logistics_shipping_excerpt = get_the_excerpt(); echo esc_html( vw_logistics_shipping_string_limit_words( $vw_logistics_shipping_excerpt, esc_attr(get_theme_mod('vw_logistics_shipping_grid_excerpt_number','30')))); ?><?php echo esc_html(get_theme_mod('vw_logistics_shipping_grid_excerpt_suffix',''));?>
			            <?php }?>
			          <?php }?>
			       </p>
	        	</div>
	        </div>
	        <?php if( get_theme_mod('vw_logistics_shipping_grid_button_text','Read More') != ''){ ?>
		        <div class="more-btn mt-4">
	            	<a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_grid_button_text',__('Read More','vw-logistics-shipping')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_grid_button_text',__('Read More','vw-logistics-shipping')));?></span></a>
	          	</div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>