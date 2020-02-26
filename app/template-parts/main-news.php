
<?php
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => 4,
	'post_type'    => "news",
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
$i = 0;
foreach ($posts as $post) {
    setup_postdata($post);
    $post_id = get_the_ID();
    $output = "ARRAY_A";
    $filter = "raw";
    $post_data = get_post($post_id, $output, $filter);
    if ($i == 0) {
        ?>
                    
					<div class="card-news biggest">	
                        <div class="image-news">
                            <img class="lazy img-responsive"
                            src="data:image/gif;base64,R0lGODlhBwACAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAIAAAIDjI9YADs="
                            data-src="<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?>"
                            data-srcset="<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?> 1x, <?php echo get_the_post_thumbnail_url($post_id, 'large'); ?> 2x"
                            alt="<?php echo $post_data["post_title"] ?>">
                        </div>
                        
                        <div class="content-news">
                            <div class="label label-wrapper">
                                <div class="data"><?php the_time('d.m.Y') ?></div>
                                <div class="divider">/</div>
                                <div class="category"><?php
                                
                                $terms = get_the_terms($post_id, "typenews");
                                foreach ($terms as $term) {
                                    $term_name = $term->name;
                                    echo $term_name;
                                } ?>
                                </div>
                            </div>
                            <a href="<?php echo get_permalink($post_id) ?>"><h5><?php echo $post_data["post_title"] ?></h5></a>
                            <p><?php echo get_the_excerpt() ?></p>
                        </div>
                    </div>
        <?php
        $i++;
    } else {
        if ($i == 1) {
            ?>
        <div class="content-wrap">
        <?php
        } 
        ?>       
            <div class="card-news big column">
                <div class="image-news">
                    <img class="lazy img-responsive"
                    src="data:image/gif;base64,R0lGODlhBwACAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAIAAAIDjI9YADs="
                    data-src="<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?>"
                    data-srcset="<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?> 1x, <?php echo get_the_post_thumbnail_url($post_id, 'large'); ?> 2x"
                    alt="<?php echo $post_data["post_title"] ?>">
                </div>
                <div class="content-news">
                    <div class="label label-wrapper">
                        <div class="data"><?php the_time('d.m.Y') ?></div>
                        <div class="divider">/</div>
                        <div class="category"><?php
                                
                                $terms = get_the_terms($post_id, "typenews");
                                if ($terms !== false ) {
                                    foreach ($terms as $term) {
                                        $term_name = $term->name;
                                        echo $term_name;
                                    }
                                } else {
                                    echo "Без категории";
                                } ?>
                        </div>
                    </div>
                    <a href="<?php echo get_permalink($post_id) ?>"><h5><?php echo $post_data["post_title"] ?></h5></a>
                </div>
            </div> 
            
        
        <?php
        $i++;
    }
}
?>
</div> <!-- end content-wrap -->
<?php
wp_reset_postdata(); // сброс
?>
	
