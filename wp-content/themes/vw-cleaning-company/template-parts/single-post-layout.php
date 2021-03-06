<?php
/**
 * The template part for displaying single post content
 *
 * @package VW Cleaning Company
 * @subpackage vw-cleaning-company
 * @since vw-cleaning-company 1.0
 */
?>


<?php 
    $vw_cleaning_company_archive_year  = get_the_time('Y'); 
    $vw_cleaning_company_archive_month = get_the_time('m'); 
    $vw_cleaning_company_archive_day   = get_the_time('d'); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="single-post">
        <h1><?php the_title(); ?></h1>
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
        <?php if(has_post_thumbnail()) { ?>
            <div class="feature-box">
                <?php the_post_thumbnail(); ?>
                <hr>
            </div>
        <?php } ?>
        <div class="entry-content">
            <?php the_content(); ?>
            <?php if(get_theme_mod('vw_cleaning_company_toggle_tags',true)==1){ ?>
                <div class="tags-bg">
                    <?php the_tags(); ?>
                </div>
            <?php }?>
            <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                comments_template();

                if ( is_singular( 'attachment' ) ) {
                    // Parent post navigation.
                    the_post_navigation( array(
                        'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-cleaning-company' ),
                    ) );
                } elseif ( is_singular( 'post' ) ) {
                    // Previous/next post navigation.
                    the_post_navigation( array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'vw-cleaning-company' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Next post:', 'vw-cleaning-company' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'vw-cleaning-company' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Previous post:', 'vw-cleaning-company' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ) );
                }
            ?>
        </div>
    </div>
    <?php get_template_part('template-parts/related-posts'); ?>
</article>