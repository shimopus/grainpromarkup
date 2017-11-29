<?php

class MainMenuItemsWalker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$is_active = array_search('current-menu-item', $item->classes);
		
		$output .= sprintf("<a href='%s' class='gn-header__link %s'>%s", esc_url($item->url), $is_active ? '_active' : '', esc_attr($item->title));
	}
	
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</a>";
	}
}

class FooterMenuItemsWalker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$output .= sprintf("<div class='gn-footer__column-item'><a href='%s' class='gn-footer__link'>%s", esc_url($item->url), esc_attr($item->title));
	}
	
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</a></div>";
	}
}

?>