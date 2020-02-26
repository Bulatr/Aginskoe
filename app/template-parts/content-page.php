<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aginskoe
 */

?>
<div class="single-title">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-6 col-lg-9">
			<article id="post-<?php the_ID(); ?>" class="article">

				<?php aginskoe_post_thumbnail(); ?>

				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aginskoe' ),
						'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->

				<?php if ( get_edit_post_link() ) : ?>
					<footer class="d-flex relative entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Редактировать <span class="screen-reader-text">%s</span>', 'aginskoe' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
		<div class="col-sm-12 col-md-6 col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

