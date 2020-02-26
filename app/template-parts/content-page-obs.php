<div class="single-title">
	<div class="container">
		<div class="row">
			<div class="col">
                
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                
			</div>
		</div>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="article">
                <?php 
                    $post_id = get_the_ID();
                    $output = "ARRAY_A";
                    $filter = "raw";
                    $post_data = get_post($post_id, $output, $filter);                     
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
                    $args =  array(
                        'posts_per_page' => 10,
                        'post_type'    => "post",
                        'cat'          => 43,
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'paged'        => $paged,
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
                            ?>
                            <div class="card-news">
                                <div class="content-news">
                                    
                                    <a href="<?php echo get_permalink($post_id) ?>"><h5><?php echo $post_data["post_title"] ?></h5></a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="pagination-wrapper">
                            <?php the_posts_pagination(  ); ?>
                        </div>
                        <?php
                    } else {
                        echo "<p>Обсуждений нет</p>";
                    }
                    wp_reset_postdata(); // сброс  
                ?>
            </div>
        </div>
    </div>
</div>