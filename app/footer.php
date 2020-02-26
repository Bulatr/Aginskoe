<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aginskoe
 */

?>

<section class="footer-block">
		<div class="container-fluid footer-bg">
			<div class="row">
				<div class="col">
					<div class="container">
						<div class="row">
							<div class="col pb-4">
								<h4>Официальный портал городского округа “Поселок Агинское” </h4>
								<p>687000, п.Агинское, ул.Ленина, 43</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-3">
								<h6>Новости</h6>
								<div class="navigation-menus">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-footer',
									'menu_id'        => 'footer-menu',
								) );
								?>
								</div>
							</div>
							<div class="col-sm-12 col-md-3">
								<h6>Администрация</h6>
								<div class="navigation-menus">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-footer-1',
									'menu_id'        => 'footer-menu-1',
								) );
								?>
								</div>
							</div>
							<div class="col-sm-12 col-md-3">
								<h6>Комитеты</h6>
								<div class="navigation-menus">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-footer-2',
									'menu_id'        => 'footer-menu-2',
								) );
								?>
								</div>
							</div>
							<div class="col-sm-12 col-md-3">
								<h6>Дума</h6>
								<div class="navigation-menus">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'menu-footer-3',
									'menu_id'        => 'footer-menu-3',
								) );
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid footer">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer-wrapper">
								<?php echo do_shortcode( '[bvi text="Версия для слабовидящих"]' ); ?>
								<a class="sogl" href="#">Соглашение о пользовании информационными системами и ресурсами городского округа “Поселок Агинское”</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Custom HTML -->
	
	<?php 
		wp_footer(  );
	?>
	
</body>
</html>
