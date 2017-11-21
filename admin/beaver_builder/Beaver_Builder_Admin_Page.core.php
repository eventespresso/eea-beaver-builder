<?php if ( ! defined( 'EVENT_ESPRESSO_VERSION' )) { exit('NO direct script access allowed'); }
/**
 *
 * Beaver_Builder_Admin_Page
 *
 * This contains the logic for setting up the Beaver_Builder Addon Admin related pages.  Any methods without PHP doc comments have inline docs with parent class.
 *
 *
 * @package			Beaver_Builder_Admin_Page (beaver_builder addon)
 * @subpackage 	admin/Beaver_Builder_Admin_Page.core.php
 * @author				Darren Ethier, Brent Christensen
 *
 * ------------------------------------------------------------------------
 */
class Beaver_Builder_Admin_Page extends EE_Admin_Page {


	protected function _init_page_props() {
		$this->page_slug = BEAVER_BUILDER_PG_SLUG;
		$this->page_label = BEAVER_BUILDER_LABEL;
		$this->_admin_base_url = EE_BEAVER_BUILDER_ADMIN_URL;
		$this->_admin_base_path = EE_BEAVER_BUILDER_ADMIN;
	}




	protected function _ajax_hooks() {}





	protected function _define_page_props() {
		$this->_admin_page_title = BEAVER_BUILDER_LABEL;
		$this->_labels = array(
			'publishbox' => __('Update Settings', 'event_espresso')
		);
	}




	protected function _set_page_routes() {
		$this->_page_routes = array(
			'default' => '_basic_settings',
			'update_settings' => array(
				'func' => '_update_settings',
				'noheader' => TRUE
			),
			'usage' => '_usage'
		);
	}





	protected function _set_page_config() {

		$this->_page_config = array(
			'default' => array(
				'nav' => array(
					'label' => __('Settings', 'event_espresso'),
					'order' => 10
					),
				'metaboxes' => array_merge( $this->_default_espresso_metaboxes, array( '_publish_post_box') ),
				'require_nonce' => FALSE
			),
			'usage' => array(
				'nav' => array(
					'label' => __('Beaver Builder Usage', 'event_espresso'),
					'order' => 30
					),
				'require_nonce' => FALSE
			)
		);
	}


	protected function _add_screen_options() {}
	protected function _add_screen_options_default() {}
	protected function _add_feature_pointers() {}

	public function load_scripts_styles() {
		wp_register_script( 'espresso_beaver_builder_admin', EE_BEAVER_BUILDER_ADMIN_ASSETS_URL . 'espresso_beaver_builder_admin.js', array( 'espresso_core' ), EE_BEAVER_BUILDER_VERSION, TRUE );
		wp_enqueue_script( 'espresso_beaver_builder_admin');
	}

	public function admin_init() {
		EE_Registry::$i18n_js_strings[ 'confirm_reset' ] = __( 'Are you sure you want to reset ALL your Event Espresso Beaver Builder Information? This cannot be undone.', 'event_espresso' );
	}

	public function admin_notices() {}
	public function admin_footer_scripts() {}






	protected function _basic_settings() {
		$this->_settings_page( 'beaver_builder_basic_settings.template.php' );
	}




	/**
	 * _settings_page
	 * @param $template
	 */
	protected function _settings_page( $template ) {
		$this->_template_args['beaver_builder_config'] = EE_Config::instance()->get_config( 'addons', 'EED_Beaver_Builder', 'EE_Beaver_Builder_Config' );
		add_filter( 'FHEE__EEH_Form_Fields__label_html', '__return_empty_string' );
		$this->_template_args['yes_no_values'] = array(
			EE_Question_Option::new_instance( array( 'QSO_value' => 0, 'QSO_desc' => __('No', 'event_espresso'))),
			EE_Question_Option::new_instance( array( 'QSO_value' => 1, 'QSO_desc' => __('Yes', 'event_espresso')))
		);

		$this->_template_args['return_action'] = $this->_req_action;
		$this->_template_args['reset_url'] = EE_Admin_Page::add_query_args_and_nonce( array('action'=> 'reset_settings','return_action'=>$this->_req_action), EE_BEAVER_BUILDER_ADMIN_URL );
		$this->_set_add_edit_form_tags( 'update_settings' );
		$this->_set_publish_post_box_vars( NULL, FALSE, FALSE, NULL, FALSE);
		$this->_template_args['admin_page_content'] = EEH_Template::display_template( EE_BEAVER_BUILDER_ADMIN_TEMPLATE_PATH . $template, $this->_template_args, TRUE );
		$this->display_admin_page_with_sidebar();
	}


