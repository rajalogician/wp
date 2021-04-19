<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_cleaning_company_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_cleaning_company_slider_arrows') != '') { ?>
  <section id="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
      <?php $vw_cleaning_company_pages = array();
        for ( $count = 1; $count <= 4; $count++ ) {
          $mod = intval( get_theme_mod( 'vw_cleaning_company_slider_page' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $vw_cleaning_company_pages[] = $mod;
          }
        }
        if( !empty($vw_cleaning_company_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $vw_cleaning_company_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>     
      <div class="carousel-inner" role="listbox">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_cleaning_company_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_cleaning_company_slider_excerpt_number','30')))); ?></p>
                <div class="more-btn">
                  <a href="<?php echo esc_url(get_permalink()); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_slider_btn_icon','fas fa-angle-right')); ?>"></i><?php esc_html_e( 'READ MORE', 'vw-cleaning-company' ); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','vw-cleaning-company' );?></span></a>
                </div>
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
        <span class="screen-reader-text"><?php esc_html_e( 'Previous','vw-cleaning-company' );?></span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
        <span class="screen-reader-text"><?php esc_html_e( 'Next','vw-cleaning-company' );?></span>
      </a>
    </div>
    <div class="clearfix"></div>
  </section>
  <?php } ?>

  <?php do_action( 'vw_cleaning_company_after_slider' ); ?>

  <?php if( get_theme_mod('vw_cleaning_company_services_post1') != '' || get_theme_mod('vw_cleaning_company_services_post2') != '' || get_theme_mod('vw_cleaning_company_services_category') != ''){ ?>
    <section class="service">
      <div class="container">
        <div class="service-sec">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <?php
              $vw_cleaning_company_postData1 =  get_theme_mod('vw_cleaning_company_services_post1');
              if($vw_cleaning_company_postData1){
                $args = array( 'name' => esc_html($vw_cleaning_company_postData1 ,'vw-cleaning-company'));
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                    <h2><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_cleaning_company_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_cleaning_company_services_excerpt_number','12')))); ?></p>
                  <?php endwhile; 
                  wp_reset_postdata();?>
                  <?php else : ?>
                    <div class="no-postfound"></div>
                  <?php
              endif; }?>
            </div>
            <div class="col-lg-4 col-md-4">
              <?php
              $vw_cleaning_company_postData1 =  get_theme_mod('vw_cleaning_company_services_post2');
              if($vw_cleaning_company_postData1){
                $args = array( 'name' => esc_html($vw_cleaning_company_postData1 ,'vw-cleaning-company'));
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) :
                  while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php the_post_thumbnail(); ?>
                    <h2><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_cleaning_company_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_cleaning_company_services_excerpt_number','12')))); ?></p>
                  <?php endwhile; 
                  wp_reset_postdata();?>
                  <?php else : ?>
                    <div class="no-postfound"></div>
                  <?php
              endif; }?>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="service-content">
                <?php 
                $vw_cleaning_company_catData=  get_theme_mod('vw_cleaning_company_services_category');
                  if($vw_cleaning_company_catData){
                    $page_query = new WP_Query(array( 'category_name' => esc_html( $vw_cleaning_company_catData ,'vw-cleaning-company')));?>
                      <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                        <div class="row">
                          <div class="col-lg-4 col-md-12">
                            <?php the_post_thumbnail(); ?>
                          </div>
                          <div class="<?php if(has_post_thumbnail()) { ?>col-lg-6 col-md-12" <?php } else { ?>col-lg-12 col-md-12" <?php } ?>>
                            <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                            <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_cleaning_company_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_cleaning_company_services_excerpt_number','8')))); ?></p>
                          </div>
                        </div>
                      <?php endwhile;
                    wp_reset_postdata();
                  } ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'vw_cleaning_company_after_service' ); ?>

  <div id="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>