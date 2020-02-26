<?php
/**
 * The template for displaying all news posts
 * 
 * Template name: Архив новостей

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aginskoe
 */

get_header();
?>

<section class="main-content">
	<div class="single-title">
		<div class="container">
			<div class="row">
				<div class="col">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-3">
						<div class="section-title">
							Новости
						</div>
						<div class="news-column">
							<?php get_template_part( 'template-parts/content-news', "three" );?>
						</div>
					</div>
					<div class="col-sm-12 col-md-6">
						<div class="section-title">
							Главное
						</div>
						<div class="row news-column">
							<?php get_template_part( 'template-parts/content-news', "main" );?>
						</div>
						<div class="row">
							<div class="col pt-5">
								<?php get_template_part( 'template-parts/content-news', "second" );?>	
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-3">
						<div class="section-title">
							Медиа
						</div>
						<div class="news-column media-news">
							<?php get_template_part( 'template-parts/content-media', "cards" );?>
						</div>  
					</div>
				</div>
				<div class="row">
					
					<div class="divider-line"></div>
					<div class="col-sm-12 col-md-6 col-lg-3">
						<?php get_template_part( 'template-parts/content-news', "col1" );?>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3">
						<?php get_template_part( 'template-parts/content-news', "col2" );?>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3">
						<?php get_template_part( 'template-parts/content-news', "col3" );?>
					</div>
					<div class="col-sm-12 col-md-6 col-lg-3">
						<?php get_template_part( 'template-parts/content-news', "col4" );?>
					</div>
				</div>
				<div class="row">
					<div class="divider-line empty"></div>
				</div>
			</div>
		</div>
	</div>
</section>
		

<?php
get_footer();
