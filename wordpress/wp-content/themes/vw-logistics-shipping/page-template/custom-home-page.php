<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_logistics_shipping_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_logistics_shipping_slider_hide_show', true) != '' || get_theme_mod( 'vw_logistics_shipping_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">      
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_logistics_shipping_slider_speed',4000)) ?>">
        <?php $vw_logistics_shipping_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_logistics_shipping_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_logistics_shipping_pages[] = $mod;
            }
          }
          if( !empty($vw_logistics_shipping_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_logistics_shipping_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <?php if( get_theme_mod('vw_logistics_shipping_small_slider_text') != '' ){ ?>
                    <div class="wow slideInRight delay-1000" data-wow-duration="2s">
                      <span class="slider-small-text"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_small_slider_text',''));?></span>
                    </div>
                  <?php }?>
                  <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="wow slideInRight delay-1000" data-wow-duration="2s"><?php $vw_logistics_shipping_excerpt = get_the_excerpt(); echo esc_html( vw_logistics_shipping_string_limit_words( $vw_logistics_shipping_excerpt, esc_attr(get_theme_mod('vw_logistics_shipping_slider_excerpt_number','20')))); ?></p>
                  <?php
                    $vw_logistics_shipping_button_text = get_theme_mod('vw_logistics_shipping_slider_button_text','Explore More');
                    $vw_logistics_shipping_button_link = get_theme_mod('vw_logistics_shipping_slider_button_link', '');
                    if (empty($vw_logistics_shipping_button_link)) {
                      $vw_logistics_shipping_button_link = get_permalink();
                    }
                    if ($vw_logistics_shipping_button_text || !empty($vw_logistics_shipping_button_link)) { ?>
                    <div class="more-btn my-3 my-lg-4 my-md-4 wow slideInRight delay-1000" data-wow-duration="2s">
                      <?php if( get_theme_mod('vw_logistics_shipping_slider_button_text','Explore More') != ''){ ?>
                          <a href="<?php echo esc_url($vw_logistics_shipping_button_link); ?>" class="button redmor">
                          <?php echo esc_html($vw_logistics_shipping_button_text); ?>
                            <span class="screen-reader-text"><?php echo esc_html($vw_logistics_shipping_button_text); ?></span>
                          </a>
                        <?php } ?>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
         <?php if(get_theme_mod( 'vw_logistics_shipping_slider_form_hide_show', true) != '') { ?>
          <div class="form-sec-slider">
            <?php echo do_shortcode(get_theme_mod('vw_logistics_shipping_advance_slider_form_shortcode')); ?>
          </div>
        <?php }?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
       
      </div> 
    </section>
  <?php }?>

  <?php do_action( 'vw_logistics_shipping_after_slider' ); ?>

<!-- About Section -->
<?php if(get_theme_mod('vw_logistics_shipping_about_setting') != '' || get_theme_mod('vw_logistics_shipping_section_small_title') != '' || get_theme_mod('vw_logistics_shipping_about_name') != '') {?>
  <section id="about-section" class="p-lg-5 p-4">
    <div class="container">
      <?php
        $vw_logistics_shipping_postData1 =  get_theme_mod('vw_logistics_shipping_about_setting');
        if($vw_logistics_shipping_postData1){
          $args = array( 
            'p' => esc_html($vw_logistics_shipping_postData1 ,'vw-logistics-shipping'),
            'post_type' => 'post',
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 0;
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="row">
                <?php if (has_post_thumbnail()){?>
                  <div class="col-lg-5 col-md-5 mb-4 align-self-center about-img">
                    <div class="abtimg">
                      <?php the_post_thumbnail(); ?>
                    </div>
                  </div>
                <?php }?>
                <div class="<?php if (has_post_thumbnail()){?> col-lg-7 col-md-7 <?php } else {?> col-lg-12 col-md-12 <?php }?> align-self-center about-content">
                  <?php if( get_theme_mod('vw_logistics_shipping_section_small_title') != '' ){ ?>
                  <p class="small-title"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_section_small_title'));?></p>
                  <?php }?>
                  <a class="main-heading" href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
                  <p class="about-sec-para"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_logistics_shipping_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_logistics_shipping_about_excerpt_number','30')))); ?></p>
                  <div class="about-img-list">
                    <div class="row">
                      <?php for ($i=1; $i <= 2 ; $i++) { ?>
                       <div class="col-lg-6 col-md-6 mb-3 align-self-center">
                         <i class="me-3 <?php echo esc_attr(get_theme_mod('vw_logistics_shipping_about_img_list_icon'.$i, '')); ?>"></i><span class="img-list mb-4"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_about_img_page_list'.$i));?></span>
                       </div>
                      <?php }?>
                    </div>
                  </div>
                  <div class="about-list mb-3">
                    <div class="row">
                      <?php for ($i=1; $i <= 2 ; $i++) { ?>
                       <div class="col-lg-12 col-md-6 mb-3 align-self-center">
                         <i class="me-3 <?php echo esc_attr(get_theme_mod('vw_logistics_shipping_about_list_icon'.$i, 'fas fa-check')); ?>"></i> <span class="list mb-4"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_about_page_list'.$i));?></span>
                       </div>
                      <?php }?>
                    </div>
                  </div>
                  <div class="about-btn">
                    <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_about_button_text',__('Learn More','vw-logistics-shipping')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_logistics_shipping_about_button_text',__('Learn More','vw-logistics-shipping')));?></span></a>
                  </div>
                </div>
              </div>
            <?php endwhile; 
            wp_reset_postdata();?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        }?>
      </div>
    </section>
<?php }?>

<?php do_action( 'vw_logistics_shipping_after_service' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>