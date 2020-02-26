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
        <div class="col-sm-12">
            <div class="article">
                <ul class="nav nav-pills mb-3 ml-0" id="pills-tab" role="tablist">
                <div><strong>Год: &nbsp;&nbsp;&nbsp;</strong></div>
                <?php
                    // получаем дату документа из произвольного поля data_prinyatiya в цикле
                    $args = array(
                        'posts_per_page' => -1,
                        'post_type'    => "dokumenti",
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'post_status'   => 'publish',
                    );
                    $query = new WP_Query($args);
                    $year_array = array();
                        if ($query->have_posts()) {
                            $i = 0;
                            while ($query->have_posts()) {
                                $query->the_post();
                                $post_id = get_the_ID();
                                $nomer_documenta = get_field('nomer_documenta');
                                $title = get_the_title();
                                $data = get_field("data_prinyatiya");
                                $type_document = get_field("type_document");
                                // берем год из даты документа
                                $year = date(Y,strtotime($data));
                                // собираем в массив годов
                                $year_array[] = $year;
                            }
                        }
                        // убираем дубликаты
                        $year_array = array_unique($year_array);
                        wp_reset_postdata(); // сброс

                        // выводим массив в цикле
                        $i = 0;
                        foreach($year_array  as $year_one) {
                            ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($i == 0) {echo 'active'; $i++;} $i++; ?>" id="pills-<?php echo $year_one; ?>-tab" data-toggle="pill" href="#pills-<?php echo $year_one; ?>" role="tab" aria-controls="pills-<?php echo $year_one; ?>" aria-selected="true"><?php echo $year_one; ?></a>
                    </li>
                            <?php
                        }

                    
                ?>
               
                    
                    
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <?php
                    // выводим массив в цикле
                    $ip = 0;
                    foreach ($year_array  as $year_one) {
                    ?>
                    <div class="tab-pane fade  <?php if ($ip == 0) {echo 'show active'; $ip++ ;} $ip++; ?>" id="pills-<?php echo $year_one; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $year_one; ?>-tab">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">№ Документа</th>
                                <th scope="col">Название документа</th>
                                <th scope="col">Тип документа</th>
                                <th scope="col">Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody class="table-hover">
                                <?php
                                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                                $args =  array(
                                    'posts_per_page' => -1,
                                    'post_type'    => "dokumenti",
                                    'orderby'     => 'date',
                                    'order'       => 'DESC',
                                    'include'     => array(),
                                    'exclude'     => array(),
                                    'paged'        => $paged,
                                    'meta_key'    => '',
                                    'meta_value'  =>'',
                                    'post_status'   => 'publish',
                                    'meta_query' => array(
                                        array(
                                            'key'     => 'data_prinyatiya',
                                            'compare' => 'BETWEEN',
                                            'value'   => array($year_one.'0101',$year_one.'1231')
                                        )
                                    ),
                                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                                    
                                );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            $i = 0;
                            while ($query->have_posts()) {
                                $query->the_post();
                                $post_id = get_the_ID();
                                $nomer_documenta = get_field('nomer_documenta');
                                $title = get_the_title();
                                $data = get_field("data_prinyatiya");
                                $type_document = get_field("type_document"); ?>
                                    <tr>
                                        <th scope="row"><?php echo $nomer_documenta; ?></th>
                                        <td> <a href="<?php echo get_permalink($post_id) ?>"><?php echo $title; ?></a></td>
                                        <td><?php echo $type_document["label"]; ?></td>
                                        <td><?php echo $data ?></td>
                                    </tr>
                                    <?php
                            }
                        } ?>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            <?php the_posts_pagination(); ?>
                        </div>
                        <?php wp_reset_postdata(); // сброс?>
                    </div>
                    <?php
                    }
                    ?>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>