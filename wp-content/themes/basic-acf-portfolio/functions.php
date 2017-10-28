<?php

	function custom_title(){
		$name = get_bloginfo('name');
		$description = get_bloginfo('description');
		$page_title = wp_title('|',true,'right');
		return $page_title.$name . " ~ ".$description;
	}
add_action('after_setup_theme','custom_menus');
function custom_menus(){
	register_nav_menus( [
		'main-menu'=>'main menu, pages',
		'category-menu'=>'category menu, sub-header'
	] );
}