<?php
/**
 * Template Name: Рассылка объявлений
 */

wp_enqueue_script( 'radio-tabs', get_template_directory_uri() . '/js/radio-tabs.js', array(), '24012018', true );
wp_enqueue_script( 'formAjax', get_template_directory_uri() . '/js/formAjax.js', array('jquery'), '23012018', true );

get_header(); ?>
    <div class="gn-page-border"></div>
    <section class="gn-ads">
        <div class="gn-page-row">
            <div class="gn-ads__content">
                <div class="gn-ads__info">
                    <div class="gn-ads__info-item">
                        <h2 class="gn-ads__info-header">По <a class="gn-link-accent" href="#">понедельникам</a> мы
                            делаем рассылку актуальных объявлений</h2>
                        <p>Продавцам шлем спрос, а покупателям — предложениe. Для каждого объявления рассчитываем цену с
                            учетом доставки на нужный базис.</p>
                        <p><strong>Присоединяйтесь. Будет полезно!</strong></p>
                    </div>


                    <div class="gn-ads__info-item">
                        <h2 class="gn-ads__info-header">Есть вопросы?</h2>
                        Прочитать ответы на часто задаваемые вопросы и задать свой можно на странице <a href="<?php the_field("faq_link")?>">вопрос
                            - ответ</a>.
                    </div>

                </div>
                <form class="gn-ads__form gn-form jsForm">
                    <input type="hidden" name="action" value="subscribe" />
                    <div class="gn-form__item _negative-indent">

                        <div class="gn-form__radio-group">
                            <!-- base radio markup-->
                            <label class="gn-radio _big">
                                <input name="bid-type" value="продавец и хочу получать спрос" type="radio" class="gn-radio__input">
                                <span class="gn-radio__icon"></span>
                                <span class="gn-radio__text">я продавец и хочу<br>получать спрос</span>
                            </label>
                            <!-- /base radio markup-->

                            <!-- base radio markup-->
                            <label class="gn-radio _big">
                                <input name="bid-type" value="покупатель и хочу получать предложения" type="radio" class="gn-radio__input">
                                <span class="gn-radio__icon"></span>
                                <span class="gn-radio__text">я покупатель и хочу<br>получать предложения</span>
                            </label>
                            <!-- /base radio markup-->
                        </div>
                    </div>

                    <div class="gn-form__item _medium-indent">
                        <label class="gn-form__label">электронная почта</label>

                        <!-- base input markup-->
                        <div class="gn-input gn-form__input">
                            <input type="email" name="email" class="gn-input__input">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>

                    <div class="gn-form__item">

                        <div class="gn-form__radio-group">
                            <!-- base radio markup-->
                            <label class="gn-radio _big">
                                <input name="know-station" value="true" type="radio" class="gn-radio__input jsRadioTabsTab"
                                       data-radio-tabs="known">
                                <span class="gn-radio__icon"></span>
                                <span class="gn-radio__text">я знаю свою ж/д<br>станцию</span>
                            </label>
                            <!-- /base radio markup-->

                            <!-- base radio markup-->
                            <label class="gn-radio _big">
                                <input name="know-station" value="false" type="radio" class="gn-radio__input jsRadioTabsTab"
                                       data-radio-tabs="not known">
                                <span class="gn-radio__icon"></span>
                                <span class="gn-radio__text">я не знаю свою ж/д<br>станцию</span>
                            </label>
                            <!-- /base radio markup-->
                        </div>
                    </div>

                    <div class="gn-form__item _medium-indent jsRadioTabsContent _active" data-radio-tabs="known">
                        <label class="gn-form__label">название или код ж/д станции</label>

                        <!-- base input markup-->
                        <div class="gn-input gn-form__input">
                            <input name="station" class="gn-input__input" type="text">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->

                        <div class="gn-form__sub">
                            <span class="gn-form__sub-link jsPopupShow jsTabsLink"
                                data-popup="message"
                                data-tab="no-station"
                                data-tab-group="message"
                             >
                                нет вашей станции?
                             </span>
                        </div>
                    </div>

                    <div class="gn-form__item _medium-indent jsRadioTabsContent" data-radio-tabs="not known">
                        <div class="gn-form__row">
                            <div class="gn-form__item-inner">
                                <label class="gn-form__label">регион</label>

                                <!-- base input markup-->
                                <div class="gn-input gn-form__input">
                                    <input name="region" class="gn-input__input" type="text">
                                    <div class="gn-input__frame"></div>
                                </div>
                                <!-- /base input markup-->
                            </div>

                            <div class="gn-form__item-inner _large">
                                <label class="gn-form__label">район</label>

                                <!-- base input markup-->
                                <div class="gn-input gn-form__input">
                                    <input name="district" class="gn-input__input" type="text">
                                    <div class="gn-input__frame"></div>
                                </div>
                                <!-- /base input markup-->
                            </div>
                        </div>
                    </div>

                    <div class="gn-form__item _medium-indent jsRadioTabsContent" data-radio-tabs="not known">
                        <label class="gn-form__label">населенный пункт</label>

                        <!-- base input markup-->
                        <div class="gn-input gn-form__input">
                            <input name="locality" class="gn-input__input" type="text">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>

                    <div class="gn-form__item _submit _wide">
                        <button type="submit" class="gn-button _submit">
                            Получать рассылку
                            <span class="gn-button__message">Спасибо! Мы свяжемся с вами в ближайшее время</span>
                        </button>

                        <div class="gn-form__message">
                            Нажимая на кнопку, вы соглашаетесь с <a href="<?php the_field("privacy_policy_link")?>">политикой
                                конфиденциальности</a>.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
get_template_part( 'template-parts/message-popup');
get_footer();