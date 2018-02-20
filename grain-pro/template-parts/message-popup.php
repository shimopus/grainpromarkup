<?php
/**
 * Template part for displaying popup with ability to send feedback
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Grain_Pro
 */

wp_enqueue_script('popup', get_template_directory_uri() . '/js/popup.js', array(), '19012018', true);
wp_enqueue_script('feedback-form', get_template_directory_uri() . '/js/feedback-form.js', array("jquery"), '24012018', true);
wp_enqueue_script('tabs', get_template_directory_uri() . '/js/tabs.js', array(), '07122017', true);

?>

<div class="gn-popup jsPopup jsPopupMessage" data-popup="message">

    <div class="gn-popup__wrapper">
        <div class="gn-popup__panel">
            <span class="gn-popup__close jsPopupHide"></span>

            <form class="gn-simple-form">
                <input type="hidden" name="action" value="feedback"/>
                <div class="gn-simple-form__row">
                    <div class="gn-simple-form__label">
                    </div>
                    <div class="gn-simple-form__control">
                        <input type="hidden" name="theme" value=""/>
                        <div class="gn-simple-tabs">
                            <div class="gn-simple-tabs__link jsTabsLink _active" data-tab="no-station"
                                 data-tab-group="message">
                                Нет моей ж/д станции
                            </div>
                            <div class="gn-simple-tabs__link jsTabsLink" data-tab="question" data-tab-group="message">
                                Задать вопрос
                            </div>
                            <div class="gn-simple-tabs__link jsTabsLink" data-tab="not-found" data-tab-group="message">
                                Не нашли, что искали?
                            </div>
                            <div class="gn-simple-tabs__link jsTabsLink" data-tab="problem" data-tab-group="message">
                                Рассказать о проблеме
                            </div>
                            <div class="gn-simple-tabs__link jsTabsLink" data-tab="other" data-tab-group="message">
                                Другое
                            </div>
                        </div>

                    </div>
                </div>
                <div class="gn-simple-form__row">

                    <div class="gn-simple-form__label">
                    <span class="jsTabsTab" data-tab="no-station" data-tab-group="message">
                        Укажите наименование станции и ближайший населенный пункт
                    </span>
                        <span class="jsTabsTab" data-tab="question" data-tab-group="message">
                        Напишите свой вопрос
                    </span>
                        <span class="jsTabsTab" data-tab="not-found" data-tab-group="message">
                        Напишите, какую информацию вы не нашли
                    </span>
                        <span class="jsTabsTab" data-tab="problem" data-tab-group="message">
                        Напишите подробно, что случилось
                    </span>
                        <span class="jsTabsTab" data-tab="other" data-tab-group="message">
                        Напишите сообщение
                    </span>
                    </div>
                    <div class="gn-simple-form__control">

                        <!-- base textarea markup-->
                        <div class="gn-textarea gn-simple-form__textarea">
                            <textarea name="feedback" maxlength="2000" class="gn-textarea__textarea"></textarea>
                            <div class="gn-textarea__frame"></div>
                        </div>
                        <!-- /base textarea markup-->

                    </div>
                </div>
                <div class="gn-simple-form__row">

                    <div class="gn-simple-form__label">
                        Электронная почта
                    </div>
                    <div class="gn-simple-form__control">

                        <!-- base input markup-->
                        <div class="gn-input gn-simple-form__input">
                            <input name="email" class="gn-input__input" type="email">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->

                    </div>
                </div>

                <div class="gn-simple-form__row _actions">
                    <div class="gn-simple-form__label">
                    </div>
                    <div class="gn-simple-form__control">
                        <button type="submit" class="gn-simple-form__button gn-button _primary jsSubmitMessage">
                            Отправить сообщение
                        </button>
                    </div>
                </div>
            </form>

            <div class="gn-popup__submit-info">
                <div class="gn-popup__submit-info-img"
                     style="background-image: url(<?php print get_template_directory_uri() . '/images/dude.jpg' ?>)"></div>
                <div class="gn-popup__submit-info-header">Спасибо за ваше сообщение! Мы ответим вам в ближайшее время
                </div>
            </div>
        </div>
    </div>

</div>