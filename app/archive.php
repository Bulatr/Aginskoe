<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aginskoe
 */

get_header();
?>

<?php 
if ( have_posts() ) : ?>
	<div class="single-title">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<?php
					the_post();
					
					
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					  
					?>
					
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
				<div class="gos-list">
					<?php
					
					if (get_post_type() == "news") {
						wp_nav_menu( array(
							'theme_location' => 'menu-news-type'
						) );
					} else {
						wp_nav_menu( array(
							'theme_location' => 'menu-uslugi-type'
						) );
					}
					
					?>
				</div>				
			</div>
			<div class="col-sm-12 col-md-6 col-lg-7 col-xl-6">
				<div class="article">
					<?php 
					$post_type = get_post_type();
					if ($post_type == "page") {
						$post_type = "uslugi";
					}
					get_template_part( 'template-parts/content-'.$post_type ,"taxonomy" ); ?>
				</div>
				<div class="pagination-wrapper">
					<?php the_posts_pagination(  ); ?>
				</div>
			</div>
			<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">

			</div>
		</div>
	</div>			
			
<?php
else :
	get_template_part( 'template-parts/content',"none" );
endif
?>
			

		

<?php
get_footer();