	protected function _usage() {
		$this->_template_args['admin_page_content'] = EEH_Template::display_template( EE_BEAVER_BUILDER_ADMIN_TEMPLATE_PATH . 'beaver_builder_usage_info.template.php', array(), TRUE );
		$this->display_admin_page_with_no_sidebar();
	}

	protected function _update_settings(){
		if(isset($_POST['reset_beaver_builder']) && $_POST['reset_beaver_builder'] == '1'){
			$config = new EE_Beaver_Builder_Config();
			$count = 1;
		}else{
			$config = EE_Config::instance()->get_config( 'addons', 'EED_Beaver_Builder', 'EE_Beaver_Builder_Config' );
			$count=0;
			//otherwise we assume you want to allow full html
			foreach($this->_req_data['beaver_builder'] as $top_level_key => $top_level_value){
				if(is_array($top_level_value)){
					foreach($top_level_value as $second_level_key => $second_level_value){
						if ( EEH_Class_Tools::has_property( $config, $top_level_key ) && EEH_Class_Tools::has_property( $config->{$top_level_key}, $second_level_key ) && $second_level_value != $config->{$top_level_key}->{$second_level_key} ) {
							$config->{$top_level_key}->{$second_level_key} = $this->_sanitize_config_input( $top_level_key, $second_level_key, $second_level_value );
							$count++;
						}
					}
				}else{
					if ( EEH_Class_Tools::has_property($config, $top_level_key) && $top_level_value != $config->{$top_level_key}){
						$config->{$top_level_key} = $this->_sanitize_config_input($top_level_key, NULL, $top_level_value);
						$count++;
					}
				}
			}
		}
		EE_Config::instance()->update_config( 'addons', 'EED_Beaver_Builder', $config );
		$this->_redirect_after_action( $count, 'Settings', 'updated', array('action' => $this->_req_data['return_action']));
	}

	/**
	 * resets the beaver_builder data and redirects to where they came from
	 */
//	protected function _reset_settings(){
//		EE_Config::instance()->addons['beaver_builder'] = new EE_Beaver_Builder_Config();
//		EE_Config::instance()->update_espresso_config();
//		$this->_redirect_after_action(1, 'Settings', 'reset', array('action' => $this->_req_data['return_action']));
//	}
	private function _sanitize_config_input( $top_level_key, $second_level_key, $value ){
		$sanitization_methods = array(
			'display'=>array(
				'enable_beaver_builder'=>'bool',
//				'beaver_builder_height'=>'int',
//				'enable_beaver_builder_filters'=>'bool',
//				'enable_category_legend'=>'bool',
//				'use_pickers'=>'bool',
//				'event_background'=>'plaintext',
//				'event_text_color'=>'plaintext',
//				'enable_cat_classes'=>'bool',
//				'disable_categories'=>'bool',
//				'show_attendee_limit'=>'bool',
			)
		);
		$sanitization_method = NULL;
		if(isset($sanitization_methods[$top_level_key]) &&
				$second_level_key === NULL &&
				! is_array($sanitization_methods[$top_level_key]) ){
			$sanitization_method = $sanitization_methods[$top_level_key];
		}elseif(is_array($sanitization_methods[$top_level_key]) && isset($sanitization_methods[$top_level_key][$second_level_key])){
			$sanitization_method = $sanitization_methods[$top_level_key][$second_level_key];
		}
//		echo "$top_level_key [$second_level_key] with value $value will be sanitized as a $sanitization_method<br>";
		switch($sanitization_method){
			case 'bool':
				return (boolean)intval($value);
			case 'plaintext':
				return wp_strip_all_tags($value);
			case 'int':
				return intval($value);
			case 'html':
				return $value;
			default:
				$input_name = $second_level_key == NULL ? $top_level_key : $top_level_key."[".$second_level_key."]";
				EE_Error::add_error(sprintf(__("Could not sanitize input '%s' because it has no entry in our sanitization methods array", "event_espresso"),$input_name), __FILE__, __FUNCTION__, __LINE__ );
				return NULL;

		}
	}





}
// End of file Beaver_Builder_Admin_Page.core.php
// Location: /wp-content/plugins/eea-beaver-builder/admin/beaver_builder/Beaver_Builder_Admin_Page.core.php