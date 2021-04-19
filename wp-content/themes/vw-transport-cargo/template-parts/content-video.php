<?php
/**
 * The template part for displaying post
 *
 * @package VW Transport Cargo 
 * @subpackage vw_transport_cargo
 * @since VW Transport Cargo 1.0
 */
?>
<?php 
  $vw_transport_cargo_archive_year  = get_the_time('Y'); 
  $vw_transport_cargo_archive_month = get_the_time('m'); 
  $vw_transport_cargo_archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the video file.
          if ( ! empty( $video ) ) {
            foreach ( $video as $video_html ) {
              echo '<div class="entry-video">';
                echo $video_html;
              echo '</div>';
            }
          };
        };
      ?> 
    <div class="new-text">
      <h2 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'vw_transport_cargo_toggle_postdate',true) != '' || get_theme_mod( 'vw_transport_cargo_toggle_author',true) != '' || get_theme_mod( 'vw_transport_cargo_toggle_comments',true) != '') { ?>
        <div class="post-info">
          <?php if(get_theme_mod('vw_transport_cargo_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_transport_cargo_archive_year, $vw_transport_cargo_archive_month, $vw_transport_cargo_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_transport_cargo_toggle_author',true)==1){ ?>
            <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_transport_cargo_toggle_comments',true)==1){ ?>
             <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-transport-cargo'), __('0 Comments', 'vw-transport-cargo'), __('% Comments', 'vw-transport-cargo') ); ?> </span>
          <?php } ?>
          <hr>
        </div>
      <?php } ?>
      <div class="entry-content">
        <p>
          <?php $vw_transport_cargo_theme_lay = get_theme_mod( 'vw_transport_cargo_excerpt_settings','Excerpt');
          if($vw_transport_cargo_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($vw_transport_cargo_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $excerpt = get_the_excerpt(); echo esc_html( vw_transport_cargo_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_transport_cargo_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_transport_cargo_excerpt_suffix',''));?>
            <?php }?>
          <?php }?>
        </p>
      </div>
      <?php if( get_theme_mod('vw_transport_cargo_blog_button_text','READ MORE') != ''){ ?>
        <div class="content-bttn">
          <a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_transport_cargo_blog_button_text',__('READ MORE','vw-transport-cargo')));?><i class="<?php echo esc_attr(get_theme_mod('vw_transport_cargo_blog_button_icon','fa fa-angle-right')); ?>"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_transport_cargo_blog_button_text',__('READ MORE','vw-transport-cargo')));?></span></a>
        </div>
      <?php } ?>
    </div>
  </div>
</article>