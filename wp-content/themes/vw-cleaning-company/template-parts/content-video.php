<?php
/**
 * The template part for displaying post
 *
 * @package VW Cleaning Company 
 * @subpackage vw-cleaning-company
 * @since vw-cleaning-company 1.0
 */
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>

<?php 
  $vw_cleaning_company_archive_year  = get_the_time('Y'); 
  $vw_cleaning_company_archive_month = get_the_time('m'); 
  $vw_cleaning_company_archive_day   = get_the_time('d'); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
    <div class="box-image">
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
    </div>
    <div class="new-text">
      <h2 class="section-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'vw_cleaning_company_toggle_postdate',true) != '' || get_theme_mod( 'vw_cleaning_company_toggle_author',true) != '' || get_theme_mod( 'vw_cleaning_company_toggle_comments',true) != '') { ?>
        <div class="post-info">
          <?php if(get_theme_mod('vw_cleaning_company_toggle_postdate',true)==1){ ?>
            <span class="entry-date"><a href="<?php echo esc_url( get_day_link( $vw_cleaning_company_archive_year, $vw_cleaning_company_archive_month, $vw_cleaning_company_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_cleaning_company_toggle_author',true)==1){ ?>
            <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
          <?php } ?>

          <?php if(get_theme_mod('vw_cleaning_company_toggle_comments',true)==1){ ?>
            <span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-cleaning-company'), __('0 Comments', 'vw-cleaning-company'), __('% Comments', 'vw-cleaning-company') ); ?></span>
          <?php } ?>
        </div>
      <?php } ?>
      <p>
        <?php $vw_cleaning_company_theme_lay = get_theme_mod( 'vw_cleaning_company_excerpt_settings','Excerpt');
        if($vw_cleaning_company_theme_lay == 'Content'){ ?>
          <?php the_content(); ?>
        <?php }
        if($vw_cleaning_company_theme_lay == 'Excerpt'){ ?>
          <?php if(get_the_excerpt()) { ?>
            <?php $excerpt = get_the_excerpt(); echo esc_html( vw_cleaning_company_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_cleaning_company_excerpt_number','30')))); ?> <?php echo esc_html(get_theme_mod('vw_cleaning_company_excerpt_suffix',''));?>
          <?php }?>
        <?php }?>
      </p>
      <?php if( get_theme_mod('vw_cleaning_company_button_text','READ MORE') != ''){ ?>
        <div class="more-btn">
          <a href="<?php echo esc_url(get_permalink()); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_blog_button_icon','fas fa-angle-right')); ?>"></i><?php echo esc_html(get_theme_mod('vw_cleaning_company_button_text',__('READ MORE','vw-cleaning-company')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_cleaning_company_button_text',__('READ MORE','vw-cleaning-company')));?></span></a>
        </div>
      <?php } ?>
    </div>
  </div>
</article>