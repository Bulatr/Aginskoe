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
                <div class="label label-wrapper" style="margin-bottom: 1em;">
                    <div class="data">Дата подписания: <?php echo get_field("data_prinyatiya"); ?></div>
                    <div class="divider">/</div>
                    <div class="category">Номер: <?php echo get_field('nomer_documenta'); ?></div>
					<div class="divider">/</div>
					<div class="category">Тип документа: <?php $type_document = get_field("type_document"); echo $type_document["label"]; ?></div>
                </div>
			</div>
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-9">
            <div class="article">
                
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