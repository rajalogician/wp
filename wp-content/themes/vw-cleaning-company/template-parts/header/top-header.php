<?php
/**
 * The template part for header
 *
 * @package VW Cleaning Company 
 * @subpackage vw-cleaning-company
 * @since vw-cleaning-company 1.0
 */
?>

<?php if( get_theme_mod('vw_cleaning_company_topbar_hide_show') != ''){ ?>
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-7">
				    <?php if( get_theme_mod( 'vw_cleaning_company_location_text') != ''|| get_theme_mod( 'vw_cleaning_company_location') != '') { ?>
	          			<p><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_location_icon','fas fa-map-marker-alt')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_cleaning_company_location_text',''));?> :</span><?php echo esc_html(get_theme_mod('vw_cleaning_company_location',''));?></p>
	    			<?php } ?>
			    </div>
			    <div class="col-lg-5 col-md-5">
				    <?php if( get_theme_mod( 'vw_cleaning_company_email_text') != ''|| get_theme_mod( 'vw_cleaning_company_email') != '') { ?>
	          			<p class="mail-info"><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_email_icon','fas fa-envelope')); ?>"></i><span><?php echo esc_html(get_theme_mod('vw_cleaning_company_email_text',''));?> :</span><a href="mailto:<?php echo esc_html(get_theme_mod('vw_cleaning_company_email',''));?>"><?php echo esc_html(get_theme_mod('vw_cleaning_company_email',''));?></a></p>
	    			<?php } ?>
			    </div>		    
			</div>
		</div>
	</div>
<?php } ?>