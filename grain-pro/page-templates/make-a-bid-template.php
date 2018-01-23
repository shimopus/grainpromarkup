<?php
/**
 * Template Name: Подать объявление
 */

wp_enqueue_script( 'addBidAjax', get_template_directory_uri() . '/js/addBidAjax.js', array('jquery'), '23012018', true );

get_header(); ?>
    <div class="gn-page-border"></div>
    <section class="gn-ads">
        <div class="gn-page-row">
            <div class="gn-ads__content">
                <div class="gn-ads__info">
                    <div class="gn-ads__info-item">
                        <h2 class="gn-ads__info-header">Как подать объявление</h2>
                        заполните и отправьте форму справа или сообщите информацию об объявлении по телефону +7
                        (916)-549-19-89, в письме на <a href="mailto:p@grain.pro">p@grain.pro</a> или заказав <a
                                href="#">обратный звонок</a>.
                    </div>

                    <div class="gn-ads__info-item">
                        <h2 class="gn-ads__info-header">Чтобы изменить, удалить опубликованное объявление,</h2>
                        свяжитесь с нами по телефону +7 (916)-549-19-89, пришлите сообщение на <a
                                href="mailto:p@grain.pro">p@grain.pro</a> или закажите <a href="#">обратный звонок</a>.
                    </div>

                    <div class="gn-ads__info-item">
                        <h2 class="gn-ads__info-header">Есть вопросы?</h2>
                        Прочитать ответы на часто задаваемые вопросы и задать свой можно на странице <a href="<?php print get_field('faq_link'); ?>">вопрос
                            - ответ</a>.
                    </div>

                </div>
                <form class="gn-ads__form gn-form jsAddBidForm">
                    <input type="hidden" name="action" value="add-bid" />
                    <div class="gn-form__item">
                        <label for="email" class="gn-form__label">электронная почта</label>

                        <!-- base input markup-->
                        <div class="gn-input gn-form__input">
                            <input name="email" type="email" class="gn-input__input">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>

                    <div class="gn-form__item _small-indent">
                        <label for="phone_number" class="gn-form__label">телефон</label>

                        <!-- base input markup-->
                        <div class="gn-input gn-form__input">
                            <span class="gn-input__prefix">+7</span>
                            <input name="phone_number" class="gn-input__input" type="text"
                                   pattern="\(?[0-9]{3}\)?( |)[0-9]{3}( |-|)[0-9]{2}( |-|)[0-9]{2}"
                                   title="Формат: 9165491989 или (916) 549-19-89">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>

                    <div class="gn-form__item">
                        <label class="gn-form__label">мое объявление</label>

                        <div class="gn-form__radio-group">
                            <!-- base radio markup-->
                            <label class="gn-radio">
                                <input value="о покупке" name="bid-type" type="radio" class="gn-radio__input">
                                <span class="gn-radio__icon"></span>
                                <span class="gn-radio__text">о покупке</span>
                            </label>
                            <!-- /base radio markup-->

                            <!-- base radio markup-->
                            <label class="gn-radio">
                                <input value="о продаже" name="bid-type" type="radio" class="gn-radio__input">
                                <span class="gn-radio__icon"></span>
                                <span class="gn-radio__text">о продаже</span>
                            </label>
                            <!-- /base radio markup-->
                        </div>
                    </div>

                    <div class="gn-form__item">
                        <label for="owner_inn" class="gn-form__label">ИНН собственника</label>

                        <!-- base input markup-->
                        <div class="gn-input gn-form__input">
                            <input name="owner_inn" class="gn-input__input" type="text"
                                pattern="[0-9]{10,12}"
                                minlength="10"
                                maxlength="12"
                                title="Должно быть от 10 до 12 цифр.">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>

                    <div class="gn-form__item">
                        <label for="elevator_inn" class="gn-form__label">ИНН элеватора</label>

                        <!-- base input markup-->
                        <div class="gn-input gn-form__input">
                            <input name="elevator_inn" class="gn-input__input" type="text"
                                pattern="[0-9]{10,12}"
                                minlength="10"
                                maxlength="12"
                                title="Должно быть от 10 до 12 цифр.">
                            <div class="gn-input__frame"></div>
                        </div>
                        <!-- /base input markup-->
                    </div>

                    <div class="gn-form__item">
                        <div class="gn-form__row">
                            <div class="gn-form__item-inner">
                                <label for="price" class="gn-form__label">цена, руб/т.</label>

                                <!-- base input markup-->
                                <div class="gn-input gn-form__input">
                                    <input name="price" class="gn-input__input" type="text"
                                        pattern="[0-9]+"
                                        title="Использовать можно только цифры"
                                    >
                                    <div class="gn-input__frame"></div>
                                </div>
                                <!-- /base input markup-->
                            </div>

                            <div class="gn-form__item-inner _large">
                                <label for="volume" class="gn-form__label">объем, т.</label>

                                <!-- base input markup-->
                                <div class="gn-input gn-form__input">
                                    <input name="volume" class="gn-input__input" type="text"
                                        pattern="[0-9]+"
                                        title="Использовать можно только цифры"
                                    >
                                    <div class="gn-input__frame"></div>
                                </div>
                                <!-- /base input markup-->
                            </div>
                        </div>
                    </div>

                    <div class="gn-form__item _medium-indent">
                        <!-- base file markup-->
                        <label class="gn-file gn-form__file">
                            <input name="attachmentFile" class="gn-file__input" type="file" accept=".jpg, .jpeg, .png, .pdf">
                            <div class="gn-file__label">Загрузите карту анализа PDF или JPG файл</div>
                            <div class="gn-file__button">Выбрать файл</div>
                        </label>
                        <!-- /base file markup-->
                    </div>

                    <div class="gn-form__item _submit">
                        <!-- button before -->
                        <button type="submit" class="gn-button _submit">
                            Отправить
                            <span class="gn-button__message">Спасибо! Мы свяжемся с вами в ближайшее время</span>
                        </button>
                        <!-- /button before -->

                        <!-- button after -->
                        <!--<button class="gn-button _submit _show-message" disabled>-->
                        <!--   Отправить-->
                        <!--    <span class="gn-button__message">Спасибо! Мы свяжемся с вами в ближайшее время</span>-->
                        <!--</button>-->
                        <!-- /button after -->

                        <div class="gn-form__message">
                            Нажимая на кнопку, вы соглашаетесь с <a href="<?php print get_field('privacy_policy_link'); ?>">политикой
                                конфиденциальности</a>.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
get_footer();