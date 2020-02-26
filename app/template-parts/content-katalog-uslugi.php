<div class="single-title">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <?php
                the_title( '<h1 class="entry-title">', '</h1>' );
                    
                ?>
                
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="divider-line empty mt-3 mb-3"></div>
            <div class="col-sm-12 col-md-3 pr-0">
                <div class="list-group list-style-gosuslugi list-group-flush" id="list-tab" role="tablist">
                    <?php
                    $terms = get_terms( 'tipi_uslug' );

                    if( $terms && ! is_wp_error($terms) ){
                        $i = 0;
                        foreach( $terms as $term ){
                            
                                ?>
                                <a class="list-group-item list-group-item-action <?php if ($i == 0) {
                                    echo 'active';
                                } ?>" id="list-item-<?php echo $term->term_id ?>" data-toggle="list" href="#list-<?php echo $term->term_id ?>" role="tab" aria-controls="list-<?php echo $term->term_id ?>"><?php  echo $term->name ?></a>
                                <?php

                            
                            
                            $i++;
                        }
                    
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 pl-0">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tab-content" id="nav-tabContent">
                        <?php
                            $terms = get_terms( 'tipi_uslug' );

                            if( $terms && ! is_wp_error($terms) ){
                                $y = 0;
                                foreach( $terms as $term ){                                    
                                   
                                    // Список постов
                                    $term_name = $term->name;
                                    ?>
                                    <div class="tab-pane fade <?php if ($y == 0) { echo 'show active';} else {} ?>" id="list-<?php echo $term->term_id ?>" role="tabpanel" aria-labelledby="list-item-<?php echo $term->term_id ?>">
                                        <div class="title-uslugi">
                                            <h3><?php echo $term_name;  ?></h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 pr-0">
                                                <div class="list-group list-style-gosuslugi list-group-flush" id="list-tab" role="tablist" style="margin-top: 0;">
                                                    <?php
                                                    $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
                                                    $args =  array(
                                                        'posts_per_page' => -1,
                                                        'post_type'    => array("uslugi","page"),
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
                                                                'taxonomy' => 'tipi_uslug',
                                                                'field'    => 'name',
                                                                'terms'    =>  $term_name
                                                            )
                                                        )
                                                    );
                                                    $query = new WP_Query($args);
                                                    if ($query->have_posts()) {
                                                        $i = 0;
                                                        while ($query->have_posts()) {
                                                            $query->the_post();
                                                            $post_id = get_the_ID();
                                                            
                                                                ?>
                                                            <a class="list-group-item list-group-item-action <?php if ($i == 0) { echo "active";} ?>" id="list-col-item-<?php echo $post_id; ?>" data-toggle="list" href="#list-col-<?php echo $post_id; ?>" role="tab" aria-controls="list-col-control-<?php echo $post_id; ?>"><?php echo get_the_title( $post_id ) ?></a>
                                                            

                                                                
                                                            <?php
                                                            
                                                            $i++;
                                                        } // end while
                                                    } // end if
                                                    wp_reset_postdata(); // сброс 
                                                    ?>
                                                </div> <!-- list-group  -->
                                            </div> <!-- col -->
                                            <div class="col-sm-12 col-md-8 pl-0">
                                                <div class="tab-content" id="nav-tabContent">
                                                <?php
                                                $query = new WP_Query($args);
                                                if ($query->have_posts()) {
                                                        $i = 0;
                                                        while ($query->have_posts()) {
                                                            $query->the_post();
                                                            $post_id = get_the_ID();
                                                            
                                                                ?>
                                                        <div class="tab-pane fade <?php if ($i == 0) {echo "show active";}  ?>" id="list-col-<?php echo $post_id; ?>" role="tabpanel" aria-labelledby="list-col-item-<?php echo $post_id; ?>">
                                                            <div class="title-uslugi level2">
                                                                <h3><?php echo get_the_title( $post_id ); ?></h3>
                                                            </div>
                                                            <div class="article-uslugi">
                                                                <?php echo get_the_excerpt( $post_id ) ?>
                                                                <div class="pt-5 pb-5">
                                                                    <a href="<?php echo get_the_permalink( $post_id ) ?>" class="btn btn-primary">Подробнее</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                                    <?php
                                                                 
                                                            $i++;
                                                        }
                                                    ?>
                                                </div> <!--  tab-content -->
                                            </div> <!-- col -->
                                                    <?php
                                                    } // end if
                                                    wp_reset_postdata(); // сброс 
                                                    
                                                    ?>
                                                
                                        </div> <!-- row -->
                                    </div> <!-- tab-pane -->
                                    <?php
                                        $y++;                                        
                                } // end foreach
                            
                            } // end if
                            ?>  
                                        
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="divider-line empty mt-3 mb-3"></div>
    </div>
</div>