<?php // _init.php

/**
 * Enqueue plugin style and scripts
 */

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\acfpe_enqueue_style', 0);

function acfpe_enqueue_style() {
	if( file_exists( plugin_dir_path( __DIR__ ) . 'custom-css/acfpe_custom_styles.css') ) {
		wp_enqueue_style( 'acfpe_style', WP_PLUGIN_URL.'/ACF-Page-Elements/css/acfpe_custom_styles.css', null );
	} else {
		wp_enqueue_style( 'acfpe_style', WP_PLUGIN_URL.'/ACF-Page-Elements/css/acfpe_styles.css', null );
	}
}

add_action( 'init', __NAMESPACE__ . '\\acfpe_register_scripts' );
add_action( 'wp_footer', __NAMESPACE__ . '\\acfpe_print_scripts');

function acfpe_register_scripts(){
	wp_register_script( 'acfpe_script', WP_PLUGIN_URL.'/ACF-Page-Elements/js/acfpe_script.js', ['jquery'], null,  true, 101);
   	wp_register_script( 'acfpe_ytbg', WP_PLUGIN_URL.'/ACF-Page-Elements/js/ytplayer.js', '', null, true, 250);
   	wp_register_script( 'acfpe_gmaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', '', null, true, 200);
   	if( file_exists( plugin_dir_path( __DIR__ ) . 'custom-js/acfpe_maps_custom_script.js') ) {
		wp_register_script( 'acfpe_maps_script', WP_PLUGIN_URL.'/ACF-Page-Elements/js/acfpe_maps_custom_script.js', ['jquery'], null,  true, 300 );
	} else {
	   	wp_register_script( 'acfpe_maps_script', WP_PLUGIN_URL.'/ACF-Page-Elements/js/acfpe_maps_script.js', ['jquery'], null,  true, 300 );
	}
}

// Enqueue ytbg and google maps scripts only when those elements are being used.

function acfpe_print_scripts(){  	
   	wp_enqueue_script('acfpe_script');

   	global $ytScript;
   	if($ytScript){
	   	wp_enqueue_script('acfpe_ytbg');
	}
	
	global $mapScripts;
   	if($mapScripts){
   		wp_enqueue_script('acfpe_gmaps');
		wp_enqueue_script('acfpe_maps_script');
	}
}

//Change ACF Local JSON save location to /acf-json folder inside this plugin
add_filter('acf/settings/save_json', function() {
    return (plugin_dir_path( __DIR__ ) . "acf-json");
});
 
//Include the /acf-json folder in the places to look for ACF Local JSON files
add_filter('acf/settings/load_json', function($paths) {
    $paths[] = (plugin_dir_path( __DIR__ ) . "acf-json");
    return $paths;
});

//Don't export dynamic values via Local JSON
add_filter('acf/prepare_field_for_export', function($field) {
 
	//If we're at the correct field
	if(isset($field['key']) && $field['key'] === 'field_54934f726023b') {

	//Blank out the select options with an empty array
	$field['choices'] = array();
	}

	return $field;
});

// Add thumbnail sizes
add_action( 'init', 'acfpe_image_sizes' );
function acfpe_image_sizes() {
    add_image_size('block_thumb', 360, 240, true);
    add_image_size('block_image', 360, 360, false);
	add_image_size('gallery_thumb', 640, 480, true);
	add_image_size('page_banner', 1600, 600, true);
  	add_image_size('page_banner_large', 1140, 430, true);
  	add_image_size('page_banner_mobile', 640, 240, true);
  	add_image_size('slide_thumb', 100, 100, true);
}

//Populate the Select field field_54934f726023b with dynamic values
add_filter('acf/load_field/key=field_54934f726023b', function($field) {

	// reset choices
	$field['choices'] = array();

	$choices = ['none'];

	$choices = array_merge($choices, get_intermediate_image_sizes());

	// remove any unwanted white space
	$choices = array_map('trim', $choices);

	// loop through array and add to field 'choices'
	if( is_array($choices) ) {
	    foreach( $choices as $choice ) { 
	        $field['choices'][ $choice ] = $choice;
	    }
	}

	// return the field
	return $field;

});





