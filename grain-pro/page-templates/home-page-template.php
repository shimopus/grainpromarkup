<?php
/**
 * Template Name: Домашняя страница
 */

wp_enqueue_script( 'tabs', get_template_directory_uri() . '/js/tabs.js', array(), '07122017', true );
wp_enqueue_script( 'callback', get_template_directory_uri() . '/js/callback.js', array('jquery'), '20012018', true );

get_header(); ?>


    <section class="gn-infoblock-time">
        <div class="gn-page-row">
            <div class="gn-infoblock-time__content">
                <h2 class="gn-infoblock-time__header">
                    Grain.pro —  это сервис для поиска, сравнения, покупки и продажи пшеницы по всей России
                </h2>

                <div class="gn-infoblock-time__content-inner">
                    <div class="gn-infoblock-time__advantage">Экономит ваше время</div>

                    <ul class="gn-infoblock-time__list gn-list-u">
                        <li class="gn-list-u__item">Актуальный список объявлений купли продажи пшеницы</li>
                        <li class="gn-list-u__item">Открытая и полная информация по каждому объявлению включая карту анализа</li>
                        <li class="gn-list-u__item">Быстрое сравнение цен от разных компаний на нужный базис</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="gn-infoblock-why">
        <div class="gn-page-row">
            <div class="gn-infoblock-why__content">
                <div class="gn-infoblock-why__left">

                    <h2 class="gn-infoblock-why__header">
                        Зачем Grain.pro<br>
                        <a class="gn-tabs-link _active jsTabsLink" href="#"
                           data-tab="sellers"
                           data-tab-group="why"
                        >
                            продавцам
                        </a>
                        и
                        <a class="gn-tabs-link jsTabsLink" href="#"
                           data-tab="buyers"
                           data-tab-group="why"
                        >
                            покупателям
                        </a>
                    </h2>

                    <div class="gn-infoblock-why__button jsTabsTab _active"
                        data-tab="sellers"
                        data-tab-group="why"
                    >
                        <a class="gn-button" href="<?php print get_field('grain-buy-page'); ?>">Посмотреть объявления</a>
                    </div>

                    <div class="gn-infoblock-why__button jsTabsTab"
                        data-tab="buyers"
                        data-tab-group="why"
                    >
                        <a class="gn-button" href="<?php print get_field('grain-sell-page'); ?>">Посмотреть объявления</a>
                    </div>
                </div>
                <div class="gn-infoblock-why__right">

                    <ul class="gn-infoblock-why__list gn-list-i jsTabsTab _active"
                        data-tab="sellers"
                        data-tab-group="why"
                    >
                        <li class="gn-list-i__item _binoculars">Показывает покупателей, которым подходит ваше предложение по цене с учетом стоимости доставки</li>
                        <li class="gn-list-i__item _wheat">Позволяет легко оценить ваше предложение относительно других продавцов</li>
                        <li class="gn-list-i__item _plane">Проводит рассылку вашего объявления по покупателям</li>
                    </ul>

                    <ul class="gn-infoblock-why__list gn-list-i jsTabsTab"
                        data-tab="buyers"
                        data-tab-group="why"
                    >
                        <li class="gn-list-i__item _binoculars">Показывает цены с доставкой на нужную вам станцию</li>
                        <li class="gn-list-i__item _wheat">Позволяет легко сравнить предложения и выбрать оптимальное</li>
                        <li class="gn-list-i__item _plane">Проводит рассылку вашего объявления по продавцам</li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
    <section class="gn-infoblock-distrib">
        <div class="gn-page-row">
            <h2 class="gn-infoblock-distrib__header">
                Рассылка объявлений
            </h2>

            <div class="gn-infoblock-distrib__content">
                <div class="gn-infoblock-distrib__left">
                    <div class="gn-infoblock-distrib__text">
                        Каждый <a class="gn-link-accent" href="<?php print get_field('subscribe-page'); ?>">понедельник</a> мы проводим рассылку актуальных объявлений по электронной почте. Это удобный способ следить за изменениями цены пшеницы на рынке и быть в курсе текущего спроса и предложения на нужный базис.
                    </div>

                    <div class="gn-infoblock-distrib__button">
                        <a class="gn-button" href="<?php print get_field('subscribe-page'); ?>">Получать рассылку</a>
                    </div>
                </div>
                <div class="gn-infoblock-distrib__right"></div>
            </div>
        </div>
    </section>
    <section class="gn-infoblock-advantages">
        <div class="gn-page-row">
            <div class="gn-infoblock-advantages__content">
                <h2 class="gn-infoblock-advantages__header">
                    Почему стоит разместить объявление на Grain.pro
                </h2>

                <ul class="gn-infoblock-advantages__list gn-list-u _big-indent">
                    <li class="gn-list-u__item">Ваше объявление получат более 1500 покупателей и продавцов пшеницы</li>
                    <li class="gn-list-u__item">Полнота информации в объявлениях увеличит количество теплых звонков</li>
                    <li class="gn-list-u__item">Инструмент расчета стоимости цены с доставкой расширяет охват потенциальных клиентов</li>
                </ul>

                <div class="gn-infoblock-advantages__button">
                    <a class="gn-button" href="<?php print get_field('add-bid-page'); ?>">Подать объявление</a>
                </div>
            </div>
        </div>
    </section>
    <section class="gn-infoblock-start">
        <div class="gn-page-row">
            <div class="gn-infoblock-start__content">
                <h2 class="gn-infoblock-start__header">
                    С чего начать:
                </h2>

                <ol class="gn-infoblock-start__list gn-list-o _row">
                    <li class="gn-list-o__item">
                        Посмотрите объявления о <a href="<?php print get_field('grain-buy-page'); ?>">покупке</a> и&nbsp;<a href="<?php print get_field('grain-sell-page'); ?>">продаже</a> пшеницы
                    </li>
                    <li class="gn-list-o__item"><a href="<?php print get_field('subscribe-page'); ?>">Подпишитесь</a> на рассылку объявлений на вашу почту</li>
                    <li class="gn-list-o__item"><a href="<?php print get_field('add-bid-page'); ?>">Разместите</a> свое объявление на сайте</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="gn-page-subsection">
        <section class="gn-contact-panel">
            <div class="gn-page-row">
                <div class="gn-contact-panel__panel">
                    <h2 class="gn-contact-panel__header">
                        Остались вопросы?
                    </h2>
                    <div class="gn-contact-panel__content">
                        <div class="gn-contact-panel__left">
                            <div class="gn-contact-panel__item">
                                позвоните нам:
                                <span class="gn-contact-panel__big">+7 (916) 549-19-89</span>
                            </div>

                            <div class="gn-contact-panel__item">
                                напишите на почту
                                <a class="gn-contact-panel__big" href="mailto:p@grain.pro">p@grain.pro</a>
                            </div>
                        </div>
                        <div class="gn-contact-panel__right">
                            <div class="gn-contact-panel__item">
                                или оставьте свой номер:
                            </div>
                            <form class="gn-contact-panel__form">

                                <!-- base input markup-->
                                <div class="gn-input gn-contact-panel__input">
                                    <span class="gn-input__prefix">+7</span>
                                    <input class="gn-input__input" type="text" id="phone_number"
                                        pattern="\(?[0-9]{3}\)?( |)[0-9]{3}( |-|)[0-9]{2}( |-|)[0-9]{2}"
                                        title="Формат: 9165491989 или (916) 549-19-89">
                                    <div class="gn-input__frame"></div>
                                </div>
                                <!-- /base input markup-->

                                <!-- button after -->
                                <button type="submit" class="gn-contact-panel__button gn-button _primary jsCallBack">
                                    Перезвоните мне
                                    <span class="gn-button__message">Спасибо! Мы перезвоним вам в ближайшее время</span>
                                </button>
                                <!-- /button after -->
                            </form>
                            <div class="gn-contact-panel__warning">
                                Нажимая на кнопку, вы соглашаетесь с <a href="<?php print get_field('privacy-policy-page'); ?>">политикой
                                    конфиденциальности</a>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

<?php
get_footer();

