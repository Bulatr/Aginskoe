<?php
/**
 * Template part for displaying page content and adding post from front end
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aginskoe
 */

?>
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
		<div class="col-sm-12 col-md-6 col-lg-9">
			<article id="post-<?php the_ID(); ?>" class="article">
				<div class="entry-content">                   
					
                    <form  enctype="multipart/form-data">
                        <h4>Выберите тему</h4>
                        <div class="form-group">
                            <label for="theme-select">Выберите тему</label>
                            <select id="theme-select" class="custom-select" name="theme" aria-describedby="themeHelp">
                            <option></option>
                               <option value="Опасные объекты">Опасные объекты</option> 
                                <option value="Открытые люки">Открытые люки</option>    
                                <option value="Парки культуры и отдыха">Парки культуры и отдыха</option> 
                                <option value="Проблемы дорожной разметки">Проблемы дорожной разметки</option> 
                                <option value="Проблемы ливневой канализации">Проблемы ливневой канализации</option> 
                                <option value="Проблемы с дорожными знаками">Проблемы с дорожными знаками</option> 
                                <option value="Проблемы с наружным освещением">Проблемы с наружным освещением</option>
                                <option value="Проблемы со светофорами">Проблемы со светофорами</option>
                                <option value="Аварийные деревья / заросли деревьев">Аварийные деревья / заросли деревьев</option>
                                <option value="Бездомные собаки">Бездомные собаки</option>
                                <option value="Надписи на стенах">Надписи на стенах</option>
                                <option value="Незаконная расклейка объявлений">Незаконная расклейка объявлений</option>
                                <option value="Незаконная наружная реклама">Незаконная наружная реклама</option>
                                <option value="Несанкционированные свалки мусора">Несанкционированные свалки мусора</option>
                                <option value="Неубранная территория">Неубранная территория</option>
                                <option value="Ремонт тротуаров">Ремонт тротуаров</option>
                                <option value="Сброс мусора вне установленных мест">Сброс мусора вне установленных мест</option>
                                <option value="Сломанные защитные ограждения">Сломанные защитные ограждения</option>
                                <option value="Торговля вне установленных мест">Торговля вне установленных мест</option>
                                <option value="Ямы на дорогах">Ямы на дорогах</option>
                            </select>
                            <small id="themeHelp" class="form-text text-muted">Выберите тему сообщения.</small>
                        </div>
                        <div class="form-group">
                            <label for="inputAdress">Введите адрес или ближайший ориентир</label>
                            <input type="text" class="form-control" id="inputAdress" placeholder="Введите адрес">
                        </div>
                        <h4>Контактные данные</h4>
                        <div class="form-group">
                            <label for="yourName">Введите ваше ФИО</label>
                            <input id="yourName" class="form-control" type="text" name="yourName" placeholder="Введите ваше ФИО" required>
                        </div>
                        <div class="form-group">
                            <label for="yourPhone">Контактный номер телефона</label>
                            <input id="yourPhone" class="form-control" type="text" name="yourPhone" placeholder="Введите ваш контактный номер телефона" required>
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Email</label>
                            <input type="email" class="form-control" id="InputEmail1" name="InputEmail1" aria-describedby="emailHelp" placeholder="Пример: mail@mail.ru">
                            <small id="emailHelp" class="form-text text-muted">Введите адрес электронной почты.</small>
                        </div>
                        <h4>Ваше сообщение</h4>
                        <div class="form-group">
                            <label for="inputMesssage">Ваше сообщение</label>
                            <textarea id="inputMesssage" class="form-control" name="inputMesssage" rows="3"></textarea>
                        </div>
                        <h6>Прикрепите фотографии</h6>
                        <div class="form-group">
                            <div class="file-loading">
                                <label for="photos">Прикрепите фотографии</label>
                                <input id="photos" class="file" type="file" multiple name="photos[]" data-theme="fas">
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
				</div>
                <!-- .entry-content -->

				<?php if ( get_edit_post_link() ) : ?>
					<footer class="d-flex relative entry-footer">
						<?php
						edit_post_link(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Редактировать <span class="screen-reader-text">%s</span>', 'aginskoe' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							),
							'<span class="edit-link">',
							'</span>'
						);
						?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
		<div class="col-sm-12 col-md-6 col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

