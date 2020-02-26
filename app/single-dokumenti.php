<?php
/*
* Template Name: Страница single dokumenti
*/
get_header();
the_post(  );
get_template_part( 'template-parts/content-post',"dokumenti" );
?>

<?php
get_footer();