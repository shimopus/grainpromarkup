<?php
/**
 * Template Name: Таблица заявок
 */

wp_enqueue_style( 'jquery-ui-structure', get_template_directory_uri() . '/js/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css' );
wp_enqueue_style( 'jquery-ui-theme', get_template_directory_uri() . '/js/jquery-ui-1.12.1.custom/jquery-ui.theme.min.css' );

wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.min.js', array('jquery'), '1.12.1-custom', true );
wp_enqueue_style( 'fancybox-theme', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.min.css' );

wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.12.1.custom/jquery-ui.min.js', array('jquery'), '1.12.1-custom', true );

wp_enqueue_script( 'table', get_template_directory_uri() . '/js/table.js', array('jquery', 'jquery-ui'), '14122017', true );
wp_enqueue_script( 'toggle', get_template_directory_uri() . '/js/toggle.js', array(), '07122017', true );
wp_enqueue_script( 'tabs', get_template_directory_uri() . '/js/tabs.js', array(), '07122017', true );

get_header();

$bidTypeField = get_field_object('bids_type');
$bidTypeValue = $bidTypeField['value'];

$api_request = "https://grainpro.herokuapp.com/pages/market-table/site?bidType=".$bidTypeValue."&v=2";

$tableHTML = wp_remote_retrieve_body(wp_remote_get($api_request));
?>
    <script>window.$bidType = "<?php print $bidTypeValue ?>";</script>

    <section class="gn-station">
        <div class="gn-page-row">

            <div class="gn-station__content">
                <div class="gn-station__content-main">

                    <div class="gn-station__text">Введите станцию для расчета цены с доставкой</div>

                    <!-- base input markup-->
                    <div class="gn-input gn-station__input">
                        <input class="gn-input__input jsStationsAutocomplete" type="text" placeholder="код или название станции">
                        <div class="gn-input__frame"></div>
                        <span class="gn-input__clear">очистить</span>
                    </div>
                    <!-- /base input markup-->

                </div>
                <div class="gn-station__content-aside">
                    <a href="#" class="gn-station__link jsPopupShow jsTabsLink"
                       data-popup="message"
                       data-tab="no-station"
                       data-tab-group="message"
                    >
                        нет вашей станции?
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section class="gn-filter">
        <div class="gn-page-row">
            <div class="gn-filter__content">
                <div class="gn-filter__content-inner">
                    <span class="gn-filter__title">Объявления по <?php print $bidTypeValue == "BUY" ? "покупке" : "продаже" ?> пшеницы</span>
                    <span class="gn-filter__item _active">все классы</span>
                    <span class="gn-filter__item" data-class="1class">фураж</span>
                    <span class="gn-filter__item" data-class="withoutclass">без класса</span>
                    <span class="gn-filter__item" data-class="3class">3 класс</span>
                    <span class="gn-filter__item" data-class="4class">4 класс</span>
                    <span class="gn-filter__item" data-class="5class">5 класс</span>
                </div>
            </div>
        </div>
    </section>

    <section class="gn-table-layout">

        <div class="gn-page-row">

            <div class="gn-table-layout__content">
                <div class="gn-table-layout__content-main jsTableContent">
                    <img src="<?php print get_template_directory_uri() . '/images/Magnify.svg' ?>" alt="Загрузка..." class="gn-loader _hidden"/>
                    <div class="jsTableError _hidden">Что-то пошло не так :(. Сообщите нам об этом, пожалуйста, любым удобным способом связи, указанным на сайте.</div>
                    <?php print $tableHTML ?>
                    <div class="gn-table__pager">
                        <span class="gn-table__pager-button _prev"></span>
                        <span class="gn-table__pager-page _active">1</span>
                        <span class="gn-table__pager-page">2</span>
                        <span class="gn-table__pager-button _next"></span>
                    </div>
                </div>
                <div class="gn-table-layout__content-aside">
                    <aside class="gn-table-aside">

                        <div class="gn-table-aside__terms gn-terms">
                            <div class="gn-terms__header jsBlockToggle">Термины в таблице</div>
                            <div class="gn-terms__list">
                                <div class="gn-terms__list-inner">
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">Размещение</strong> –  место хранения пшеницы.
                                    </div>
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">Агент</strong> – компания продавец пшеницы.
                                    </div>
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">Качество</strong> – ключевые характеристики пшеницы, соответствующие карте анализа.
                                    </div>
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">Карта анализа</strong> – документы, подтверждающие качество пшеницы. Обычно это отраслевая форма №3ПП-17.
                                    </div>
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">Объем</strong> – измеряется в тоннах.
                                    </div>
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">FCA</strong> – Free Carrier -
                                        ответственность продавца заканчивается после доставки товара до места доставки.
                                    </div>
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">EXW – Ex Works</strong> – ответственность продавца заканчивается после передачи товара покупателю или нанятому им перевозчику в помещении продавца.
                                    </div>
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">Погрузка ж/д</strong> – стоимость погрузки в вагоны у элеватора, хранящего товар.
                                    </div>
                                    <div class="gn-terms__item">
                                        <strong class="gn-terms__term">Доставка ж/д</strong> – стоимость перевозки товара до указанной станции транспортной компанией.
                                    </div>
                                    <div class="gn-terms__item">
                                        CPT?
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="gn-table-aside__links">
                            <a class="gn-table-aside__link" href="#">Остались вопросы по таблице?</a>
                            <a class="gn-table-aside__link" href="#">Некорректная информация в объявлении?</a>
                            <a class="gn-table-aside__link" href="#">Источники<br>информации</a>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <section class="gn-page-subsection">
        <section class="gn-not-found">
            <div class="gn-page-row">
                <div class="gn-not-found__content">
                    <h2 class="gn-not-found__header">
                        Не нашли, что искали?
                    </h2>

                    <div class="gn-not-found__inner">
                        <div class="gn-not-found__text">
                            Напишите, что нужно добавить, и мы найдем это для вас
                        </div>
                        <button class="gn-not-found__button gn-button _primary _big jsPopupShow jsTabsLink"
                                data-popup="message"
                                data-tab="not-found"
                                data-tab-group="message"
                        >
                            Написать в Grain.pro
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </section>
<?php
get_template_part( 'template-parts/message-popup');
get_footer();

