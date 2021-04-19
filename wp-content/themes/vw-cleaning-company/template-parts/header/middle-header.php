<?php
/**
 * The template part for top header
 *
 * @package VW Cleaning Company 
 * @subpackage vw-cleaning-company
 * @since vw-cleaning-company 1.0
 */
?>

<div class="middle-header">
  <div class="row">
    <div class="col-lg-3 col-md-3">
      <div class="logo">
        <?php if ( has_custom_logo() ) : ?>
          <div class="site-logo"><?php the_custom_logo(); ?></div>
        <?php endif; ?>
        <?php $blog_info = get_bloginfo( 'name' ); ?>
        <?php if( get_theme_mod('vw_cleaning_company_logo_title_hide_show',true) != ''){ ?>
          <?php if ( ! empty( $blog_info ) ) : ?>
            <?php if ( is_front_page() && is_home() ) : ?>
              <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php else : ?>
              <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php endif; ?>
          <?php endif; ?>
        <?php }?>
        <?php if( get_theme_mod('vw_cleaning_company_tagline_hide_show',true) != ''){ ?>
          <?php
          $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) :
            ?>
            <p class="site-description">
              <?php echo esc_html($description); ?>
            </p>
          <?php endif; ?>
        <?php }?>
      </div>
    </div>
    <div class="col-lg-3 col-md-3">
      <?php if( get_theme_mod( 'vw_cleaning_company_call_text') != '' || get_theme_mod( 'vw_cleaning_company_call') != '') { ?>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-5 call">
            <i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_call_icon','fas fa-phone')); ?>"></i>
          </div>
          <div class="col-lg-9 col-md-9 col-7 call-text">
            <strong><?php echo esc_html(get_theme_mod('vw_cleaning_company_call_text',''));?></strong>
            <p><?php echo esc_html(get_theme_mod('vw_cleaning_company_call',''));?></p>
          </div>
        </div>        
      <?php }?>
    </div>
    <div class="col-lg-3 col-md-3">
      <?php dynamic_sidebar('social-links'); ?>
    </div>
    <div class="col-lg-3 col-md-3">
      <?php if( get_theme_mod( 'vw_cleaning_company_top_btn_url') != '' || get_theme_mod( 'vw_cleaning_company_top_btn_text') != '') { ?>
      <div class="top-btn">
        <a href="<?php echo esc_url(get_theme_mod('vw_cleaning_company_top_btn_url',''));?>"><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_appointment_button_icon','fas fa-calendar-alt')); ?>"></i><?php echo esc_html(get_theme_mod('vw_cleaning_company_top_btn_text',''));?><span class="screen-reader-text"><?php esc_html_e('Appointment Button','vw-cleaning-company'); ?></span></a>
      </div>
      <?php }?>
    </div>
  </div>
</div>