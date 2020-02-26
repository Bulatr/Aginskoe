<?php
/**
 * Template Name: Архив проектов
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
					the_title( '<h1 class="page-title">', '</h1>' );
					  
					?>
					
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-3">
				<div class="gos-list">
					<?php
					get_sidebar(  );
					?>
				</div>				
			</div>
			<div class="col-sm-12 col-md-5 col-lg-6">
				<div class="article">
					<?php get_template_part( 'template-parts/content-list',"proekti" ); ?>
				</div>
				<div class="pagination-wrapper">
					<?php the_posts_pagination(  ); ?>
				</div>
			</div>
			<div class="col-sm-12 col-md-3 col-lg-3">
                <?php get_sidebar(  ); ?>
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
