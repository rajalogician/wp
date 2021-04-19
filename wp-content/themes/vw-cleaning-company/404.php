<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW Cleaning Company
 */

get_header(); ?>

<div class="container">
	<main id="maincontent" role="main">
		<div class="page-content">
	    	<h1><?php echo esc_html(get_theme_mod('vw_cleaning_company_404_page_title',__('404 Not Found','vw-cleaning-company')));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('vw_cleaning_company_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','vw-cleaning-company')));?></p>
			<?php if( get_theme_mod('vw_cleaning_company_404_page_button_text','Go Back') != ''){ ?>
				<div class="more-btn">
			        <a href="<?php echo esc_url(home_url()); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_cleaning_company_404_page_button_icon','fas fa-angle-right')); ?>"></i><?php echo esc_html(get_theme_mod('vw_cleaning_company_404_page_button_text',__('Go Back', 'vw-cleaning-company')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_cleaning_company_404_page_button_text',__('Go Back', 'vw-cleaning-company')));?></span></a>
			    </div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</main>
</div>

<?php get_footer(); ?>