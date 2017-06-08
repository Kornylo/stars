<?php
return array(
	////////////////////////////////////////
	// Localized JS Message Configuration //
	////////////////////////////////////////
	/**
	 * Validation Messages
	 */
	'validation' => array(
		'alphabet'     => esc_html__('Value needs to be Alphabet', 'mikos'),
		'alphanumeric' => esc_html__('Value needs to be Alphanumeric', 'mikos'),
		'numeric'      => esc_html__('Value needs to be Numeric', 'mikos'),
		'email'        => esc_html__('Value needs to be Valid Email', 'mikos'),
		'url'          => esc_html__('Value needs to be Valid URL', 'mikos'),
		'maxlength'    => esc_html__('Length needs to be less than {0} characters', 'mikos'),
		'minlength'    => esc_html__('Length needs to be more than {0} characters', 'mikos'),
		'maxselected'  => esc_html__('Select no more than {0} items', 'mikos'),
		'minselected'  => esc_html__('Select at least {0} items', 'mikos'),
		'required'     => esc_html__('This is required', 'mikos'),
	),
	/**
	 * Import / Export Messages
	 */
	'util' => array(
		'import_success'    => esc_html__('Import succeed, option page will be refreshed..', 'mikos'),
		'import_failed'     => esc_html__('Import failed', 'mikos'),
		'export_success'    => esc_html__('Export succeed, copy the JSON formatted options', 'mikos'),
		'export_failed'     => esc_html__('Export failed', 'mikos'),
		'restore_success'   => esc_html__('Restoration succeed, option page will be refreshed..', 'mikos'),
		'restore_nochanges' => esc_html__('Options identical to default', 'mikos'),
		'restore_failed'    => esc_html__('Restoration failed', 'mikos'),
	),
	/**
	 * Control Fields String
	 */
	'control' => array(
		// select2 select box
		'select2_placeholder' => esc_html__('Select option(s)', 'mikos'),
		// fontawesome chooser
		'fac_placeholder'     => esc_html__('Select an Icon', 'mikos'),
	),
);
/**
 * EOF
 */