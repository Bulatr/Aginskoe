<?php
/*
* Template Name: Страница single proekti
*/
get_header();
the_post(  );
get_template_part( 'template-parts/content-post',"proekti" );
?>

<?php
get_footer();