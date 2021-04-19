<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Cleaning Company
 */
?>

    <footer role="contentinfo">
        <aside id="footer" class="copyright-wrapper" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'vw-cleaning-company' ); ?>">
            <div class="container">
                <?php
                    $count = 0;
                    
                    if ( is_active_sidebar( 'footer-1' ) ) {
                        $count++;
                    }
                    if ( is_active_sidebar( 'footer-2' ) ) {
                        $count++;
                    }
                    if ( is_active_sidebar( 'footer-3' ) ) {
                        $count++;
                    }
                    if ( is_active_sidebar( 'footer-4' ) ) {
                        $count++;
                    }
                    // $count == 0 none
                    if ( $count == 1 ) {
                        $colmd = 'col-md-12 col-sm-12';
                    } elseif ( $count == 2 ) {
                        $colmd = 'col-md-6 col-sm-6';
                    } elseif ( $count == 3 ) {
                        $colmd = 'col-md-4 col-sm-4';
                    } else {
                        $colmd = 'col-md-3 col-sm-3';
                    }
                ?>
                <div class="row">
                    <div class="<?php if ( !is_active_sidebar( 'footer-1' ) ){ echo "footer_hide"; }else{ echo "$colmd"; } ?> col-xs-12 footer-block">
                      <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                    <div class="<?php if ( is_active_sidebar( 'footer-2' ) ){ echo "$colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 footer-block">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                    <div class="<?php if ( is_active_sidebar( 'footer-3' ) ){ echo "$colmd"; }else{ echo "footer_hide"; } ?> col-xs-12 col-xs-12 footer-block">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                    <div class="<?php if ( !is_active_sidebar( 'footer-4' ) ){ echo "footer_hide"; }else{ echo "$colmd"; } ?> col-xs-12 footer-block">
                        <?php dynamic_sidebar('footer-4'); ?>
                    </div>
                </div>
            </div>
        </aside>
        <div id="footer-2">
          	<div class="copyright container">
                <?php
                    if ( function_exists( 'the_privacy_policy_link' ) ) {
                        the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
                    }
                ?>
                <p><a href="<?php echo esc_url( __( 'https://www.vwthemes.com/themes/free-cleaning-company-wordpress-theme/', 'vw-cleaning-company' ) );
                    ?>"><?php printf( esc_html__( 'Cleaning Company WordPress Theme', 'vw-cleaning-company' ) ); ?></a> <?php echo esc_html(get_theme_mod('vw_cleaning_company_footer_text',__('By VWThemes','vw-cleaning-company'))); ?>
                </p>
                <?php if( get_theme_mod( 'vw_cleaning_company_hide_show_scroll',true) != '') { ?>
                    <?php $vw_cleaning_company_theme_lay = get_theme_mod( 'vw_cleaning_company_scroll_top_alignment','Right');
                        if($vw_cleaning_company_theme_lay == 'Left'){ ?>
                            <div class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i></div>
                        <?php }else if($vw_cleaning_company_theme_lay == 'Center'){ ?>
                            <div class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i></div>
                        <?php }else{ ?>
                            <div class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_scroll_to_top_icon','fas fa-long-arrow-alt-up')); ?>"></i></div>
                    <?php }?>
                <?php }?>
          	</div>
          	<div class="clear"></div>
        </div>
    </footer>
        <?php wp_footer(); ?>

    </body>
</html>