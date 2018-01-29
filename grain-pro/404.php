<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Grain_Pro
 */

get_header(); ?>

    <section class="gn-404">
        <div class="gn-page-row">
            <div class="gn-404__inner">
                <div class="gn-404__content">
                    <h2 class="gn-404__header">Ошибка 404</h2>
                    <h3 class="gn-404__subheader">Упс, страница не найдена</h3>
                    <p class="gn-404__text">Вы попали на эту страницу по ссылке с нашего или чужого сайта? Пожалуйста,
                        <a href="" class="jsPopupShow jsTabsLink"
                           data-popup="message"
                           data-tab="problem"
                           data-tab-group="message">сообщите нам</a>, что произошло и мы устраним это недоразумение.
                    </p>
                    <p class="gn-404__text">Если вы впервые у нас, то узнать о возможностях сервиса вы можете <a href="/">здесь</a>.</p>
                </div>
            </div>
        </div>
    </section>
<?php
get_template_part( 'template-parts/message-popup');
get_footer();
