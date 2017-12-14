<?php
/**
 * Template Name: FAQ
 */

$faqCategories = get_categories(array (
    'parent' => 10 //Вопросы-ответы
));

wp_enqueue_script( 'q_and_a', get_template_directory_uri() . '/js/q_and_a.js', array(), '07122017', true );

get_header();?>

<?php
if( $faqCategories ) : ?>
    <section class="gn-filter">
        <div class="gn-page-row">
            <div class="gn-filter__centered-content">
                <?php
                foreach( $faqCategories as $cat ) : ?>
                    <span class="gn-filter__item jsFAQFilter" data-catId="<?php print $cat->cat_ID; ?>"><?php print $cat->name; ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
foreach ($faqCategories as $cat) : $subCategories = get_categories(array(
    'parent' => $cat->cat_ID
)) ?>
    <section class="gn-faq">
        <div class="gn-page-row">
            <div class="gn-faq__content jsFAQContent" id="<?php print $cat->cat_ID; ?>">
                <h2 class="gn-faq__header">Вопрос-ответ</h2>
                <?php foreach ($subCategories as $subCat) : ?>
                <div class="gn-faq__section">
                    <h3 class="gn-faq__section-header" id="<?php print $subCat->cat_ID; ?>"><?php print $subCat->name; ?></h3>

                    <?php $questions = get_posts(array(
                        'posts_per_page' => -1, //all
                        'category' => $subCat->cat_ID
                    ));
                    foreach ($questions as $question) : ?>

                        <div class="gn-faq__item">
                            <div class="gn-faq__question jsQuestionBlock" id="<?php echo $question->ID; ?>"><?php echo $question->post_title; ?></div>
                            <div class="gn-faq__answer">
                                <div class="gn-faq__answer-inner">
                                    <?php echo $question->post_content; ?>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endforeach; ?>
<?php endif; ?>

    <section class="gn-not-found">
        <div class="gn-page-row">
            <div class="gn-not-found__content">
                <h2 class="gn-not-found__header">
                    Не нашли свой вопрос?
                </h2>

                <div class="gn-not-found__inner">
                    <div class="gn-not-found__text">
                        Задайте его нам при помощи формы обратной связи или напишите на почту p@grain.pro
                    </div>
                    <button class="gn-not-found__button gn-button _primary _big">Написать в Grain.pro</button>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();