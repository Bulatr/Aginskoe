<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
$posts = get_posts( 
array(
    'posts_per_page' => 20,
	'post_type'    => "proekti",
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
    $post_data = get_post($post_id, $output, $filter); ?>

    <div class="card-news big">
        <div class="image-news" style="background-color: #F3F6F8">
            <div class="title-picture">
                <?php echo $post_data["post_title"] ?>
            </div>
        </div>
        <div class="content-news">
            <div class="label label-wrapper">
                <div class="data"><?php the_time('d.m.Y') ?></div>
                
            </div>
            <a href="<?php echo get_permalink($post_id) ?>"><h5><?php echo $post_data["post_title"] ?></h5></a>
        </div>
    </div>
<?php
}// end foreach
