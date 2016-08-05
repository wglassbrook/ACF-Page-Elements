<?php // _functions.php

function acfpe_get_version() {
    $plugin_data = get_plugin_data( __FILE__ );
    $plugin_version = $plugin_data['Version'];
    return $plugin_version;
}

function acfpe_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb; // returns an array with the rgb values. $rgb[0] = red, $rgb[1] = green, $rgb[2} = blue 
}

function acfpe_contrastYIQ($hex){
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
	   $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	   $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	   $b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
	   $r = hexdec(substr($hex,0,2));
	   $g = hexdec(substr($hex,2,2));
	   $b = hexdec(substr($hex,4,2));
	}
	$yiq = (($r*299)+($g*587)+($b*114))/1000;
	return ($yiq >= 128) ? 'black' : 'white';
}

function acfpe_get_element_file($filePath) {
	ob_start();
	include $filePath;
	$output = ob_get_clean();
	return $output;
}

function acfpe_append_to_content($content) {
	if(get_field('hide_content')){
		$acfpe_content = '';
	} else {
		$acfpe_content = $content;
	};
	
	if(have_rows('p_elements')):
		$elementID = 0;
		while (have_rows('p_elements')):
			the_row();

			$elementID++;
			$elementIDstring = str_pad($elementID, 3, '0', STR_PAD_LEFT);

			$acfpe_content .= "<a id='page_section_" . $elementIDstring . "'></a>";

			$layout = get_row_layout();

			$filePath = "";
			switch ($layout) {
				case "additional_content":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/additional_content.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/additional_content.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/additional_content.php");
					};
					break;
				case "blocks":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/blocks.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/blocks.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/blocks.php");
					};
					break;
				case "buttons":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/buttons.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/buttons.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/buttons.php");
					};
					break;
				case "columned_content":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/content_columns.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/content_columns.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/content_columns.php");
					};
					break;
				case "document_list":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/document_list.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/document_list.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/document_list.php");
					};
					break;
				case "faq_list":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/faq_list.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/faq_list.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/faq_list.php");
					};
					break;
				case "featured_content":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/featured_content.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/featured_content.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/featured_content.php");
					};
					break;
				case "gallery":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/gallery.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/gallery.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/gallery.php");
					};
					break;
				case "map":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/map.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/map.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/map.php");
					};
					break;
				case "post_list":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/post_list.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/post_list.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/post_list.php");
					};
					break;
				case "project_list":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/project_list.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/project_list.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/project_list.php");
					};
					break;
				case "slider":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/slider.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/slider.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/slider.php");
					};
					break;
				case "title_element":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/title.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/title.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/title.php");
					};
					break;
				case "elements_wrapper":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/elements_wrapper.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/elements_wrapper.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/elements_wrapper.php");
					};
					break;
				case "close_wrapper":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/close_wrapper.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/close_wrapper.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/close_wrapper.php");
					};
					break;
				case "jumbotron":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/jumbotron_wrapper.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/jumbotron_wrapper.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/jumbotron_wrapper.php");
					};
					break;
				case "close_jumbotron":
					if( file_exists( plugin_dir_path( __DIR__ ) . "custom-elements/close_jumbotron.php") ) {
						$filePath = (plugin_dir_path( __DIR__ ) . "custom-elements/close_jumbotron.php");
					} else {
						$filePath = (plugin_dir_path( __DIR__ ) . "elements/close_jumbotron.php");
					};
					break;
			} // end switch

			$acfpe_content .= acfpe_get_element_file($filePath);

		endwhile;
	endif;
	return $acfpe_content;
}

add_filter("the_content", "acfpe_append_to_content", 100);
