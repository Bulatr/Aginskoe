<?php
$args =  array(
    'posts_per_page' => 6,
    'post_type'    => "mediagalereya",
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
    $i = 0;
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $output = "ARRAY_A";
        $filter = "raw";
        $post_data = get_post($post_id, $output, $filter);
        // определение категории                              
        $terms = get_the_terms($post_id, "tip_galerei");
        if ($terms !== false ) {
            foreach ($terms as $term) {
                $term_name = $term->name;											
            }
        } else {
            $term_name = "Без категории";
        } 
        if ( "Видео" == $term_name ) {
            $iframe = get_field('video');
        
            // Use preg_match to find iframe src.
            preg_match('/src="(.+?)"/', $iframe, $matches);
            $src = $matches[1];
            
            ?>
            <div class="card-news">
                <div class="image-news">
                    <img class="lazy img-responsive"
                    src="data:image/gif;base64,R0lGODlhBwACAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAIAAAIDjI9YADs="
                    data-src="https://img.youtube.com/vi/<?php echo getYoutubeEmbedUrl($src); ?>/mqdefault.jpg "
                    data-srcset="https://img.youtube.com/vi/<?php echo getYoutubeEmbedUrl($src); ?>/mqdefault.jpg  1x, https://img.youtube.com/vi/<?php echo getYoutubeEmbedUrl($src); ?>/maxresdefault.jpg 2x"
                    alt="Меню">
                </div>
                <div class="content-news">
                    <div class="label label-wrapper">
                        <div class="category"><?php echo $term_name; ?></div>
                    </div>
                    <a href="<?php echo get_permalink( $post_id ) ?>"><h5><?php echo $post_data["post_title"] ?></h5></a>
                </div>
            </div> 
            <?php
        } else {
            ?>
            <div class="card-news">
                <div class="image-news">
                    <img class="lazy img-responsive"
                    src="data:image/gif;base64,R0lGODlhBwACAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAIAAAIDjI9YADs="
                    data-src="<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?>"
                    data-srcset="<?php echo get_the_post_thumbnail_url($post_id, 'medium'); ?>  1x, <?php echo get_the_post_thumbnail_url($post_id, 'large'); ?> 2x"
                    alt="Меню">
                </div>
                <div class="content-news">
                    <div class="label label-wrapper">
                        <div class="category"><?php echo $term_name; ?></div>
                    </div>
                    <a href="<?php echo get_permalink( $post_id ) ?>"><h5><?php echo $post_data["post_title"] ?></h5></a>
                </div>
            </div>
            <?php
        }								
    }
}
wp_reset_postdata(); // сброс    


?>