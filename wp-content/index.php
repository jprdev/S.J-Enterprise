<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
    
 <!-- =========================
		MAIN SLIDER
	============================== -->
	<div id="main-slider-1" class="main-slider main-slider-1">
		<div class="sp-slides">
			
			<!-- === SLIDER ITEM === -->	
				<?php
$type = 'home-slider';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish'
  );

$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
  while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="sp-slide">
				
				<!-- === slide overlay === -->	
				<div class="main-slider-overlay"></div>
				
				<!-- === slide image === -->	
                <img class="sp-image" src="<?php echo get_post_meta( get_the_ID(), 'wpcf-slides', true ); ?>"
				data-src="<?php echo get_post_meta( get_the_ID(), 'wpcf-slides', true ); ?>"
				data-retina="<?php echo get_post_meta( get_the_ID(), 'wpcf-slides', true ); ?>" alt="" />
				
				<!-- === slide container === -->	
				<div class="container">
                    <div class="main-slider-content">
        				<h2 class="sp-layer"
                            data-position="rightCenter" data-horizontal="15" data-vertical="-92"
        					data-show-transition="left" data-hide-transition="left" data-show-delay="200" data-hide-delay="200">
        					<?php echo get_post_meta( get_the_ID(), 'wpcf-heading-1', true ); ?>
        				</h2>
        
        				<h2 class="sp-layer color-primary"
                            data-position="rightCenter" data-horizontal="15" data-vertical="-40"
        					data-show-transition="left" data-hide-transition="left" data-show-delay="400" data-hide-delay="400">
        					<?php echo get_post_meta( get_the_ID(), 'wpcf-heading-2', true ); ?>
        				</h2>
            
                        <a class="sp-layer main-button" href="<?php echo get_post_meta( get_the_ID(), 'wpcf-button-url', true ); ?>"
                            data-position="rightCenter" data-horizontal="15" data-vertical="55"
            				data-show-transition="left" data-hide-transition="left" data-show-delay="600" data-hide-delay="600">
							<div class="my-btn my-btn-primary">
								<div class="my-btn-bg-top"></div>
								<div class="my-btn-bg-bottom"></div>
								<div class="my-btn-text">
								Contact us
								</div>
							</div>
						</a>
                        
						<!-- === slide buttons === -->	
                        <div class="sp-layer main-slider-buttons" 
							data-position="rightCenter" data-horizontal="15" data-vertical="165" data-hide-delay="600">
							<a class="main-slider-button-prev" href="#">
								<div class="my-btn my-btn-default">
									<div class="my-btn-bg-top"></div>
									<div class="my-btn-bg-bottom"></div>
									<div class="my-btn-text">
										<i class="fa fa-angle-left"></i>
									</div>
								</div>
							</a>
							<a class="main-slider-button-next" href="#">
								<div class="my-btn my-btn-default">
									<div class="my-btn-bg-top"></div>
									<div class="my-btn-bg-bottom"></div>
									<div class="my-btn-text">
										<i class="fa fa-angle-right"></i>
									</div>
								</div>
							</a>
						</div>
                         
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
	<!-- =========================
		END MAIN SLIDER
	============================== -->	
	
	<!-- =========================
		SERVICES
	============================== -->
   

 <section class="def-section home-services">
		<div class="container">
			<div class="row">
                 
				<!-- === SERVICE ITEM === -->	
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="service">
                                        <div class="service-icon">
                                        <?php echo do_shortcode('[tom id="section1icon"]'); ?>
                                        </div>				        
					<?php echo do_shortcode('[tom id="section1"]'); ?>
				</div>	
				</div>
                
				<!-- === SERVICE ITEM === -->
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
				
				<div class="service-mark-border-top"></div>
                                <div class="service-mark-border-right"></div>
                                <div class="service-mark-border-bottom"></div>
                                <div class="service-mark-border-left"></div>
                                <div class="service">
                                <div class="service-icon"><?php echo do_shortcode('[tom id="section2icon"]'); ?></div>
				<?php echo do_shortcode('[tom id="section2"]'); ?>
				</div>	
				</div>
                
				<!-- === SERVICE ITEM === -->
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="service">
                                <div class="service-icon"><?php echo do_shortcode('[tom id="section3icon"]'); ?></div>
					<?php echo do_shortcode('[tom id="section3"]'); ?>
		 </div>			 
                 </div>
                
				<!-- === SERVICE ITEM === -->
				
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="service">
                                <div class="service-icon"><?php echo do_shortcode('[tom id="section4icon"]'); ?></div>
				                <?php echo do_shortcode('[tom id="section4"]'); ?>
		 </div>			 
                 </div>
				 
             </div>
         </div>
     </section>


	 <!-- =========================
		END SERVICES
	============================== -->
    
	
	<!-- ===================================
		SECTION ABOUT US AND GET QUOTE
	======================================== -->
	<section class="def-section about-quote">
		<div class="section-bg-left"></div>
		<div class="section-bg-right"></div>
		<div class="container">
			<div class="row">
				
				<!-- === ABOUT US === -->	
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 home-about">
						
						<!-- === TITLE GROUP === -->	
						<div class="title-group">
							<?= do_shortcode('[tom id="heading"]'); ?>
						</div>
						
						<!-- === ABOUT US TEXT === -->	
						<p>
							<?= do_shortcode('[tom id="deiscription"]'); ?>
						</p>
						
						<div class="home-about-video">
							<!-- === PLAY VIDEO BUTTON === -->	
							<div class="play-video" id="play-video">
								<div class="my-btn my-btn-primary">
									<div class="my-btn-bg-top"></div>
									<div class="my-btn-bg-bottom"></div>
									<div class="my-btn-text">
										<i class="fa fa-play"></i>
									</div>
								</div>
							</div>
							<!-- === STOP VIDEO BUTTON === -->	
							<div class="stop-video" id="stop-video">
								<div class="my-btn my-btn-primary">
									<div class="my-btn-bg-top"></div>
									<div class="my-btn-bg-bottom"></div>
									<div class="my-btn-text">
										<i class="fa fa-pause"></i>
									</div>
								</div>
							</div>
							
							<!-- === VIDEO === -->	
							<video id="aboutvideo" loop preload="auto">
								<source src="<?= do_shortcode('[tom id="video"]'); ?>" />
								<source src="media/video/trucks.html" type="video/webm" />
							</video>
							
							<!-- === READ MORE BUTTON === -->	
							<a href="<?= do_shortcode('[tom id="readmore"]'); ?>"><div class="home-about-button">
								<div class="my-btn my-btn-primary">
									<div class="my-btn-bg-top"></div>
									<div class="my-btn-bg-bottom"></div>
									<div class="my-btn-text">
										READ
									</div>
								</div>
							</div></a>

						</div>
				</div>
				
				<!-- === GET QUOTE === -->	
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 get-quote">
						
						<!-- === TITLE GROUP === -->
						<div class="title-group">
							<?= do_shortcode('[tom id="headings"]'); ?>
						</div>
						
						<!-- === GET QUOTE TEXT === -->
						<p>
							<?= do_shortcode('[tom id="discription"]'); ?>
						</p>
						
						<!-- === GET QUOTE FORM=== -->
						<div class="get-quote-form">
						<div class="send-result"></div>
							
							<?= do_shortcode('[contact-form-7 id="40" title="REQUEST A QUOTE"]'); ?>
						
						</div>
						<style>
						div.wpcf7-validation-errors {
    border: 2px solid rgba(247, 231, 0, 0) !important;
}
						</style>
				</div>

			</div>
		</div>
	</section>
	 <!-- ===================================
		END SECTION ABOUT US AND GET QUOTE
	======================================== -->
     
	 <!-- ===================================
	    SECTION REVIEWS AND FAQ
	======================================== -->
	<section class="def-section">
		<div class="container">
			<div class="row">
				
			
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	
<div class="home-review">
						
						<!-- === TITLE GROUP === -->
						<div class="title-group">
							<h2>TESTIMONIALS</h2>
							<div class="subtitle with-square">INTEGER CONGUE ELIT NON</div>
						</div>					
