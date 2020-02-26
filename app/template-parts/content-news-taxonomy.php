<?php
$post_id = get_the_ID();
$output = "ARRAY_A";
$filter = "raw";
$post_data = get_post($post_id, $output, $filter); 
$terms = get_the_terms($post_id, "typenews");
if ($terms !== false ) {
    foreach ($terms as $term) {
        $term_name_arg = $term->name;
        
    }
} else {
    $term_name_arg = "Без категории";
} 
$paged = get_query_var('paged') ? get_query_var('paged') : 1; 
$args =  array(
    'posts_per_page' => 10,
	'post_type'    => "news",
	'orderby'     => 'date',
	'order'       => 'DESC',
	'include'     => array(),
    'exclude'     => array(),
    'paged'        => $paged,
	'meta_key'    => '',
	'meta_value'  =>'',
	'post_status'   => 'publish',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    'tax_query' => array(
		array(
			'taxonomy' => 'typenews',
			'field'    => 'name',
			'terms'    => $term_name_arg
		)
	)
);
$post_id = 0;
$terms = 0;
$query = new WP_Query($args);
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $output = "ARRAY_A";
        $filter = "raw";
        $post_data = get_post($post_id, $output, $filter); 
        $terms = get_the_terms($post_id, "typenews");
        if ($terms !== false ) {
            foreach ($terms as $term) {
                $term_name = $term->name;
                
            }
        } else {
            $term_name = "Без категории";
        }    
                                ?>
<div class="card-news big">
    
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
            <div class="category"><?php echo $term_name; ?></div>
        </div>
        <a href="<?php echo get_permalink($post_id) ?>"><h5><?php echo $post_data["post_title"] ?></h5></a>
    </div>
        
</div>
                    
<?php
    }
}
wp_reset_postdata(); // сброс  