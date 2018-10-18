<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Maxco
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="top"></div>
	<!-- Start Header Area -->
	<header class="default-header">
		<div class="sticky-header">
			<div class="container">
				<div class="header-content d-flex justify-content-between align-items-center">
					<?php maxco_site_branding(); ?>
					<div class="right-bar d-flex align-items-center">
						<nav class="d-flex align-items-center">
							<?php wp_nav_menu( array(
															'theme_location' 		=> 'menu-1',
															'container'         => 'false',
															'menu_id'						=> 'primary-menu',
															'menu_class' 				=> 'primary-menu sf-menu',
															));
							?>

						</nav>
						<!--
						<div class="search relative">
							<span class="lnr lnr-magnifier"></span>
							<form action="#" class="search-field">
								<input type="text" placeholder="Search here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search here'">
								<button class="search-submit"><span class="lnr lnr-magnifier"></span></button>
							</form>
						</div>
						-->

					</div>
				</div>
			</div>
		</div>
	</header>
