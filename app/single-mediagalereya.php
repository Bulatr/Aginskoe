<?php
get_header();
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
                <?php  
                the_post(); 
                // определение категории                              
                $terms = get_the_terms($post_id, "tip_galerei");
                if ($terms !== false ) {
                    foreach ($terms as $term) {
                        $term_name = $term->name;											
                    }
                } else {
                    $term_name = "Без категории";
                } 
                if ("Видео" == $term_name) {
                
                    // Load value.
                    $iframe = get_field('video');

                    // Use preg_match to find iframe src.
                    preg_match('/src="(.+?)"/', $iframe, $matches);
                    $src = $matches[1];

                    // Add extra parameters to src and replcae HTML.
                    $params = array(
                        'controls'  => 0,
                        'hd'        => 1,
                        'autohide'  => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    $iframe = str_replace($src, $new_src, $iframe);

                    // Add extra attributes to iframe HTML.
                    $attributes = 'frameborder="0"';
                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                    // Display customized HTML.
                    echo '<div class="video-wrapper">';
                    echo $iframe;
                    echo '</div>';
                } 
                    ?>
                
                
                <br>
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
											'class' => array(),
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