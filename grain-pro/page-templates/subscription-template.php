<?php
/**
 * Template Name: Рассылка объявлений
 */

get_header(); ?>

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
                <form class="gn-ads__form gn-form">
                    <div class="gn-form__item _negative-indent">

                        <div class="gn-form__radio-group">
                            <!-- base radio markup-->
                            <label class="gn-radio _big">
                                <input name="ad-type" type="radio" class="gn-radio__input">
                                <span class="gn-radio__icon"></span>
                                <span class="gn-radio__text">я продавец и хочу<br>получать спрос</span>
                            </label>
                            <!-- /base radio markup-->

                            <!-- base radio markup-->
                            <label class="gn-radio _big">
                                <input name="ad-type" type="radio" class="gn-radio__input">
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
                            <input class="gn-input__input" type="text">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>

                    <div class="gn-form__item">

                        <div class="gn-form__radio-group">
                            <!-- base radio markup-->
                            <label class="gn-radio _big">
                                <input name="station" type="radio" class="gn-radio__input jsRadioTabsTab"
                                       data-radio-tabs="known">
                                <span class="gn-radio__icon"></span>
                                <span class="gn-radio__text">я знаю свою ж/д<br>станцию</span>
                            </label>
                            <!-- /base radio markup-->

                            <!-- base radio markup-->
                            <label class="gn-radio _big">
                                <input name="station" type="radio" class="gn-radio__input jsRadioTabsTab"
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
                            <input class="gn-input__input" type="text">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->

                        <div class="gn-form__sub">
                            <span class="gn-form__sub-link">нет вашей станции?</span>
                        </div>
                    </div>

                    <div class="gn-form__item  _medium-indent jsRadioTabsContent" data-radio-tabs="not known">
                        <div class="gn-form__row">
                            <div class="gn-form__item-inner">
                                <label class="gn-form__label">регион</label>

                                <!-- base input markup-->
                                <div class="gn-input gn-form__input">
                                    <input class="gn-input__input" type="text">
                                    <div class="gn-input__frame"></div>
                                </div>
                                <!-- /base input markup-->
                            </div>

                            <div class="gn-form__item-inner _large">
                                <label class="gn-form__label">район</label>

                                <!-- base input markup-->
                                <div class="gn-input gn-form__input">
                                    <input class="gn-input__input" type="text">
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
                            <input class="gn-input__input" type="text">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>

                    <div class="gn-form__item _submit _wide">
                        <!-- button before -->
                        <button class="gn-button _submit">
                            Получать рассылку
                            <span class="gn-button__message">Спасибо! Мы свяжемся с вами в ближайшее время</span>
                        </button>
                        <!-- /button before -->

                        <!-- button after -->
                        <!--<button class="gn-button _submit _show-message" disabled>-->
                        <!--Получать рассылку-->
                        <!--<span class="gn-button__message">Спасибо! Мы свяжемся с вами в ближайшее время</span>-->
                        <!--</button>-->
                        <!-- /button after -->

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
get_sidebar();
get_footer();