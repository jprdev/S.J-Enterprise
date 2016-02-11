<?php
/**
 * Template Name: Contact us
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<style>
.info p {

    text-align: left;
}
div.wpcf7-validation-errors {
    border: 2px solid #FFFFFF;
}
div.wpcf7-mail-sent-ok {
    border: 2px solid #FFFFFF;
}
header.entry-header {
    display: none;
}
.service-1-title.client_info p {
    text-align: left;
}
.post-thumbnail {
    display: none;
}
.title-group h2:before
{
display:none;
}
.title-group h2
{
	    font-size: 24px;
    margin-top: 0;
    margin-bottom: 5px;
}
</style>
<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	 <div class="def-section about-text">
		<div class="container">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
			
		</div><!-- #content -->		
	</div><!-- #primary -->
	
	
	<!-- =========================
		CONTACTS DETAILS
	============================== -->
    <div class="def-section contact-details">
		<div class="container">
			<div class="row">
				
				<!-- === CONTACTS DETAILS ITEM === -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 contact-detail">
					<div class="contact-detail-icon">
						<i class="flaticon-map58"></i>
					</div>
					<div class="contact-detail-title">
						<h3>LOCATION</h3>
					</div>
					<div class="contact-detail-text">
						<?= do_shortcode('[tom id="location"]'); ?>
					</div>
				</div>
				
				<!-- === CONTACTS DETAILS ITEM === -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 contact-detail contact-detail-mark">
					<div class="contact-detail-icon">
						<i class="flaticon-telephone5"></i>
					</div>
					<div class="contact-detail-title">
						<h3>PHONE | EMAIL</h3>
					</div>
					<div class="contact-detail-text">
						<?= do_shortcode('[tom id="phoneandemail"]'); ?>
					</div>
				</div>
				
				<!-- === CONTACTS DETAILS ITEM === -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 contact-detail">
					<div class="contact-detail-icon">
						<i class="flaticon-clock96"></i>
					</div>
					<div class="contact-detail-title">
						<h3>WORKING HOURS</h3>
					</div>
					<div class="contact-detail-text">
						<?= do_shortcode('[tom id="workinghours"]'); ?>
					</div>
				</div>
			
			</div>
		</div>
	</div>
	<!-- =========================
		END CONTACTS DETAILS
	============================== -->
	
	<!-- =========================
		CONTACTS MAP
	============================== -->
    <div class="contact-map" id="contact-map">
	</div>
	<!-- =========================
		END CONTACTS MAP
	============================== -->
	
</div><!-- #main-content -->






<?php
//get_sidebar();
get_footer();
