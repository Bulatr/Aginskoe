
<?php
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => 10,
	'post_type'    => "proekti",
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
    $data_anonsa = get_field("data");
    $mesto_anonsa = get_field("mesto")
    ?>
    <div>
        <a href="<?php echo get_permalink( $post_id ) ?>">
            <div class="slide-wrapper">
                <img class="lazy img-responsive"
                src="data:image/gif;base64,R0lGODlhBwACAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAIAAAIDjI9YADs="
                data-src="<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?>"
                data-srcset="<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?> 1x, <?php echo get_the_post_thumbnail_url($post_id, 'large'); ?> 2x"
                alt="Слайдер">
                <div class="slider-content">
                    <h3><?php echo $post_data["post_title"] ?></h3>
                    <p><?php echo get_the_excerpt() ?></p>
                </div>
            </div>
        </a>
    </div>
    
 
<?php
}
wp_reset_postdata(); // сброс
?>