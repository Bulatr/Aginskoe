
<?php
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => 4,
	'post_type'    => "servisi",
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
    <div class="col-sm-12 col-md-3">
        <div class="widget-card">
            <div class="widget-image">
                <img class="lazy img-responsive"
                src="data:image/gif;base64,R0lGODlhBwACAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAIAAAIDjI9YADs="
                data-src="<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?>"
                data-srcset="<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?> 1x, <?php echo get_the_post_thumbnail_url($post_id, 'large'); ?> 2x"
                alt="Слайдер">
            </div>
            <div class="widget-content">
                <a href="<?php echo get_permalink( $post_id ) ?>"><?php echo $post_data["post_title"] ?></a>
            </div>
        </div>
    </div>
 
<?php
}
wp_reset_postdata(); // сброс
?>