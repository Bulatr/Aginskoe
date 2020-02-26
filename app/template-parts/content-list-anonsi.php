
<div class="anons-wrap">
    <div class="cards-wrapper">
<?php
// параметры по умолчанию
$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
$posts = get_posts( 
array(
    'posts_per_page' => 20,
	'post_type'    => "anonsi",
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
    'exclude'     => array(),
    'paged'        => $paged,
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
        <div class="card-news anons">
            <div class="content-news">
                <div class="data-anonsa">
                <h5><a href="<?php echo get_permalink( $post_id ) ?>"> <?php echo $post_data["post_title"] ?></a></h5>
                    
                </div>
                <div class="mesto">
                   <?php echo $mesto_anonsa; ?>
                </div>
                <p>
                <?php echo $data_anonsa; ?>
                </p>
                <a href="<?php echo get_permalink( $post_id ) ?>">Подробнее</a>
            </div>
        </div>
 
<?php
}
wp_reset_postdata(); // сброс
?>
        
    </div>
    
</div>