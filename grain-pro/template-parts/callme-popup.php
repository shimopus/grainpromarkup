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

<div class="gn-popup _small _gray jsPopup jsPopupMessage" data-popup="call-me">

    <div class="gn-popup__wrapper">
        <div class="gn-popup__panel">
            <span class="gn-popup__close jsPopupHide"></span>

            <h2 class="gn-popup__header">Обратный звонок</h2>

            <form class="gn-simple-form _no-paddings">
                <input type="hidden" name="action" value="callback"/>
                <div class="gn-simple-form__row">
                    <div class="gn-simple-form__control">
                        <div class="gn-simple-form__control-label">телефон</div>

                        <!-- base input markup-->
                        <div class="gn-input gn-contact-panel__input">
                            <span class="gn-input__prefix">+7</span>
                            <input class="gn-input__input" type="text" name="phone_number"
                                   pattern="\(?[0-9]{3}\)?( |)[0-9]{3}( |-|)[0-9]{2}( |-|)[0-9]{2}"
                                   title="Формат: 9165491989 или (916) 549-19-89">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>
                </div>

                <div class="gn-simple-form__row _actions-small">
                    <div class="gn-simple-form__control">
                        <button class="gn-simple-form__button gn-button _primary _full-width jsSubmitMessage">
                            Перезвоните мне
                        </button>

                        <div class="gn-simple-form__warning">
                            Нажимая на кнопку, вы соглашаетесь с&nbsp;<a href="./privacy-policy.html">политикой конфиденциальности</a>.
                        </div>
                    </div>
                </div>
            </form>

            <div class="gn-popup__submit-info _vertical _gray">
                <div class="gn-popup__submit-info-img"
                     style="background-image: url(<?php print get_template_directory_uri() . '/images/dude.jpg' ?>)"></div>
                <div class="gn-popup__submit-info-header">Спасибо!</div>
                <div class="gn-popup__submit-info-text">Мы обязательно свяжемся с вами в ближайшее время</div>
            </div>
        </div>
    </div>

</div>
