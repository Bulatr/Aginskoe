
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
        <h6><?php echo $post_data["post_title"] ?></h6>
    </div>
    
    
 
<?php
}
wp_reset_postdata(); // сброс
?>