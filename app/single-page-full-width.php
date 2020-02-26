<?php
/**
 * The template for displaying full width
 * Template Name: Полная ширина
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Aginskoe
 */

get_header();
?>

	
			<?php
			while ( have_posts() ) :
				the_post();

				
				get_template_part( 'template-parts/content-'.get_post_type(), "fullwidth" );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>



		

		

<?php
get_footer();