<?= do_shortcode('[testimonial]'); ?>
</div>
</div>
			<?php
			/*
				<!-- === FAQ === -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="home-faq">
						
						<!-- === TITLE GROUP === -->
						<div class="title-group">
							<h2>WHY CHOSE US</h2>
							<div class="subtitle with-square">PELENTESQUE INYD URNA</div>
						</div>
						
					<?php echo do_shortcode('[accordation]'); ?>
					
					</div>
				</div>
				*/
				?>
			
			</div>
		</div>
	</section>
	 <!-- ===================================
		END SECTION REVIEWS AND FAQ
	======================================== -->
	
	
	<!-- ===================================
		SECTION STATS
	======================================== -->
	<div class="def-section stats" id="home-stats" data-stellar-background-ratio="0.4">
		<div class="stats-overlay"></div>
		<div class="container">
			<div class="row">
				
				<!-- === STATS ITEM === -->
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="stat-item">
						<div class="stat-item-icon">
							<i class="flaticon-first33"></i>
						</div>
						<div class="stat-item-number" id="num1">
							450
						</div>
						<div class="stat-item-text">
							PROJECTS<br>DONE
						</div>
					</div>
				</div>
				
				<!-- === STATS ITEM === -->
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="stat-item stat-item-mark">
						<div class="stat-item-icon">
							<i class="flaticon-shirt16"></i>
						</div>
						<div class="stat-item-number" id="num2">
							150
						</div>
						<div class="stat-item-text">
							CLIENTS<br>HAPPY
						</div>
					</div>
				</div>
				
				<!-- === STATS ITEM === -->
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="stat-item">
						<div class="stat-item-icon">
							<i class="flaticon-group2"></i>
						</div>
						<div class="stat-item-number" id="num3">
							120
						</div>
						<div class="stat-item-text">
							WORKERS<br>TEAM
						</div>
					</div>
				</div>
				
				<!-- === STATS ITEM === -->
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="stat-item">
						<div class="stat-item-icon">
							<i class="flaticon-clock96"></i>
						</div>
						<div class="stat-item-number" id="num4">
							14
						</div>
						<div class="stat-item-text">
							YEARS IN<br>MARKET
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- ===================================
		END SECTION STATS
	======================================== -->
    
	
	<!-- ===================================
		BLOG SECTION
	======================================== -->
	 <!--<section class="def-section home-blog">
		<div class="container">
			<div class="row">
			
			
				<div class="title-group">
					<h2>BLOG COMPANY</h2>
					<div class="subtitle with-square">INTEGER CONGUE ELIT</div>
				</div>
				
				
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="home-blog-item home-blog-item-mark">
						<div class="home-blog-item-date">
							<div class="home-blog-item-date-number">26</div>MAY
						</div>
						<div class="home-blog-item-image">
							<img src="media/blog/1.jpg" alt="" />
						</div>
						<div class="home-blog-item-desc">
							<div class="home-blog-item-desc-title">
								<a href="12_blog_detail.html">Curabitur lorem uism quis</a>
							</div>
							<div class="home-blog-item-desc-info">
								<a href="#">Admin</a>
								<span class="comments-icon"><i class="fa fa-comments"></i></span>
								<a href="12_blog_detail.html#comments">15</a>
							</div>
							<div class="home-blog-item-desc-text">
								<p>Pellentesque habitant morbi tristique sene ctus eft netus eft malesuada fames turpis egestas. 
								Aenean non donec ...</p>
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="home-blog-item">
						<div class="home-blog-item-date">
							<div class="home-blog-item-date-number">22</div>MAY
						</div>
						<div class="home-blog-item-image">
							<img src="media/blog/2.jpg" alt="" />
						</div>
						<div class="home-blog-item-desc">
							<div class="home-blog-item-desc-title">
								<a href="12_blog_detail.html">Curabitur lorem uism quis</a>
							</div>
							<div class="home-blog-item-desc-info">
								<a href="#">Admin</a>
								<span class="comments-icon"><i class="fa fa-comments"></i></span>
								<a href="12_blog_detail.html#comments">15</a>
							</div>
							<div class="home-blog-item-desc-text">
								<p>Pellentesque habitant morbi tristique sene ctus eft netus eft malesuada fames turpis egestas. 
								Aenean non donec ...</p>
							</div>
						</div>
					</div>
				</div>
				
								
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="home-blog-item">
						<div class="home-blog-item-date">
							<div class="home-blog-item-date-number">20</div>MAY
						</div>
						<div class="home-blog-item-image">
							<img src="media/blog/3.jpg" alt="" />
						</div>
						<div class="home-blog-item-desc">
							<div class="home-blog-item-desc-title">
								<a href="12_blog_detail.html">Curabitur lorem uism quis</a>
							</div>
							<div class="home-blog-item-desc-info">
								<a href="#">Admin</a>
								<span class="comments-icon"><i class="fa fa-comments"></i></span>
								<a href="12_blog_detail.html#comments">15</a>
							</div>
							<div class="home-blog-item-desc-text">
								<p>Pellentesque habitant morbi tristique sene ctus eft netus eft malesuada fames turpis egestas. 
								Aenean non donec ...</p>
							</div>
						</div>
					</div>
				</div>
						
			
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="home-blog-item">
						<div class="home-blog-item-date">
							<div class="home-blog-item-date-number">15</div>MAY
						</div>
						<div class="home-blog-item-image">
							<img src="media/blog/4.jpg" alt="" />
						</div>
						<div class="home-blog-item-desc">
							<div class="home-blog-item-desc-title">
								<a href="12_blog_detail.html">Curabitur lorem uism quis</a>
							</div>
							<div class="home-blog-item-desc-info">
								<a href="#">Admin</a>
								<span class="comments-icon"><i class="fa fa-comments"></i></span>
								<a href="12_blog_detail.html#comments">15</a>
							</div>
							<div class="home-blog-item-desc-text">
								<p>Pellentesque habitant morbi tristique sene ctus eft netus eft malesuada fames turpis egestas. 
								Aenean non donec ...</p>
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="row home-blog-more">
					<a href="11_blog.html"><div class="my-btn my-btn-primary">
						<div class="my-btn-bg-top"></div>
						<div class="my-btn-bg-bottom"></div>
						<div class="my-btn-text">
							MORE
						</div>
					</div></a>
				</div>
				
			</div>
		</div>
	</section>-->
    <!-- ===================================
		END BLOG SECTION
	======================================== -->
     
	<!-- ===================================
		CLIENTS SECTION
	======================================== -->
	<section class="def-section" id="clients-section">
		<div class="home-big-image" data-stellar-background-ratio="0.4"></div>
		<div class="container">
			<div class="row">
			
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="home-clients">
						
						<!-- === TITLE GROUP === -->
						<div class="title-group">
							<h2>CLIENTS</h2>
							<div class="subtitle with-square">ALIQUAM MALESUADA</div>
						</div>
						<p>
						<?php echo  do_shortcode('[tom id="content"]'); ?>
						</p>
						
						<!-- === OWL CAROUSEL === -->
						<div class="home-clients-carousel owl-carousel owl-theme" id="owl-clients">
									<?php
