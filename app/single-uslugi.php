<?php
/*
* Template Name: Страница single uslugi
*/
get_header();
the_post(  );
get_template_part( 'template-parts/content-post',"uslugi" );
?>

<?php
get_footer();