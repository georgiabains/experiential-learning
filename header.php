<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/css?family=Heebo:300,400|Open+Sans:300,400|Playfair+Display|Quicksand:300,400,500|Montserrat" rel="stylesheet">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<title> <?php wp_title('', true,''); ?> </title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />

	<?php wp_head(); ?>


	<style type="text/css" media="screen">
		html { margin-top: 0px !important; }
		* html body { margin-top: 0px !important; }
		@media screen and ( max-width: 782px ) {
			html { margin-top: 0px !important; }
			* html body { margin-top: 0px !important; }
		}
	</style>


</head>

<body <?php body_class(); ?>>

	<div id="header">

		<div class="headerinfo">
			<a href="<?php echo get_option('home'); ?>">
				<img class="logo-large" src="<?php bloginfo('stylesheet_directory'); ?>/img/u-of-t-logo-light.png" alt="University of Toronto Signature" />
				<img class="logo-small" src="<?php bloginfo('stylesheet_directory');?>/img/u-of-t-logo-light-small.png" alt="University of Toronto Crest" />
			</a>

			<h1 class="headertitle">
				<a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a>
			</h1>

			<!-- uncomment to edit
			<div class="description">
				<?php bloginfo('description'); ?>
			</div>
			-->

			<nav>  
				<!--hamburger menu-->
				<a class="header-nav-title" tabindex="0" role="button" aria-label="headernav">
					<div id="nav-icon3">
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
					</div>
				</a>

				<?php wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'container_class' => 'header-menu-class'
					)
				); ?>
			</nav>

		</div><!--end .headerinfo-->

	</div><!--end #header-->