$loop=0;									
$type = 'client';
$args = array(
        'post_type' => $type,
		'post_status' => 'publish'
           );

$my_query = null;
$my_query = new WP_Query($args);
$my_post_count = $my_query->post_count;
$loop=ceil($my_post_count/6);
?>						
							
							
							<?php for($i=1; $i<=$loop; $i++)
							{
								$j=0;
								?>
							<!-- === OWL CAROUSEL ITEM === -->
							<div class="home-clients-carousel-block">
								
								
								<?php
								 while ($my_query->have_posts()) : $my_query->the_post();
                                 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );									
                                ?>
								<!-- === client item === -->
								<div class="home-clients-carousel-item">
									<a href="#"><img src="<?php echo $feat_image; ?>" alt="" /></a>
								</div>
								
													 <?php
								$j++;
								if($j == 6)
								{									
									goto a;
								}
								
							
                                                     endwhile;
													 a:
                                                   ?>
								<div class="home-clients-carousel-hline"></div>
								<div class="home-clients-carousel-vline1"></div>
								<div class="home-clients-carousel-vline2"></div>
							</div>
							<?php } 
							wp_reset_query();
							?>
							
							
						
						</div>
						
						<!-- === OWL CAROUSEL BUTTONS === -->
						<div class="home-clients-buttons">
							<a id="prev-clients" href="#"><div class="my-btn my-btn-primary">
								<div class="my-btn-bg-top"></div>
								<div class="my-btn-bg-bottom"></div>
								<div class="my-btn-text">
									<i class="fa fa-angle-left"></i>
								</div>
							</div></a>
							<a id="next-clients" href="#"><div class="my-btn my-btn-grey">
								<div class="my-btn-bg-top"></div>
								<div class="my-btn-bg-bottom"></div>
								<div class="my-btn-text">
									<i class="fa fa-angle-right"></i>
								</div>
							</div></a>
						</div>
						
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- ===================================
		END CLIENTS SECTION
	======================================== -->
	 
	<!-- ===================================

	<!-- ===================================
		END SUBSCRIBE SECTION
	======================================== -->
     

<?php
//get_sidebar();
get_footer();
