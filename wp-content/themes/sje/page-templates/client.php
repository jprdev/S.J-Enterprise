<?php
/**
 * Template Name: Clients
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	   <div class="def-section services-1">
		<div class="container">
			<div class="row">
				
				<!-- === SERVICES MENU === -->
				
			
				
				<!-- === SERVICES ITEMS === -->
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						
						
						<?php
$type = 'client';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish'
  );

$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
  while ($my_query->have_posts()) : $my_query->the_post();
$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
  ?>
						<!-- === SERVICE ITEM === -->
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="service-1">
								<div class="service-1-image">
									<img src="<?= $feat_image; ?>" alt="" />
								</div>
								<div class="service-1-title">
									<h3><?= the_title(); ?></h3>
								</div>
								<div class="service-1-text">
									<p>
										<?php echo substr(get_the_excerpt(), 0,250); ?>
									</p>
								</div>
												
							</div>
						</div>
							<?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>
						
						
						
						
					
						
						
						
						
					
					</div>
				</div>
				
			</div>
		</div>
	</div>

<?php
//get_sidebar();
get_footer();
