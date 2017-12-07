<?php
/**
 * Template Name: Таблица заявок
 */

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
                        <input class="gn-input__input" type="text" placeholder="код или название станции">
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
                    <span class="gn-filter__item">фураж</span>
                    <span class="gn-filter__item">без класса</span>
                    <span class="gn-filter__item">3 класс</span>
                    <span class="gn-filter__item">4 класс</span>
                    <span class="gn-filter__item">5 класс</span>
                    <span class="gn-filter__item">1 класс</span>
                    <span class="gn-filter__item">2 класс</span>
                    <span class="gn-filter__item">3 класс</span>
                </div>
            </div>
        </div>
    </section>

    <section class="gn-table-layout">

        <div class="gn-page-row">

            <div class="gn-table-layout__content">
                <div class="gn-table-layout__content-main">
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

