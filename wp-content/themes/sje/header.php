<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.templines.com/lesh/transaero/01_home.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jan 2016 09:49:19 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Responsive Bootstrap Logistic Html Template">
<meta name="keywords" content="Trans, Aero, Bootstrap, Html, Template, Logistic, Blog, Transport, Corporate, Cargo, Truck">
<meta name="author" content="Vadzim Liashkevich">

<!-- SITE TITLE -->
<title><?php wp_title( '|', true, 'right' ); ?></title>

<!-- =========================
      FAV AND TOUCH ICONS  
============================== -->
<link rel="shortcut icon" href="#">

<!-- =========================
     STYLESHEETS   
============================== -->

<!-- STYLES FILE -->   
<link href="<?php echo get_template_directory_uri(); ?>/css/master.css" rel="stylesheet">	
        
<!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body>

	<!-- =========================
     PRE LOADER       
	============================== -->
	
    <div class="preloader" id="preloader">
        <div class="cssload-container">
        	<div class="cssload-whirlpool"></div>
        </div>
    </div>
	
	<!-- =========================
     END PRE LOADER       
	============================== -->
	
	
	<!-- =========================
		TOP MAIN NAVBAR
	============================== -->
	<div class="main-navbar main-navbar-1" id="main-navbar">
		<div class="container">
			<div class="row">
                 
				<!-- === TOP LOGO === -->
				 
				<div class="logo" id="main-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<div class="logo-image">
						<img src="<?php echo do_shortcode('[tom id="logo"]'); ?>" alt="" />
					</div>
					<!--<div class="logo-text">
						S J <span class="color-primary">Enterprise</span>
					</div>--></a>
				</div>
				 
				<!-- === TOP SEARCH === -->
				 
				<div class="main-search-input" id="main-search-input">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<label class="hidden" for="s"><?php _e('Search for:'); ?></label>
<div>
<input type="text" name="s" placeholder="Try and type enter..." id="s main-search" onfocus="if (this.value == 'Try and type enter...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Try and type enter...';}" />
</div>
</form>
					
				</div>
				 
				<div class="search-control">
					<!-- === top search button show === -->
					<a id="show-search" class="show-search latest" href="#">
						<div class="my-btn my-btn-primary">
                            <div class="my-btn-bg-top"></div>
                            <div class="my-btn-bg-bottom"></div>
                            <div class="my-btn-text">
                                <i class="fa fa-search"></i>
                            </div>
						</div>
					</a>
					<!-- === top search button close === -->
					<a id="close-search" class="close-search latest" href="#">
						<div class="my-btn my-btn-primary">
							<div class="my-btn-bg-top"></div>
							<div class="my-btn-bg-bottom"></div>
							<div class="my-btn-text">
								<i class="fa fa-close"></i>
							</div>
						</div>
					</a>
				</div>
				
				<div class="show-menu-control">
					<!-- === top search button show === -->
					<a id="show-menu" class="show-menu" href="#">
						<div class="my-btn my-btn-primary">
                            <div class="my-btn-bg-top"></div>
                            <div class="my-btn-bg-bottom"></div>
                            <div class="my-btn-text">
                                <i class="fa fa-bars"></i>
                            </div>
						</div>
					</a>
				</div>
				 
				<!-- === TOP MENU === -->
							

  <?php
$defaults = array(
	'theme_location'  => '',
	'menu'            => 'Main Menu',
	'container'       => 'div',
	'container_class' => 'collapse navbar-collapse main-menu main-menu-1',
	'container_id'    => 'main-menu',
	'menu_class'      => 'nav navbar-nav',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

						wp_nav_menu( $defaults ); ?>

							
			

			</div>
		</div>
	</div>
	 
	 <!-- =========================
		END TOP MAIN NAVBAR
	============================== -->
     
	 <?php if(!is_home())
{
	?>
<!-- ===================================
		PAGE HEADER
	======================================== -->
	<div class="page-header" data-stellar-background-ratio="0.4">
		<div class="page-header-overlay"></div>
		<div class="container">
			<div class="row">
				
				<!-- === PAGE HEADER TITLE === -->
				<div class="page-header-title">
					<h2 style="text-transform: uppercase;"><?= the_title(); ?></h2>
				</div>
				
				<!-- === PAGE HEADER BREADCRUMB === -->
				<div class="page-header-breadcrumb">
					<ol class="breadcrumb">
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
						<li class="active"><?= the_title(); ?></li>
					</ol>
				</div>
				
				<!-- === PAGE HEADER BUTTON === -->
				<div class="page-header-button">
					<a href="<?= do_shortcode('[tom id="buttonurl"]'); ?>">
						<div class="my-btn my-btn-primary">
							<div class="my-btn-bg-top"></div>
							<div class="my-btn-bg-bottom"></div>
							<div class="my-btn-text">
								Contact Us
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- ===================================
		END PAGE HEADER
	======================================== -->	
	<?php
}
?>
	