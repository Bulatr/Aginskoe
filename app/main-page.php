<?php
/**
 * Template name: Main
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aginskoe
 */

get_header();
?>
<section class="main-content">
		
        <div class="main-bg-fluid kenburns-bottom"></div>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9">
                    <div class="title-wrapper">
                        <div class="section-title">
                            Новости
                        </div>
                        <div class="dopmenu">
                            <a href="<?php echo get_permalink( 733 ) ?>">Все новости >></a>
                        </div>
                    </div>
					<?php get_template_part( 'template-parts/main', "news" );?>
                </div>
                <div class="col-sm-12 col-md-3">
					<div class="section-title">
						Анонсы
					</div>
					<?php get_template_part( 'template-parts/main', "anonsi" );?>
                </div>
            </div>
        </div>
	</section>
	<section class="footer-cards">
		<div class="container-fluid footer-cards_bg">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="section-title">
								Сервисы для жителей поселка
							</div>
						</div>
					</div>
					<div class="row">
                    <?php get_template_part( 'template-parts/main', "services" );?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="sliders-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="section-title dark">
						Проекты поселка
					</div>
				</div>
				<div class="col-sm-12 col-md-8">
					<div class="sliders-nav-wrapper">
                    <?php get_template_part( 'template-parts/main-proekti', "menu" );?>
					</div>
				</div>
			</div>
			<div class="sliders">
                <?php get_template_part( 'template-parts/main', "proekti" );?>
				
			</div>
		</div>
	</section>
	<section class="links">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="section-title">
						Полезные ссылки
					</div>
				</div>
				<div class="col-sm-12 col-md-8">
					<div class="dopmenu pt-4">
                        <a href="<?php echo get_permalink( 1061 )  ?>">Все ссылки >></a>
                    </div>
				</div>
			</div>
			<div class="row">
                <?php get_template_part( 'template-parts/main', "links" );?>
			</div>
		</div>
	</section>
	<section class="napravleniya">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section-title dark">
						Направления работы
					</div>
				</div>
			</div>
			<div class="row">
				
				
					
					<?php get_template_part( 'template-parts/content-main', "uslugi" );?>
					<div class="napr-wrapper">
            <div class="napr-content">
                <div class="napr-image">
                    
                </div>
                <a href="<?php echo get_permalink( 130 ); ?>">
                    <div class="napr-title">
                        <h6>
                            Все направления
                        </h6>
                        <p>
							Посмотреть все направления деятельности администрации
                        </p>
                    </div>
                </a>
            </div>
        </div>	 
					
				
			</div>
		</div>
	</section>
<?php
get_footer();