<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_transport_cargo_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_transport_cargo_slider_hide_show') != '') { ?>

  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $vw_transport_cargo_slider_pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_transport_cargo_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $vw_transport_cargo_slider_pages[] = $mod;
          }
        }
        if( !empty($vw_transport_cargo_slider_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_transport_cargo_slider_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_transport_cargo_slider_excerpt_number','30')))); ?></p>
                <?php if( get_theme_mod('vw_transport_cargo_slider_button_text','READ MORE') != ''){ ?>
                  <div class="more-btn">
                    <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_slider_button_text',__('READ MORE','vw-transport-cargo')));?><i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_slider_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_transport_cargo_slider_button_text',__('READ MORE','vw-transport-cargo')));?></span></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php $i++; endwhile; 
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-transport-cargo' );?></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-transport-cargo' );?></span>
      </a>
    </div>
    <div class="clearfix"></div>
  </section>

  <?php } ?>

  <?php do_action( 'vw_transport_cargo_after_slider' ); ?>

  <?php if ( get_theme_mod('vw_transport_cargo_call_text','') != "" | get_theme_mod('vw_transport_cargo_call','') != "" | get_theme_mod('vw_transport_cargo_email_text','') != "" | get_theme_mod('vw_transport_cargo_email','') != "" | get_theme_mod('vw_transport_cargo_time_text','') != "" | get_theme_mod('vw_transport_cargo_time','') != "" ) {?>
  <section id="contact_us">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-3">
          <div class="row">
            <?php if ( get_theme_mod('vw_transport_cargo_call_text','') != "" | get_theme_mod('vw_transport_cargo_call','') != "" ) {?>
              <div class="col-lg-2 col-md-3">
                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_phone_number_icon','fas fa-phone')); ?>"></i>
              </div>
              <div class="col-lg-10 col-md-9">
                <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_call_text','') ); ?></p>
                <p><?php echo esc_html( get_theme_mod('vw_transport_cargo_call','') ); ?></p>
              </div>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-4 col-md-5">
          <div class="row">
            <?php if ( get_theme_mod('vw_transport_cargo_email_text','') != "" | get_theme_mod('vw_transport_cargo_email','') != "" ) {?>
              <div class="col-lg-2 col-md-2">
                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_email_adres_icon','fas fa-envelope')); ?>"></i>
              </div>
              <div class="col-lg-10 col-md-10">
                <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_email_text','') ); ?></p>
                <p><?php echo esc_html( get_theme_mod('vw_transport_cargo_email','') ); ?></p>
              </div>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="row">
            <?php if ( get_theme_mod('vw_transport_cargo_time_text','') != "" | get_theme_mod('vw_transport_cargo_time','') != "" ) {?>
              <div class="col-lg-2 col-md-3">
                <i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_timings_icon','far fa-clock')); ?>"></i>
              </div>
              <div class="col-lg-10 col-md-9">
                <p class="bold-font"><?php echo esc_html( get_theme_mod('vw_transport_cargo_time_text','') ); ?></p>
                <p><?php echo esc_html( get_theme_mod('vw_transport_cargo_time','') ); ?></p>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>

  <?php do_action( 'vw_transport_cargo_after_contact' ); ?>

  <section id="sec_second" class="container">
    <div class="row m-0">
      <div class="col-lg-5 col-md-5">
        <section id="about">
          <?php $vw_transport_cargo_about_pages = array();
            $mod = absint( get_theme_mod( 'vw_transport_cargo_about_page' ));
            if ( 'page-none-selected' != $mod ) {
              $vw_transport_cargo_about_pages[] = $mod;
            }
            if( !empty($vw_transport_cargo_about_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $vw_transport_cargo_about_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post(); ?>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a><span>______</span></h2>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_transport_cargo_about_excerpt_number','30')))); ?></p>
                  <?php the_post_thumbnail(); ?>
                <?php endwhile; ?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
          endif; wp_reset_postdata() ?>
          <div class="clearfix"></div>
        </section>
      </div>
      <div class="col-lg-7 col-md-7">
        <section id="service-sec">        
          <?php
            $vw_transport_cargo_catData =  get_theme_mod('vw_transport_cargo_services','');
            if($vw_transport_cargo_catData){
            $page_query = new WP_Query(array( 'category_name' => esc_html($vw_transport_cargo_catData,'vw-transport-cargo'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="row cat_box">
                <div class="col-lg-4 col-md-4">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="col-lg-8 col-md-8">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a><span>______</span></h3>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_transport_cargo_services_excerpt_number','30')))); ?></p>  
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          } ?>      
        </section>
      </div>
    </div>
  </section>

  <?php do_action( 'vw_transport_cargo_after_services' ); ?>

  <div class="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>