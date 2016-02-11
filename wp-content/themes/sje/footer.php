<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
	
	<!-- ===================================
		FOOTER
	======================================== -->
	<footer class="def-section footer">
		<div class="container">
			<div class="row">
				
				<!-- === FOOTER COLUMN === -->
			 <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-one-widget') ) ?>
				
				<!-- === FOOTER COLUMN === -->
				 <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-two-widget') ) ?>
				
				<!-- === FOOTER COLUMN === -->
				 <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-three-widget') ) ?>
				
				<!-- === FOOTER COLUMN === -->
				<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('footer-four-widget') ) ?>

			</div>
		</div>
	</footer>
	<!-- ===================================
		END FOOTER
	======================================== -->


	<!-- ===================================
		BOTTOM SECTION
	======================================== -->
	<div class="bottom">
		<div class="container">
			<div class="row">
				
				<!-- === BOTTOM LEFT === -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 bottom-1">
					<?= do_shortcode('[tom id="copyright"]'); ?>
				</div>
				
				<!-- === BOTTOM CENTER === -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 bottom-2">
					<a href="<?= do_shortcode('[tom id="twitter"]'); ?>"><div class="my-btn my-btn-grey">
						<div class="my-btn-bg-top"></div>
						<div class="my-btn-bg-bottom"></div>
						<div class="my-btn-text">
							<i class="fa fa-twitter"></i>
						</div>
					</div></a>
					<a href="<?= do_shortcode('[tom id="facdebook"]'); ?>"><div class="my-btn my-btn-grey">
						<div class="my-btn-bg-top"></div>
						<div class="my-btn-bg-bottom"></div>
						<div class="my-btn-text">
							<i class="fa fa-facebook"></i>
						</div>
					</div></a>
					<a href="<?= do_shortcode('[tom id="g+"]'); ?>"><div class="my-btn my-btn-grey">
						<div class="my-btn-bg-top"></div>
						<div class="my-btn-bg-bottom"></div>
						<div class="my-btn-text">
							<i class="fa fa-google-plus"></i>
						</div>
					</div></a>
					<a href="<?= do_shortcode('[tom id="pin"]'); ?>"><div class="my-btn my-btn-grey">
						<div class="my-btn-bg-top"></div>
						<div class="my-btn-bg-bottom"></div>
						<div class="my-btn-text">
							<i class="fa fa-pinterest-p"></i>
						</div>
					</div></a>
					<a href="<?= do_shortcode('[tom id="instagram"]'); ?>"><div class="my-btn my-btn-grey">
						<div class="my-btn-bg-top"></div>
						<div class="my-btn-bg-bottom"></div>
						<div class="my-btn-text">
							<i class="fa fa-instagram"></i>
						</div>
					</div></a>
				</div>
				
				<!-- === BOTTOM RIGHT === -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 bottom-3">
					<?= do_shortcode('[tom id="credits"]'); ?>
				</div>
				
			</div>
		</div>
	</div>
	<!-- ===================================
		END BOTTOM SECTION
	======================================== -->
	
	<!-- =========================
	   SLIDE MENU
	============================== -->
	<aside id="slide-menu" class="slide-menu">
		
		<!-- === CLOSE MENU BUTON === -->	
		<div class="close-menu" id="close-menu">
			<i class="fa fa-close"></i>
		</div>
		
		
		<ul id="left-menu" class="left-menu">
			
				
			<li> 
				<a href="home.html">Home <i class="fa fa-plus arrow"></i></a>
				
		</li>
			
				
			<li> 
				<a href="services.html">Service <i class="fa fa-plus arrow"></i></a>
				
				
			
			</li>
			
			
			<li> 
				<a href="our_clients.html">Our Cliets</a>
			</li>
			
		
			<li> 
				<a href="clients_review.html">Clients REVIEWS <i class="fa fa-plus arrow"></i></a>
				
					
			
			</li>
			
	
			<li>
				<a href="about.html">About Us <i class="fa fa-plus arrow"></i></a>
				
			
			
			</li>
			
				
			<li>
				<a href="contacts.html">Contacts</a>
			</li>
			
			<li>
				<a href="location.html">Location</a>
			</li>
		</ul>
		
	</aside>
	<!-- =========================
	   END SLIDE MENU
	============================== -->

	<!-- =========================
	   BLACK OVERLAY
	============================== -->
	<div class="black-overlay" id="black-overlay"></div>
	<!-- =========================
	   END BLACK OVERLAY
	============================== -->
	

	
	<!-- =========================
		 SCRIPTS   
	============================== -->	
	
	<!-- JQUERY -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.min.js"></script>
    
    <script src="<?php echo get_template_directory_uri(); ?>/js/cssua.min.js"></script>
	
	<!-- BOOTSTRAP -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
	
	<!-- SMOOTH SCROLLING  -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/smoothscroll.min.js"></script>
	
	<!-- STELLAR.JS FOR PARALLAX -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.stellar.min.js"></script>
	
	<!-- SLIDER PRO  -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/slider-pro/js/jquery.sliderPro.min.js"></script>
	
	<!-- SCROLLSPY -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/scrollspy.min.js"></script>
	
	<!-- WOW PLAGIN -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
	
	<!-- CAROUSEL -->
	<script src="<?php echo get_template_directory_uri(); ?>/assets/owl-carousel/owl.carousel.min.js"></script>
	
	<!-- VERTICAL ACCORDEON MENU -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/metisMenu.min.js"></script>
	
	<!-- CUSTOM SCRIPT -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/theme.min.js"></script>
	
	<script src="<?php echo get_template_directory_uri(); ?>/assets/colors/js/colors.js"></script>
    
    
    <script src="<?php echo get_template_directory_uri(); ?>/assets/colors/js/colors.js"></script>
    
    <script>
	function initMap(){
		{
		var e={lat:<?= do_shortcode('[tom id="latitude"]'); ?>,lng:<?= do_shortcode('[tom id="lognitude"]'); ?>},
		n=new google.maps.Map(
		document.getElementById("contact-map"),
		{center:e,scrollwheel:!1,zoom:15}
		),
		t="<?php echo get_template_directory_uri(); ?>/media/images/marker.png";
		new google.maps.Marker({map:n,icon:t,position:e,title:"OUR LOCATON!"})
		}
		}
	</script>
      <!-- GOOGLE MAPS API -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAHDFaUVFTKqrrUtBXubJbrUxKKq-t8Fw&amp;callback=initMap" async defer></script>
      
      
    
	<style>
	#menu-main-menu li:last-child{
		display:none;
	}
	</style>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	$("#menu-main-menu li").addClass("dropdown");
	$('.sub-menu').addClass("dropdown-menu");
	$('.sub-menu').attr("role","menu");
	$('#menu-main-menu li.dropdown').after('<li class="main-menu-separator"></li>');
	
	
	
	
		(function (d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter33369363 = new Ya.Metrika({
						id:33369363,
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true
					});
				} catch(e) { }
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function () { n.parentNode.insertBefore(s, n); };
			s.type = "text/javascript";
			s.async = true;
			s.src = "../../../mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else { f(); }
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/33369363" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

	<?php wp_footer(); ?>	
</body>


</html>