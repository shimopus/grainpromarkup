<?php
/**
 * Template Name: Политика конфиденциальности
 */

get_header(); ?>

<div class="gn-page-border"></div>
<section class="gn-privacy-policy">
    <div class="gn-page-row">
        <div class="gn-privacy-policy__content">
            <h2 class="gn-privacy-policy__header">Политика конфиденциальности</h2>

            <div class="gn-privacy-policy__text">
                <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();

