<?php
    $data_anonsa = get_field("data");
    $mesto_anonsa = get_field("mesto")
?>
<?php
$post_id = get_the_ID();
$output = "ARRAY_A";
$filter = "raw";
$post_data = get_post($post_id, $output, $filter);

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
        <div class="col-sm-12 col-md-9">
            <div class="article">
                <div class="alert alert-primary" role="alert">
                    <div class="d-flex flex-column">
                        <h3 class="alert-heading" style="margin-bottom: 0">Место: <?php echo $mesto_anonsa; ?></h3>
                        <p>Дата: <?php echo $data_anonsa; ?></p>
                    </div>
                </div>
                <?php
                the_content();
                ?>
                <?php if ( get_edit_post_link() ) : ?>
					<footer class="entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Редактировать <span class="screen-reader-text">%s</span>', 'aginskoe' ),
									array(
										'span' => array(
											'class' => ".btn.btn-outline",
										),
									)
								),
								get_the_title()
							),
							'<span class="btn btn-outline edit-link">',
							'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();