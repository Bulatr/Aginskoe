<?php

$args =  array(
    'posts_per_page' => 11,
    'offset'        => 7,
	'post_type'    => "news",
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
	'exclude'     => array(),
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_status'   => 'publish',
	'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
);
$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $output = "ARRAY_A";
        $filter = "raw";
        $post_data = get_post($post_id, $output, $filter);
        // цикл
        ?>
        <div class="card-news">
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
                                } ?></div>
                </div>
                <a href="<?php echo get_permalink($post_id) ?>"><h5><?php echo $post_data["post_title"] ?></h5></a>
            </div>
        </div>
        
        
        <?php
    }
}
wp_reset_postdata(); // сброс    