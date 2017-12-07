<?php
/**
 * Template Name: Таблица заявок
 */

wp_enqueue_style( 'jquery-ui-structure', get_template_directory_uri() . '/js/jquery-ui-1.12.1.custom/jquery-ui.structure.min.css' );
wp_enqueue_style( 'jquery-ui-theme', get_template_directory_uri() . '/js/jquery-ui-1.12.1.custom/jquery-ui.theme.min.css' );

wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui-1.12.1.custom/jquery-ui.min.js', array('jquery'), '1.12.1-custom', true );
wp_enqueue_script( 'stations', get_template_directory_uri() . '/js/table.js', array('jquery', 'jquery-ui'), '07122017', true );

get_header();

$bidTypeField = get_field_object('bids_type');
$bidTypeValue = $bidTypeField['value'];
$bidTypeKey = $bidTypeField['choices'][$bidTypeValue];

$api_request = "https://grainpro.herokuapp.com/pages/market-table/site?bidType=".$bidTypeKey."&v=2";

$tableHTML = wp_remote_retrieve_body(wp_remote_get($api_request));
?>
    <section class="gn-station">
        <div class="gn-page-row">

            <div class="gn-station__content">
                <div class="gn-station__content-main">

                    <div class="gn-station__text">Введите станцию для расчета цены с доставкой</div>

                    <!-- base input markup-->
                    <div class="gn-input gn-station__input">
                        <input class="gn-input__input jsStationsAutocomplete" type="text" placeholder="код или название станции">
                        <div class="gn-input__frame"></div>
                    </div>
                    <!-- /base input markup-->

                </div>
                <div class="gn-station__content-aside">
                    <a href="#" class="gn-station__link">нет вашей станции?</a>
                </div>
            </div>

        </div>
    </section>

    <section class="gn-filter">
        <div class="gn-page-row">
            <div class="gn-filter__content">
                <div class="gn-filter__content-inner">
                    <span class="gn-filter__title">Объявления по продаже пшеницы</span>
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
                    <?php print $tableHTML ?>
                </div>
                <div class="gn-table-layout__content-aside">

                </div>
            </div>

        </div>
    </section>

<?php
get_sidebar();
get_footer();

