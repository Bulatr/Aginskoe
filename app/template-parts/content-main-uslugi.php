<?php 
    $args = array(
    'name' => 'tipi_uslug'
    );
    $output = 'objects'; // или objects
    $taxonomies = get_taxonomies( $args, $output );
    $term_array = [];
    $p = 0;
    if( $taxonomies ) {
        foreach ( $taxonomies as $taxonomy ) {
            
            $terms = get_terms( $taxonomy->name );
            if( $terms && ! is_wp_error($terms) ){
                
                foreach( $terms as $term ){
                    $term_link = get_term_link($term->term_id, $term->taxonomy);
                    $term_name = $term->name;
                    $query = new WP_Query( array( 'post_type' => array("uslugi","page","post"), 'post_status' => "publish", 'tax_query' => array(
                        array(
                            'taxonomy' => 'tipi_uslug',
                            'field'    => 'name',
                            'terms'    =>  $term_name
                        )
                    ) ) );
                    $posts_id = 0;
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $term_array[$p]["posts"][$posts_id] = esc_html(get_the_title());
                            $posts_id++;
                            // здесь идет Цикл WordPress
                        }
                    }
                    wp_reset_query(); // сброс глобальной $wp_query
                    $term_array[$p]["name"] = $term->name ;
                    $term_array[$p]["link"] = $term_link;
                    $p++;
                }
                
            }
        }
    }
    $col = true;
    $i = 0;
    
    foreach($term_array as $term_a) {
        if ($col) {
            echo '<div class="col-sm-12 col-md-6 col-lg-4">';
        }
        if ($i <= 10) {
            if ($i == 3 Or $i == 7 Or $i == 11) {
                $col = true;
            } else {
                $col = false;
            }
            ?>
        <div class="napr-wrapper">
            <div class="napr-content">
                <div class="napr-image">
                    
                </div>
                <a href="<?php echo $term_a["link"]; ?>">
                    <div class="napr-title">
                        <h6>
                            <?php echo $term_a["name"]; ?>
                        </h6>
                        <p>
                                                    
                        <?php
        
        
                        $posty = $term_a["posts"];
                        $r = 0;
                        foreach ($posty as $postt) {
                            if ($r <= 1) {
                                echo $postt;
                                if ($r < 1) {
                                    echo ", ";
                                }
                            }
                            $r++;
                        } 
                        ?>
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <?php
        }
        $i++;
        if ($col) {
            echo '</div>';
        }
    }
    ?>