<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aginskoe
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
	<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aginskoe' ); ?></a>

	<!-- 	new 	-->
	<section class="header uzor">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header-wrapper">
						<div class="logo-wrapper">
							<div class="logo-image">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img class="lazy img-responsive"
							src="data:image/gif;base64,R0lGODlhBwACAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAIAAAIDjI9YADs="
							data-src="<?php echo get_template_directory_uri(); ?>/img/@1x/logo.png"
							data-srcset="<?php echo get_template_directory_uri(); ?>/img/@1x/logo.png 1x, <?php echo get_template_directory_uri(); ?>/img/@2x/logo.png 2x"
							alt="ГО Поселок Агинское"> </a>
							</div>
							<div class="site-description-wrapper">
								<div class="site-name">
								<?php
								if (is_front_page() && is_home()) {
									?>
									<h1>Городской округ «Поселок Агинское»</h1>
								<?php
								} else {
										?>
									Городской округ «Поселок Агинское»

								<?php
									}
								?>
								</div>
								<div class="site-description">
									Официальный сайт городского округа «Поселок Агинское»
								</div>
							</div>
						</div>
						<div class="social-wrapper">
							<div class="icon">
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/img/_src/icon-instagram.svg" alt="instagram">
								</a>
							</div>
							<div class="icon">
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/img/_src/icon-vk.svg" alt="vk">
								</a>
							</div>
							<div class="icon">
								<a href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/img/_src/icon-facebook.svg" alt="facebook">
								</a>
							</div>
						</div>
						<div class="button-wrapper">
							<?php echo do_shortcode( '[bvi text="Версия для слабовидящих"]' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="menu-wrapper">
		<div class="container">
			<div class="row">
				<div class="col">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'aginskoe' ); ?></button>
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</nav><!-- #site-navigation -->
					</div>
			</div>
		</div>
		
		
	</section>