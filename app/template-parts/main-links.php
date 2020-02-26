
<?php
// параметры по умолчанию
$posts = get_posts( array(
	'numberposts' => 7,
	'post_type'    => "poleznie_ssilki",
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
    $type_banner = get_field("type_banner");
    $type_links = get_field("type_links");
    $inner_link = get_field("inner_link");
    $out_link = get_field("out_link");
    if ("out" == $type_links) {
        $link = $out_link;
    } else {
        $link = $inner_link;
    }
    
    if (($i % 2) == 0) {
        echo '<div class="col-sm-12 col-md-6 col-lg-3">';
    }
    ?>
    
        <div class="widget-card <?php if ( "big" == $type_banner ) {
            echo 'auto-height';
        } ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?>); background-size: cover; background-repeat: no-repeat;">
            <div class="widget-content">
                <a href="<?php echo $link ?>"><?php echo $post_data["post_title"] ;?></a>
            </div>
        </div>
    
    
    
 
<?php
if ( "big" == $type_banner ) {
    if ($i == 0 OR $i == 3 OR $i == 5 OR $i == 7 OR $i == 9 OR $i == 11 OR $i == 13 OR $i == 15) {
       
    } else {
       
    }
}
if (($i % 2) != 0 ) {
    echo '</div>';
}
$i++;
}
wp_reset_postdata(); // сброс
?>