<?php

add_action('after_setup_theme', 'acs_vnw_remove_generate_credits');
function acs_vnw_remove_generate_credits() {
	remove_action('generate_credits', 'generate_add_footer_info');
}	

add_action('generate_credits', 'acs_vnw_add_acs_credits');
function acs_vnw_add_acs_credits() {
	echo __('Copyright','generate') . ' &copy ' . date('Y') . ' VNW <br>';
	echo 'Ontwerp en realisatie <a alt="wordpress website laten maken?" href="http://acservices.nl/internetdiensten/web-ontwikkeling/">ACServices Leeuwarden</a>';
};

add_filter('generate_color_option_defaults', 'acs_vnw_filter_color_defaults');
function acs_vnw_filter_color_defaults($generate_color_defaults) {
	return array_merge($generate_color_defaults, array(
		'form_button_background_color' => '#2b5192',
		'form_button_background_color_hover' => '#2b5192',
		'h1_color' => '#2b5192',
		'h2_color' => '#2b5192',
		'h3_color' => '#2b5192',
		'navigation_background_color' => 'none',
		'footer_background_color' => '#dddddd',
		'navigation_text_color' => '#2b5192',
	));
}

add_filter('comments_open', 'filter_disable_comments', 10);
function filter_disable_comments() {
	return false;
}

add_filter('xmlrpc_methods', 'filter_disable_pingback');
function filter_disable_pingback($methods) {
   unset($methods['pingback.ping']);
   unset($methods['pingback.extensions.getPingbacks']);
   
   return $methods;
}