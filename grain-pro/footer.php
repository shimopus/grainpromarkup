<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Grain_Pro
 */

?>

	</main><!-- #content -->

    <?php if (is_404()) {
        print "<section class=\"gn-404-bg\"></section>";
    } ?>

	<footer class="gn-page-footer gn-footer">
		<div class="gn-page-row">
			<div class="gn-footer__inner">
				<div class="gn-footer__column">
					<h3 class="gn-footer__column-header">Объявления</h3>

					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-column-1',
							'container'      => '',
							'fallback_cb'    => false,
							'items_wrap'     => '%3$s',
							'walker'         => new FooterMenuItemsWalker()
						) );
					?>
				</div>
				
				<div class="gn-footer__column _small">
					<h3 class="gn-footer__column-header">Рассылка</h3>
					
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-column-2',
							'container'      => '',
							'fallback_cb'    => false,
							'items_wrap'     => '%3$s',
							'walker'         => new FooterMenuItemsWalker()
						) );
					?>
				</div>
				
				<div class="gn-footer__column _smallest">
					<h3 class="gn-footer__column-header">О нас</h3>

					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-column-3',
							'container'      => '',
							'fallback_cb'    => false,
							'items_wrap'     => '%3$s',
							'walker'         => new FooterMenuItemsWalker()
						) );
					?>
				</div>
				
				<div class="gn-footer__column _smallest">
					<h3 class="gn-footer__column-header">Журнал</h3>

					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-column-4',
							'container'      => '',
							'fallback_cb'    => false,
							'items_wrap'     => '%3$s',
							'walker'         => new FooterMenuItemsWalker()
						) );
					?>
				</div>
				
				<div class="gn-footer__column">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-side',
							'container'      => '',
							'fallback_cb'    => false,
							'items_wrap'     => '%3$s',
							'walker'         => new FooterMenuItemsWalker()
						) );
					?>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
