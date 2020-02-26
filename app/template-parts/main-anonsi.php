<div class="anons-wrap">
    <div class="cards-wrapper">
<?php
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => 4,
	'post_type'    => "anonsi",
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
        <div class="card-news anons">
            <div class="content-news">
                <div class="data-anonsa">
                <a href="<?php echo get_permalink( $post_id ) ?>"><?php echo $post_data["post_title"] ?></a>
                </div>
                <div class="mesto">
                   <?php echo $mesto_anonsa; ?>
                </div>
                <p>
                <?php echo $data_anonsa; ?>
                </p>
            </div>
        </div>
 
<?php
}
wp_reset_postdata(); // сброс
?>
        
    </div>
    <div class="all-anons">
        <a href="<?php echo get_permalink( 988 ) ?>">Все анонсы событий >></a>
    </div>
</div>