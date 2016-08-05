<?php

// Unique ID Field
function include_field_types_acfpe_unique_id( $version ) {

	class acfpe_field_unique_id extends acf_field {

		function __construct() {
			$this->name = 'unique_id';
			$this->label = __('Unique ID', 'acfpe_unique_id');
			$this->category = 'basic';
			$this->l10n = array();
	    	parent::__construct();
		}

		function render_field( $field ) {
			?>
			<input type="text" readonly="readonly" name="<?php echo esc_attr($field['name']) ?>" value="<?php echo esc_attr($field['value']) ?>" />
			<?php
		}

		function update_value( $value, $post_id, $field ) {
			if (!$value) {
				$value = uniqid();
			}
			return $value;
		}

		function validate_value( $valid, $value, $field, $input ){
			return true;
		}
	}

	// initiate custom field
	new acfpe_field_unique_id();
}

add_action('acf/include_field_types', 'include_field_types_acfpe_unique_id');