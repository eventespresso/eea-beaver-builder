<?php if ( ! defined('EVENT_ESPRESSO_VERSION')) exit('No direct script access allowed');
/**
*
* Beaver_Builder_Admin_Page_Init class
*
* This is the init for the Beaver_Builder Addon Admin Pages.  See EE_Admin_Page_Init for method inline docs.
*
* @package			Event Espresso (beaver_builder addon)
* @subpackage		admin/Beaver_Builder_Admin_Page_Init.core.php
* @author				Darren Ethier
*
* ------------------------------------------------------------------------
*/
class Beaver_Builder_Admin_Page_Init extends EE_Admin_Page_Init  {

	/**
	 * 	constructor
	 *
	 * @access public
	 * @return \Beaver_Builder_Admin_Page_Init
	 */
	public function __construct() {

		do_action( 'AHEE_log', __FILE__, __FUNCTION__, '' );

		define( 'BEAVER_BUILDER_PG_SLUG', 'espresso_beaver_builder' );
		define( 'BEAVER_BUILDER_LABEL', __( 'Beaver Builder', 'event_espresso' ));
		define( 'EE_BEAVER_BUILDER_ADMIN_URL', admin_url( 'admin.php?page=' . BEAVER_BUILDER_PG_SLUG ));
		define( 'EE_BEAVER_BUILDER_ADMIN_ASSETS_PATH', EE_BEAVER_BUILDER_ADMIN . 'assets' . DS );
		define( 'EE_BEAVER_BUILDER_ADMIN_ASSETS_URL', EE_BEAVER_BUILDER_URL . 'admin' . DS . 'beaver_builder' . DS . 'assets' . DS );
		define( 'EE_BEAVER_BUILDER_ADMIN_TEMPLATE_PATH', EE_BEAVER_BUILDER_ADMIN . 'templates' . DS );
		define( 'EE_BEAVER_BUILDER_ADMIN_TEMPLATE_URL', EE_BEAVER_BUILDER_URL . 'admin' . DS . 'beaver_builder' . DS . 'templates' . DS );

		parent::__construct();
		$this->_folder_path = EE_BEAVER_BUILDER_ADMIN;

	}





	protected function _set_init_properties() {
		$this->label = BEAVER_BUILDER_LABEL;
	}



	/**
	*		_set_menu_map
	*
	*		@access 		protected
	*		@return 		void
	*/
	protected function _set_menu_map() {
		$this->_menu_map = new EE_Admin_Page_Sub_Menu( array(
			'menu_group' => 'addons',
			'menu_order' => 25,
			'show_on_menu' => EE_Admin_Page_Menu_Map::BLOG_ADMIN_ONLY,
			'parent_slug' => 'espresso_events',
			'menu_slug' => BEAVER_BUILDER_PG_SLUG,
			'menu_label' => BEAVER_BUILDER_LABEL,
			'capability' => 'administrator',
			'admin_init_page' => $this
		));
	}



}
// End of file Beaver_Builder_Admin_Page_Init.core.php
// Location: /wp-content/plugins/eea-beaver-builder/admin/beaver_builder/Beaver_Builder_Admin_Page_Init.core.php
