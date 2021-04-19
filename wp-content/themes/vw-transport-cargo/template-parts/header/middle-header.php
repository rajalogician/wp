<?php
/**
 * The template part for header
 *
 * @package VW Transport Cargo 
 * @subpackage vw_transport_cargo
 * @since VW Transport Cargo 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row m-0">
      <div class="col-lg-4 col-md-4 p-0">
        <?php dynamic_sidebar('social-widget'); ?>
      </div>
      <div class="col-lg-4 col-md-4">
        <div class="logo">
          <div class="logo-inner">
            <?php if ( has_custom_logo() ) : ?>
              <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <?php $blog_info = get_bloginfo( 'name' ); ?>
              <?php if ( ! empty( $blog_info ) ) : ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                  <?php if( get_theme_mod('vw_transport_cargo_logo_title_hide_show',true) != ''){ ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php } ?>
                <?php else : ?>
                  <?php if( get_theme_mod('vw_transport_cargo_logo_title_hide_show',true) != ''){ ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  <?php } ?>
                <?php endif; ?>
              <?php endif; ?>
              <?php
                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
              ?>
              <?php if( get_theme_mod('vw_transport_cargo_tagline_hide_show',true) != ''){ ?>
                <p class="site-description">
                  <?php echo $description; ?>
                </p>
              <?php } ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3">
        <div class="top-btn">
          <?php if( get_theme_mod( 'vw_transport_cargo_button_text') != '' || get_theme_mod( 'vw_transport_cargo_button_url' )!= '' ) { ?>
            <a href="<?php echo esc_url(get_theme_mod('vw_transport_cargo_button_url',''));?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_button_text',''));?><span class="screen-reader-text"><?php esc_html_e( 'REQUEST A QUOTE','vw-transport-cargo' );?></span></a>
          <?php }?>
        </div>
      </div>
      <?php if( get_theme_mod('vw_transport_cargo_search_hide_show',true) != ''){ ?>
        <div class="col-lg-1 col-md-1">
          <div class="search-box">
            <button type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-search"></i></button>
          </div>
        </div>
      <?php }?>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="serach_inner">
            <?php get_search_form(); ?>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    </div>
    <div class="header-menu <?php if( get_theme_mod( 'vw_transport_cargo_sticky_header') != '') { ?> header-sticky"<?php } else { ?>close-sticky <?php } ?>">
      <?php get_template_part( 'template-parts/header/navigation' ); ?>
    </div>
  </div>
</div>